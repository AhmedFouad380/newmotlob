<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Middleware\Company;
use App\Models\CompanyPayment;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\JobRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class InvoiceController extends Controller
{
    public function index(){

        return view('admin.Invoices.index');
    }

    public function InvoiceDetails($id){

        $data = Invoice::find($id);

        return view('admin.Invoices.details',compact('data'));
    }

    public function datatable(Request $request)
    {
        $data = Invoice::orderBy('id', 'desc');
        if($request->company_id){
            $data->where('compnay_id',$request->company_id);
        }
        return Datatables::of($data)
            ->addColumn('checkbox', function ($row) {
                $checkbox = '';
                $checkbox .= '<div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="' . $row->id . '" />
                                </div>';
                return $checkbox;
            })


            ->editColumn('recruitment_fee_postpaid_monthly', function ($row) {
                if($row->recruitment_fee_postpaid_monthly == 'percentage') {
                    $name = 'نسبة شهرية ثابتة';
                }else{
                    $name = ' ثابتة';
                }
                return $name;
            })

            ->editColumn('type', function ($row) {
                if($row->type == 'payed') {
                    $name = ' <span class="text-success text-hover-primary mb-1" > تم الدفع </span>';
                }else{
                    $name = ' <span class="text-warning text-hover-primary mb-1"> لم يتم الدفع </span>';
                }
                return $name;
            })
            ->editColumn('percentage_postpaid_monthly', function ($row) {
                if($row->recruitment_fee_postpaid_monthly == 'percentage') {
                    $name = $row->percentage_postpaid_monthly .'%';
                }else{
                    $name = $row->percentage_postpaid_monthly ;
                }
                return $name;
            })

            ->editColumn('company_id', function ($row) {
                $data = $row->Company->first_name .' '. $row->Company->last_name .'<br>' .$row->Company->company_name ;
                if($data){
                    return $data;
                }else{
                    return '';
                }
            })
            ->editColumn('company_name', function ($row) {
                $data = $row->Company->company_name;
                if($data){
                    return $data;
                }else{
                    return '';
                }
            })

            ->addColumn('user_phone', function ($row) {
                $data = $row->Company->phone;
                if($data){
                    return $data;
                }else{
                    return '';
                }
            })
            ->editColumn('admin_id', function ($row) {
                $data = $row->Admin->name;
                if($data){
                    return $data;
                }else{
                    return '';
                }
            })

            ->addColumn('actions', function ($row) {
                $actions = ' <a href="' . url("InvoiceDetails/" . $row->id) . '" class="btn btn-active-light-info"><i class="bi bi-pencil-fill"></i> تفاصيل الفاتورة </a>';
                $actions .= ' <a href="' . url("InvoicePayment/" . $row->id) . '" class="btn btn-primary"><i class="bi bi-pencil-fill"></i> الدفعات </a>';
                return $actions;

            })
            ->rawColumns(['actions', 'checkbox','type','company_id'])
            ->make();

    }



    public function edit($id)
    {
        $employee = Invoice::findOrFail($id);
        return view('admin.Invoice.edit', compact('employee'));
    }

    public function update(Request $request){
        $data = Invoice::find($request->id);
        $data->states=$request->states;
        $data->save();

        return redirect('Invoices_setting')->with('message','success');

    }

    public function destroy(Request $request)
    {
        try {
            Invoice::whereIn('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);
    }

    public function store(Request $request){
        $company = \App\Models\Company::findOrFail($request->company_id);

            $income = JobRequest::where('company_id',$company->id)->where('type','accepted')->where('is_income',0);
            $outcome = JobRequest::where('company_id',$company->id)->where('type','trial_period')->where('is_outcome',0);
            if($income->count() > 0){
                if($company->recruitment_fee_postpaid_monthly == 'percentage'){
                    $total_income = ( $income->sum('salary') * $company->percentage_postpaid_monthly ) / 100 ;
                    $total_outcome =  ( $outcome->sum('salary') * $company->percentage_postpaid_monthly ) / 100;
                    $total_price =$total_income - $total_outcome;
                    $Invoice = new Invoice();
                    $Invoice->num='Inv-'.rand(9999999,99999999);
                    $Invoice->company_id=$company->id;
                    $Invoice->date=\Carbon\Carbon::now()->format('Y-m-d');
                    $Invoice->pay_date=\Carbon\Carbon::now()->addDays(30)->format('Y-m-d');
                    $Invoice->total_price= $total_price;
                    if(Auth::guard('admin')->check()){
                        $Invoice->admin_id=Auth::guard('admin')->id();
                    }
                    $Invoice->recruitment_fee_postpaid_monthly=$company->recruitment_fee_postpaid_monthly;
                    $Invoice->percentage_postpaid_monthly=$company->percentage_postpaid_monthly;
                    $Invoice->save();

                    foreach($income->get() as $jobRequest){
                        $invoiceDetail = new InvoiceDetail();
                        $invoiceDetail->invoice_id=$Invoice->id;
                        $invoiceDetail->price=($jobRequest->salary  * $company->percentage_postpaid_monthly ) / 100;
                        $invoiceDetail->job_request_id=$jobRequest->id;
                        $invoiceDetail->type='income';
                        $invoiceDetail->save();

                    }
                    $income->update(['is_income'=>1]);

                    foreach($outcome->get() as $jobRequest){
                        $invoiceDetail = new InvoiceDetail();
                        $invoiceDetail->invoice_id=$Invoice->id;
                        $invoiceDetail->price=($jobRequest->salary  * $company->percentage_postpaid_monthly ) / 100;
                        $invoiceDetail->job_request_id=$jobRequest->id;
                        $invoiceDetail->type='outcome';
                        $invoiceDetail->save();
                    }
                    $outcome->update(['is_outcome'=>1]);

                }else{
                    $total_income =( $income->count() * $company->percentage_postpaid_monthly ) ;
                    $total_outcome = ( $outcome->count() * $company->percentage_postpaid_monthly ) ;
                    $total_price =$total_income - $total_outcome;

                    $Invoice = new Invoice();
                    $Invoice->num='Inv-'.rand(9999999,99999999);
                    $Invoice->company_id=$company->id;
                    $Invoice->date=\Carbon\Carbon::now()->format('Y-m-d');
                    $Invoice->pay_date=\Carbon\Carbon::now()->addDays(30)->format('Y-m-d');
                    $Invoice->total_price= $total_price;
                    if(Auth::guard('admin')->check()){
                        $Invoice->admin_id=Auth::guard('admin')->id();
                    }
                    $Invoice->recruitment_fee_postpaid_monthly=$company->recruitment_fee_postpaid_monthly;
                    $Invoice->percentage_postpaid_monthly=$company->percentage_postpaid_monthly;
                    $Invoice->save();

                    foreach($income->get() as $jobRequest){
                        $invoiceDetail = new InvoiceDetail();
                        $invoiceDetail->invoice_id=$Invoice->id;
                        $invoiceDetail->price=( $jobRequest->count() * $company->percentage_postpaid_monthly ) ;
                        $invoiceDetail->job_request_id=$jobRequest->id;
                        $invoiceDetail->type='income';
                        $invoiceDetail->save();
                    }
                    $income->update(['is_income'=>1]);

                    foreach($outcome->get() as $jobRequest){
                        $invoiceDetail = new InvoiceDetail();
                        $invoiceDetail->invoice_id=$Invoice->id;
                        $invoiceDetail->price=( $jobRequest->count() * $company->percentage_postpaid_monthly ) ;
                        $invoiceDetail->job_request_id=$jobRequest->id;
                        $invoiceDetail->type='outcome';
                        $invoiceDetail->save();
                    }
                    $outcome->update(['is_outcome'=>1]);

                }
                return back()->with('message','تم انشاء الفاتورة بنجاح');

            }else{
                return back()->with('messageError','لا يوجد فواتير لهذه الشركة');
            }

    }
    public function CreateInvoice(){
        $companies = \App\Models\Company::all();

        foreach($companies as $company){
            $income = JobRequest::where('company_id',$company->id)->where('type','accepted')->where('is_income',0);
            $outcome = JobRequest::where('company_id',$company->id)->where('type','trial_period')->where('is_outcome',0);
            if($income->count() > 0){
                if($company->recruitment_fee_postpaid_monthly == 'percentage'){
                    $total_income = ( $income->sum('salary') * $company->percentage_postpaid_monthly ) / 100 ;
                    $total_outcome =  ( $outcome->sum('salary') * $company->percentage_postpaid_monthly ) / 100;
                    $total_price =$total_income - $total_outcome;
                    $Invoice = new Invoice();
                    $Invoice->num='Inv-'.rand(9999999,99999999);
                    $Invoice->company_id=$company->id;
                    $Invoice->date=\Carbon\Carbon::now()->format('Y-m-d');
                    $Invoice->pay_date=\Carbon\Carbon::now()->addDays(30)->format('Y-m-d');
                    $Invoice->total_price= $total_price;
                    if(Auth::guard('admin')->check()){
                        $Invoice->admin_id=Auth::guard('admin')->id();
                    }
                    $Invoice->recruitment_fee_postpaid_monthly=$company->recruitment_fee_postpaid_monthly;
                    $Invoice->percentage_postpaid_monthly=$company->percentage_postpaid_monthly;
                    $Invoice->save();

                    foreach($income->get() as $jobRequest){
                        $invoiceDetail = new InvoiceDetail();
                        $invoiceDetail->invoice_id=$Invoice->id;
                        $invoiceDetail->price=($jobRequest->salary  * $company->percentage_postpaid_monthly ) / 100;
                        $invoiceDetail->job_request_id=$jobRequest->id;
                        $invoiceDetail->type='income';
                        $invoiceDetail->save();

                    }
                    $income->update(['is_income'=>1]);

                    foreach($outcome->get() as $jobRequest){
                        $invoiceDetail = new InvoiceDetail();
                        $invoiceDetail->invoice_id=$Invoice->id;
                        $invoiceDetail->price=($jobRequest->salary  * $company->percentage_postpaid_monthly ) / 100;
                        $invoiceDetail->job_request_id=$jobRequest->id;
                        $invoiceDetail->type='outcome';
                        $invoiceDetail->save();
                    }
                    $outcome->update(['is_outcome'=>1]);

                }else{
                    $total_income =( $income->count() * $company->percentage_postpaid_monthly ) ;
                    $total_outcome = ( $outcome->count() * $company->percentage_postpaid_monthly ) ;
                    $total_price =$total_income - $total_outcome;

                    $Invoice = new Invoice();
                    $Invoice->num='Inv-'.rand(9999999,99999999);
                    $Invoice->company_id=$company->id;
                    $Invoice->date=\Carbon\Carbon::now()->format('Y-m-d');
                    $Invoice->pay_date=\Carbon\Carbon::now()->addDays(30)->format('Y-m-d');
                    $Invoice->total_price= $total_price;
                    if(Auth::guard('admin')->check()){
                        $Invoice->admin_id=Auth::guard('admin')->id();
                    }
                    $Invoice->recruitment_fee_postpaid_monthly=$company->recruitment_fee_postpaid_monthly;
                    $Invoice->percentage_postpaid_monthly=$company->percentage_postpaid_monthly;
                    $Invoice->save();

                    foreach($income->get() as $jobRequest){
                        $invoiceDetail = new InvoiceDetail();
                        $invoiceDetail->invoice_id=$Invoice->id;
                        $invoiceDetail->price=( $jobRequest->count() * $company->percentage_postpaid_monthly ) ;
                        $invoiceDetail->job_request_id=$jobRequest->id;
                        $invoiceDetail->type='income';
                        $invoiceDetail->save();
                    }
                    $income->update(['is_income'=>1]);

                    foreach($outcome->get() as $jobRequest){
                        $invoiceDetail = new InvoiceDetail();
                        $invoiceDetail->invoice_id=$Invoice->id;
                        $invoiceDetail->price=( $jobRequest->count() * $company->percentage_postpaid_monthly ) ;
                        $invoiceDetail->job_request_id=$jobRequest->id;
                        $invoiceDetail->type='outcome';
                        $invoiceDetail->save();
                    }
                    $outcome->update(['is_outcome'=>1]);

                }
            }

        }
        return 'success';
    }
}
