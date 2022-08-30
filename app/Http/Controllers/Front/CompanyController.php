<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Information;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Auth;
use Yajra\DataTables\Facades\DataTables;

class CompanyController extends Controller
{


    public function registerCompany (Request $request){
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'password' => 'required|confirmed|min:6',
            'company_name' => 'required|unique:companies',
            'phone' => 'required|unique:companies',
//            'birth_date' => 'required',
            'country_id' => 'required',
            'city_id' => 'required',
            'state_id' => 'required',
            'village_id' => 'required',
            'email'=>'required|unique:companies',
            'manger_email'=>'required|unique:companies'
        ]);

        $data = new Company();
        $data->first_name=$request->first_name;
        $data->last_name=$request->last_name;
        $data->email=$request->email;
        $data->phone=$request->phone;
        $data->company_type=$request->type;
        $data->password=Hash::make($request->password);
    //        $data->birth_date=$request->birth_date;
        if($request->type == 'private'){
            $data->is_active='active';
        }else{
            $data->is_active='inactive';
        }
        $data->country_id=$request->country_id;
        $data->city_id=$request->city_id;
        $data->state_id=$request->state_id;
        $data->village_id=$request->village_id;
        $data->employees_count=$request->employees_count;
        $data->tax_card_number=$request->tax_card_number;
        $data->tax_card_image=$request->tax_card_image;
        $data->commercial_registration_number=$request->commercial_registration_number;
        $data->commercial_registration_image=$request->commercial_registration_image;
        $data->verification_letter_image=$request->verification_letter_image;
        $data->employment_agreement	=$request->employment_agreement	;
        $data->company_name	=$request->company_name	;
        $data->image=$request->image;
        $data->email=$request->email;
        $data->phone=$request->phone;
        $data->other_phone=$request->other_phone;
        $data->experience_category_id =$request->experience_category_id ;
        $data->specialization_id=$data->specialization_id;
        $data->manger_email=$data->manger_email;
        $data->save();

    Auth::guard('company')->login($data);
        return redirect('/ChooseType')->with('messageSuccess','تم تسجيل الحساب بنجاح برجاء بتسجيل الدخول  ');
    }
    public function UpdateCompany(Request $request){

        $data =  Company::find($request->id);
        if($request->first_name){
            $data->first_name=$request->first_name;
        }
        if($request->last_name){
            $data->last_name=$request->last_name;
        }
        if($request->email){
            $data->email=$request->email;
        }
        if($request->phone){
            $data->phone=$request->phone;
        }
        if($request->password){
            $data->password=Hash::make($request->password);
        }
        if($request->country_id){
            $data->country_id=$request->country_id;
        }
        if($request->city_id){
            $data->city_id=$request->city_id;
        }
        if($request->state_id){
            $data->state_id=$request->state_id;
        }
        if($request->village_id){
            $data->village_id=$request->village_id;
        }
        if($request->employees_count){
            $data->employees_count=$request->employees_count;
        }
        if($request->tax_card_number){
            $data->tax_card_number=$request->tax_card_number;
        }
        if($request->tax_card_image){
            $data->tax_card_image=$request->tax_card_image;
        }
        if($request->commercial_registration_number){
            $data->commercial_registration_number=$request->commercial_registration_number;
        }
        if($request->verification_letter_image){
            $data->verification_letter_image=$request->verification_letter_image;
        }
        if($request->commercial_registration_image){
            $data->commercial_registration_image=$request->commercial_registration_image;
        }
        if($request->employment_agreement){
            $data->employment_agreement=$request->employment_agreement;
        }
        if($request->company_name){
            $data->company_name=$request->company_name;
        }
        if($request->other_phone){
            $data->other_phone=$request->other_phone;
        }
        if($request->experience_category_id){
            $data->experience_category_id=$request->experience_category_id;
        }
        if($request->image){
            $data->image=$request->image;
        }
        if($request->facebook){
            $data->facebook=$request->facebook;
        }

        if($request->twitter){
            $data->twitter=$request->twitter;
        }
        if($request->youtube){
            $data->youtube=$request->youtube;
        }
        if($request->instagram){
            $data->instagram=$request->instagram;
        }
        if($request->active_profile){
            $data->active_profile=$request->active_profile;
        }
        if($request->website){
            $data->website=$request->website;
        }
        $data->save();

        return back()->with('messageSuccess','تم التعديل بنجاح   ');
    }
    public function Profile(){
        $data = Auth::guard('company')->user();
        return view('front.Company.Profile',compact('data'));
    }

    public function CompanyJobs(){
            $data = Job::where('company_id',Auth::guard('company')->id())->paginate(10);
        return view('front.Company.jobs',compact('data'));
    }

    public function AddJob(){

        return view('front.Company.addJob');
    }

    public function editJob($id)
    {
        $data = Job::FindOrFail($id);
        return view('front.Company.edit-job',compact('data'));

    }
    public function editStates($id = null)
    {

        $data = Job::FindOrFail($id);
        return view('front.Company.EditJobStates',compact('data'));

    }

        public function jobDetails($id){
        $data = Job::FindOrFail($id);

        return view('front.Company.jobDetails',compact('data'));
    }
    public function SearchForEmployees(Request $request){

        return view('front.Company.SearchForEmployees');

    }
    public function SearchEmployees(Request $request)
    {
        $query = User::orderBy('id', 'asc');
        $query->leftJoin('information','users.id','=','information.user_id');
        if($request->title){
            $query->where('information.job_title',$request->title);
        }
        if($request->country_id){
                $query->where('information.country_id',$request->country_id);
        }
        if($request->city_id){
            $query->where('information.city_id',$request->city_id);
        }
        if($request->state_id){
            $query->where('information.state_id',$request->state_id);
        }
        if($request->expected_salary){
            $query->where('information.expected_salary','<=',$request->expected_salary);
        }
        if($request->is_car_licenses){
            $query->where('information.is_car_licenses',$request->is_car_licenses);
        }
        $query->select('users.*','information.job_title');
        return Datatables::of($query)
            ->addColumn('checkbox', function ($row) {
                $checkbox = '';
                $checkbox .= '<div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="' . $row->id . '" />
                                </div>';
                return $checkbox;
            })
            ->editColumn('name', function ($row) {
                if (Information::where('user_id', $row->id)->first() && Information::where('user_id', $row->id)->first()->image ) {
                    $data = '<div> <a href="/User-Profile/' . $row->id . '" > <img  style="margin-left:20px; width:50px;height: 50px; border-radius: 50%" src="' . Information::where('user_id', $row->id)->first()->image . '" > ';
                    $data .= '' . $row->name . '</a>';
                    $data .= '</div>';

                } else {
                    $data = '<a href="/User-Profile/' . $row->id . '" >' . $row->name . '</a>';
                }
                if ($data) {
                    return $data;
                } else {
                    return '';
                }
            })
            ->AddColumn('address', function ($row) {
                $data = $row->Country->name .' - '.$row->City->name.' - '.$row->State->name ;
                if($data){
                    return $data;
                }else{
                    return '';
                }
            })
            ->editColumn('created', function ($row) {
                $data = $row->City->name;
                if($data){
                    return $data;
                }else{
                    return '';
                }
            })
            ->editColumn('state_id', function ($row) {
                $data = $row->State->name;
                if($data){
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
                $actions = ' <a href="' . url("client-edit/" . $row->id) . '" class="btn btn-active-light-info"><i class="bi bi-pencil-fill"></i> تعديل </a>';
                return $actions;

            })
            ->rawColumns(['actions', 'checkbox', 'name', 'is_active'])
            ->make();

    }




}
