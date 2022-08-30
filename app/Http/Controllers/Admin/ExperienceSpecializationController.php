<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use App\Models\ExperienceSpecialization;
class ExperienceSpecializationController extends Controller
{
    public function index($id){

        return view('admin.ExperienceSpecialization.index',compact('id'));
    }
    public function datatable(Request $request)
    {
        $data = ExperienceSpecialization::orderBy('id', 'asc')->where('category_id',$request->id)->get();

        return Datatables::of($data)
            ->addColumn('checkbox', function ($row) {
                $checkbox = '';
                $checkbox .= '<div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="' . $row->id . '" />
                                </div>';
                return $checkbox;
            })
            ->editColumn('name', function ($row) {
                $name = '';
                $name .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->name . '</span>';
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
                $actions = ' <a href="' . url("ExperienceSpecialization-edit/" . $row->id) . '" class="btn btn-active-light-info"><i class="bi bi-pencil-fill"></i> تعديل </a>';
                return $actions;

            })
            ->rawColumns(['actions', 'checkbox', 'name', 'is_active'])
            ->make();

    }

    public function store(Request $request){


        $data = new ExperienceSpecialization();
        $data->name=$request->name;
        $data->category_id=$request->category_id;
        $data->is_active=$request->is_active;
        $data->created_by=Auth::guard('admin')->id();
        $data->save();

        return back()->with('message','success');
    }


    public function update(Request $request){


        $data =  ExperienceSpecialization::find($request->id);
        $data->name=$request->name;
        $data->is_active=$request->is_active;
        $data->updated_by=Auth::guard('admin')->id();
        $data->save();

        return redirect('ExperienceSpecialization/'.$data->category_id)->with('message','success');
    }


    public function edit($id)
    {
        $employee = ExperienceSpecialization::findOrFail($id);
        return view('admin.ExperienceSpecialization.edit', compact('employee'));
    }

    public function destroy(Request $request)
    {
        try {
            ExperienceSpecialization::whereIn('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);
    }

    public function getspecialization($id){

        $data = ExperienceSpecialization::where('category_id',$id)->get();

        return view('admin.ExperienceSpecialization.modelShow', compact('data'));
    }
}
