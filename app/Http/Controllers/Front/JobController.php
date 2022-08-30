<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\CompanyPayment;
use App\Models\Complaint;
use App\Models\Information;
use App\Models\Job;
use App\Models\JobFeatures;
use App\Models\JobFeaturesAnswer;
use App\Models\JobFeaturesRelation;
use App\Models\JobOtherRequirement;
use App\Models\JobOtherRequirementAnswer;
use App\Models\JobRequeirementRelation;
use App\Models\JobRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Yajra\DataTables\Facades\DataTables;

class JobController extends Controller
{
    public function StoreJob(Request $request)
    {
        $validatedData = $request->validate([

            'min_salary' => 'required|numeric|between:0,max_salary',
            'max_salary' => 'required||numeric|min:min_salary',
            'extra_min_salary' => 'required|numeric|between:0,extra_max_salary',
            'extra_max_salary' => 'required||numeric|min:extra_min_salary',
            'min_age' => 'required|numeric|between:0,max_age',
            'max_age' => 'required||numeric|min:min_age',
            'min_experience' => 'required|numeric|between:0,max_experience',
            'max_experience' => 'required||numeric|min:min_experience',
        ]);

        if(Auth::guard('company')->type == 'private'){
        $payment = CompanyPayment::where('company_id', Auth::guard('company')->id())->where('states', 'payed')->OrderBy('id', 'desc')->first();
        if ($payment && $payment->cv_count_used < $payment->Package->cv_count) {
            $data = new Job();
            $data->company_id = Auth::guard('company')->id();
            $data->title = $request->title;
            $data->employees_count = $request->employees_count;
            $data->job_time = $request->job_time;
            $data->is_active = 'active';
            $data->description = $request->description;
            $data->min_experience = $request->min_experience;
            $data->max_experience = $request->max_experience;
            $data->min_age = $request->min_age;
            $data->max_age = $request->max_age;
            $data->min_salary = $request->min_salary;
            $data->max_salary = $request->max_salary;
            $data->currency_id = $request->currency_id;
            $data->extra_min_salary = $request->extra_min_salary;
            $data->extra_max_salary = $request->extra_max_salary;
            $data->is_active_salary = $request->is_active_salary;
            $data->is_car_licenses = $request->is_car_licenses;
            $data->type_car_licenses = $request->type_car_licenses;
            $data->job_type_id = $request->job_type_id;
            $data->job_qualification_id = $request->job_qualification_id;
            $data->job_level_id = $request->job_level_id;
            $data->experience_category_id = $request->experience_category_id;
            $data->country_id = $request->country_id;
            $data->city_id = $request->city_id;
            $data->state_id = $request->state_id;
            $data->village_id = $request->village_id;
            $data->save();

            foreach (JobOtherRequirement::where('is_active', 'active')->get() as $other) {
                $name = 'JobOtherRequirement-' . $other->id;
                if (isset($request->$name)) {
                    $JobOtherRequirement = new JobRequeirementRelation();
                    $JobOtherRequirement->job_id = $data->id;
                    $JobOtherRequirement->job_requirement_id = JobOtherRequirementAnswer::findOrFail($request->$name)->job_other_requirement_id;
                    $JobOtherRequirement->job_requirement_answers_id = $request->$name;
                    $JobOtherRequirement->save();
                }
            }
            foreach (JobFeatures::where('is_active', 'active')->get() as $other) {
                $name = 'JobFeatures-' . $other->id;
                if (isset($request->$name)) {
                    $JobOtherRequirement = new JobFeaturesRelation();
                    $JobOtherRequirement->job_id = $data->id;
                    $JobOtherRequirement->job_features_id = JobFeaturesAnswer::findOrFail($request->$name)->job_features_id;
                    $JobOtherRequirement->job_features_answers_id = $request->$name;
                    $JobOtherRequirement->save();
                }
            }


            $payment->cv_count_used = $payment->cv_count_used + 1;
            $payment->save();
            return redirect('Company-jobs')->with('messageSuccess', 'تم الاضافه بنجاح   ');

        } else {
            return redirect('Company-jobs')->with('messageError', 'عفوا لقد تاجوزت الحد الاقصى للباقة الحالية الرجاء تجديد الباقة   ');

        }
        }else{
            $data = new Job();
            $data->company_id = Auth::guard('company')->id();
            $data->title = $request->title;
            $data->employees_count = $request->employees_count;
            $data->job_time = $request->job_time;
            $data->is_active = 'active';
            $data->description = $request->description;
            $data->min_experience = $request->min_experience;
            $data->max_experience = $request->max_experience;
            $data->min_age = $request->min_age;
            $data->max_age = $request->max_age;
            $data->min_salary = $request->min_salary;
            $data->max_salary = $request->max_salary;
            $data->currency_id = $request->currency_id;
            $data->extra_min_salary = $request->extra_min_salary;
            $data->extra_max_salary = $request->extra_max_salary;
            $data->is_active_salary = $request->is_active_salary;
            $data->is_car_licenses = $request->is_car_licenses;
            $data->type_car_licenses = $request->type_car_licenses;
            $data->job_type_id = $request->job_type_id;
            $data->job_qualification_id = $request->job_qualification_id;
            $data->job_level_id = $request->job_level_id;
            $data->experience_category_id = $request->experience_category_id;
            $data->country_id = $request->country_id;
            $data->city_id = $request->city_id;
            $data->state_id = $request->state_id;
            $data->village_id = $request->village_id;
            $data->save();

            foreach (JobOtherRequirement::where('is_active', 'active')->get() as $other) {
                $name = 'JobOtherRequirement-' . $other->id;
                if (isset($request->$name)) {
                    $JobOtherRequirement = new JobRequeirementRelation();
                    $JobOtherRequirement->job_id = $data->id;
                    $JobOtherRequirement->job_requirement_id = JobOtherRequirementAnswer::findOrFail($request->$name)->job_other_requirement_id;
                    $JobOtherRequirement->job_requirement_answers_id = $request->$name;
                    $JobOtherRequirement->save();
                }
            }
            foreach (JobFeatures::where('is_active', 'active')->get() as $other) {
                $name = 'JobFeatures-' . $other->id;
                if (isset($request->$name)) {
                    $JobOtherRequirement = new JobFeaturesRelation();
                    $JobOtherRequirement->job_id = $data->id;
                    $JobOtherRequirement->job_features_id = JobFeaturesAnswer::findOrFail($request->$name)->job_features_id;
                    $JobOtherRequirement->job_features_answers_id = $request->$name;
                    $JobOtherRequirement->save();
                }
            }

            return redirect('Company-jobs')->with('messageSuccess', 'تم الاضافه بنجاح   ');
        }
    }

    public function deleteJob(Request $request)
    {
        try {
            Job::whereIn('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);
    }

    public function Update(Request $request)
    {

        $data = Job::find($request->id);
        $data->title = $request->title;
        $data->employees_count = $request->employees_count;
        $data->job_time = $request->job_time;
        $data->is_active = 'active';
        $data->description = $request->description;
        $data->min_experience = $request->min_experience;
        $data->max_experience = $request->max_experience;
        $data->min_age = $request->min_age;
        $data->max_age = $request->max_age;
        $data->min_salary = $request->min_salary;
        $data->max_salary = $request->max_salary;
        $data->currency_id = $request->currency_id;
        $data->extra_min_salary = $request->extra_min_salary;
        $data->extra_max_salary = $request->extra_max_salary;
        $data->is_active_salary = $request->is_active_salary;
        $data->is_car_licenses = $request->is_car_licenses;
        $data->type_car_licenses = $request->type_car_licenses;
        $data->job_type_id = $request->job_type_id;
        $data->job_qualification_id = $request->job_qualification_id;
        $data->job_level_id = $request->job_level_id;
        $data->experience_category_id = $request->experience_category_id;
        $data->country_id = $request->country_id;
        $data->city_id = $request->city_id;
        $data->state_id = $request->state_id;
        $data->village_id = $request->village_id;
        $data->save();
        JobRequeirementRelation::where('job_id', $data->id)->delete();
        foreach (JobOtherRequirement::where('is_active', 'active')->get() as $other) {
            $name = 'JobOtherRequirement-' . $other->id;
            if (isset($request->$name)) {
                $JobOtherRequirement = new JobRequeirementRelation();
                $JobOtherRequirement->job_id = $data->id;
                $JobOtherRequirement->job_requirement_id = JobOtherRequirementAnswer::findOrFail($request->$name)->job_other_requirement_id;
                $JobOtherRequirement->job_requirement_answers_id = $request->$name;
                $JobOtherRequirement->save();
            }
        }
        JobFeaturesRelation::where('job_id', $data->id)->delete();
        foreach (JobFeatures::where('is_active', 'active')->get() as $other) {
            $name = 'JobFeatures-' . $other->id;
            if (isset($request->$name)) {
                $JobOtherRequirement = new JobFeaturesRelation();
                $JobOtherRequirement->job_id = $data->id;
                $JobOtherRequirement->job_features_id = JobFeaturesAnswer::findOrFail($request->$name)->job_features_id;
                $JobOtherRequirement->job_features_answers_id = $request->$name;
                $JobOtherRequirement->save();
            }
        }

        return redirect('Company-jobs')->with('messageSuccess', 'تم الاضافه بنجاح   ');
    }

    public function JobApplicants($id)
    {

        $data = Job::findOrFail($id);

        return view('front.Company.JobApplicants', compact('data'));
    }

    public function AcceptApplication($id)
    {

        $data = JobRequest::findOrFail($id);
        $data->type='accepted';
        $data->save();

        return back()->with('messageSuccess', 'تم القبول بنجاح   ');
    }
    public function RejectApplication($id)
    {

        $data = JobRequest::findOrFail($id);
        $data->type='rejected';
        $data->save();

        return back()->with('messageSuccess', 'تم الرفض بنجاح   ');
    }

    public function JobApplicantsDatabase(Request $request)
    {
        $data = JobRequest::where('job_id', $request->job_id)->orderBy('id', 'asc');
        if ($request->type) {
            if(is_array($request->type)){
                $data->whereIn('type', $request->type);

            }else{
            $data->where('type', $request->type);
            }
        }
        if ($request->is_read) {
            $data->where('is_read', $request->is_read);
        }

        return Datatables::of($data)
            ->addColumn('checkbox', function ($row) {
                $checkbox = '';
                $checkbox .= '<div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="' . $row->id . '" />
                                </div>';
                return $checkbox;
            })
            ->addColumn('name', function ($row) {
                if (Information::where('user_id', $row->id)->first() && Information::where('user_id', $row->id)->first()->image ) {
                    if($row->user_id){
                        $data = '<div> <a href="/User-Profile/' . $row->User->id . '" > <img  style="margin-left:20px; width:50px;height: 50px; border-radius: 50%" src="' . Information::where('user_id', $row->id)->first()->image . '" > ';
                        $data .= '' . $row->User->name . '</a>';
                        $data .= '</div>';
                    }else{
                        $data = '<a href="' . $row->cv . '" target="_blank">' . $row->user_name . '</a>';

                    }

                } else {
                    if($row->user_id){
                        $data = '<a href="/User-Profile/' . $row->id . '" >' . $row->User->name . '</a>';
                    }else{
                        $data = '<a href="' . $row->cv . '" target="_blank">' . $row->user_name . '</a>';

                    }
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
                $actions = ' <a href="' . url("AcceptApplication/" . $row->id) . '" class="btn btn-success"><i class="bi bi-pencil-fill"></i> قبول </a>';
                $actions .= ' <a href="' . url("RejectApplication/" . $row->id) . '" class="btn btn-bg-danger"><i class="bi bi-pencil-fill"></i> رفض </a>';
                return $actions;

            })
            ->rawColumns(['actions', 'checkbox', 'name', 'is_active', 'Address', 'Age'])
            ->make();

    }
    public function Reports(){

        return view('front.Company.Reports');
    }

    public function ReportsDatatable(Request $request)
    {
        $data = JobRequest::where('company_id', Auth::guard('company')->id())->orderBy('id', 'asc');
        if ($request->type) {
            $data->where('type', $request->type);
        }


        return Datatables::of($data)
            ->addColumn('checkbox', function ($row) {
                $checkbox = '';
                $checkbox .= '<div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="' . $row->id . '" />
                                </div>';
                return $checkbox;
            })

            ->addColumn('job_name', function ($row) {
                $data = $row->Job->title;
                if ($data) {
                    return $data;
                } else {
                    return '';
                }
            })
            ->addColumn('name', function ($row) {
                    $data = '<a href="/User-Profile/' . $row->id . '" >' . $row->User->name . '</a>';
                if ($data) {
                    return $data;
                } else {
                    return '';
                }
            })
            ->editColumn('type',function ($row){
                if($row->type == 'pending'){
                    $data =  '<span class="bg-warning"  style=" padding:5px !important;border-radius: 5px;"> ' . __('lang.'.$row->type) . '</span>';
                }elseif($row->type == 'accepted'){
                    $data =  '<span class=" p-3 bg-success"  style=" padding:5px !important;border-radius: 5px;" >' . __('lang.'.$row->type) . '</span>';
                }elseif($row->type == 'rejected'){
                    $data =  '<span class=" p-3  bg-danger"   style=" padding:5px !important;border-radius: 5px;">' . __('lang.'.$row->type) . '</span>';

                }else{
                    $data =  '<span class="bg-warning"  style=" padding:2px !important;border-radius: 5px;"> ' . __('lang.'.$row->type) . '</span>';

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
                $actions = ' <a href="' . url("editApplication/" . $row->id) . '" class="btn btn-danger"><i class="bi bi-pencil-fill"></i> الاجراءات </a>';
                return $actions;

            })
            ->rawColumns(['actions', 'checkbox','type', 'name', 'is_active'])
            ->make();

    }

    public function RepeatJob($id)
    {
        $payment = CompanyPayment::where('company_id', Auth::guard('company')->id())->where('states', 'payed')->OrderBy('id', 'desc')->first();
        if ($payment && $payment->cv_count_used < $payment->Package->cv_count) {
            $old = Job::find($id)->ToArray();
            unset($old['id']);
            unset($old['created_at']);
            unset($old['updated_at']);
            $old['created_at'] = \Carbon\Carbon::now();
            Job::insert($old);
            return back()->with('messageSuccess', 'تم النسخ بنجاح  ');
        } else {
            return redirect('Company-jobs')->with('messageError', 'عفوا لقد تاجوزت الحد الاقصى للباقة الحالية الرجاء تجديد الباقة   ');

        }
    }
    public function getReportForm(Request $request){
        $data = JobRequest::findOrFail($request->id);
        $value = $request->value;
        return view('front.Company.ReportSelectors',compact('data','value'));
    }
    public function editApplication($id){
        $data = JobRequest::find($id);
        return view('front.Company.editApplication',compact('data'));
    }

    public function UpdateJobApplication(Request $request){

        $data = JobRequest::findOrFail($request->id);
        $data->interview_date=$request->interview_date;
        $data->interview_description=$request->interview_description;
        if($request->type=='rejected'){
        $data->interview_cancel_from='company';
        }
        $data->type=$request->type;
        $data->save();
        return redirect('Reports')->with('messageSuccess', 'تم التعديل بنجاح بنجاح   ');

    }

    public function ApplicationDetails($id){

        $data = JobRequest::findOrFail($id);
        return view('front.User.Application-Details',compact('data'));
    }

    public function StoreComplaints(Request $request){

        $Job = Job::findOrFail($request->job_id);
        $data = new Complaint();
        $data->user_id=Auth::guard('web')->id();
        $data->job_id=$request->job_id;
        $data->company_id=$Job->company_id;
        $data->save();
        return back()->with('messageSuccess', 'تم ارسال الشكوى بنجاح  ');

    }
}
