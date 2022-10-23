<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('front.index');
});


Route::get('logout',function (){
    \Illuminate\Support\Facades\Auth::logout();
    return redirect('login');
});
Route::get('logoutUser',function (){
    if(Auth::guard('web')->check()){
    \Illuminate\Support\Facades\Auth::guard('web')->logout();
    }else if(Auth::guard('company')->check()) {
        \Illuminate\Support\Facades\Auth::guard('company')->logout();
    }else{
        \Illuminate\Support\Facades\Auth::guard('admin')->logout();
    }
    return redirect('/');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/ChooseType', function () {
    return view('front.Company.ChooseType');
})->name('ChooseType');

Route::get('inactive',function (){
    return view('front.Company.inactive');
})->name('inactive');
Route::post('/login',['App\Http\Controllers\Admin\AuthController','login']);
Route::post('/loginUser',[\App\Http\Controllers\Front\AuthController::class,'login']);
Route::post('/loginCompany',[\App\Http\Controllers\Front\AuthController::class,'loginCompany']);

Route::post('/registerUser',[\App\Http\Controllers\Front\AuthController::class,'registerUser']);
Route::post('/registerCompany',[\App\Http\Controllers\Front\CompanyController::class,'registerCompany']);
Route::middleware(['user'])->group(function () {

    Route::post('/JobApplay', [\App\Http\Controllers\Front\PagesController::class, 'JobApplay']);
    Route::get('/cv-maker', [\App\Http\Controllers\Front\PagesController::class, 'cvmaker']);
    Route::post('/cv-maker-step2', [\App\Http\Controllers\Front\PagesController::class, 'cvmaker2']);
    Route::get('/cv-maker-step2', [\App\Http\Controllers\Front\PagesController::class, 'cvmaker2']);
    Route::get('/cv-maker-step3', [\App\Http\Controllers\Front\PagesController::class, 'cvmaker3']);
    Route::get('/cv-maker-step4', [\App\Http\Controllers\Front\PagesController::class, 'cvmaker4']);
    Route::get('/cv-maker-step5', [\App\Http\Controllers\Front\PagesController::class, 'cvmakerskills']);
    Route::get('/cv-maker-step6', [\App\Http\Controllers\Front\PagesController::class, 'cvmaker6']);
    Route::get('/cv-maker-step6-result', [\App\Http\Controllers\Front\PagesController::class, 'cvmakerskillresult']);
    Route::get('/cv-maker-step7', [\App\Http\Controllers\Front\PagesController::class, 'cvmaker7']);
    Route::get('/cv-maker-step8', [\App\Http\Controllers\Front\PagesController::class, 'cvmaker8']);
    Route::get('/cv-maker-step9', [\App\Http\Controllers\Front\PagesController::class, 'cvmaker9']);
    Route::get('/cv-maker-step10', [\App\Http\Controllers\Front\PagesController::class, 'cvmaker10']);

    Route::get('/Packages', [\App\Http\Controllers\Front\PagesController::class, 'Packages']);

    Route::get('/template', [\App\Http\Controllers\Front\PagesController::class, 'template']);
    Route::get('/cvmaker6Store', [\App\Http\Controllers\Front\PagesController::class, 'cvmaker6Store']);

    Route::get('createPDF',[\App\Http\Controllers\Front\PagesController::class,'createPDF']);
    Route::get('/PaymentUrl/{id}',[\App\Http\Controllers\Front\PaymentController::class,'PaymentUrl']);
    Route::get('MyProfile',[\App\Http\Controllers\Front\AuthController::class , "userProfile"]);
    Route::get('MyJobs',[\App\Http\Controllers\Front\PagesController::class , "MyJobs"]);
    Route::get('Job-Details/{id}',[\App\Http\Controllers\Front\JobController::class , "ApplicationDetails"])->name('ApplicationDetails');
    Route::post('StoreComplaints',[\App\Http\Controllers\Front\ComplaintsController::class , "StoreComplaints"]);
    Route::post('confirm_interview',[\App\Http\Controllers\Front\ReportsController::class , "confirm_interview"]);
    Route::post('reject_interview',[\App\Http\Controllers\Front\ReportsController::class , "reject_interview"]);


});
// payment
Route::get('jobDetails/{id}', [\App\Http\Controllers\Front\CompanyController::class, 'jobDetails']);

Route::middleware(['company'])->group(function () {
    Route::get('Profile', [\App\Http\Controllers\Front\CompanyController::class, 'Profile']);
    Route::post('UpdateCompany', [\App\Http\Controllers\Front\CompanyController::class, 'UpdateCompany']);
    Route::get('Company-jobs', [\App\Http\Controllers\Front\CompanyController::class, 'CompanyJobs']);
    Route::get('AddJob', [\App\Http\Controllers\Front\CompanyController::class, 'AddJob']);
    Route::get('RepeatJob/{id}', [\App\Http\Controllers\Front\JobController::class, 'RepeatJob']);
    Route::post('Store-Job', [\App\Http\Controllers\Front\JobController::class, 'StoreJob']);
    Route::get('delete-Job', [\App\Http\Controllers\Front\JobController::class, 'deleteJob']);
    Route::get('edit-Job/{id}', [\App\Http\Controllers\Front\CompanyController::class, 'editJob']);
    Route::post('Update-Job', [\App\Http\Controllers\Front\JobController::class, 'update']);
    Route::get('JobApplicants/{id}',[\App\Http\Controllers\Front\JobController::class,'JobApplicants']);
    Route::get('AcceptApplication/{id}',[\App\Http\Controllers\Front\JobController::class,'AcceptApplication']);
    Route::get('RejectApplication/{id}',[\App\Http\Controllers\Front\JobController::class,'RejectApplication']);
    Route::get('JobApplicants-database',[\App\Http\Controllers\Front\JobController::class,'JobApplicantsDatabase'])->name('JobApplicants.datatable.data');
    Route::get('/CompanyPackage', [\App\Http\Controllers\Front\PagesController::class, 'CompanyPackage']);
    Route::get('/packagetype', [\App\Http\Controllers\Front\PagesController::class, 'packagetype']);

    Route::get('/PaymentPackage/{id}',[\App\Http\Controllers\Front\PaymentController::class,'PaymentPackage']);
    Route::get('/SuccessCompanyPayment',[\App\Http\Controllers\Front\PaymentController::class,'SuccessCompanyPayment']);
    Route::get('/PendingCompanyPayment',[\App\Http\Controllers\Front\PaymentController::class,'PendingCompanyPayment']);
    Route::get('/RejectCompanyPayment',[\App\Http\Controllers\Front\PaymentController::class,'RejectCompanyPayment']);
    Route::get('SearchForEmployees',[\App\Http\Controllers\Front\CompanyController::class , "SearchForEmployees"]);
    Route::get('SearchEmployees',[\App\Http\Controllers\Front\CompanyController::class , "SearchEmployees"])->name('SearchEmployees.datatable.data');
    Route::get('Reports',[\App\Http\Controllers\Front\JobController::class , "Reports"])->name('Reports');
    Route::get('Reports-datatable',[\App\Http\Controllers\Front\JobController::class , "ReportsDatatable"])->name('Reports-datatable');
    Route::get('editApplication/{id}',[\App\Http\Controllers\Front\JobController::class , "editApplication"])->name('editApplication');
    Route::post('Update-Job-application',[\App\Http\Controllers\Front\JobController::class , "UpdateJobApplication"])->name('UpdateJobApplication');

    Route::get('Complaints',[\App\Http\Controllers\Front\ComplaintsController::class , "Complaints"]);

    Route::get('get-report-form',[\App\Http\Controllers\Front\ReportsController::class , "getReportForm"])->name('get-report-form');
    Route::post('updateReportStates',[\App\Http\Controllers\Front\ReportsController::class , "updateReportStates"]);
    Route::post('update-job_code',[\App\Http\Controllers\Front\ReportsController::class , "updateJobCode"]);
    Route::get('MyInvoices',[\App\Http\Controllers\Front\InvoiceController::class,'index']);
    Route::get('InvoicesCompany_datatable', [\App\Http\Controllers\Front\InvoiceController::class, 'datatable'])->name('InvoicesCompany.datatable.data');
    Route::get('InvoiceDetail/{id}',[\App\Http\Controllers\Front\InvoiceController::class,'InvoiceDetail']);
    Route::post('updateCompanyFiles', [\App\Http\Controllers\Admin\CompanyController::class, 'updateCompanyFiles']);

    Route::get('PayInvoice/{id}',[\App\Http\Controllers\Front\InvoiceController::class,'index']);
//    Route::get('/ChooseType',[\App\Http\Controllers\Front\AuthController::class,'chooseType'])->name('ChooseType');

    Route::post('/updateCompanyType',[\App\Http\Controllers\Front\AuthController::class,'updateCompanyType']);

});
Route::get('User-Profile/{id?}',[\App\Http\Controllers\Front\AuthController::class , "userProfile"]);

Route::get('EditStates/{id?}', [\App\Http\Controllers\Front\CompanyController::class, 'editStates']);

Route::get('/SuccessPayment',[\App\Http\Controllers\Front\PaymentController::class,'SuccessPayment']);
Route::get('/PendingPayment',[\App\Http\Controllers\Front\PaymentController::class,'PendingPayment']);
Route::get('/RejectPayment',[\App\Http\Controllers\Front\PaymentController::class,'RejectPayment']);

Route::get('/Page/{id}',[\App\Http\Controllers\Front\PagesController::class,'page']);
Route::get('Faq',[\App\Http\Controllers\Front\PagesController::class,'Faq']);
Route::get('Contact-us',[\App\Http\Controllers\Front\PagesController::class,'Contact']);
Route::get('Jobs',[\App\Http\Controllers\Front\PagesController::class,'Jobs']);
Route::post('store-education',[\App\Http\Controllers\Front\PagesController::class,'storeEducation']);
Route::get('delete-Education',[\App\Http\Controllers\Front\PagesController::class,'deleteEducation']);

Route::post('store-experience',[\App\Http\Controllers\Front\PagesController::class,'storeexperience']);
Route::get('delete-experience',[\App\Http\Controllers\Front\PagesController::class,'deleteexperience']);


Route::post('store-language',[\App\Http\Controllers\Front\PagesController::class,'storelanguage']);
Route::get('delete-language',[\App\Http\Controllers\Front\PagesController::class,'deletelanguage']);

Route::post('store-Course',[\App\Http\Controllers\Front\PagesController::class,'storeCourse']);
Route::get('delete-Course',[\App\Http\Controllers\Front\PagesController::class,'deleteCourse']);

Route::post('store-knows',[\App\Http\Controllers\Front\PagesController::class,'storeknows']);
Route::get('delete-knows',[\App\Http\Controllers\Front\PagesController::class,'deleteknows']);

Route::post('store-Organization',[\App\Http\Controllers\Front\PagesController::class,'storeOrganization']);
Route::get('delete-Organization',[\App\Http\Controllers\Front\PagesController::class,'deleteOrganization']);
Route::get('createPDF2',[\App\Http\Controllers\Front\PagesController::class,'createPDF2']);



Route::get('lang/{lang}', function ($lang) {


    if (session()->has('lang')) {
        session()->forget('lang');
    }
    if ($lang == 'en') {
        session()->put('lang', 'en');
    } else {
        session()->put('lang', 'ar');
    }


    return back();
});



Route::middleware(['admin'])->group(function () {
    Route::get('/Dashboard',function (){
        return view('admin.dashboard');
    });

//employee settings
    Route::get('Clients', [\App\Http\Controllers\Admin\UsersController::class, 'index']);
    Route::get('client_datatable', [\App\Http\Controllers\Admin\UsersController::class, 'datatable'])->name('client.datatable.data');
    Route::get('delete-client', [\App\Http\Controllers\Admin\UsersController::class, 'destroy']);
    Route::get('get-branch/{id}', [\App\Http\Controllers\Admin\UsersController::class, 'getBranch']);
    Route::post('store-client', [\App\Http\Controllers\Admin\UsersController::class, 'store']);
    Route::get('client-edit/{id}', [\App\Http\Controllers\Admin\UsersController::class, 'edit']);
    Route::post('update-client', [\App\Http\Controllers\Admin\UsersController::class, 'update']);
    Route::get('/add-button-client', function () {
        return view('admin/Users/button');
    });

//Pages settings
    Route::get('Pages', [\App\Http\Controllers\Admin\PagesController::class, 'index']);
    Route::get('Pages_datatable', [\App\Http\Controllers\Admin\PagesController::class, 'datatable'])->name('Pages.datatable.data');
    Route::get('delete-Pages', [\App\Http\Controllers\Admin\PagesController::class, 'destroy']);
    Route::post('store-Pages', [\App\Http\Controllers\Admin\PagesController::class, 'store']);
    Route::get('Pages-edit/{id}', [\App\Http\Controllers\Admin\PagesController::class, 'edit']);
    Route::post('update-Pages', [\App\Http\Controllers\Admin\PagesController::class, 'update']);
    Route::get('/add-button-Pages', function () {
        return view('admin/Pages/button');
    });
    //Skills settings
    Route::get('Skills', [\App\Http\Controllers\Admin\QuestionController::class, 'index']);
    Route::get('Skills_datatable', [\App\Http\Controllers\Admin\QuestionController::class, 'datatable'])->name('Skills.datatable.data');
    Route::get('delete-Skills', [\App\Http\Controllers\Admin\QuestionController::class, 'destroy']);
    Route::post('store-Skills', [\App\Http\Controllers\Admin\QuestionController::class, 'store']);
    Route::get('Skills-edit/{id}', [\App\Http\Controllers\Admin\QuestionController::class, 'edit']);
    Route::post('update-Skills', [\App\Http\Controllers\Admin\QuestionController::class, 'update']);
    Route::get('/add-button-Skills', function () {
        return view('admin/Skills/button');
    });

    //Skills settings
    Route::get('ResultCode', [\App\Http\Controllers\Admin\ResultCodeController::class, 'index']);
    Route::get('ResultCode_datatable', [\App\Http\Controllers\Admin\ResultCodeController::class, 'datatable'])->name('ResultCode.datatable.data');
    Route::get('delete-ResultCode', [\App\Http\Controllers\Admin\ResultCodeController::class, 'destroy']);
    Route::post('store-ResultCode', [\App\Http\Controllers\Admin\ResultCodeController::class, 'store']);
    Route::get('ResultCode-edit/{id}', [\App\Http\Controllers\Admin\ResultCodeController::class, 'edit']);
    Route::post('update-ResultCode', [\App\Http\Controllers\Admin\ResultCodeController::class, 'update']);
    Route::get('/add-button-ResultCode', function () {
        return view('admin/ResultCode/button');
    });
    //Answers settings
    Route::get('Answers/{id}', [\App\Http\Controllers\Admin\AnswersController::class, 'index']);
    Route::get('Answers_datatable', [\App\Http\Controllers\Admin\AnswersController::class, 'datatable'])->name('Answers.datatable.data');
    Route::get('delete-Answers', [\App\Http\Controllers\Admin\AnswersController::class, 'destroy']);
    Route::post('store-Answers', [\App\Http\Controllers\Admin\AnswersController::class, 'store']);
    Route::get('Answers-edit/{id}', [\App\Http\Controllers\Admin\AnswersController::class, 'edit']);
    Route::post('update-Answers', [\App\Http\Controllers\Admin\AnswersController::class, 'update']);
    Route::get('/add-button-Answers/{id}', function ($id) {
        return view('admin/Answers/button',compact('id'));
    });

    //faqs settings
    Route::get('faqs', [\App\Http\Controllers\Admin\PagesController::class, 'index']);
    Route::get('faqs_datatable', [\App\Http\Controllers\Admin\PagesController::class, 'datatable'])->name('faqs.datatable.data');
    Route::get('delete-faqs', [\App\Http\Controllers\Admin\PagesController::class, 'destroy']);
    Route::post('store-faqs', [\App\Http\Controllers\Admin\PagesController::class, 'store']);
    Route::get('faqs-edit/{id}', [\App\Http\Controllers\Admin\PagesController::class, 'edit']);
    Route::post('update-faqs', [\App\Http\Controllers\Admin\PagesController::class, 'update']);
    Route::get('/add-button-faqs', function () {
        return view('admin/faqs/button');
    });

    //Jobs  settings
    Route::get('JobSetting', [\App\Http\Controllers\Admin\JobsController::class, 'index']);
    Route::get('Jobs_datatable', [\App\Http\Controllers\Admin\JobsController::class, 'datatable'])->name('Jobs.datatable.data');
    Route::get('delete-Jobs', [\App\Http\Controllers\Admin\JobsController::class, 'destroy']);
    Route::post('store-Jobs', [\App\Http\Controllers\Admin\JobsController::class, 'store']);
    Route::get('Jobs-edit/{id}', [\App\Http\Controllers\Admin\JobsController::class, 'edit']);
    Route::post('update-Jobs', [\App\Http\Controllers\Admin\JobsController::class, 'update']);
    Route::get('/add-button-Jobs', function () {
        return view('admin/Job/button');
    });
    Route::get('JobRequests/{id}', [\App\Http\Controllers\Admin\RequestController::class, 'index']);
    Route::get('JobRequests_datatable', [\App\Http\Controllers\Admin\RequestController::class, 'datatable'])->name('JobRequests.datatable.data');
    Route::get('delete-JobRequests', [\App\Http\Controllers\Admin\RequestController::class, 'destroy']);
    Route::post('store-JobRequests', [\App\Http\Controllers\Admin\RequestController::class, 'store']);
    Route::get('JobRequests-edit/{id}', [\App\Http\Controllers\Admin\RequestController::class, 'edit']);
        Route::post('update-JobRequests', [\App\Http\Controllers\Admin\RequestController::class, 'update']);
    Route::get('/add-button-JobRequests/{id}', function ($id) {
        return view('admin/JobRequests/button',compact('id'));
    });
    Route::get('AcceptApplication/{id}',[\App\Http\Controllers\Admin\RequestController::class,'AcceptApplication']);
    Route::get('RejectApplication/{id}',[\App\Http\Controllers\Admin\RequestController::class,'RejectApplication']);

    Route::get('Companies', [\App\Http\Controllers\Admin\CompanyController::class, 'index']);
    Route::get('Companies_datatable', [\App\Http\Controllers\Admin\CompanyController::class, 'datatable'])->name('Companies.datatable.data');
    Route::get('delete-Companies', [\App\Http\Controllers\Admin\CompanyController::class, 'destroy']);
    Route::post('store-Companies', [\App\Http\Controllers\Admin\CompanyController::class, 'store']);
    Route::get('Companies-edit/{id}', [\App\Http\Controllers\Admin\CompanyController::class, 'edit']);
    Route::post('update-Companies', [\App\Http\Controllers\Admin\CompanyController::class, 'update']);
    Route::get('/add-button-Companies', function () {
        return view('admin/Company/button');
    });
    Route::get('employmentAgreement/{id}', [\App\Http\Controllers\Admin\CompanyController::class, 'employmentAgreement']);
    Route::post('update-employmentAgreement', [\App\Http\Controllers\Admin\CompanyController::class, 'updateEmploymentAgreement']);


    //Lang settings
    Route::get('Lang', [\App\Http\Controllers\Admin\LangController::class, 'index']);
    Route::get('Lang_datatable', [\App\Http\Controllers\Admin\LangController::class, 'datatable'])->name('Lang.datatable.data');
    Route::get('delete-Lang', [\App\Http\Controllers\Admin\LangController::class, 'destroy']);
    Route::post('store-Lang', [\App\Http\Controllers\Admin\LangController::class, 'store']);
    Route::get('Lang-edit/{id}', [\App\Http\Controllers\Admin\LangController::class, 'edit']);
    Route::post('update-Lang', [\App\Http\Controllers\Admin\LangController::class, 'update']);
    Route::get('/add-button-Lang', function () {
        return view('admin/Lang/button');
    });

    //experienceCategories settings
    Route::get('ExperienceCategory', [\App\Http\Controllers\Admin\ExperienceCategoriesController::class, 'index']);
    Route::get('ExperienceCategory_datatable', [\App\Http\Controllers\Admin\ExperienceCategoriesController::class, 'datatable'])->name('ExperienceCategory.datatable.data');
    Route::get('delete-ExperienceCategory', [\App\Http\Controllers\Admin\ExperienceCategoriesController::class, 'destroy']);
    Route::post('store-ExperienceCategory', [\App\Http\Controllers\Admin\ExperienceCategoriesController::class, 'store']);
    Route::get('ExperienceCategory-edit/{id}', [\App\Http\Controllers\Admin\ExperienceCategoriesController::class, 'edit']);
    Route::post('update-ExperienceCategory', [\App\Http\Controllers\Admin\ExperienceCategoriesController::class, 'update']);
    Route::get('/add-button-ExperienceCategory', function () {
        return view('admin/ExperienceCategory/button');
    });

    //experience_specializations settings
    Route::get('ExperienceSpecialization/{id}', [\App\Http\Controllers\Admin\ExperienceSpecializationController::class, 'index']);
    Route::get('ExperienceSpecialization_datatable', [\App\Http\Controllers\Admin\ExperienceSpecializationController::class, 'datatable'])->name('ExperienceSpecialization.datatable.data');
    Route::get('delete-ExperienceSpecialization', [\App\Http\Controllers\Admin\ExperienceSpecializationController::class, 'destroy']);
    Route::post('store-ExperienceSpecialization', [\App\Http\Controllers\Admin\ExperienceSpecializationController::class, 'store']);
    Route::get('ExperienceSpecialization-edit/{id}', [\App\Http\Controllers\Admin\ExperienceSpecializationController::class, 'edit']);
    Route::post('update-ExperienceSpecialization', [\App\Http\Controllers\Admin\ExperienceSpecializationController::class, 'update']);
    Route::get('/add-button-ExperienceSpecialization/{id}', function ($id) {
        return view('admin/ExperienceSpecialization/button',compact('id'));
    });

    //Packages
    Route::get('Packages-Setting', [\App\Http\Controllers\Admin\PackagesController::class, 'index']);
    Route::get('Package_datatable', [\App\Http\Controllers\Admin\PackagesController::class, 'datatable'])->name('Package.datatable.data');
    Route::get('delete-Package', [\App\Http\Controllers\Admin\PackagesController::class, 'destroy']);
    Route::post('store-Package', [\App\Http\Controllers\Admin\PackagesController::class, 'store']);
    Route::get('Package-edit/{id}', [\App\Http\Controllers\Admin\PackagesController::class, 'edit']);
    Route::post('update-Package', [\App\Http\Controllers\Admin\PackagesController::class, 'update']);
    Route::get('/add-button-Package', function () {
        return view('admin/Package/button');
    });

    //Payments
    Route::get('Payments-Setting', [\App\Http\Controllers\Admin\PaymentController::class, 'index']);
    Route::get('Payment_datatable', [\App\Http\Controllers\Admin\PaymentController::class, 'datatable'])->name('Payment.datatable.data');
    Route::get('delete-Payment', [\App\Http\Controllers\Admin\PaymentController::class, 'destroy']);
    Route::post('store-Payment', [\App\Http\Controllers\Admin\PaymentController::class, 'store']);
    Route::get('Payment-edit/{id}', [\App\Http\Controllers\Admin\PaymentController::class, 'edit']);
    Route::post('update-Payment', [\App\Http\Controllers\Admin\PaymentController::class, 'update']);
    Route::get('/add-button-Payment', function () {
        return view('admin/Payment/button');
    });
    //CompanyPayments
    Route::get('CompanyPayments-Setting', [\App\Http\Controllers\Admin\CompanyPaymentController::class, 'index']);
    Route::get('CompanyPayment_datatable', [\App\Http\Controllers\Admin\CompanyPaymentController::class, 'datatable'])->name('CompanyPayment.datatable.data');
    Route::get('delete-CompanyPayment', [\App\Http\Controllers\Admin\CompanyPaymentController::class, 'destroy']);
    Route::post('store-CompanyPayment', [\App\Http\Controllers\Admin\CompanyPaymentController::class, 'store']);
    Route::get('CompanyPayment-edit/{id}', [\App\Http\Controllers\Admin\CompanyPaymentController::class, 'edit']);
    Route::post('update-CompanyPayment', [\App\Http\Controllers\Admin\CompanyPaymentController::class, 'update']);
    Route::get('/add-button-CompanyPayment', function () {
        return view('admin/CompanyPayment/button');
    });
    //Packages
    Route::get('CompanyPackages-Setting', [\App\Http\Controllers\Admin\CompanyPackageController::class, 'index']);
    Route::get('CompanyPackages_datatable', [\App\Http\Controllers\Admin\CompanyPackageController::class, 'datatable'])->name('CompanyPackages.datatable.data');
    Route::get('delete-CompanyPackage', [\App\Http\Controllers\Admin\CompanyPackageController::class, 'destroy']);
    Route::post('store-CompanyPackage', [\App\Http\Controllers\Admin\CompanyPackageController::class, 'store']);
    Route::get('CompanyPackage-edit/{id}', [\App\Http\Controllers\Admin\CompanyPackageController::class, 'edit']);
    Route::post('update-CompanyPackage', [\App\Http\Controllers\Admin\CompanyPackageController::class, 'update']);
    Route::get('/add-button-CompanyPackage', function () {
        return view('admin/CompanyPackage/button');
    });


    //Drivers
    Route::get('Drivers', [\App\Http\Controllers\Admin\DriverController::class, 'index']);
    Route::get('Driver_datatable', [\App\Http\Controllers\Admin\DriverController::class, 'datatable'])->name('Driver.datatable.data');
    Route::get('delete-Driver', [\App\Http\Controllers\Admin\DriverController::class, 'destroy']);
    Route::get('get-branch/{id}', [\App\Http\Controllers\Admin\DriverController::class, 'getBranch']);
    Route::post('store-Driver', [\App\Http\Controllers\Admin\DriverController::class, 'store']);
    Route::get('Driver-edit/{id}', [\App\Http\Controllers\Admin\DriverController::class, 'edit']);
    Route::post('update-Driver', [\App\Http\Controllers\Admin\DriverController::class, 'update']);
    Route::get('/add-button-Driver', function () {
        return view('admin/Drivers/button');
    });

    //Admins
    Route::get('Admins', [\App\Http\Controllers\Admin\AdminController::class, 'index']);
    Route::get('Admin_datatable', [\App\Http\Controllers\Admin\AdminController::class, 'datatable'])->name('Admin.datatable.data');
    Route::get('delete-Admin', [\App\Http\Controllers\Admin\AdminController::class, 'destroy']);
    Route::get('get-branch/{id}', [\App\Http\Controllers\Admin\AdminController::class, 'getBranch']);
    Route::post('store-Admin', [\App\Http\Controllers\Admin\AdminController::class, 'store']);
    Route::get('Admin-edit/{id}', [\App\Http\Controllers\Admin\AdminController::class, 'edit']);
    Route::post('update-Admin', [\App\Http\Controllers\Admin\AdminController::class, 'update']);
    Route::get('/add-button-Admin', function () {
        return view('admin/Admin/button');
    });

    //Countries
    Route::get('Countries', [\App\Http\Controllers\Admin\CountryController::class, 'index']);
    Route::get('Country_datatable', [\App\Http\Controllers\Admin\CountryController::class, 'datatable'])->name('Country.datatable.data');
    Route::get('delete-Country', [\App\Http\Controllers\Admin\CountryController::class, 'destroy']);
    Route::post('store-Country', [\App\Http\Controllers\Admin\CountryController::class, 'store']);
    Route::get('Country-edit/{id}', [\App\Http\Controllers\Admin\CountryController::class, 'edit']);
    Route::post('update-Country', [\App\Http\Controllers\Admin\CountryController::class, 'update']);
    Route::get('/add-button-Country', function () {
        return view('admin/Country/button');
    });

    //Cities
    Route::get('Cities/{id}', [\App\Http\Controllers\Admin\CityController::class, 'index']);
    Route::get('City_datatable', [\App\Http\Controllers\Admin\CityController::class, 'datatable'])->name('City.datatable.data');
    Route::get('delete-City', [\App\Http\Controllers\Admin\CityController::class, 'destroy']);
    Route::post('store-City', [\App\Http\Controllers\Admin\CityController::class, 'store']);
    Route::get('City-edit/{id}', [\App\Http\Controllers\Admin\CityController::class, 'edit']);
    Route::post('update-City', [\App\Http\Controllers\Admin\CityController::class, 'update']);
    Route::get('/add-button-City/{id}', function ($id) {
        return view('admin/City/button',compact('id'));
    });

    //State
    Route::get('State/{id}', [\App\Http\Controllers\Admin\StateController::class, 'index']);
    Route::get('State_datatable', [\App\Http\Controllers\Admin\StateController::class, 'datatable'])->name('State.datatable.data');
    Route::get('delete-State', [\App\Http\Controllers\Admin\StateController::class, 'destroy']);
    Route::post('store-State', [\App\Http\Controllers\Admin\StateController::class, 'store']);
    Route::get('State-edit/{id}', [\App\Http\Controllers\Admin\StateController::class, 'edit']);
    Route::post('update-State', [\App\Http\Controllers\Admin\StateController::class, 'update']);
    Route::get('/add-button-State/{id}', function ($id) {
        return view('admin/State/button',compact('id'));
    });

    //Village
    Route::get('Village/{id}', [\App\Http\Controllers\Admin\VillageController::class, 'index']);
    Route::get('Village_datatable', [\App\Http\Controllers\Admin\VillageController::class, 'datatable'])->name('Village.datatable.data');
    Route::get('delete-Village', [\App\Http\Controllers\Admin\VillageController::class, 'destroy']);
    Route::post('store-Village', [\App\Http\Controllers\Admin\VillageController::class, 'store']);
    Route::get('Village-edit/{id}', [\App\Http\Controllers\Admin\VillageController::class, 'edit']);
    Route::post('update-Village', [\App\Http\Controllers\Admin\VillageController::class, 'update']);
    Route::get('/add-button-Village/{id}', function ($id) {
        return view('admin/Village/button',compact('id'));
    });
    //JobCurrency
    Route::get('JobCurrency', [\App\Http\Controllers\Admin\JobCurrencyController::class, 'index']);
    Route::get('JobCurrency_datatable', [\App\Http\Controllers\Admin\JobCurrencyController::class, 'datatable'])->name('JobCurrency.datatable.data');
    Route::get('delete-JobCurrency', [\App\Http\Controllers\Admin\JobCurrencyController::class, 'destroy']);
    Route::post('store-JobCurrency', [\App\Http\Controllers\Admin\JobCurrencyController::class, 'store']);
    Route::get('JobCurrency-edit/{id}', [\App\Http\Controllers\Admin\JobCurrencyController::class, 'edit']);
    Route::post('update-JobCurrency', [\App\Http\Controllers\Admin\JobCurrencyController::class, 'update']);
    Route::get('/add-button-JobCurrency', function () {
        return view('admin/JobCurrency/button');
    });
    //JobLevel
    Route::get('JobLevel', [\App\Http\Controllers\Admin\JobLevelController::class, 'index']);
    Route::get('JobLevel_datatable', [\App\Http\Controllers\Admin\JobLevelController::class, 'datatable'])->name('JobLevel.datatable.data');
    Route::get('delete-JobLevel', [\App\Http\Controllers\Admin\JobLevelController::class, 'destroy']);
    Route::post('store-JobLevel', [\App\Http\Controllers\Admin\JobLevelController::class, 'store']);
    Route::get('JobLevel-edit/{id}', [\App\Http\Controllers\Admin\JobLevelController::class, 'edit']);
    Route::post('update-JobLevel', [\App\Http\Controllers\Admin\JobLevelController::class, 'update']);
    Route::get('/add-button-JobLevel', function () {
        return view('admin/JobLevel/button');
    });
    //JobLevel
    Route::get('JobType', [\App\Http\Controllers\Admin\JobTypeController::class, 'index']);
    Route::get('JobType_datatable', [\App\Http\Controllers\Admin\JobTypeController::class, 'datatable'])->name('JobType.datatable.data');
    Route::get('delete-JobType', [\App\Http\Controllers\Admin\JobTypeController::class, 'destroy']);
    Route::post('store-JobType', [\App\Http\Controllers\Admin\JobTypeController::class, 'store']);
    Route::get('JobType-edit/{id}', [\App\Http\Controllers\Admin\JobTypeController::class, 'edit']);
    Route::post('update-JobType', [\App\Http\Controllers\Admin\JobTypeController::class, 'update']);
    Route::get('/add-button-JobType', function () {
        return view('admin/JobType/button');
    });
    //JobQualification
    Route::get('JobQualification', [\App\Http\Controllers\Admin\JobQualificationController::class, 'index']);
    Route::get('JobQualification_datatable', [\App\Http\Controllers\Admin\JobQualificationController::class, 'datatable'])->name('JobQualification.datatable.data');
    Route::get('delete-JobQualification', [\App\Http\Controllers\Admin\JobQualificationController::class, 'destroy']);
    Route::post('store-JobQualification', [\App\Http\Controllers\Admin\JobQualificationController::class, 'store']);
    Route::get('JobQualification-edit/{id}', [\App\Http\Controllers\Admin\JobQualificationController::class, 'edit']);
    Route::post('update-JobQualification', [\App\Http\Controllers\Admin\JobQualificationController::class, 'update']);
    Route::get('/add-button-JobQualification', function () {
        return view('admin/JobQualification/button');
    });

    //JobOtherRequirement
    Route::get('JobOtherRequirement', [\App\Http\Controllers\Admin\JobOtherRequirementController::class, 'index']);
    Route::get('JobOtherRequirement_datatable', [\App\Http\Controllers\Admin\JobOtherRequirementController::class, 'datatable'])->name('JobOtherRequirement.datatable.data');
    Route::get('delete-JobOtherRequirement', [\App\Http\Controllers\Admin\JobOtherRequirementController::class, 'destroy']);
    Route::post('store-JobOtherRequirement', [\App\Http\Controllers\Admin\JobOtherRequirementController::class, 'store']);
    Route::get('JobOtherRequirement-edit/{id}', [\App\Http\Controllers\Admin\JobOtherRequirementController::class, 'edit']);
    Route::post('update-JobOtherRequirement', [\App\Http\Controllers\Admin\JobOtherRequirementController::class, 'update']);
    Route::get('/add-button-JobOtherRequirement', function () {
        return view('admin/JobOtherRequirement/button');
    });

    //JobOtherRequirementAnswers
    Route::get('JobOtherRequirementAnswers', [\App\Http\Controllers\Admin\JobOtherRequirementAnswersController::class, 'index']);
    Route::get('JobOtherRequirementAnswers_datatable', [\App\Http\Controllers\Admin\JobOtherRequirementAnswersController::class, 'datatable'])->name('JobOtherRequirementAnswers.datatable.data');
    Route::get('delete-JobOtherRequirementAnswers', [\App\Http\Controllers\Admin\JobOtherRequirementAnswersController::class, 'destroy']);
    Route::post('store-JobOtherRequirementAnswers', [\App\Http\Controllers\Admin\JobOtherRequirementAnswersController::class, 'store']);
    Route::get('JobOtherRequirementAnswers-edit/{id}', [\App\Http\Controllers\Admin\JobOtherRequirementAnswersController::class, 'edit']);
    Route::post('update-JobOtherRequirementAnswers', [\App\Http\Controllers\Admin\JobOtherRequirementAnswersController::class, 'update']);
    Route::get('/add-button-JobOtherRequirementAnswers', function () {
        return view('admin/JobOtherRequirementAnswers/button');
    });

    //JobFeatures
    Route::get('JobFeatures', [\App\Http\Controllers\Admin\JobFeaturesController::class, 'index']);
    Route::get('JobFeatures_datatable', [\App\Http\Controllers\Admin\JobFeaturesController::class, 'datatable'])->name('JobFeatures.datatable.data');
    Route::get('delete-JobFeatures', [\App\Http\Controllers\Admin\JobFeaturesController::class, 'destroy']);
    Route::post('store-JobFeatures', [\App\Http\Controllers\Admin\JobFeaturesController::class, 'store']);
    Route::get('JobFeatures-edit/{id}', [\App\Http\Controllers\Admin\JobFeaturesController::class, 'edit']);
    Route::post('update-JobFeatures', [\App\Http\Controllers\Admin\JobFeaturesController::class, 'update']);
    Route::get('/add-button-JobFeatures', function () {
        return view('admin/JobFeatures/button');
    });
    //JobOtherRequirement
    Route::get('JobOtherRequirement', [\App\Http\Controllers\Admin\JobOtherRequirementController::class, 'index']);
    Route::get('JobOtherRequirement_datatable', [\App\Http\Controllers\Admin\JobOtherRequirementController::class, 'datatable'])->name('JobOtherRequirement.datatable.data');
    Route::get('delete-JobOtherRequirement', [\App\Http\Controllers\Admin\JobOtherRequirementController::class, 'destroy']);
    Route::post('store-JobOtherRequirement', [\App\Http\Controllers\Admin\JobOtherRequirementController::class, 'store']);
    Route::get('JobOtherRequirement-edit/{id}', [\App\Http\Controllers\Admin\JobOtherRequirementController::class, 'edit']);
    Route::post('update-JobOtherRequirement', [\App\Http\Controllers\Admin\JobOtherRequirementController::class, 'update']);
    Route::get('/add-button-JobOtherRequirement', function () {
        return view('admin/JobOtherRequirement/button');
    });
    // Cancel Reason
    Route::get('CancelReason', [\App\Http\Controllers\Admin\CancelReasonController::class, 'index']);
    Route::get('CancelReason_datatable', [\App\Http\Controllers\Admin\CancelReasonController::class, 'datatable'])->name('CancelReason.datatable.data');
    Route::get('delete-CancelReason', [\App\Http\Controllers\Admin\CancelReasonController::class, 'destroy']);
    Route::post('store-CancelReason', [\App\Http\Controllers\Admin\CancelReasonController::class, 'store']);
    Route::get('CancelReason-edit/{id}', [\App\Http\Controllers\Admin\CancelReasonController::class, 'edit']);
    Route::post('update-CancelReason', [\App\Http\Controllers\Admin\CancelReasonController::class, 'update']);
    Route::get('/add-button-CancelReason', function () {
        return view('admin/CancelReason/button');
    });
    // Cancel Reason
    Route::get('UserRejectInterviewReason', [\App\Http\Controllers\Admin\UserRejectInterviewReasonController::class, 'index']);
    Route::get('UserRejectInterviewReason_datatable', [\App\Http\Controllers\Admin\UserRejectInterviewReasonController::class, 'datatable'])->name('UserRejectInterviewReason.datatable.data');
    Route::get('delete-UserRejectInterviewReason', [\App\Http\Controllers\Admin\UserRejectInterviewReasonController::class, 'destroy']);
    Route::post('store-UserRejectInterviewReason', [\App\Http\Controllers\Admin\UserRejectInterviewReasonController::class, 'store']);
    Route::get('UserRejectInterviewReason-edit/{id}', [\App\Http\Controllers\Admin\UserRejectInterviewReasonController::class, 'edit']);
    Route::post('update-UserRejectInterviewReason', [\App\Http\Controllers\Admin\UserRejectInterviewReasonController::class, 'update']);
    Route::get('/add-button-UserRejectInterviewReason', function () {
        return view('admin/UserRejectInterviewReason/button');
    });


    // RepeatReason
    Route::get('RepeatReason', [\App\Http\Controllers\Admin\RepeatReasonController::class, 'index']);
    Route::get('RepeatReason_datatable', [\App\Http\Controllers\Admin\RepeatReasonController::class, 'datatable'])->name('RepeatReason.datatable.data');
    Route::get('delete-RepeatReason', [\App\Http\Controllers\Admin\RepeatReasonController::class, 'destroy']);
    Route::post('store-RepeatReason', [\App\Http\Controllers\Admin\RepeatReasonController::class, 'store']);
    Route::get('RepeatReason-edit/{id}', [\App\Http\Controllers\Admin\RepeatReasonController::class, 'edit']);
    Route::post('update-RepeatReason', [\App\Http\Controllers\Admin\RepeatReasonController::class, 'update']);
    Route::get('/add-button-RepeatReason', function () {
        return view('admin/RepeatReason/button');
    });

    // HoldReason
    Route::get('HoldReason', [\App\Http\Controllers\Admin\HoldReasonController::class, 'index']);
    Route::get('HoldReason_datatable', [\App\Http\Controllers\Admin\HoldReasonController::class, 'datatable'])->name('HoldReason.datatable.data');
    Route::get('delete-HoldReason', [\App\Http\Controllers\Admin\HoldReasonController::class, 'destroy']);
    Route::post('store-HoldReason', [\App\Http\Controllers\Admin\HoldReasonController::class, 'store']);
    Route::get('HoldReason-edit/{id}', [\App\Http\Controllers\Admin\HoldReasonController::class, 'edit']);
    Route::post('update-HoldReason', [\App\Http\Controllers\Admin\HoldReasonController::class, 'update']);
    Route::get('/add-button-HoldReason', function () {
        return view('admin/HoldReason/button');
    });


    // BlockReason
    Route::get('BlockReason', [\App\Http\Controllers\Admin\BlockReasonController::class, 'index']);
    Route::get('BlockReason_datatable', [\App\Http\Controllers\Admin\BlockReasonController::class, 'datatable'])->name('BlockReason.datatable.data');
    Route::get('delete-BlockReason', [\App\Http\Controllers\Admin\BlockReasonController::class, 'destroy']);
    Route::post('store-BlockReason', [\App\Http\Controllers\Admin\BlockReasonController::class, 'store']);
    Route::get('BlockReason-edit/{id}', [\App\Http\Controllers\Admin\BlockReasonController::class, 'edit']);
    Route::post('update-BlockReason', [\App\Http\Controllers\Admin\BlockReasonController::class, 'update']);
    Route::get('/add-button-BlockReason', function () {
        return view('admin/BlockReason/button');
    });


    // Invoices
    Route::get('Invoices_setting', [\App\Http\Controllers\Admin\InvoiceController::class, 'index']);
    Route::get('InvoiceDetails/{id}', [\App\Http\Controllers\Admin\InvoiceController::class, 'InvoiceDetails']);
    Route::get('Invoices_datatable', [\App\Http\Controllers\Admin\InvoiceController::class, 'datatable'])->name('Invoices.datatable.data');
    Route::get('delete-Invoice', [\App\Http\Controllers\Admin\InvoiceController::class, 'destroy']);
    Route::post('store-Invoice', [\App\Http\Controllers\Admin\InvoiceController::class, 'store']);
    Route::get('Invoice-edit/{id}', [\App\Http\Controllers\Admin\InvoiceController::class, 'edit']);
    Route::post('update-Invoice', [\App\Http\Controllers\Admin\InvoiceController::class, 'update']);
    Route::get('/add-button-Invoices', function () {
        return view('admin/Invoices/button');
    });

    //invoice payment
    Route::get('InvoicePayment/{id}', [\App\Http\Controllers\Admin\InvoicePaymentController::class, 'index']);
    Route::get('InvoicePayment_datatable', [\App\Http\Controllers\Admin\InvoicePaymentController::class, 'datatable'])->name('InvoicePayment.datatable.data');
    Route::post('store-InvoicePayment', [\App\Http\Controllers\Admin\InvoicePaymentController::class, 'store']);
    Route::get('delete-InvoicePayment', [\App\Http\Controllers\Admin\InvoicePaymentController::class, 'destroy']);
    Route::get('/add-button-InvoicePayment/{id}', function ($id) {
        return view('admin/Invoices/PaymentButton',compact('id'));
    });

        Route::get('public_setting', [\App\Http\Controllers\Admin\SettingController::class, 'Settings']);
        Route::post('edit_setting', [\App\Http\Controllers\Admin\SettingController::class, 'editSettings']);



});


Route::get('get-specialization/{id}',[\App\Http\Controllers\Admin\ExperienceSpecializationController::class ,'getspecialization']);
Route::get('get-Cities/{id}',[\App\Http\Controllers\Admin\CityController::class ,'getCities']);
Route::get('getState/{id}',[\App\Http\Controllers\Admin\CityController::class ,'getState']);
Route::get('getVillage/{id}',[\App\Http\Controllers\Admin\VillageController::class ,'getState']);

Route::get('get-CitiesForIdValidation/{id}',[\App\Http\Controllers\Admin\CityController::class ,'CitiesForIdValidation']);


Route::get('CreateInvoice',[\App\Http\Controllers\Admin\InvoiceController::class,'CreateInvoice'])->name('CreateInvoice');
