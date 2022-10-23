<!DOCTYPE html>
<html dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="{{asset('website/assets/css/bootstrap.css')}}"  type="text/css">
    <link rel="stylesheet" href="{{asset('website/assets/css/all.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('website/assets/css/style.css')}}" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.8/css/intlTelInput.css" />

    @yield('css')
    <title>مطلوب للتوظيف | وظايف بدون رسوم </title>
        <style>
            .active{
                display: block!important;
            }
        </style>

</head>

<body>
<header class="background-header">


    <nav class="navbar navbar-expand-lg navbar-light ">
        <div class="container">
            <a class="navbar-brand" href="#"><img class="logo" src="{{asset('website/assets/images/logo.png')}}" > </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link @if(Request::segment(1) == '') active @endif" aria-current="page" href="{{url('/')}}">الرئيسية</a>
                    </li>

                    @if(Auth::guard('web')->check())
                        <li class="nav-item">
                            <a class="nav-link @if(Request::segment(1) == 'cv-maker') active @endif" aria-current="page" href="{{url('cv-maker')}}">إنشاء السيرة الذاتية</a>
                        </li>
                    @endif
                    @if(Auth::guard('company')->check())
                        <li class="nav-item">
                            <a class="nav-link @if(Request::segment(1) == 'SearchForEmployees') active @endif" aria-current="page" href="{{url('SearchForEmployees')}}"> بحث عن مواظفين
                            </a>
                        </li>
                    @endif

                    <li class="nav-item">
                        <a class="nav-link @if(Request::segment(1) == 'Jobs') active @endif" aria-current="page" href="{{url('Jobs')}}"> الوظائف</a>
                    </li>
                    @if(!Auth::guard('web')->check())

                    @foreach(\App\Models\Page::where('is_active','active')->where('type','header')->get() as $Page)
                        <li class="nav-item">
                            <a class="nav-link @if(Request::segment(1) == 'Page' && Request::segment(2) == $Page->id) active @endif" aria-current="page" href="{{url('Page',$Page->id)}}"> {{$Page->title}}</a>
                        </li>
                    @endforeach
                    @endif
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="{{url('Contact-us')}}"> تواصل معنا</a>
                    </li>
                    @if(!Auth::guard('web')->check())
                    <li class="nav-item">
                        <a class="nav-link @if(Request::segment(1) == 'Faq') active @endif" aria-current="page" href="{{url('Faq')}}"> الأسئلة المتكررة</a>
                    </li>
                        @endif


                </ul>
                <form class="d-flex padding-10" >
                    @if(Auth::guard('web')->check())
                        <div class="dropdown">
                            <button class="btn btn-primary btn-theme dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                مرحبا
                                {{Auth::guard('web')->user()->name}}
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{url('MyProfile')}}">الصفحة الشخصية</a>
                                <a class="dropdown-item" href="{{url('MyJobs')}}">الوظائف</a>
                                <a class="dropdown-item" href="{{url('logoutUser')}}">تسجيل الخروج</a>
                            </div>
                        </div>



                    @elseif(Auth::guard('admin')->check())
                        <div class="dropdown">
                            <button class="btn btn-primary btn-theme dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                مرحبا
                                {{Auth::guard('admin')->user()->name}}
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{url('Dashboard')}}">لوحة التحكم</a>
                                <a class="dropdown-item" href="{{url('logoutUser')}}">تسجيل الخروج</a>
                            </div>
                        </div>

                    @elseif(Auth::guard('company')->check())
                        <div class="dropdown">
                            <button class="btn btn-primary btn-theme dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                مرحبا
                                {{Auth::guard('company')->user()->first_name}}
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{url('Profile')}}">الصفحة الشخصية</a>
                                @if(Auth::guard('company')->user()->is_active == 'active')
                                <a class="dropdown-item" href="{{url('Company-jobs')}}">الوظائف</a>
                                @inject('companies','App\Models\Company')
                                @if($companies->find(Auth::guard('company')->id())->company_type == 'employment')
                                <a class="dropdown-item" href="{{url('Reports')}}">التقارير</a>
                                <a class="dropdown-item" href="{{url('Complaints')}}">الشكاوي</a>
                                @endif
                                @endif
                                <a class="dropdown-item" href="{{url('logoutUser')}}">تسجيل الخروج</a>
                            </div>
                        </div>

                    @else
                        <button type="button" class="btn btn-primary btn-theme" data-toggle="modal" data-target="#login">
                            تسجيل دخول
                        </button>
                        <button type="button" class=" btn  btn-theme2" data-toggle="modal" data-target="#registerUser">
                            مطلوب وظيفة
                        </button>

                        <button type="button" class=" btn  btn-theme3" data-toggle="modal" data-target="#registerCompany">
                            مطلوب موظف
                        </button>
                        {{-- <button type="button" class="btn  btn-theme3" data-toggle="modal" data-target="#registerOwner">--}}
                        {{--                        صاحب عمل--}}
                        {{--  </button>--}}
                    <!-- Modal -->
                    @endif
                </form>
            </div>
        </div>
    </nav>
    @if(Auth::guard('company')->check())
        @inject('companies','App\Models\Company')
        @if(($companies->find(Auth::guard('company')->id())->company_type == 'private'))
            @if(\App\Models\CompanyPayment::where('company_id',Auth::guard('company')->id())->where('states','payed')->orderBy('id','desc')->first()
            && \App\Models\CompanyPayment::where('company_id',Auth::guard('company')->id())->where('states','payed')->orderBy('id','desc')->first()->adv_count_used < \App\Models\CompanyPayment::where('company_id',Auth::guard('company')->id())->where('states','payed')->orderBy('id','desc')->first()->Package->adv_count  )

            @else
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <button type="button" style="border:none" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                   مرحبا بك في مطلوب الرجاء استكمال البيانات لامكانية اضافة وظيفة  .
                    <br>
                   1- لباقات الشركات الخاصه
                    <strong><a href="{{url('CompanyPackage')}}">اضغط هنا !       </a></strong>
{{--                    <br>--}}
{{--                  2-  لباقات شركات التوظيف--}}
{{--                    <strong><a href="{{url('')}}">اضغط هنا !       </a></strong>--}}

                </div>
            @endif


        @endif
    @endif
@yield('content')


<!-- this is section 4 in main -->
    <section class="main-img" ></section>

    <footer>
        <div class="container">
            <div class="row list">
                <div class="col-md-3 footer-div">&copy;مطلوب كل الحقوق محفوظة 2021</div>
                <div class="col-md-7">
                    <div class="row " >
                        @foreach(\App\Models\Page::where('is_active','active')->where('type','footer')->get() as $Page)
                        <div class="col-md-3">
                           <a class="footerli" href="{{url('Page',$Page->id)}}"> <li>{{$Page->title}}</li></a>
                        </div>
                        @endforeach
                    </div>
                </div>
                @inject('setting','App\Models\Setting')
                <div class="col-md-2">
                    <ul class="socail">
                        <li>
                            <a href="{{url($setting->find(1)->facebook)}}" > <i class="fa fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="{{url($setting->find(1)->twitter)}}" > <i class="fa fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="{{url($setting->find(1)->youtube)}}" > <i class="fa fa-youtube"></i></a>
                        </li>
                        <li>
                           <a href="{{url($setting->find(1)->instgram)}}" > <i class="fa fa-instagram"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <section class="container-fluied footer">
            <div class="container">
                يرجي العلم ان مطلوب دوت نت هو شركة توظيف وليس موقع لعرض الوظائف المتاحة. "مطلوب" للتوظيف بتوفر وظايف بدون رسوم للمتعطلين عن العمل في جميع المجالات بشكل دائم بجميع المحافظات
            </div>
        </section>

    </footer>

    <!-- model and wizard -->

    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                            <img src="{{asset('website/assets/images/logo.png')}}" style="    display: block;margin-left: auto;margin-right: auto;width: 38%;">
                    <button type="button" class="close btn" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5 class="center"> مرحبا بعودتك !</h5>
                    <br>
                    <ul class="nav nav-tabs " id="myTab" role="tablist">
                        <li style=" width:50%; padding: 10px" role="presentation">
                            <button  style="border: none;margin-left: 10px;" class="nav-link1 faq-button active item active-item"  data-id="home-tab" id="home-tab1" data-bs-toggle="tab" data-bs-target="#home1" type="button" role="tab" aria-controls="home" aria-selected="true">تسجيل عاطل  </button>
                        </li>
                        <li  style=" width:50%; padding: 10px" role="presentation">
                            <button style="border: none;" class="nav-link1 item  faq-button"  id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile1" type="button" role="tab" aria-controls="profile" aria-selected="false">تسجيل شركة </button>
                        </li>

                    </ul>
                    <div class="tab-pane1 fade show active" id="home1" role="tabpanel" style="display:none" aria-labelledby="home-tab">
                        <!-- collapse item 1 -->
                        <form action="{{url('loginUser')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label> بالرقم القومي او البريد الإلكتروني  او الهاتف </label>
                                <input type="text" required class="form-control" name="phone">
                            </div>
                            <div class="form-group">
                                <label> كلمة المرور </label>
                                <input type="password" required  style="-webkit-text-security: square!important;" class="form-control" name="password">
                            </div>
                            <div class="form-group ">
                                <button type="submit" class="btn btn-primary sign-in"> تسجيل الدخول  </button>
                            </div>
                            <a href="#" target="_blank" class="forget-password">نسيت كلمة المرور؟ </a>
                        </form>

                    </div>
                    <div class="tab-pane1 fade" id="profile1" role="tabpanel"  style="display:none" aria-labelledby="profile-tab">
                        <form action="{{url('loginCompany')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label> البريد الإلكتروني  </label>
                                <input type="email" required class="form-control" value="" name="email">
                            </div>
                            <div class="form-group">
                                <label> كلمة المرور </label>
                                <input type="password" required  style="-webkit-text-security: square!important;" class="form-control" name="password">
                            </div>
                            <div class="form-group ">
                                <button type="submit" class="btn btn-primary sign-in"> تسجيل الدخول  </button>
                            </div>
                            <a href="#" target="_blank" class="forget-password">نسيت كلمة المرور؟ </a>
                        </form>
                    </div>

                </div>
                <div class="modal-footer" id="new-account">
                    <div class="row" style="text-align: center">
                    <div class="col-md-12 col-12">
                        <span>خدمة العملاء</span>
                    </div>
                        @inject('setting','App\Models\Setting')

                        <div class="col-md-12 col-12">
                            <span >الخط الساخن :</span>
                            <a href="#" target="_blank">{{$setting->find(1)->phone}}</a>
                        </div>

                        <div class="col-md-12 col-12">
                            <span >البريد الإلكتروني :</span>
                            <a href="#" target="_blank">{{$setting->find(1)->email}}</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="registerUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="">
                <div class="modal-header">
                    <img src="{{asset('website/assets/images/logo.png')}}" style="    display: block;margin-left: auto;margin-right: auto;width: 38%;">
                    <button type="button" class="close btn" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5>أنشئ حساب جديد و ابدا في التقديم للوظائف</h5>
                    <div class="form-wizard">
                        <form action="{{url('registerUser')}}" method="post" role="form">
                            @csrf
                            <fieldset class="wizard-fieldset show">
                                <div class="form-group">
                                    <label  for="fname">الاسم كامل *<br>
                                        <span  >  ( برجاء ادخال الاسم مطابق لبطاقة الرقم القومي) </span></label>
                                    <input type="text" class="form-control  wizard-required" name="name" id="fname">
                                    <div class="wizard-form-error">
                                        <div style="font-size: 13px">هذا الحقل مطلوب</div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  for="id_number">الرفم القومي  *</label>
                                    <input  type="number" onKeyPress="if(this.value.length==14) return false;"  class="form-control wizard-required " name="id_number" id="id_number">
                                    <div class="wizard-form-error">
                                        <div style="font-size: 13px">هذا الحقل مطلوب</div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  for="email">البريد الالكتروني *</label>
                                    <input type="email" class="form-control wizard-required" id="email" name="email">
                                    <div class="wizard-form-error">
                                        <div style="font-size: 13px">هذا الحقل مطلوب</div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  for="birth_date">تاريخ الميلاد *</label>
                                    <input   type="date" class="form-control wizard-required" id="birth_date" name="birth_date">
                                    <div class="wizard-form-error">
                                        <div style="font-size: 13px">هذا الحقل مطلوب</div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="country" >الدولة *</label>
                                            <select class="form-control wizard-required" id="country" name="country_id">
                                                @inject('Countries','App\Models\Country')
                                                @foreach($Countries->where('is_active','active')->get() as $Country)
                                                    <option value="{{$Country->id}}">{{$Country->name}} </option>
                                                @endforeach
                                            </select>
                                            <div class="wizard-form-error">
                                                <div style="font-size: 13px">هذا الحقل مطلوب</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="country" >المحافظة *</label>
                                            <select class="form-control wizard-required" id="city" name="city_id">
                                            </select>
                                            <div class="wizard-form-error">
                                                <div style="font-size: 13px">هذا الحقل مطلوب</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="state" >المركز *</label>
                                            <select class="form-control wizard-required" id="state" name="state_id">
                                            </select>
                                            <div class="wizard-form-error">
                                                <div style="font-size: 13px">هذا الحقل مطلوب</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="state" >القرية او الحي *</label>
                                            <select class="form-control wizard-required" id="village" name="village_id">
                                            </select>
                                            <div class="wizard-form-error">
                                                <div style="font-size: 13px">هذا الحقل مطلوب</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                <div class="form-group clearfix">
                                    <a href="javascript:;" class="form-wizard-next-btn ">الخطوة التالية</a>
                                </div>
                            </fieldset>
                            <fieldset class="wizard-fieldset">
                                <div class="row ">
                                    <div class="col-lg-2">
                                        <div class="input-box">
                                            <label class="label-text">Code<span
                                                    class="primary-color-2 ml-1">*</span></label>
                                            <div class="form-group">
                                                <input id="txtPhone" class="form-control @error('code') is-invalid @enderror"
                                                       type="tel" name="code"
                                                       placeholder="Code" required
                                                       value="{{ old('code') }}">

                                                @error('code')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                  </span>
                                                @enderror

                                            </div>
                                        </div>
                                    </div><!-- end col-md-12 -->
                                    <div class="col-lg-10">
                                        <div class="form-group">
                                            <label  for="phone">رقم الهاتف  *</label>
                                            <input type="number" onKeyPress="if(this.value.length==11) return false;" class="form-control " id="phone" name="phone">
                                            <div class="wizard-form-error">
                                                <div style="font-size: 13px">هذا الحقل مطلوب</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-lg-2">
                                        <div class="input-box">
                                            <label class="label-text">Code<span
                                                    class="primary-color-2 ml-1">*</span></label>
                                            <div class="form-group">
                                                <input id="txtPhone5" class="form-control @error('code') is-invalid @enderror"
                                                       type="tel" name="codewhatsapp"
                                                       placeholder="Code" required
                                                       value="{{ old('code') }}">

                                                @error('code')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                  </span>
                                                @enderror

                                            </div>
                                        </div>
                                    </div><!-- end col-md-12 -->
                                    <div class="col-lg-10">
                                        <div class="form-group">
                                            <label  for="phone">رقم الواتس اب  *</label>
                                            <input type="number" onKeyPress="if(this.value.length==11) return false;" class="form-control " id="whatsapp" name="whatsapp">
                                            <div class="wizard-form-error">
                                                <div style="font-size: 13px">هذا الحقل مطلوب</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="type" >النوع  *</label>
                                            <select class="form-control" id="type" name="type">
                                                <option value="male">ذكر </option>
                                                <option value="female">انثى </option>
                                            </select>
                                            <div class="wizard-form-error">
                                                <div style="font-size: 13px">هذا الحقل مطلوب</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="relationship" >الحالة الاجتماعية  *</label>
                                            <select class="form-control" id="relationship" name="relationship">
                                                <option value="single">اعزب </option>
                                                <option value="married">متزوج </option>
                                                <option value="widower">ارمل ( ـة)  </option>
                                                <option value="absolute">مطلق( ـة)  </option>
                                            </select>
                                            <div class="wizard-form-error">
                                                <div style="font-size: 13px">هذا الحقل مطلوب</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="how_register" >القائم على عملية التسجيل   *</label>
                                            <select class="form-control" name="how_register" id="how_register">
                                                <option value="same">نفسه </option>
                                                <option value="father">الاب </option>
                                                <option value="mother"> الام </option>
                                                <option value="brother">الاخ </option>
                                                <option value="sister">الاخت </option>
                                                <option value="friend">صديق </option>
                                                <option value="near"> قريب </option>
                                            </select>
                                            <div class="wizard-form-error">
                                                <div style="font-size: 13px">هذا الحقل مطلوب</div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label  for="password">كلمة المرور  *</label>
                                    <input type="password" style="-webkit-text-security: square!important;"  class="form-control " id="password" name="password">
                                    <div class="wizard-form-error">
                                        <div style="font-size: 13px">هذا الحقل مطلوب</div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label  for="confirmPaswword">تاكيد كلمة المرور  *</label>
                                    <input type="password" class="form-control" style="-webkit-text-security: square!important;"  id="confirmPaswword" name="password_confirmation">
                                    <div class="wizard-form-error">
                                        <div style="font-size: 13px">هذا الحقل مطلوب</div>
                                    </div>
                                </div>
                                <hr>

                                <div class="form-group clearfix">
                                    <a href="javascript:;" class="form-wizard-previous-btn float-left">السابق</a>
                                    <button  type="submit" class="form-wizard-submit float-right">حفظ</button>
                                </div>
                            </fieldset>

                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <div class="modal fade" id="registerCompany" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="">
                <div class="modal-header">
                    <img src="{{asset('website/assets/images/logo.png')}}" style="    display: block;margin-left: auto;margin-right: auto;width: 38%;">
                    <button type="button" class="close btn" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5>أنشئ حساب شركات جديد  و ابدا في البحث عن موظفين </h5>
                    <div class="form-wizard">
                        <form action="{{url('registerCompany')}}" method="post" role="form">
                            @csrf
                            <fieldset class="wizard-fieldset show">
                                <div class="form-group">
                                    <label  for="fname">الاسم الاول *<br> </label>
                                    <input type="text" class="form-control  wizard-required" name="first_name" id="first_name">
                                    <div class="wizard-form-error">
                                        <div style="font-size: 13px">هذا الحقل مطلوب</div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  for="last_name">الاسم الثاني   *</label>
                                    <input type="text" class="form-control wizard-required " name="last_name" id="id_number">
                                    <div class="wizard-form-error">
                                        <div style="font-size: 13px">هذا الحقل مطلوب</div>
                                    </div>                                </div>
                                <div class="form-group">
                                    <label  for="company_name">اسم الشركة   *</label>
                                    <input type="text" class="form-control wizard-required " name="company_name" id="company_name">
                                    <div class="wizard-form-error">
                                        <div style="font-size: 13px">هذا الحقل مطلوب</div>
                                    </div>                                </div>
                                <div class="form-group">
                                    <label  for="email">البريد الالكتروني  *</label>
                                    <input type="email" class="form-control wizard-required emailCompany" id="emailCompany"  name="email">
                                    <div class="wizard-form-error">
                                        <div style="font-size: 13px">هذا الحقل مطلوب</div>
                                    </div>                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="country" >الدولة *</label>
                                            <select class="form-control wizard-required" id="country2" name="country_id">
                                                @inject('Countries','App\Models\Country')
                                                @foreach($Countries->where('is_active','active')->get() as $Country)
                                                    <option value="{{$Country->id}}">{{$Country->name}} </option>
                                                @endforeach
                                            </select>
                                            <div class="wizard-form-error">
                                                <div style="font-size: 13px">هذا الحقل مطلوب</div>
                                            </div>                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="country" >المحافظة *</label>
                                            <select class="form-control wizard-required" id="city2" name="city_id">
                                            </select>
                                            <div class="wizard-form-error">
                                                <div style="font-size: 13px">هذا الحقل مطلوب</div>
                                            </div>                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="state" >المركز *</label>
                                            <select class="form-control wizard-required" id="state2" name="state_id">
                                            </select>
                                            <div class="wizard-form-error">
                                                <div style="font-size: 13px">هذا الحقل مطلوب</div>
                                            </div>                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="state" >القرية او الحي *</label>
                                            <select class="form-control wizard-required" id="village2" name="village_id">
                                            </select>
                                            <div class="wizard-form-error">
                                                <div style="font-size: 13px">هذا الحقل مطلوب</div>
                                            </div>                                        </div>
                                    </div>
                                </div>
                                <hr>

                                <div class="form-group clearfix">
                                    <a href="javascript:;" class="form-wizard-next-btn ">الخطوة التالية</a>
                                </div>
                            </fieldset>
                            <fieldset class="wizard-fieldset">

                                <div class="row ">
                                    <div class="col-lg-2">
                                        <div class="input-box">
                                            <label class="label-text">Code<span
                                                    class="primary-color-2 ml-1">*</span></label>
                                            <div class="form-group">
                                                <input id="txtPhone3" class="form-control @error('code') is-invalid @enderror"
                                                       type="tel" name="code"
                                                       placeholder="Code" required
                                                       value="{{ old('code') }}">

                                                @error('code')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                  </span>
                                                @enderror

                                            </div>
                                        </div>
                                    </div><!-- end col-md-12 -->
                                    <div class="col-lg-10">
                                        <div class="form-group">
                                            <label  for="phone">رقم الهاتف  *</label>
                                            <input type="number" class="form-control " id="phone" name="phone">
                                            <div class="wizard-form-error">
                                                <div style="font-size: 13px">هذا الحقل مطلوب</div>
                                            </div>                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label  for="manger_email">البريد الالكتروني للمدير *</label>
                                    <input type="email" class="form-control wizard-required" id="manger_email" name="manger_email">
                                    <div class="wizard-form-error">
                                        <div style="font-size: 13px">هذا الحقل مطلوب</div>
                                    </div>                                </div>

                                <div class="row ">
                                    <div class="col-lg-2">
                                        <div class="input-box">
                                            <label class="label-text">Code<span
                                                    class="primary-color-2 ml-1">*</span></label>
                                            <div class="form-group">
                                                <input id="txtPhone2" class="form-control @error('code') is-invalid @enderror"
                                                       type="tel" name="code"
                                                       placeholder="Code" required
                                                       value="{{ old('code') }}">

                                                @error('code')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                  </span>
                                                @enderror

                                            </div>
                                        </div>
                                    </div><!-- end col-md-12 -->
                                    <div class="col-lg-10">
                                        <div class="form-group">
                                            <label  for="manger_phone">رقم الهاتف للمدير  *</label>
                                            <input type="manger_phone" class="form-control " id="phone" name="manger_phone">
                                            <div class="wizard-form-error">
                                                <div style="font-size: 13px">هذا الحقل مطلوب</div>
                                            </div>                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="type" >المجال  *</label>
                                            <select class="form-control" id="experience_category_id" name="experience_category_id">
                                                @foreach(\App\Models\ExperienceCategory::where('is_active','active')->get() as $data)
                                                <option value="{{$data->id}}">{{$data->name}} </option>
                                                @endforeach
                                            </select>
                                            <div class="wizard-form-error">
                                                <div style="font-size: 13px">هذا الحقل مطلوب</div>
                                            </div>                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label> التخصص  </label>
                                        <select class="form-control" id="specialization_id" name="specialization_id">
                                        </select>
                                    </div>


                                </div>

                                <div class="form-group">
                                    <label  for="password">كلمة المرور  *</label>
                                    <input type="password" style="-webkit-text-security: square!important;"  class="form-control " id="password" name="password">
                                    <div class="wizard-form-error">
                                        <div style="font-size: 13px">هذا الحقل مطلوب</div>
                                    </div>                                </div>

                                <div class="form-group">
                                    <label  for="confirmPaswword">تاكيد كلمة المرور  *</label>
                                    <input type="password" style="-webkit-text-security: square!important;"  class="form-control" id="confirmPaswword" name="password_confirmation">
                                    <div class="wizard-form-error">
                                        <div style="font-size: 13px">هذا الحقل مطلوب</div>
                                    </div>                                </div>
                                <hr>

                                <div class="form-group clearfix">
                                    <a href="javascript:;" class="form-wizard-previous-btn float-left">السابق</a>
                                    <button  type="submit" class="form-wizard-submit float-right">حفظ</button>
                                </div>
                            </fieldset>

                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <script src="{{asset('website/assets/js/jquery.js')}}" ></script>
    <script src="{{asset('website/assets/js/bootstrap.min.js')}}" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @yield('js')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.8/js/intlTelInput-jquery.min.js"></script>
    <script>
        $('#emailCompany').on('click','change',function () {
         var   email =  document.getElementById('emailCompany').value;
         if(email.includes('@yahoo') == true|| email.includes('@gmail') == true){
             alert('البريد الالكتروني يجب ان يكون اميل شركة وليس جوجل او ياهو ')
             document.getElementById('emailCompany').value = '';
         }
        })

        $('.nav-link1').click(function() {

            $('.nav-link1').removeClass("active");
            $('.nav-link1').removeClass("active-item");
            $('.tab-pane1').removeClass("active");
            $('.tab-pane1').removeClass("show");
            $(this).addClass('active');
            $(this).addClass('active-item');
            var target = $(this).data('bs-target');
            $(target).addClass('active show')

        });

    </script>

    <script type="text/javascript">
        $(function() {
            var code = "+20"; // Assigning value from model.
            $('#txtPhone').val(code);
            $('#txtPhone').intlTelInput({
                autoHideDialCode: true,
                autoPlaceholder: "ON",
                dropdownContainer: document.body,
                formatOnDisplay: true,
                hiddenInput: "full_number",
                initialCountry: "auto",
                nationalMode: true,
                placeholderNumberType: "MOBILE",
                preferredCountries: ['US'],
                separateDialCode: false
            });
            console.log(code)
        });
        $(function() {
            var code = "+20"; // Assigning value from model.
            $('#txtPhone5').val(code);
            $('#txtPhone5').intlTelInput({
                autoHideDialCode: true,
                autoPlaceholder: "ON",
                dropdownContainer: document.body,
                formatOnDisplay: true,
                hiddenInput: "full_number",
                initialCountry: "auto",
                nationalMode: true,
                placeholderNumberType: "MOBILE",
                preferredCountries: ['US'],
                separateDialCode: false
            });
        });
    </script>
    </script>

    <script type="text/javascript">
        $(function() {
            var code = "+20"; // Assigning value from model.
            $('#txtPhone2').val(code);
            $('#txtPhone2').intlTelInput({
                autoHideDialCode: true,
                autoPlaceholder: "ON",
                dropdownContainer: document.body,
                formatOnDisplay: true,
                hiddenInput: "full_number",
                initialCountry: "auto",
                nationalMode: true,
                placeholderNumberType: "MOBILE",
                preferredCountries: ['US'],
                separateDialCode: false
            });
            console.log(code)
        });
    </script>

    <script type="text/javascript">
        $(function() {
            var code = "+20"; // Assigning value from model.
            $('#txtPhone3').val(code);
            $('#txtPhone3').intlTelInput({
                autoHideDialCode: true,
                autoPlaceholder: "ON",
                dropdownContainer: document.body,
                formatOnDisplay: true,
                hiddenInput: "full_number",
                initialCountry: "auto",
                nationalMode: true,
                placeholderNumberType: "MOBILE",
                preferredCountries: ['US'],
                separateDialCode: false
            });
            console.log(code)
        });
    </script>
    <script>
        jQuery(document).ready(function() {
            // click on next button
            jQuery('.form-wizard-next-btn').click(function() {
                var parentFieldset = jQuery(this).parents('.wizard-fieldset');
                var currentActiveStep = jQuery(this).parents('.form-wizard').find('.form-wizard-steps .active');
                var next = jQuery(this);
                var nextWizardStep = true;
                parentFieldset.find('.wizard-required').each(function(){
                    var thisValue = jQuery(this).val();
                    if( thisValue == "") {
                        jQuery(this).siblings(".wizard-form-error").slideDown();
                        nextWizardStep = false;
                    }
                    else {
                        jQuery(this).siblings(".wizard-form-error").slideUp();
                    }
                });
                if( nextWizardStep) {
                    next.parents('.wizard-fieldset').removeClass("show","400");
                        currentActiveStep.removeClass('active').addClass('activated').next().addClass('active',"400");
                    next.parents('.wizard-fieldset').next('.wizard-fieldset').addClass("show","400");
                    jQuery(document).find('.wizard-fieldset').each(function(){
                        if(jQuery(this).hasClass('show')){
                            var formAtrr = jQuery(this).attr('data-tab-content');
                            jQuery(document).find('.form-wizard-steps .form-wizard-step-item').each(function(){
                                if(jQuery(this).attr('data-attr') == formAtrr){
                                    jQuery(this).addClass('active');
                                    var innerWidth = jQuery(this).innerWidth();
                                    var position = jQuery(this).position();
                                    jQuery(document).find('.form-wizard-step-move').css({"left": position.left, "width": innerWidth});
                                }else{
                                    jQuery(this).removeClass('active');
                                }
                            });
                        }
                    });
                }
            });
            //click on previous button
            jQuery('.form-wizard-previous-btn').click(function() {
                var counter = parseInt(jQuery(".wizard-counter").text());;
                var prev =jQuery(this);
                var currentActiveStep = jQuery(this).parents('.form-wizard').find('.form-wizard-steps .active');
                prev.parents('.wizard-fieldset').removeClass("show","400");
                prev.parents('.wizard-fieldset').prev('.wizard-fieldset').addClass("show","400");
                currentActiveStep.removeClass('active').prev().removeClass('activated').addClass('active',"400");
                jQuery(document).find('.wizard-fieldset').each(function(){
                    if(jQuery(this).hasClass('show')){
                        var formAtrr = jQuery(this).attr('data-tab-content');
                        jQuery(document).find('.form-wizard-steps .form-wizard-step-item').each(function(){
                            if(jQuery(this).attr('data-attr') == formAtrr){
                                jQuery(this).addClass('active');
                                var innerWidth = jQuery(this).innerWidth();
                                var position = jQuery(this).position();
                                jQuery(document).find('.form-wizard-step-move').css({"left": position.left, "width": innerWidth});
                            }else{
                                jQuery(this).removeClass('active');
                            }
                        });
                    }
                });
            });
            //click on form submit button
            jQuery(document).on("click",".form-wizard .form-wizard-submit" , function(){
                var parentFieldset = jQuery(this).parents('.wizard-fieldset');
                var currentActiveStep = jQuery(this).parents('.form-wizard').find('.form-wizard-steps .active');
                parentFieldset.find('.wizard-required').each(function() {
                    var thisValue = jQuery(this).val();
                    if( thisValue == "" ) {
                        jQuery(this).siblings(".wizard-form-error").slideDown();
                    }
                    else {
                        jQuery(this).siblings(".wizard-form-error").slideUp();
                    }
                });
            });
            // focus on input field check empty or not
            jQuery(".form-control").on('focus', function(){
                var tmpThis = jQuery(this).val();
                if(tmpThis == '' ) {
                    jQuery(this).parent().addClass("focus-input");
                }
                else if(tmpThis !='' ){
                    jQuery(this).parent().addClass("focus-input");
                }
            }).on('blur', function(){
                var tmpThis = jQuery(this).val();
                if(tmpThis == '' ) {
                    jQuery(this).parent().removeClass("focus-input");
                    jQuery(this).siblings('.wizard-form-error').slideDown("3000");
                }
                else if(tmpThis !='' ){
                    jQuery(this).parent().addClass("focus-input");
                    jQuery(this).siblings('.wizard-form-error').slideUp("3000");
                }
            });
        });

    </script>

    <script>
        $("#state").on('click , change',function () {
            var wahda = $(this).val();

            if (wahda != '') {
                $.get("{{ URL::to('/getVillage')}}" + '/' + wahda, function ($data) {
                    $('#village').html($data);
                });
            }
        });
        $("#city").on('click , change',function () {
            var wahda = $(this).val();

            if (wahda != '') {
                $.get("{{ URL::to('/getState')}}" + '/' + wahda, function ($data) {
                    $('#state').html($data);
                });
            }
        });

        $("#country").on('click , change',function () {
            var wahda = $(this).val();

            if (wahda != '') {
                $.get("{{ URL::to('/get-Cities')}}" + '/' + wahda, function ($data) {
                    $('#city').html($data);
                });
            }
        });
    </script>
    <script>
        $("#state2").on('click , change',function () {
            var wahda = $(this).val();

            if (wahda != '') {
                $.get("{{ URL::to('/getVillage')}}" + '/' + wahda, function ($data) {
                    $('#village2').html($data);
                });
            }
        });
        $("#city2").on('click , change',function () {
            var wahda = $(this).val();

            if (wahda != '') {
                $.get("{{ URL::to('/getState')}}" + '/' + wahda, function ($data) {
                    $('#state2').html($data);
                });
            }
        });

        $("#country2").on('click , change',function () {
            var wahda = $(this).val();

            if (wahda != '') {
                $.get("{{ URL::to('/get-Cities')}}" + '/' + wahda, function ($data) {
                    $('#city2').html($data);
                });
            }
        });
    </script>

    <?php
    $message = session()->get("messageSuccess");
    $messageError = session()->get("messageError");
    $pendingPayment = session()->get("PendingPayment");
    $SuccessPayment = session()->get("SuccessPayment");
    $RejectPayment = session()->get("RejectPayment");

    ?>
    @if( session()->has("RejectPayment"))
        <script>
            Swal.fire(
                'عفوا!',
                'فشل في عملية الدفع.',
                'error'
            )
        </script>

    @endif
    @if( session()->has("PendingPayment"))
        <script>
            Swal.fire(
                '!عفوا',
                'طلبك تحت الانتظار الرجاء تحويل المبلغ لاستكمال العملية.',
                'info'
            )
        </script>

    @endif
    @if( session()->has("SuccessPayment"))
        <script>
            Swal.fire(
                'تم العملية بنجاح',
                'تمت عملية الدفع بنجاح يمكنك الان تحميل السيرة الذاتية.',
                'success'
            )
        </script>

    @endif


@if( session()->has("messageSuccess"))
        <script>
            Swal.fire(
                'تم العملية بنجاح!',
                '{{$message}}.',
                'success'
            )
        </script>

    @endif
    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'عفوا !',
                text:  " {{implode(' - ',$errors->all())}} "
            })
        </script>

        <div class="alert alert-danger">
            <ul>
            </ul>
        </div>
    @endif

    @if( session()->has("messageError"))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'عفوا !',
                text: '{{$messageError}}',
            })
        </script>

    @endif
    <script>
        $('.navbar-toggler').on('click',function () {
            $("#navbarSupportedContent").toggleClass("display-block");

        })
    </script>

    <script>
        $("#experience_category_id").on('click , change',function () {
            var wahda = $(this).val();

            if (wahda != '') {
                $.get("{{ URL::to('/get-specialization')}}" + '/' + wahda, function ($data) {
                    $('#specialization_id').html($data);
                });
            }
        });

    </script>
    <script>
        $(document).ready(function () {
            $("#birth_date").change(function () {
                var identity = $('#id_number').val();
                var bithdayDay = identity.substr(5, 2);
                var bithdayMonth = identity.substr(3, 2);
                var bithdayYear = identity.substr(1, 2);
                var centery = identity.substr(0, 1);

                var date = new Date($('#birth_date').val());
                var day = date.getDate();
                var month = date.getMonth() + 1;
                var fullYear = date.getFullYear();
                year = fullYear.toString().substr(2, 2);

                if (bithdayDay != day || bithdayMonth != month || bithdayYear != year) {
                    alert('تاريخ الميلاد غير صحيح من فضلك تاكد مره اخري')
                    document.getElementById("birth_date").valueAsDate = null;
                } else {
                    if (fullYear < 2000) {
                        if (centery != 2) {
                            alert('رقم البطاقه غير صحيح')
                            document.getElementById("id_number").value = null;
                            document.getElementById("birth_date").valueAsDate = null;
                        }
                    } else if (fullYear > 2000) {
                        if (centery != 3) {
                            alert('رقم البطاقه غير صحيح')
                            document.getElementById("id_number").value = null;
                            document.getElementById("birth_date").valueAsDate = null;
                        }
                    }
                }
            });
            /*
            $("#gender").change(function () {
                var gender = $('#gender').val();
                var identity = $('#identity').val();
                var genderCode = identity.substr(12, 1);
                alert(genderCode);
                if (genderCode % 2 == 0) {
                    if (gender != 'انثي') {
                        alert('رقم البطاقه غير صحيح')
                        document.getElementById("identity").value = null;
                        document.getElementById("date_of_birth").valueAsDate = null;
                    }
                } else {
                    if (gender != 'ذكر') {
                        alert('رقم البطاقه غير صحيح')
                        document.getElementById("identity").value = null;
                        document.getElementById("gender").value = null;
                        document.getElementById("date_of_birth").valueAsDate = null;
                    }
                }
            })
            */
            $("#city").change(function () {
                var identity = $('#id_number').val();
                var govCode = identity.substr(7, 2);
                var gov = $('#city').val();
                $.ajax({
                    url: '{{ url('get-CitiesForIdValidation') }}' + '/' + gov,
                    dataType: 'json',
                    type: 'GET',
                    cache: false,
                    async: true,
                    success: function (data) {
                        if (data.name == 'القاهرة') {
                            if (govCode != '01') {
                                alert('محافظه الميلاد خطآ')
                                document.getElementById("city").value = null;
                                document.getElementById("state").value = null;
                            }
                        } else if (data.name == 'الأسكندرية') {
                            if (govCode != '02') {
                                alert('محافظه الميلاد خطآ')
                                document.getElementById("city").value = null;
                                                document.getElementById("state").value = null;
                            }
                        } else if (data.name == 'بورسعيد') {
                            if (govCode != '03') {
                                alert('محافظه الميلاد خطآ')
                                document.getElementById("city").value = null;
                                document.getElementById("state").value = null;
                            }
                        } else if (data.name == 'السويس') {
                            if (govCode != '04') {
                                alert('محافظه الميلاد خطآ')
                                document.getElementById("city").value = null;
                                document.getElementById("state").value = null;
                            }
                        } else if (data.name == 'دمياط') {
                            if (govCode != '11') {
                                alert('محافظه الميلاد خطآ')
                                document.getElementById("city").value = null;
                                document.getElementById("state").value = null;
                            }
                        } else if (data.name == 'الدقهلية') {
                            if (govCode != '12') {
                                alert('محافظه الميلاد خطآ')
                                document.getElementById("city").value = null;
                                document.getElementById("state").value = null;
                            }
                        } else if (data.name == 'الشرقية') {
                            if (govCode != '13') {
                                alert('محافظه الميلاد خطآ')
                                document.getElementById("city").value = null;
                                document.getElementById("state").value = null;
                            }
                        } else if (data.name == 'القليوبية') {
                            if (govCode != '14') {
                                alert('محافظه الميلاد خطآ')
                                document.getElementById("city").value = null;
                                document.getElementById("state").value = null;
                            }
                        } else if (data.name == 'كفر الشيخ') {
                            if (govCode != '15') {
                                alert('محافظه الميلاد خطآ')
                                document.getElementById("city").value = null;
                                document.getElementById("state").value = null;
                            }
                        } else if (data.name == 'الغربية') {
                            if (govCode != '16') {
                                alert('محافظه الميلاد خطآ')
                                document.getElementById("city").value = null;
                                document.getElementById("state").value = null;
                            }
                        } else if (data.name == 'المنوفية') {
                            if (govCode != '17') {
                                alert('محافظه الميلاد خطآ')
                                document.getElementById("city").value = null;
                                document.getElementById("state").value = null;
                            }
                        } else if (data.name == 'البحيرة') {
                            if (govCode != '18') {
                                alert('محافظه الميلاد خطآ')
                                document.getElementById("city").value = null;
                                document.getElementById("state").value = null;
                            }
                        } else if (data.name == 'الإسماعلية') {
                            if (govCode != '19') {
                                alert('محافظه الميلاد خطآ')
                                document.getElementById("city").value = null;
                                document.getElementById("state").value = null;
                            }
                        } else if (data.name == 'الجيزة') {
                            if (govCode != '21') {
                                alert('محافظه الميلاد خطآ')
                                document.getElementById("city").value = null;
                                document.getElementById("state").value = null;
                            }
                        } else if (data.name == 'بني سويف') {
                            if (govCode != '22') {
                                alert('محافظه الميلاد خطآ')
                                document.getElementById("city").value = null;
                                document.getElementById("state").value = null;
                            }
                        } else if (data.name == 'الفيوم') {
                            if (govCode != '23') {
                                alert('محافظه الميلاد خطآ')
                                document.getElementById("city").value = null;
                                document.getElementById("state").value = null;
                            }
                        } else if (data.name == 'المنيا') {
                            if (govCode != '24') {
                                alert('محافظه الميلاد خطآ')
                                document.getElementById("city").value = null;
                                document.getElementById("state").value = null;
                            }
                        } else if (data.name == 'اسيوط') {
                            if (govCode != '25') {
                                alert('محافظه الميلاد خطآ')
                                document.getElementById("city").value = null;
                                document.getElementById("state").value = null;
                            }
                        } else if (data.name == 'سوهاج') {
                            if (govCode != '26') {
                                alert('محافظه الميلاد خطآ')
                                document.getElementById("city").value = null;
                                document.getElementById("state").value = null;
                            }
                        } else if (data.name == 'قنا') {
                            if (govCode != '27') {
                                alert('محافظه الميلاد خطآ')
                                document.getElementById("city").value = null;
                                document.getElementById("state").value = null;
                            }
                        } else if (data.name == 'اسوان') {
                            if (govCode != '28') {
                                alert('محافظه الميلاد خطآ')
                                document.getElementById("city").value = null;
                                document.getElementById("state").value = null;
                            }
                        } else if (data.name == 'الأقصر') {
                            if (govCode != '29') {
                                alert('محافظه الميلاد خطآ')
                                document.getElementById("city").value = null;
                                document.getElementById("state").value = null;
                            }
                        } else if (data.name == 'البحر الأحمر') {
                            if (govCode != '31') {
                                alert('محافظه الميلاد خطآ')
                                document.getElementById("city").value = null;
                                document.getElementById("state").value = null;
                            }
                        } else if (data.name == 'الوادي الجديد') {
                            if (govCode != '32') {
                                alert('محافظه الميلاد خطآ')
                                document.getElementById("city").value = null;
                                document.getElementById("state").value = null;
                            }
                        } else if (data.name == 'مطروح') {
                            if (govCode != '33') {
                                alert('محافظه الميلاد خطآ')
                                document.getElementById("city").value = null;
                                document.getElementById("state").value = null;
                            }
                        } else if (data.name == 'شمال سيناء') {
                            if (govCode != '34') {
                                alert('محافظه الميلاد خطآ')
                                document.getElementById("city").value = null;
                                document.getElementById("state").value = null;
                            }
                        } else if (data.name == 'جنوب سيناء') {
                            if (govCode != '35') {
                                alert('محافظه الميلاد خطآ')
                                document.getElementById("city").value = null;
                                document.getElementById("state").value = null;
                            }
                        }
                    },
                    error: function (jqXhr, textStatus, errorThrown) {
                        console.log(errorThrown);
                        alert(errorThrown);
                    }
                })
            })
            $("#type").change(function () {
                var value = $('#type').val();
                var identity = $('#id_number').val();
                var key = identity.substr(12, 1);
                if(key % 2 == 0 ){

                    $key1 = 1;

                }else{
                    $key1 = 2;

                }
                if( value % 2 == 0){
                    $value2 =1;
                }else {
                    $value2 =2;

                }
                if($key1 == $value2){

                }else{
                    alert ("النوع غير صحيح ");

                }


            })


        })




    </script>

</body>

</html>
