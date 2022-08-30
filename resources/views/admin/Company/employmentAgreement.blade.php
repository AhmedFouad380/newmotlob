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
    <h1 class="d-flex text-dark fw-bolder my-1 fs-3">تعديل بيانات اتفاقية العمل </h1>
    <!--end::Title-->
    <!--begin::Breadcrumb-->
    <ul class="breadcrumb breadcrumb-dot fw-bold text-gray-600 fs-7 my-1">
        <!--begin::Item-->
        <li class="breadcrumb-item text-gray-600">
            <a href="{{ url('/') }}" class="text-gray-600 text-hover-primary">لوحة القيادة</a>
        </li>
        <!--end::Item-->
        <!--begin::Item-->
        <li class="breadcrumb-item text-gray-500">قائمة الشركات</li>
        <li class="breadcrumb-item text-gray-500">تعديل بيانات اتفاقية العمل</li>
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
                        <h3 class="fw-bolder m-0">تعديل بيانات اتفاقية العمل</h3>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--begin::Card header-->
                <!--begin::Content-->
                <div id="kt_account_settings_profile_details" class="collapse show">
                    <!--begin::Form-->
                    <form id="kt_account_profile_details_form" enctype="multipart/form-data" action="{{url('update-employmentAgreement')}}" class="form"
                          method="post">
                    @csrf
                    <!--begin::Card body-->
                        <div class="card-body border-top p-9">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">نوع العمالة</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <select name="employment_type" class="form-control">
                                    <option @if($employee->employment_type == 'daily')  selected @endif value="daily"> يومية</option>
                                    <option   @if($employee->employment_type == 'monthly')  selected @endif  value="monthly">شهريا</option>
                                </select>
                                <!--end::Input-->
                            </div>
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">اتفاقيه التوظيف</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <select name="employment_agreement_type" class="form-control">
                                    <option @if($employee->employment_agreement_type == 'postpaid')  selected @endif  value="postpaid">إتفاقية التوظيف مدفوعة
                                        القيمة مقدماُ
                                    </option>
                                </select>
                                <!--end::Input-->
                            </div>
                            <input type="hidden" name="id" value="{{$employee->id}}">
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">رسوم التوظيف</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <select name="recruitment_fee_postpaid_monthly" class="form-control">
                                    <option @if($employee->recruitment_fee_postpaid_monthly == 'percentage')  selected @endif value="percentage">نسبه شهري مسبقا</option>
                                    <option @if($employee->recruitment_fee_postpaid_monthly == 'fixed')  selected @endif  value="fixed">ثابته</option>
                                </select>
                                <!--end::Input-->
                            </div>

                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2"> النسبه او المبلغ </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="number" name="percentage_postpaid_monthly"
                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                       placeholder="0" value="{{$employee->percentage_postpaid_monthly}}" required/>
                                <!--end::Input-->
                            </div>

                            <!--end::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">اتفاقيه التوظيف</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="file" name="employment_agreement"
                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                       @if($employee->employment_agreement == null)
                                       required @endif />
                                <!--end::Input-->
                                @if($employee->employment_agreement != null)
                                    <br>

                                    <a class="btn-success btn " download target="_blank" href="{{$employee->employment_agreement}}">تحميل اتفاقية التوظيف</a>
                                    @endif
                            </div>
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">خطاب التحقيق</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="file" name="verification_letter_image"
                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                       @if($employee->verification_letter_image == null)
                                       required @endif />
                                <!--end::Input-->
                                @if($employee->verification_letter_image != null)
                                    <br>
                                    <a class="btn-success btn " download target="_blank" href="{{$employee->verification_letter_image}}">تحميل خطاب التحقيق</a>
                                @endif
                            </div>


                        </div>
                        <!--end::Scroll-->
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

    <script>

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



@endsection

