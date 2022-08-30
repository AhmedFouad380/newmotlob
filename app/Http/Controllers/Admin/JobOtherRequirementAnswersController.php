<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\JobOtherRequirementAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class JobOtherRequirementAnswersController extends Controller
{
    public function index($id){

        return view('admin.JobOtherRequirementAnswer.index',compact('id'));
    }
    public function datatable(Request $request)
    {
        $data = JobOtherRequirementAnswer::orderBy('id', 'asc')->where('job_other_requirement_id',$request->job_other_requirement_id)->get();

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
            ->editColumn('type', function ($row) {
                $name = '';
                $name .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->type . '</span>';
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


            ->addColumn('actions', function ($row) {
                $actions = ' <a href="' . url("JobOtherRequirementAnswer-edit/" . $row->id) . '" class="btn btn-active-light-info"><i class="bi bi-pencil-fill"></i> تعديل </a>';
                return $actions;

            })
            ->rawColumns(['actions', 'checkbox', 'name','type'])
            ->make();

    }

    public function store(Request $request){



        $Answer = new JobOtherRequirementAnswer();
        $Answer->name=$request->name;
        $Answer->is_active='active';
        $Answer->job_other_requirement_id=$request->job_other_requirement_id;
        $Answer->created_by=Auth::guard('admin')->id();
        $Answer->save();

        return back()->with('message','success');
    }


    public function update(Request $request){


        $data =  JobOtherRequirementAnswer::find($request->id);
        $data->name=$request->name;
        $data->updated_by=Auth::guard('admin')->id();
        $data->save();

        return redirect('JobOtherRequirementAnswer/'.$data->job_other_requirement_id)->with('message','success');
    }


    public function edit($id)
    {
        $employee = JobOtherRequirementAnswer::findOrFail($id);
        return view('admin.JobOtherRequirementAnswer.edit', compact('employee'));
    }

    public function destroy(Request $request)
    {
        try {
            JobOtherRequirementAnswer::whereIn('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);
    }
}
