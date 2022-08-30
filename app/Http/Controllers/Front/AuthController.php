<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request){
            $request->validate([
                'phone' => 'required',
                'password' => 'required',
            ]);

            if(User::where('phone',$request->phone)->count() > 0){
                if (Auth::guard('web')->attempt(['phone' => $request->phone, 'password' => $request->password])) {

                    return redirect('/')->with('messageSuccess','تم التسجيل  بنجاح   ');;
                }else{
                    return back()->with('messageError','عفوا رقم الهاتف او كلمة المرور خطا ');

                }
            }elseif(User::where('email',$request->phone)->count() > 0){
                if (Auth::guard('web')->attempt(['email' => $request->phone, 'password' => $request->password])) {

                    return redirect('/')->with('messageSuccess','تم التسجيل  بنجاح   ');;
                }else{
                    return back()->with('messageError','عفوا رقم الهاتف او كلمة المرور خطا ');

                }
            }
            elseif(User::where('id_number',$request->phone)->count() > 0){
                if (Auth::guard('web')->attempt(['id_number' => $request->phone, 'password' => $request->password])) {

                    return redirect('/')->with('messageSuccess','تم التسجيل  بنجاح   ');;
                }else{
                    return back()->with('messageError','عفوا رقم الهاتف او كلمة المرور خطا ');

                }
            }else{
                return back()->with('messageError','عفوا رقم الهاتف او كلمة المرور خطا ');

            }


    }

    public function loginCompany(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
       if (Auth::guard('company')->attempt(['email' => $request->email, 'password' => $request->password])) {
            if(Auth::guard('company')->user()->is_active == 'inactive'){
                return redirect('/inactive')->with('messageSuccess', 'تم التسجيل  بنجاح   ');;

            }if(Auth::guard('company')->user()->company_type == null) {
               return redirect('/ChooseType')->with('messageSuccess', 'تم التسجيل  بنجاح   ');;

           }else
           {
                return redirect('/')->with('messageSuccess', 'تم التسجيل  بنجاح   ');;

            }
        }

        return back()->with('messageError','عفوا رقم الهاتف او كلمة المرور خطا ');

    }

    public function registerUser(Request $request){
        $request->validate([
            'name' => 'required',
            'password' => 'required|confirmed|min:6',
            'id_number' => 'required|unique:users',
            'email' => 'required|unique:users',
            'phone' => 'required|unique:users',
            'whatsapp' => 'required',
            'type' => 'required',
            'how_register' => 'required',
            'birth_date' => 'required',
            'country_id' => 'required',
            'city_id' => 'required',
            'state_id' => 'required',
            'village_id' => 'required',
            'code'=>'required'
        ]);

        $data = new User();
        $data->name=$request->name;
        $data->id_number=$request->id_number;
        $data->email=$request->email;
        $data->phone=$request->phone;
        $data->whatsapp=$request->whatsapp;
        $data->type=$request->type;
        $data->how_register=$request->how_register;
        $data->password=Hash::make($request->password);
        $data->birth_date=$request->birth_date;
        $data->is_active=1;
        $data->country_id=$request->country_id;
        $data->city_id=$request->city_id;
        $data->state_id=$request->state_id;
        $data->village_id=$request->village_id;
        $data->code=$request->code;
        $data->relationship=$request->relationship;
        $data->save();

        Auth::login($data);

        return back()->with('messageSuccess','تم تسجيل الحساب بنجاح   ');
    }

    public function userProfile($id = null){
        if($id){
            $data = User::find($id);
        }else{
                $data = User::find(Auth::guard('web')->id());
        }
        return view('front.UserProfile',compact('data'));
    }

    public function chooseType(){


        return view('front.Company.ChooseType');

    }

    public function updateCompanyType(Request $request){
        $request->validate([
            'type' => 'in:private,employment',
        ]);

        $data = Company::find(Auth::guard('company')->id());
        if($request->type == 'employment'){
            $data->is_active='inactive';
        }else{
            $data->is_active='active';

        }
        $data->company_type=$request->type;
        $data->save();

        return redirect('/')->with('messageSuccess', 'تم العملية  بنجاح   ');;

    }
}
