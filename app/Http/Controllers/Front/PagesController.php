<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Courses;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Faq;
use App\Models\Information;
use App\Models\Job;
use App\Models\JobRequest;
use App\Models\Knows;
use App\Models\LangRelation;
use App\Models\Organization;
use App\Models\Page;
use App\Models\ResultCode;
use App\Models\SkillsResult;
use App\Models\Template;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class PagesController extends Controller
{
    public function cvmaker()
    {

        return view('front.cvmaker');
    }

    public function cvmaker2(Request $request)
    {
        if ($request->firstname) {

            if (Information::where('user_id', Auth::guard('web')->user()->id)->count() > 0) {
                $info = Information::where('user_id', Auth::guard('web')->user()->id)->first();
                $info->firstname = $request->firstname;
                $info->lastname = $request->lastname;
                $info->job_title = $request->job_title;
                $info->phone = Auth::guard('web')->user()->phone;
                $info->email = Auth::guard('web')->user()->email;
                $info->birth_date = $request->date;
                $info->address = $request->address;
                $info->image = $request->image;
                $info->country_id = $request->country_id;
                $info->city_id = $request->city_id;
                $info->save();

            } else {
                $info = new Information;
                $info->firstname = $request->firstname;
                $info->lastname = $request->lastname;
                $info->job_title = $request->job_title;
                $info->phone = Auth::guard('web')->user()->phone;
                $info->email = Auth::guard('web')->user()->email;
                $info->birth_date = $request->date;
                $info->address = $request->address;
                $info->country_id = $request->country_id;
                $info->city_id = $request->city_id;
                $info->image = $request->image;
                $info->user_id = Auth::guard('web')->user()->id;
                $info->save();

            }
        }
        return view('front.cvmaker2');

    }

    public function cvmaker3(Request $request)
    {
        if (isset($request->description)) {
            if (Information::where('user_id', Auth::guard('web')->user()->id)->count() > 0) {
                $info = Information::where('user_id', Auth::guard('web')->user()->id)->first();
                $info->description = $request->description;
                $info->save();
            }else{
                return back()->with('messageError', 'الرجاء تسجيل المعلومات الشخصية اولا ');
            }
        }
        return view('front.cvmaker3');

    }

    public function cvmaker4(Request $request)
    {


        return view('front.cvmaker4');

    }

    public function cvmakerskills()
    {

        return view('front.cvmaker-skills');

    }

    public function cvmakerskillresult(Request $request)
    {
        $code = Information::where('user_id', Auth::guard('web')->user()->id)->first()->skill_code;
        $Result_code = ResultCode::where('code', $code)->first();
        if (isset($Result_code)) {
            $skill_result = SkillsResult::where('result_code_id', $Result_code->id)->get();
            $dataList1 = '';
            foreach ($skill_result as $b) {
                $dataList1 .= '-' . $b->text . '<br>';
            }
        } else {
            $dataList1 = '';
        }
        return view('front.cvmakerskillresult', compact('dataList1'));

    }

    public function cvmaker6(Request $request)
    {
        if ($request->skills) {
            $info = Information::where('user_id', Auth::guard('web')->user()->id)->first();
            $info->skills = $request->skills;
            $info->save();
        }
        return view('front.cvmaker6');

    }

    public function cvmaker6Store(Request $request)
    {
        $info = Information::where('user_id', Auth::guard('web')->user()->id)->first();
        $info->skills = $request->skills;
        $info->save();
        $answers = Answer::whereIn('id', $request->skills)->get();
        $E = 0;
        $I = 0;
        $S = 0;
        $N = 0;
        $T = 0;
        $F = 0;
        $J = 0;
        $P = 0;
        foreach ($answers as $answer) {
            if ($answer->type == 'E') {
                $E++;
            } elseif ($answer->type == 'I') {
                $I++;
            } elseif ($answer->type == 'S') {
                $S++;
            } elseif ($answer->type == 'N') {
                $N++;
            } elseif ($answer->type == 'T') {
                $T++;
            } elseif ($answer->type == 'F') {
                $F++;
            } elseif ($answer->type == 'J') {
                $J++;
            } elseif ($answer->type == 'P') {
                $P++;
            }
        }
        if ($E > $I) {
            $name = 'E';
        } else {
            $name = 'I';
        }
        if ($N > $S) {
            $name .= 'N';
        } else {
            $name .= 'S';
        }
        if ($T > $F) {
            $name .= 'T';
        } else {
            $name .= 'F';
        }
        if ($J > $P) {
            $name .= 'J';
        } else {
            $name .= 'P';
        }
        $info = Information::where('user_id', Auth::guard('web')->user()->id)->first();
        $info->skill_code = $name;
        $info->save();
        return response()->json(['message' => 'Success']);
    }

    public function cvmaker7(Request $request)
    {


        return view('front.cvmaker7');

    }

    public function cvmaker8(Request $request)
    {


        return view('front.cvmaker8');

    }

    public function cvmaker9(Request $request)
    {


        return view('front.cvmaker9');

    }

    public function cvmaker10(Request $request)
    {


        return view('front.cvmaker10');

    }

    public function Packages()
    {

        return view('front.Packages');

    }

    public function CompanyPackage()
    {

        return view('front.CompanyPackages');

    }
    public function packagetype()
    {

        return view('front.Company.packagetype');

    }



    public function Page($id)
    {

        $data = Page::find($id);

        return view('front.Page', compact('data'));

    }

    public function storeEducation(Request $request)
    {

        $data = new Education();
        $data->name = $request->name;
        $data->location = $request->location;
        $data->qualification = $request->qualification;
        $data->area = $request->area;
        $data->type = $request->type;
        $data->graduation_date = $request->graduation_date;
        $data->user_id = Auth::guard('web')->user()->id;
        $data->save();

        return back()->with('messageSuccess', 'تم الاضافة بنجاح');
    }

    public function deleteEducation(Request $request)
    {
        try {
            Education::where('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);
    }

    public function storeexperience(Request $request)
    {

        $data = new Experience();
        $data->name = $request->name;
        $data->company = $request->company;
        $data->start_date = $request->start_date;
        $data->end_date = $request->end_date;
        $data->country_id = $request->country_id;
        $data->category_id = $request->category_id;
        $data->specialization_id = $request->specialization_id;
        $data->description = $request->description;
        $data->country_id = $request->country_id;
        $data->city_id = $request->city_id;
        $data->state_id = $request->state_id;
        $data->village_id = $request->village_id;
        $data->user_id = Auth::guard('web')->user()->id;
        $data->save();

        return back()->with('messageSuccess', 'تم الاضافة بنجاح');
    }

    public function deleteexperience(Request $request)
    {
        try {
            Experience::where('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);
    }

    public function Faq()
    {

        $data = Faq::where('is_active', 'active')->get();

        return view('front.Faq', compact('data'));
    }

    public function Contact()
    {

        return view('front.contact');
    }

    public function storelanguage(Request $request)
    {

        $data = new LangRelation();
        $data->type = $request->type;
        $data->lang_id = $request->lang_id;
        $data->user_id = Auth::guard('web')->user()->id;
        $data->save();

        return back()->with('messageSuccess', 'تم الاضافة بنجاح');
    }

    public function deletelanguage(Request $request)
    {
        try {
            LangRelation::where('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);
    }

    public function storeCourse(Request $request)
    {

        $data = new Courses();
        $data->name = $request->name;
        $data->type = $request->type;
        $data->company = $request->company;
        $data->date = $request->date;
        $data->link = $request->link;
        $data->file = $request->file;
        $data->user_id = Auth::guard('web')->user()->id;
        $data->save();

        return back()->with('messageSuccess', 'تم الاضافة بنجاح');
    }

    public function deleteCourse(Request $request)
    {
        try {
            Courses::where('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);
    }

    public function storeknows(Request $request)
    {

        $data = new Knows();
        $data->name = $request->name;
        $data->company = $request->company;
        $data->phone = $request->phone;
        $data->job_title = $request->job_title;
        $data->email = $request->email;
        $data->user_id = Auth::guard('web')->user()->id;
        $data->save();

        return back()->with('messageSuccess', 'تم الاضافة بنجاح');
    }

    public function deleteknows(Request $request)
    {
        try {
            Knows::where('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);
    }

    public function storeOrganization(Request $request)
    {

        $data = new Organization();
        $data->name = $request->name;
        $data->date = $request->date;
        $data->job = $request->job;
        $data->user_id = Auth::guard('web')->user()->id;
        $data->save();

        return back()->with('messageSuccess', 'تم الاضافة بنجاح');
    }

    public function deleteOrganization(Request $request)
    {
        try {
            Organization::where('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);
    }

    public function Template(Request $request)
    {
        if(Information::where('user_id',Auth::guard('web')->id())->count() > 0 ){
        $data = Template::find($request->id);
            return view('front.templates.' . $data->view_name);

        }else{
            return response()->json(['message' => 'Failed']);
        }
    }

    public function createPDF2()
    {
        $pdf = PDF::loadView('front.pdfTemplates.test2');

        return $pdf->download('invoice.pdf');


    }

    public function createPDF(Request $request)
    {
//        print_r($request->id);die();
        $data = Template::findOrFail($request->id);


        if($request->lang == 'ar') {

            return view('front.pdfTemplates.' . $data->view_name);
        }else{
            return view('front.enpdfTemplates.' . $data->view_name);

        }
//        if(User::find(Auth::guard('web')->id())->cv){
//            return redirect(User::find(Auth::guard('web')->id())->cv);
//        }else{
//            $pdf = PDF::loadView('front.pdfTemplates.template1');
////            $pdf->autoScriptToLang = true;
////            $pdf->autoLangToFont = true;
//             $num = rand(100000, 999999) . time() . '.pdf';
//            $pdf->save('cv' . '/' . $num);
//            $file = url('/cv') . '/' . $num;
//            $user = User::find(Auth::guard('web')->id());
//            $user->cv=$file;
//            $user->save();
//        }
        // share data to view
        return view('front.pdfTemplates.test');
        // download PDF file with download method
    }


    public function Jobs(Request $request)
    {

        $query = Job::where('is_active', 'active')->OrderBy('id', 'desc');
        if ($request->title) {
            $query->where('title', 'like', '%' . $request->title . '%')->OrWhere('description', 'like', '%' . $request->title . '%');
        }
        if ($request->country_id != 0) {
            $query->where('country_id', $request->country_id);
        }
        if ($request->gender != 0) {
            $query->where('gender', $request->gender);
        }
        if ($request->city_id && $request->city_id != 0) {
            $query->where('city_id', $request->city_id);
        }

        if ($request->state_id && $request->state_id != 0) {
            $query->where('state_id', $request->state_id);
        }

        if ($request->village_id && $request->village_id != 0) {
            $query->where('village_id', $request->village_id);
        }

        if ($request->category_id && $request->category_id != 0) {
            $query->where('experience_category_id', $request->category_id);
        }
        if ($request->specialization_id && $request->specialization_id != 0) {
            $query->where('specialization_id', $request->specialization_id);
        }
        if ($request->min_salary && $request->min_salary != 0) {
            $query->where('min_salary', '>=', $request->min_salary);
        }
        if ($request->max_salary && $request->max_salary != 0) {
            $query->where('max_salary', '<=', $request->max_salary);
        }

        $data = $query->paginate(7);
        return view('front.jobs', compact('data'));
    }

    public function JobApplay(Request $request)
    {
        $job = Job::findOrFail($request->job_id);
        if (Auth::guard('web')->check()) {
            $data = new JobRequest();
            $data->job_id = $request->job_id;
            $data->user_id = Auth::guard('web')->id();
            $data->company_id=$job->company_id;
            $data->Save();
            return back()->with('messageSuccess', 'تم التقديم في الوظيقة بنجاح ');
        } else {
            return back()->with('error', 'عفوا حدث خطأ ! ');
        }
    }

    public function MyJobs()
    {
        $data = Auth::guard('web')->user();
        $Jobs = JobRequest::where('user_id',$data->id)->paginate(10);
        return view('front.User.MyJobs', compact('data','Jobs'));
    }
}
