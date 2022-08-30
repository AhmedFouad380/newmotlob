<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyPackage;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class CompanyPackageController extends Controller
{
    public function index(){

        return view('admin.CompanyPackage.index');
    }
    public function datatable(Request $request)
    {
        $data = CompanyPackage::orderBy('id', 'desc')->get();

        return Datatables::of($data)
            ->addColumn('checkbox', function ($row) {
                $checkbox = '';
                $checkbox .= '<div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="' . $row->id . '" />
                                </div>';
                return $checkbox;
            })
            ->editColumn('title', function ($row) {
                $name = '';
                $name .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->title . '</span>';
                return $name;
            })

            ->editColumn('type', function ($row) {
                if($row->type == 'time'){
                    $name = ' <span class="text-gray-800 text-hover-primary mb-1"> بالوقت </span>';

                }else{
                    $name = ' <span class="text-gray-800 text-hover-primary mb-1"> بالعدد</span>';

                }
                return $name;
            })


            ->editColumn('created_by', function ($row) {
                $data = $row->CreatedBy->name;
                if($data){
                    return $data;
                }else{
                    return '';
                }
            })
            ->editColumn('updated_by', function ($row) {

                if($row->updated_by){
                    $data = $row->UpdatedBy->name;

                    return $data;
                }else{
                    return '';
                }
            })

            ->editColumn('is_active', function ($row) {
                $is_active = '<div class="badge badge-light-success fw-bolder">مفعل</div>';
                $not_active = '<div class="badge badge-light-danger fw-bolder">غير مفعل</div>';
                if ($row->is_active == 'active') {
                    return $is_active;
                } else {
                    return $not_active;
                }
            })
            ->addColumn('actions', function ($row) {
                $actions = ' <a href="' . url("CompanyPackage-edit/" . $row->id) . '" class="btn btn-active-light-info"><i class="bi bi-pencil-fill"></i> تعديل </a>';
                return $actions;

            })
            ->rawColumns(['actions', 'checkbox', 'title', 'is_active','type'])
            ->make();

    }

    public function store(Request $request){


        $data = new CompanyPackage();
        $data->title=$request->title;
        $data->description=$request->description;
        $data->price=$request->price;
        $data->color=$request->color;
        $data->cv_count=$request->cv_count;
        $data->adv_count=$request->adv_count;
        $data->months=$request->months;
        $data->is_active=$request->is_active;
        $data->long_description=$request->long_description;
        $data->show_profile=$request->show_profile;
        $data->is_support=$request->is_support;
        $data->created_by=Auth::guard('admin')->id();
        $data->save();

        return back()->with('message','success');
    }


    public function update(Request $request){


        $data =  CompanyPackage::find($request->id);
        $data->title=$request->title;
        $data->description=$request->description;
        $data->price=$request->price;
        $data->color=$request->color;
        $data->cv_count=$request->cv_count;
        $data->adv_count=$request->adv_count;
        $data->months=$request->months;
        $data->is_active=$request->is_active;
        $data->long_description=$request->long_description;
        $data->show_profile=$request->show_profile;
        $data->is_support=$request->is_support;
        $data->updated_by=Auth::guard('admin')->id();
        $data->save();

        return redirect('CompanyPackages-Setting')->with('message','success');
    }


    public function edit($id)
    {
        $employee = CompanyPackage::findOrFail($id);
        return view('admin.CompanyPackage.edit', compact('employee'));
    }

    public function destroy(Request $request)
    {
        try {
            CompanyPackage::whereIn('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);
    }
}
