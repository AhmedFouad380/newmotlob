<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class PaymentController extends Controller
{
    public function index(){

        return view('admin.Payment.index');
    }
    public function datatable(Request $request)
    {
        $data = Payment::orderBy('id', 'desc')->get();

        return Datatables::of($data)
            ->addColumn('checkbox', function ($row) {
                $checkbox = '';
                $checkbox .= '<div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="' . $row->id . '" />
                                </div>';
                return $checkbox;
            })


            ->editColumn('states', function ($row) {
                if($row->states == 'payed') {
                    $name = ' <span class="text-success text-hover-primary mb-1" > تم الدفع </span>';
                }elseif($row->states == 'pending'){
                    $name = ' <span class="text-warning text-hover-primary mb-1"> تحت الانتظار </span>';
                }else{
                    $name = ' <span class="text-danger text-hover-primary mb-1" style="color:red!important"> فشل في الدفع</span>';

                }
                return $name;
            })


            ->editColumn('user_id', function ($row) {
                $data = $row->User->name;
                if($data){
                    return $data;
                }else{
                    return '';
                }
            })
            ->addColumn('user_phone', function ($row) {
                $data = $row->User->phone;
                if($data){
                    return $data;
                }else{
                    return '';
                }
            })
            ->editColumn('package_id', function ($row) {
                $data = $row->Package->title;
                if($data){
                    return $data;
                }else{
                    return '';
                }
            })
            ->addColumn('package_price', function ($row) {
                $data = $row->Package->price;
                if($data){
                    return $data;
                }else{
                    return '';
                }
            })
            ->addColumn('actions', function ($row) {
                $actions = ' <a href="' . url("Payment-edit/" . $row->id) . '" class="btn btn-active-light-info"><i class="bi bi-pencil-fill"></i> تعديل </a>';
                return $actions;

            })
            ->rawColumns(['actions', 'checkbox', 'is_active','states','package_price'])
            ->make();

    }



    public function edit($id)
    {
        $employee = Payment::findOrFail($id);
        return view('admin.Payment.edit', compact('employee'));
    }

    public function update(Request $request){
        $data = Payment::find($request->id);
        $data->states=$request->states;
        $data->save();

        return redirect('Payments-Setting')->with('message','success');

    }

    public function destroy(Request $request)
    {
        try {
            Payment::whereIn('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);
    }
}
