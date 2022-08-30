<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use App\Models\Job;
use Illuminate\Http\Request;
use Auth;
class ComplaintsController extends Controller
{
    public function Complaints(){
        $data = Complaint::where('company_id',Auth::guard('company')->id())->get();

        return view('front.Company.Complaints',compact('data'));
    }
    public function StoreComplaints(Request $request){

        $Job = Job::findOrFail($request->job_id);
        $data = new Complaint();
        $data->user_id=Auth::guard('web')->id();
        $data->job_id=$request->job_id;
        $data->company_id=$Job->company_id;
        $data->description=$request->description;
        $data->save();
        return back()->with('messageSuccess', 'تم ارسال الشكوى بنجاح  ');

    }

}
