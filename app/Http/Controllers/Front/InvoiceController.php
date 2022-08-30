<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\In;
use Yajra\DataTables\Facades\DataTables;

class InvoiceController extends Controller
{
    public function index(){
        return view('front.Company.Invoices');
    }

    public function datatable(Request $request)
    {
        $data = Invoice::orderBy('id', 'desc');
        if($request->company_id){
            $data->where('company_id',$request->company_id);
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
                $actions = ' <a href="' . url("InvoiceDetail/" . $row->id) . '" class="btn btn-primary"><i class="bi bi-pencil-fill"></i> تفاصيل الفاتورة </a>';
                return $actions;

            })
            ->rawColumns(['actions', 'checkbox','type','company_id'])
            ->make();

    }
    public function InvoiceDetail($id){
        $data = Invoice::find($id);
        return view('front.Company.InvoiceDetails',compact('data'));
    }

}
