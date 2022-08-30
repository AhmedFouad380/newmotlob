@extends('front.layout')
@section('title')
    الصفحة الشخصية
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css"
          integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
@endsection
@section('content')

    <!-- this is content of company -->
    <section class="container container-space">
        <div class="row">
            @include('front.Company.sidebar')
            <div class="col-md-10">
                <!-- row -->
                <div class="col-md-12">
                    <div class="company-header">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="company-image" style="background-image: url({{$data->image}})">
                                    {{--                                    @if(Auth::guard('company')->check() &&  Auth::guard('company')->user()->id == $data->id)--}}
                                    {{--                                    <div class="bottom-company">--}}
                                    {{--                                        <button type="button"  data-toggle="modal" data-target="#EditImage">--}}
                                    {{--                                            تعديل--}}
                                    {{--                                        </button>--}}
                                    {{--                                    </div>--}}
                                    {{--                                        @endif--}}
                                </div>
                            </div>

                            <div class="col-md-7 company-line">
                                <h5>{{$data->company_name}}</h5>
                                <p>
                                    <i class="fa fa-wrench" aria-hidden="true"></i>
                                    {{$data->ExperienceCategory->name}}
                                </p>
                                {{--                                <span class="gray-color">--}}
                                {{--                                                <i class="fa fa-cog" aria-hidden="true"></i>--}}
                                {{--                                                مجال الموار البشرية--}}
                                {{--                                            </span>--}}
                            </div>

                            <div class="col-md-3">
                                <a type="button" class="btn" data-toggle="modal" data-target="#EditInfo">
                                    تعديل
                                </a>
                                <div class="company-socail">
                                    <a href="{{$data->facebook}}" target="_blank"><i class="fa fa-facebook"
                                                                                     aria-hidden="true"></i> </a>
                                    <a href="{{$data->twitter}}" target="_blank"><i class="fa fa-twitter"
                                                                                    aria-hidden="true"></i> </a>
                                    <a href="{{$data->instagram}}" target="_blank"><i class="fa fa-instagram"
                                                                                      aria-hidden="true"></i> </a>
                                    <a href="{{$data->youtube}}" target="_blank"><i class="fa fa-youtube"
                                                                                    aria-hidden="true"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if($data->active_profile == 'inactive')
                    <div class="col-md-12">
                        <div class="alert">
                            <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                            تم إخفاء اسم الشركة بناءَ على رغبة صاحب العمل لرغبته في تلقي السير الذاتية على موقع مطلوب
                            للإطلاع عليها واختيار أفضل المتقدمين دون التردد على مقر الشركة
                            مما يسبب ضغط على إدارة الموارد البشرية أو الفروع ويعطل سير العمل اليومي بها
                        </div>
                    </div>
                @endif

                <div class="col-md-12">
                    <div class="info-head">
                        <div class="row">
                            <div class="col-md-8">
                                <h5>
                                    <i class="fa fa-headphones" aria-hidden="true"></i>
                                    معلومات التواصل</h5>
                            </div>
                            <div class="col-md-4">
                                <a class="btn blue" data-toggle="modal" data-target="#EditContact"> تعديل </a>
                            </div>
                        </div>
                    </div>
                    <div class="company-info">
                        <div class="row">
                            <div class="col-md-6">
                                <ul>
                                    <li class="blue">
                                        <label>
                                            <i class="fa fa-building-o" aria-hidden="true"></i>
                                            الشركة
                                        </label>
                                    </li>
                                    <li class="gray-color">
                                        <label>
                                            <i class="fa fa-phone" aria-hidden="true"></i>
                                            الهاتف
                                        </label>
                                        <span class="black">
                                                                  {{$data->phone}}
                                                              </span>

                                    </li>
                                    @if($data->other_phone)
                                        <li class="gray-color">
                                            <label>
                                                <i class="fa fa-phone" aria-hidden="true"></i>
                                                هاتف اخر
                                            </label>
                                            <span class="black">
                                                                  {{$data->other_phone}}
                                                              </span>

                                        </li>
                                    @endif
                                    <li class="gray-color">
                                        <label>
                                            <i class="fa fa-envelope" aria-hidden="true"></i>
                                            البريد
                                        </label>
                                        <span class="black">
                                                                  {{$data->email}}
                                                              </span>
                                    </li>
                                    @if($data->website)
                                        <li class="gray-color">
                                            <label>
                                                <i class="fa fa-globe" aria-hidden="true"></i>
                                                الموقع
                                            </label>
                                            <span class="black">
                                                                  {{$data->website}}
                                                                  </span>
                                        </li>
                                    @endif

                                    <li class="gray-color">
                                        <label>
                                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                                            العنوان
                                        </label>
                                        <span class="black">
                                                              {{$data->Country->name}} - {{$data->City->name}} - {{$data->State->name}}
                                                              </span>
                                    </li>


                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul>
                                    <li class="blue">
                                        <label>
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                            المدير
                                        </label>

                                    </li>
                                    <li class="gray-color">
                                        <label>
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                            الاسم الاول
                                        </label>
                                        <span class="black">
                                                              {{$data->first_name}}
                                                              </span>
                                    </li>
                                    <li class="gray-color">
                                        <label>
                                            <i class="fa fa-user" aria-hidden="true"></i>الاسم الثاني
                                        </label>
                                        <span class="black">
                                                              {{$data->last_name}}
                                                              </span>
                                    </li>
                                    <li class="gray-color">
                                        <label>
                                            <i class="fa fa-users" aria-hidden="true"></i>عدد المواظفيين
                                        </label>
                                        <span class="black">
                                                                  {{$data->employees_count}}
                                                              </span>
                                    </li>

                                </ul>

                            </div>


                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="info2-head">
                        <div class="row">
                            <div class="col-md-8 ">
                                <h5>
                                    <i class="fa fa-files-o" aria-hidden="true"></i>
                                    مستندات الشركة
                                </h5>
                            </div>
                            <div class="col-md-4">
                                <a class="btn blue" data-toggle="modal" data-target="#EditImage"> تعديل </a>
                            </div>
                        </div>
                    </div>
                    <div class="info2-head-data">
                        <div class="row row-margin">
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-7">
                                        <p class="gray-color"><i class="fa fa-id-card-o" aria-hidden="true"></i> رقم
                                            البطاقة الضريبية</p>
                                        <p class="gray-color"><i class="fa fa-qrcode" aria-hidden="true"></i> رقم السجل
                                            التجاري</p>

                                    </div>
                                    <div class="col-md-5 p-left">
                                        <p>{{$data->tax_card_number}}</p>
                                        <p>{{$data->commercial_registration_number}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 row-border">
                                <div class="row">
                                    <div class="col-md-7">
                                        <p class="gray-color"><i class="fa fa-file-text-o" aria-hidden="true"></i> السجل
                                            التجاري</p>
                                        <p class="gray-color"><i class="fa fa-file-archive-o" aria-hidden="true"></i>
                                            البطاقة الضريبية</p>
                                    </div>
                                    <div class="col-md-5 p-left">
                                        @if($data->tax_card_image)
                                            <a class="blue" href="{{$data->tax_card_image}}"> <i class="fa fa-download"
                                                                                                 aria-hidden="true"></i>
                                                تحميل</a>
                                        @else
                                            <a class="blue " style="color: red!important;"> <i
                                                    class="fa fa-exclamation-circle" aria-hidden="true"></i> لم يتم
                                                الرفع </a>
                                        @endif
                                        @if($data->commercial_registration_image)
                                            <a class="blue a" href="{{$data->commercial_registration_image}}"> <i
                                                    class="fa fa-download" aria-hidden="true"></i> تحميل</a>
                                        @else
                                            <a class="blue a" style="color: red!important;"> <i
                                                    class="fa fa-exclamation-circle" aria-hidden="true"></i> لم يتم
                                                الرفع</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @if(Auth::guard('company')->user()->company_type == 'employment')
                            <div class="col-lg-4 col-md-3">
                                <div class="row">
                                    <div class="col-md-7">
                                        <p class="gray-color"><i class="fa fa-folder-o" aria-hidden="true"></i> خطاب
                                            التحقق</p>
                                        <p class="gray-color"><i class="fa fa-file-o" aria-hidden="true"></i> اتفاقية
                                            التوظيف</p>
                                    </div>
                                    <div class="col-md-5 p-left">
                                        @if($data->verification_letter_image)
                                            <a class="blue" href="{{$data->verification_letter_image}}"> <i
                                                    class="fa fa-download" aria-hidden="true"></i> تحميل</a>
                                        @else
                                            <a class="blue " style="color: red!important;"> <i
                                                    class="fa fa-exclamation-circle" aria-hidden="true"></i> لم يتم
                                                الرفع </a>
                                        @endif
                                        @if($data->employment_agreement)
                                            <a class="blue a" href="{{$data->employment_agreement}}"> <i
                                                    class="fa fa-download" aria-hidden="true"></i> تحميل</a>
                                        @else
                                            <a class="blue a" style="color: red!important;"> <i
                                                    class="fa fa-exclamation-circle" aria-hidden="true"></i> لم يتم
                                                الرفع</a>
                                        @endif
                                    </div>
                                </div>

                            </div>
                                @endif

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <div class="modal fade" id="EditImage" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header" id="kt_modal_add_user_header">
                    <!--begin::Modal title-->
                    <h2 class="fw-bolder">التعديل</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-icon-primary"
                         data-bs-dismiss="modal">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                         viewBox="0 0 24 24" fill="none">
                        <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                              transform="rotate(-45 6 17.3137)" fill="black"/>
                        <rect x="7.41422" y="6" width="16" height="2" rx="1"
                              transform="rotate(45 7.41422 6)" fill="black"/>
                    </svg>
                </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>
                <!--end::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <!--begin::Form-->
                    <form id="" class="form" enctype="multipart/form-data" method="post"
                          action="{{url('UpdateCompany')}}">
                    @csrf
                    <!--begin::Scroll-->
                        <div class="d-flex flex-column scroll-y me-n7 pe-7"
                             id="kt_modal_add_user_scroll" data-kt-scroll="true"
                             data-kt-scroll-activate="{default: false, lg: true}"
                             data-kt-scroll-max-height="auto"
                             data-kt-scroll-dependencies="#kt_modal_add_user_header"
                             data-kt-scroll-wrappers="#kt_modal_add_user_scroll"
                             data-kt-scroll-offset="300px">

                            <div class="form-group">
                                <label for="phone"> رقم البطاقة الضريبية
                                    *</label>
                                <input type="number" class="form-control " id="phone" value="{{$data->tax_card_number}}"
                                       name="tax_card_number">
                                <div class="wizard-form-error"></div>
                            </div>

                            <div class="form-group">
                                <label for="commercial_registration_number"> رقم السجل التجاري
                                    *</label>
                                <input type="number" class="form-control " id="commercial_registration_number"
                                       value="{{$data->commercial_registration_number}}"
                                       name="commercial_registration_number">
                                <div class="wizard-form-error"></div>
                            </div>
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">صورة البطاقة الضريبية </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="file" class="dropify form-control"
                                       data-default-file="{{$data->tax_card_image}}" name="tax_card_image">
                                <input type="hidden" class="form-control" name="id" value="{{$data->id}}">

                                <!--end::Input-->
                            </div>
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">صورة السجل التجاري </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="file" class="dropify form-control"
                                       data-default-file="{{$data->commercial_registration_image}}"
                                       name="commercial_registration_image">

                                <!--end::Input-->
                            </div>


                            <!--end::Input group-->


                            <div class="fv-row mb-7">
                            </div>

                        </div>
                        <!--end::Scroll-->
                        <br><br>
                        <!--begin::Actions-->
                        <div class="text-center pt-15">
                            <button type="reset" class="btn btn-light me-3"
                                    data-bs-dismiss="modal">ألغاء
                            </button>
                            <button type="submit" class="btn btn-primary"
                                    data-kt-users-modal-action="submit">
                                <span class="indicator-label">حفظ</span>
                            </button>
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>
    <div class="modal fade" id="EditInfo" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header" id="kt_modal_add_user_header">
                    <!--begin::Modal title-->
                    <h2 class="fw-bolder">تعديل البيانات</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-icon-primary"
                         data-bs-dismiss="modal">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                         viewBox="0 0 24 24" fill="none">
                        <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                              transform="rotate(-45 6 17.3137)" fill="black"/>
                        <rect x="7.41422" y="6" width="16" height="2" rx="1"
                              transform="rotate(45 7.41422 6)" fill="black"/>
                    </svg>
                </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>
                <!--end::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <!--begin::Form-->
                    <form id="" class="form" enctype="multipart/form-data" method="post"
                          action="{{url('UpdateCompany')}}">
                    @csrf
                    <!--begin::Scroll-->
                        <div class="d-flex flex-column scroll-y me-n7 pe-7"
                             id="kt_modal_add_user_scroll" data-kt-scroll="true"
                             data-kt-scroll-activate="{default: false, lg: true}"
                             data-kt-scroll-max-height="auto"
                             data-kt-scroll-dependencies="#kt_modal_add_user_header"
                             data-kt-scroll-wrappers="#kt_modal_add_user_scroll"
                             data-kt-scroll-offset="300px">


                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">الصورة</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="file" class="dropify form-control" data-default-file="{{$data->image}}"
                                       name="image">
                                <input type="hidden" class="form-control" name="id" value="{{$data->id}}">

                                <!--end::Input-->
                            </div>

                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2"> اسم الشركة:</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" class="form-control" name="company_name"
                                       value="{{$data->company_name}}">
                                <input type="hidden" class="form-control" name="id" value="{{$data->id}}">

                                <!--end::Input-->
                            </div>
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2"> المجال:</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <select class="form-control" id="experience_category_id" name="experience_category_id">
                                    @foreach(\App\Models\ExperienceCategory::where('is_active','active')->get() as $b)
                                        <option value="{{$b->id}}">{{$b->name}} </option>
                                    @endforeach
                                </select>
                                <!--end::Input-->
                            </div>
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">facebook :</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" class="form-control" name="facebook" value="{{$data->facebook}}">

                                <!--end::Input-->
                            </div>
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">twitter :</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" class="form-control" name="twitter" value="{{$data->twitter}}">

                                <!--end::Input-->
                            </div>
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">instgram :</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" class="form-control" name="instagram" value="{{$data->instagram}}">

                                <!--end::Input-->
                            </div>
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">youtube : </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" class="form-control" name="youtube" value="{{$data->youtube}}">

                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->

                            <div class="fv-row mb-7">
                            </div>

                        </div>
                        <!--end::Scroll-->
                        <br><br>
                        <!--begin::Actions-->
                        <div class="text-center pt-15">
                            <button type="reset" class="btn btn-light me-3"
                                    data-bs-dismiss="modal">ألغاء
                            </button>
                            <button type="submit" class="btn btn-primary"
                                    data-kt-users-modal-action="submit">
                                <span class="indicator-label">حفظ</span>
                            </button>
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>
    <div class="modal fade" id="EditContact" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header" id="kt_modal_add_user_header">
                    <!--begin::Modal title-->
                    <h2 class="fw-bolder">تعديل البيانات</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-icon-primary"
                         data-bs-dismiss="modal">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                         viewBox="0 0 24 24" fill="none">
                        <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                              transform="rotate(-45 6 17.3137)" fill="black"/>
                        <rect x="7.41422" y="6" width="16" height="2" rx="1"
                              transform="rotate(45 7.41422 6)" fill="black"/>
                    </svg>
                </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>
                <!--end::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <!--begin::Form-->
                    <form id="" class="form" enctype="multipart/form-data" method="post"
                          action="{{url('UpdateCompany')}}">
                    @csrf
                    <!--begin::Scroll-->
                        <div class="d-flex flex-column scroll-y me-n7 pe-7"
                             id="kt_modal_add_user_scroll" data-kt-scroll="true"
                             data-kt-scroll-activate="{default: false, lg: true}"
                             data-kt-scroll-max-height="auto"
                             data-kt-scroll-dependencies="#kt_modal_add_user_header"
                             data-kt-scroll-wrappers="#kt_modal_add_user_scroll"
                             data-kt-scroll-offset="300px">


                            <div class="form-group">
                                <label for="fname">الاسم الاول *<br> </label>
                                <input type="text" class="form-control  wizard-required" value="{{$data->first_name}}"
                                       name="first_name" id="first_name">
                                <input type="hidden" class="form-control  wizard-required" value="{{$data->id}}"
                                       name="id" id="first_name">
                            </div>
                            <div class="form-group">
                                <label for="last_name">الاسم الثاني *</label>
                                <input type="text" class="form-control wizard-required " value="{{$data->last_name}}"
                                       name="last_name" id="id_number">
                            </div>

                            <div class="form-group">
                                <label for="email">البريد الالكتروني *</label>
                                <input type="email" class="form-control wizard-required" id="email"
                                       value="{{$data->email}}" name="email">
                                <div class="wizard-form-error"></div>
                            </div>

                            <div class="form-group">
                                <label for="phone">رقم الهاتف *</label>
                                <input type="number" class="form-control " id="phone" value="{{$data->phone}}"
                                       name="phone">
                                <div class="wizard-form-error"></div>
                            </div>

                            <div class="form-group">
                                <label for="other_phone">رقم الهاتف اخر *</label>
                                <input type="number" class="form-control " id="other_phone"
                                       value="{{$data->other_phone}}" name="other_phone">
                                <div class="wizard-form-error"></div>
                            </div>

                            <div class="form-group">
                                <label for="other_phone">الموقع *</label>
                                <input type="text" class="form-control " id="other_phone" value="{{$data->website}}"
                                       name="website">
                                <div class="wizard-form-error"></div>
                            </div>
                            <div class="form-group">
                                <label for="employees_count">عدد الموظفين *</label>
                                <select name="employees_count" class="form-control">
                                    <option> 1-10 موظف</option>
                                    <option> 11-50 موظف</option>
                                    <option> 51-100 موظف</option>
                                    <option> 101-500 موظف</option>
                                    <option> 501-1000 موظف</option>
                                    <option> اكثر من 1000 موظف</option>
                                </select>
                                <div class="wizard-form-error"></div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="country">الدولة *</label>
                                        <select class="form-control wizard-required" id="country2" name="country_id">
                                            @inject('Countries','App\Models\Country')
                                            @foreach($Countries->where('is_active','active')->get() as $Country)
                                                <option @if($data->country_id == $Country->id) selected
                                                        @endif value="{{$Country->id}}">{{$Country->name}} </option>
                                            @endforeach
                                        </select>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="country">المحافظة *</label>
                                        <select class="form-control wizard-required" id="city2" name="city_id">
                                            <option value="{{$data->city_id}}">{{$data->City->name}}</option>
                                        </select>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="state">المركز *</label>
                                        <select class="form-control wizard-required" id="state2" name="state_id">
                                            <option value="{{$data->state_id}}">{{$data->State->name}}</option>

                                        </select>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="state">القرية او الحي *</label>
                                        <select class="form-control wizard-required" id="village2" name="village_id">
                                            <option value="{{$data->village_id}}">{{$data->Village->name}}</option>
                                        </select>
                                        <div class="wizard-form-error"></div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Input group-->

                            <div class="fv-row mb-7">
                            </div>

                        </div>
                        <!--end::Scroll-->
                        <br><br>
                        <!--begin::Actions-->
                        <div class="text-center pt-15">
                            <button type="reset" class="btn btn-light me-3"
                                    data-bs-dismiss="modal">ألغاء
                            </button>
                            <button type="submit" class="btn btn-primary"
                                    data-kt-users-modal-action="submit">
                                <span class="indicator-label">حفظ</span>
                            </button>
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>

@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"
            integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>

        $('.dropify').dropify();
    </script>
@endsection
