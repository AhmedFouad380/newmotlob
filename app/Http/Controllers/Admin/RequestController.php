<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Information;
use App\Models\Job;
use App\Models\JobRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class RequestController extends Controller
{
    public function index($id = null)
    {       if(isset($id)){
            $data = Job::findOrFail($id);
            }
        return view('admin.JobRequests.index',compact('id','data'));
    }

    public function datatable(Request $request)
    {
        $data = JobRequest::where('job_id', $request->id)->orderBy('id', 'asc');


        return Datatables::of($data)
            ->addColumn('checkbox', function ($row) {
                $checkbox = '';
                $checkbox .= '<div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="' . $row->id . '" />
                                </div>';
                return $checkbox;
            })
            ->addColumn('name', function ($row) {
                if($row->user_id) {
                    $data = '<a href="/User-Profile/' . $row->User->id . '" target="_blank">' . $row->User->name . '</a>';
                }else{
                        $data = '<a href="' . $row->cv . '" target="_blank">' . $row->user_name . '</a>';

                }
                if ($data) {
                    return $data;
                } else {
                    return '';
                }
            })
            ->addColumn('Age', function ($row) {
                if($row->user_id){
                    $data = $row->User->age;
                }else{
                  $data =  $row->user_age;
                }
                if ($data) {
                    return $data;
                } else {
                    return '';
                }
            })
            ->addColumn('Address', function ($row) {
                if($row->user_id){
                    $data = $row->User->Country->name . ' - ' . $row->User->City->name;
                }else{
                    $data = $row->Country->name . ' - ' . $row->City->name;
                }

                if ($data) {
                    return $data;
                } else {
                    return '';
                }
            })
            ->editColumn('created_at', function ($row) {
                $data = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $row->created_at)->diffForHumans();
                if ($data) {
                    return $data;
                } else {
                    return '';
                }
            })
            ->addColumn('actions', function ($row) {
                if($row->admin_approve == 'pending'){
                $actions = ' <a href="' . url("AcceptApplication/" . $row->id) . '" class="btn btn-success"><i class="bi bi-pencil-fill"></i> قبول </a>';
                $actions .= ' <a href="' . url("RejectApplication/" . $row->id) . '" class="btn btn-active-danger"><i class="bi bi-pencil-fill"></i> رفض </a>';
                }elseif($row->admin_approve == 'accepted'){
                    $actions = '<button class="btn btn-success"  disable> مقبول </button> ';
                }else{
                    $actions = '<button class="btn btn-danger" style="background-color: darkred!important;"  disable> مرفوض </button> ';

                }
                return $actions;

            })
            ->rawColumns(['actions', 'checkbox', 'name', 'is_active', 'Address', 'Age'])
            ->make();

    }

    public function store(Request $request)
    {
        $data = new JobRequest();
        if($request->type == 1){
        $data->user_id  = $request->user_id ;
        }else{
            $data->user_name = $request->user_name;
            $data->cv = $request->cv;
            $data->user_phone = $request->user_phone;
            $data->sign_by = 'admin';
            $data->admin_id = Auth::guard('admin')->id();
            $data->user_age=$request->user_age;
            $data->country_id=$request->country_id;
            $data->city_id=$request->city_id;
            $data->state_id=$request->state_id;
            $data->village_id=$request->village_id;
        }
        $data->job_id  = $request->job_id ;
        $data->type = 'new';
        $data->company_id  = Job::find($request->job_id)->company_id;
        $data->save();

        return back()->with('message', 'success');
    }


    public function update(Request $request)
    {

        $data = JobRequest::find($request->id);
        $data->title = $request->title;
        $data->description = $request->description;
        $data->is_active = $request->is_active;
        $data->updated_by = Auth::guard('admin')->id();
        $data->image = $request->image;
        $data->save();

        return back()->with('message', 'success');
    }


    public function edit($id)
    {
        $employee = JobRequest::findOrFail($id);
        return view('admin.JobRequest.edit', compact('employee'));
    }

    public function destroy(Request $request)
    {
        try {
            JobRequest::whereIn('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);

    }

    public function AcceptApplication($id){
        $data = JobRequest::findOrFail($id);
        $data->admin_approve='accepted';
        $data->save();
        return back()->with('message', 'success');

    }
    public function RejectApplication($id){
        $data = JobRequest::findOrFail($id);
        $data->admin_approve='rejected';
        $data->save();
        return back()->with('message', 'success');

    }
}
