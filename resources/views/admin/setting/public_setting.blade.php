@extends('admin.layouts.master')

@section('css')
@endsection

@section('style')
    <style>
        @media (min-width: 992px) {
            .aside-me .content {
                padding-right: 30px;
            }
        }
    </style>
@endsection

@section('breadcrumb')
    <h1 class="d-flex text-dark fw-bolder my-1 fs-3">الاعدادات</h1>
    <!--end::Title-->
    <!--begin::Breadcrumb-->
    <ul class="breadcrumb breadcrumb-dot fw-bold text-gray-600 fs-7 my-1">
        <!--begin::Item-->
        <li class="breadcrumb-item text-gray-600">
            <a href="{{ url('/') }}" class="text-gray-600 text-hover-primary">لوحة القيادة</a>
        </li>
        <!--end::Item-->
        <!--begin::Item-->
        <li class="breadcrumb-item text-gray-500">الاعدادات</li>
        <!--end::Item-->
    </ul>
    <!--end::Breadcrumb-->
@endsection

@section('content')
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <!--begin::Post-->

        <div class="content flex-row-fluid" id="kt_content">

            <!--begin::Basic info-->
            <div class="card mb-5 mb-xl-10">
                <!--begin::Card header-->
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                     data-bs-target="#kt_account_profile_details" aria-expanded="true"
                     aria-controls="kt_account_profile_details">
                    <!--begin::Card title-->
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0">الاعدادات العامة</h3>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--begin::Card header-->
                <!--begin::Content-->
                <div id="kt_account_settings_profile_details" class="collapse show">
                    <!--begin::Form-->
                    <form id="kt_account_profile_details_form" action="{{url('edit_setting')}}" class="form"
                          method="post" enctype="multipart/form-data">
                    @csrf
                    <!--begin::Card body-->
                        <div class="card-body border-top p-9">
                            <!--begin::Input group-->
{{--                            <div class="row mb-6">--}}
{{--                                <!--begin::Label-->--}}
{{--                                <label class="col-lg-4 col-form-label fw-bold fs-6">الشعار</label>--}}
{{--                                <!--end::Label-->--}}
{{--                                <!--begin::Col-->--}}
{{--                                <div class="col-lg-8">--}}
{{--                                    <!--begin::Image input-->--}}
{{--                                    <div class="image-input image-input-outline" data-kt-image-input="true"--}}
{{--                                         style="background-image: url({{ URL::asset('admin/assets/media/avatars/blank.png')}})">--}}
{{--                                        <!--begin::Preview existing avatar-->--}}
{{--                                        <div class="image-input-wrapper w-125px h-125px"--}}
{{--                                             style="background-image: url({{ $settings->logo}})"></div>--}}
{{--                                        <!--end::Preview existing avatar-->--}}
{{--                                        <!--begin::Label-->--}}
{{--                                        <label--}}
{{--                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"--}}
{{--                                            data-kt-image-input-action="change" data-bs-toggle="tooltip"--}}
{{--                                            title="Change avatar">--}}
{{--                                            <i class="bi bi-pencil-fill fs-7"></i>--}}
{{--                                            <!--begin::Inputs-->--}}
{{--                                            <input type="file" name="logo" accept=".png, .jpg, .jpeg"/>--}}
{{--                                            <input type="hidden" name="avatar_remove"/>--}}
{{--                                            <!--end::Inputs-->--}}
{{--                                        </label>--}}
{{--                                        <!--end::Label-->--}}
{{--                                        <!--begin::Cancel-->--}}
{{--                                        <span--}}
{{--                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"--}}
{{--                                            data-kt-image-input-action="cancel" data-bs-toggle="tooltip"--}}
{{--                                            title="Cancel avatar">--}}
{{--                                        <i class="bi bi-x fs-2"></i>--}}
{{--                                    </span>--}}
{{--                                        <!--end::Cancel-->--}}
{{--                                        <!--begin::Remove-->--}}
{{--                                        <span--}}
{{--                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"--}}
{{--                                            data-kt-image-input-action="remove" data-bs-toggle="tooltip"--}}
{{--                                            title="Remove avatar">--}}
{{--                                        <i class="bi bi-x fs-2"></i>--}}
{{--                                    </span>--}}
{{--                                        <!--end::Remove-->--}}
{{--                                    </div>--}}
{{--                                    <!--end::Image input-->--}}
{{--                                    <!--begin::Hint-->--}}
{{--                                    <div class="form-text">Allowed file types: png, jpg, jpeg.</div>--}}
{{--                                    <!--end::Hint-->--}}
{{--                                </div>--}}
{{--                                <!--end::Col-->--}}
{{--                            </div>--}}
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label  fw-bold fs-6">الاسم</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8">
                                    <!--begin::Row-->
                                    <div class="row">
                                        <!--begin::Col-->
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="name"
                                                   class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                                   placeholder="الاسم" value="{{$settings->name}}"/>
                                        </div>
                                        <!--end::Col-->

                                    </div>
                                    <!--end::Row-->
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
{{--                            <div class="row mb-6">--}}
{{--                                <!--begin::Label-->--}}
{{--                                <label class="col-lg-4 col-form-label  fw-bold fs-6">الوصف</label>--}}
{{--                                <!--end::Label-->--}}
{{--                                <!--begin::Col-->--}}
{{--                                <div class="col-lg-8 fv-row">--}}
{{--                                    <input type="text" name="description"--}}
{{--                                           class="form-control form-control-lg form-control-solid" placeholder="الوصف"--}}
{{--                                           value="{{$settings->description}}"/>--}}
{{--                                </div>--}}
{{--                                <!--end::Col-->--}}
{{--                            </div>--}}
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">رقم الجوال </label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <input type="number" name="phone"
                                           class="form-control form-control-lg form-control-solid"
                                           placeholder="رقم الجوال 1" value="{{$settings->phone}}"/>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">البريد الاليكترونى</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <input type="email" name="email"
                                           class="form-control form-control-lg form-control-solid"
                                           placeholder="البريد الاليكترونى1 " value="{{$settings->email}}"/>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">تويتر</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="twitter"
                                           class="form-control form-control-lg form-control-solid" placeholder="تويتر "
                                           value="{{$settings->twitter}}"/>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">انستجرام</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="instagram"
                                           class="form-control form-control-lg form-control-solid"
                                           placeholder="انستجرام " value="{{$settings->instgram}}"/>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">يوتيوب</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="youtube"
                                           class="form-control form-control-lg form-control-solid"
                                           placeholder="youtube " value="{{$settings->youtube}}"/>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">فيس بوك</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="facebook"
                                           class="form-control form-control-lg form-control-solid"
                                           placeholder="فيس بوك " value="{{$settings->facebook}}"/>
                                </div>
                                <!--end::Col-->
                            </div>

{{--                            <div class="row mb-6">--}}
{{--                                <!--begin::Label-->--}}
{{--                                <label class="col-lg-4 col-form-label fw-bold fs-6">meta keywords</label>--}}
{{--                                <!--end::Label-->--}}
{{--                                <!--begin::Col-->--}}
{{--                                <div class="col-lg-8 fv-row">--}}
{{--                                    <textarea type="text" name="meta_keywords"--}}
{{--                                           class="form-control form-control-lg form-control-solid"--}}
{{--                                              placeholder="meta_keywords " value="">{{$settings->meta_keywords}}</textarea>--}}
{{--                                </div>--}}
{{--                                <!--end::Col-->--}}
{{--                            </div>--}}
{{--                            <div class="row mb-6">--}}
{{--                                <!--begin::Label-->--}}
{{--                                <label class="col-lg-4 col-form-label fw-bold fs-6">meta description</label>--}}
{{--                                <!--end::Label-->--}}
{{--                                <!--begin::Col-->--}}
{{--                                <div class="col-lg-8 fv-row">--}}
{{--                                    <textarea type="text" name="meta_description"--}}
{{--                                           class="form-control form-control-lg form-control-solid"--}}
{{--                                           placeholder="meta_description " value="">{{$settings->meta_description}}</textarea>--}}
{{--                                </div>--}}
{{--                                <!--end::Col-->--}}
{{--                            </div>--}}

                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">وصف باقة الشركات الخاصة</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <textarea type="text" name="private_descripition"
                                              class="form-control form-control-lg form-control-solid"
                                              id="editor1" value="">{{$settings->private_descripition}}</textarea>
                                </div>
                                <!--end::Col-->
                            </div>
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">وصف باقة الشركات التوظيف</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <textarea type="text" name="employment_description" id="editor"
                                              class="form-control form-control-lg form-control-solid"
                                              placeholder="meta_description " value="">{{$settings->employment_description	}}</textarea>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->

                        </div>
                        <!--end::Card body-->
                        <!--begin::Actions-->
                        <div class="card-footer d-flex justify-content-end py-6 px-9">
                            <button type="reset" class="btn btn-light btn-active-light-primary me-2">الغاء</button>
                            <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">حفظ
                            </button>
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Basic info-->

        </div>
        <!--end::Post-->
    </div>
@endsection

@section('script')
    <script src="https://cdn.ckeditor.com/4.19.0/standard-all/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'editor1' );
        CKEDITOR.replace( 'editor' );

    </script>
    <?php
    $message = session()->get("message");
    ?>

    @if( session()->has("message"))
        <script>
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": true,
                "progressBar": true,
                "positionClass": "toast-bottom-right",
                "preventDuplicates": false,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };

            toastr.success("نجاح", "{{$message}}");
        </script>

    @endif

@endsection

