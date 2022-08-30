<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\JobRequest;
use App\Models\JobRequestStates;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function getReportForm(Request $request){
        $data = JobRequest::findOrFail($request->id);
        $value = $request->value;
        return view('front.Company.ReportSelectors',compact('data','value'));
    }

    public function  updateJobCode(Request $request){
        $data = JobRequest::findOrFail($request->id);
        $data->job_code=$request->job_code;
        $data->save();
        return redirect('Reports')->with('messageSuccess','تم الحفظ بنجاح');

    }
    public function updateReportStates(Request $request){

        $data = JobRequest::findOrFail($request->id);
        $data->type=$request->type;
        if($request->type == 'pending'){
            $data->confirm_interview='pending';
            $data->interview_date=$request->interview_date;
        }elseif($request->type == 'rejected'){
            $data->interview_cancel_from='company';
        }
        $data->interview_description=$request->interview_description;
        $data->interview_date=$request->interview_date;
        $data->salary=$request->salary;
        $data->date_of_hiring=$request->date_of_hiring;
        $data->contract=$request->contract;
        $data->resignation_date=$request->resignation_date;
        $data->save();

        $Steps = new JobRequestStates();

        $Steps->description=$request->interview_description;
        $Steps->type=$request->type;
        if($request->interview_date){
        $Steps->interview_date=$request->interview_date;
        }
        $Steps->reason=$request->reason;
        $Steps->company_id=$data->company_id;
        $Steps->user_id=$data->user_id;
        $Steps->job_request_id=$data->id;
        $Steps->save();

        return redirect('Reports');
    }


    public function confirm_interview(Request $request){
        $data = JobRequest::find($request->job_request_id);
        $data->confirm_interview='confirm';
        $data->save();

        $oldJobRequestStates = JobRequestStates::find($request->job_request_states_id);
        $oldJobRequestStates->confirm_interview='confirm';
        $oldJobRequestStates->save();

        $JobRequestStates = new JobRequestStates;
        $JobRequestStates->description='تم قبول معاد الانترفيو';
        $JobRequestStates->type='pending';
        $JobRequestStates->interview_date=$oldJobRequestStates->interview_date;
        $JobRequestStates->user_id=$oldJobRequestStates->user_id;
        $JobRequestStates->company_id=$oldJobRequestStates->company_id;
        $JobRequestStates->job_request_id=$oldJobRequestStates->job_request_id;
        $JobRequestStates->reason=$request->reason;
        $JobRequestStates->confirm_interview='confirm';
        $JobRequestStates->save();

        return back()->with('messageSuccess', 'تم التسجيل  بنجاح   ');
    }

    public function reject_interview(Request $request){
        $data = JobRequest::find($request->job_request_id);
        $data->confirm_interview='rejected';
        $data->reject_reason=$request->reason;
        $data->save();


        $oldJobRequestStates = JobRequestStates::find($request->job_request_states_id);
        $oldJobRequestStates->confirm_interview='rejected';

        $oldJobRequestStates->save();

        $JobRequestStates = new JobRequestStates;
        $JobRequestStates->description='تم رفض معاد الانترفيو';
        $JobRequestStates->type='rejected';
        $JobRequestStates->reason=$request->reason;
        $JobRequestStates->interview_date=$oldJobRequestStates->interview_date;
        $JobRequestStates->user_id=$oldJobRequestStates->user_id;
        $JobRequestStates->company_id=$oldJobRequestStates->company_id;
        $JobRequestStates->job_request_id=$oldJobRequestStates->job_request_id;
        $JobRequestStates->reason=$request->reason;
        $JobRequestStates->confirm_interview='rejected';
        $JobRequestStates->save();

        return back()->with('messageSuccess', 'تم التسجيل  بنجاح   ');
    }
}
