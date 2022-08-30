<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\JobOtherRequirement;
use App\Models\JobOtherRequirementAnswer;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class JobOtherRequirementController extends Controller
{
    public function index(){

        return view('admin.JobOtherRequirement.index');
    }
    public function datatable(Request $request)
    {
        $data = JobOtherRequirement::orderBy('id', 'asc')->get();

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
            ->addColumn('answers', function ($row) {
                $actions = ' <a href="' . url("JobOtherRequirementAnswers/" . $row->id) . '" class="btn btn-active-light-info"><i class="bi bi-pencil-fill"></i> الاختيارات  </a>';
                return $actions;

            })
            ->addColumn('actions', function ($row) {
                $actions = ' <a href="' . url("JobOtherRequirement-edit/" . $row->id) . '" class="btn btn-active-light-info"><i class="bi bi-pencil-fill"></i> تعديل </a>';
                return $actions;

            })
            ->rawColumns(['actions', 'checkbox', 'name', 'is_active','answers'])
            ->make();

    }

    public function store(Request $request){


        $data = new JobOtherRequirement();
        $data->name=$request->name;
        $data->is_active=$request->is_active;
        $data->created_by=Auth::guard('admin')->id();
        $data->save();

        foreach($request->descriptions as  $key => $des){
            $Answer = new JobOtherRequirementAnswer();
            $Answer->name=$des;
            $Answer->is_active='active';
            $Answer->job_other_requirement_id =$data->id;
            $Answer->created_by=Auth::guard('admin')->id();
            $Answer->save();
        }
        return back()->with('message','success');
    }


    public function update(Request $request){


        $data =  JobOtherRequirement::find($request->id);
        $data->name=$request->name;
        $data->is_active=$request->is_active;
        $data->updated_by=Auth::guard('admin')->id();
        $data->save();

        return back()->with('message','success');
    }


    public function edit($id)
    {
        $employee = JobOtherRequirement::findOrFail($id);
        return view('admin.JobOtherRequirement.edit', compact('employee'));
    }

    public function destroy(Request $request)
    {
        try {
            JobOtherRequirement::whereIn('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);
    }
}
