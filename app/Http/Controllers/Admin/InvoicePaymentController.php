<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\InvoicePayments;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Auth;
class InvoicePaymentController extends Controller
{
    public function index($id){
            $data = Invoice::find($id);
        return view('admin.Invoices.payments',compact('id','data'));
    }

    public function datatable(Request $request)
    {
        $data = InvoicePayments::orderBy('id', 'desc')->where('invoice_id',$request->id);
        return Datatables::of($data)
            ->addColumn('checkbox', function ($row) {
                $checkbox = '';
                $checkbox .= '<div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="' . $row->id . '" />
                                </div>';
                return $checkbox;
            })

            ->editColumn('type', function ($row) {
                if($row->type == 'payment_method') {
                    $name = ' <span class="text-success text-hover-primary mb-1" > بوابة الالكترونية للدفع  </span>';
                }else{
                    $name = ' <span class="text-warning text-hover-primary mb-1"> كاش  </span>';
                }
                return $name;
            })


            ->editColumn('admin_id', function ($row) {
                if($row->admin_id){
                $data = $row->Admin->name;
                }else{
                    'العميل';
                }
                if($data){
                    return $data;
                }else{
                    return '';
                }
            })


            ->rawColumns(['admin_id', 'checkbox','type'])
            ->make();

    }



    public function edit($id)
    {
        $employee = Invoice::findOrFail($id);
        return view('admin.Invoice.edit', compact('employee'));
    }

    public function store(Request $request){
        $Invoice = Invoice::find($request->invoice_id);

        $data = new InvoicePayments();
        $data->invoice_id=$request->invoice_id;
        $data->date=$request->date;
        $data->type=$request->type;
        $data->description=$request->description;
        $data->price=$request->price;
        if($request->type == 'payment_method'){
            $data->payment_invoice_id=$request->payment_invoice_id;
        }
        if(Auth::guard('admin')->check()){
            $data->admin_id=Auth::guard('admin')->id();
        }
        $data->save();

        if(InvoicePayments::where('invoice_id',$request->invoice_id)->sum('price') >= $Invoice->total_price){
            $Invoice->type= 'payed';
            $Invoice->save();
        }
        return redirect('InvoicePayment/'.$request->invoice_id)->with('message','success');

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
}
