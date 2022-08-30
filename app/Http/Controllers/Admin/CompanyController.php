<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Job;
use App\Models\JobRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class CompanyController extends Controller
{
    public function index()
    {

        return view('admin.Company.index');
    }

    public function datatable(Request $request)
    {
        $data = Company::orderBy('id', 'desc');


        return Datatables::of($data)
            ->addColumn('checkbox', function ($row) {
                $checkbox = '';
                $checkbox .= '<div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="' . $row->id . '" />
                                </div>';
                return $checkbox;
            })
            ->addColumn('name', function ($row) {
                $data = $row->first_name . ' ' . $row->last_name;
                if ($data) {
                    return $data;
                } else {
                    return '';
                }
            })
            ->editColumn('company_type', function ($row) {
                if ($row->company_type == 'private') {
                    $data = 'شركة خاصة'	;
                    return $data;
                } else if($row->company_type == 'employment'){
                    $data = 'شركة توظيف'	;
                    return $data;
                }
            })
            ->addColumn('Address', function ($row) {
                $data = $row->Country->name . ' - ' . $row->City->name;
                if ($data) {
                    return $data;
                } else {
                    return '';
                }
            })

            ->editColumn('is_active', function ($row) {
                if($row->is_active == 'active'){
                    $data = 'مفعل';
                }else{
                    $data = 'غير مفعل ';
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
                $actions = ' <a href="' . url("Companies-edit/" . $row->id) . '" class="btn btn-active-light-primary"><i class="bi bi-pencil-fill"></i> تعديل </a>';
                if($row->is_active == 'inactive'){
                    $actions .= ' <a href="' . url("employmentAgreement/" . $row->id) . '" class="btn btn-success "><i class="bi bi-pencil-fill"></i> اتفاقية العمل </a>';
                }
                return $actions;
            })
            ->rawColumns(['actions', 'checkbox', 'name', 'is_active', 'Address', 'Age'])
            ->make();

    }

    public function store(Request $request)
    {

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

        ]);

        $data = new Company();
        $data->first_name=$request->first_name;
        $data->last_name=$request->last_name;
        $data->email=$request->email;
        $data->phone=$request->phone;
        $data->type=$request->type;
        $data->password=Hash::make($request->password);
        //        $data->birth_date=$request->birth_date;
        $data->is_active=1;
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
        $data->save();

//    Auth::guard('company')->login($data);
        return back()->with('messageSuccess','تم تسجيل الحساب بنجاح برجاء بتسجيل الدخول  ');
    }


    public function update(Request $request)
    {

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
        if($request->is_active){
            $data->is_active=$request->is_active;
        }

        $data->save();

        return back()->with('message','تم التعديل بنجاح   ');
    }


    public function edit($id)
    {
        $employee = Company::findOrFail($id);
        return view('admin.Company.edit', compact('employee'));
    }

    public function employmentAgreement($id){
        $employee = Company::findOrFail($id);
        return view('admin.Company.employmentAgreement', compact('employee'));

    }
    public function updateEmploymentAgreement(Request $request){
        $data = Company::findOrFail($request->id);
        $data->employment_type=$request->employment_type;
        $data->employment_agreement_type=$request->employment_agreement_type;
        $data->recruitment_fee_postpaid_monthly=$request->recruitment_fee_postpaid_monthly;
        $data->percentage_postpaid_monthly=$request->percentage_postpaid_monthly;
        $data->employment_agreement=$request->employment_agreement;
        $data->verification_letter_image=$request->verification_letter_image;
        $data->save();
        return redirect('Companies')->with('message','تم التعديل بنجاح   ');
    }
    public function updateCompanyFiles(Request $request){
        $data = Company::findOrFail(Auth::guard('company')->id());
        $data->tax_card_number=$request->tax_card_number;
        $data->commercial_registration_number=$request->commercial_registration_number;
        $data->tax_card_image=$request->tax_card_image;
        $data->commercial_registration_image=$request->commercial_registration_image;
        $data->employment_agreement_user=$request->employment_agreement_user;
        $data->verification_letter_image_user=$request->verification_letter_image_user;
        $data->save();

        return redirect('/inactive')->with('messageSuccess','تم التعديل بنجاح   ');
    }


    public function destroy(Request $request)
    {
        try {
            Company::whereIn('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);

    }
}
