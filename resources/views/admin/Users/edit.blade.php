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
    <h1 class="d-flex text-dark fw-bolder my-1 fs-3">تعديل بيانات عميل</h1>
    <!--end::Title-->
    <!--begin::Breadcrumb-->
    <ul class="breadcrumb breadcrumb-dot fw-bold text-gray-600 fs-7 my-1">
        <!--begin::Item-->
        <li class="breadcrumb-item text-gray-600">
            <a href="{{ url('/') }}" class="text-gray-600 text-hover-primary">لوحة القيادة</a>
        </li>
        <!--end::Item-->
        <!--begin::Item-->
        <li class="breadcrumb-item text-gray-500">قائمة العملاء</li>
        <li class="breadcrumb-item text-gray-500">تعديل بيانات عميل</li>
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
                        <h3 class="fw-bolder m-0">تعديل بيانات عميل</h3>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--begin::Card header-->
                <!--begin::Content-->
                <div id="kt_account_settings_profile_details" class="collapse show">
                    <!--begin::Form-->
                    <form id="kt_account_profile_details_form" action="{{url('update-client')}}" class="form"
                          method="post">
                    @csrf
                    <!--begin::Card body-->
                        <div class="card-body border-top p-9">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">اسم العميل</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="name"
                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                       placeholder="الاسم" value="{{$employee->name}}" required/>

                                <input type="hidden" name="id" value="{{$employee->id}}" required/>
                                <!--end::Input-->
                            </div>
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">رقم البطاقة</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="id_number"
                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                       placeholder="رقم البطاقة" value="{{$employee->id_number}}" required/>
                                <!--end::Input-->
                            </div>
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">تاريخ الميلاد</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="date" name="birth_date"
                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                       placeholder="تاريخ الميلاد" value="{{$employee->birth_date}}" required/>
                                <!--end::Input-->
                            </div>

                            <!--end::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">البريد الالكترونى</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="email" name="email"
                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                       placeholder="البريد الالكتروني" value="{{$employee->email}}"
                                       required/>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">رقم الهاتف</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="tel" name="phone"
                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                       placeholder="رقم الجوال" value="{{$employee->phone }}" required/>
                                <!--end::Input-->
                            </div>
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">كلمة المرور</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="password" name="password"
                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                       placeholder="كلمة المرور" value=""/>
                                <!--end::Input-->
                            </div>
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">تأكيد كلمة المرور</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="password" name="password_confirmation"
                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                       placeholder="تأكيد كلمة المرور" value=""/>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--end::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">النوع</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <select class="form-control" name="type">
                                    <option @if($employee->type == 'male) selected @endif  value="male" >ذكر</option>
                                    <option @if($employee->type == 'female) selected @endif value="female" >انثى</option>
                                </select>
                                <!--end::Input-->
                            </div>
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">القائم بعمليه التسجيل للباحث عن عمل</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <select class="form-control" name="how_register">
                                    <option  @if($employee->how_register == 'same) selected @endif value="same" >نفسه</option>
                                    <option  @if($employee->how_register == 'brother) selected @endif value="brother" >الاخ</option>
                                    <option  @if($employee->how_register == 'sister)  selected @endif value="sister" >الاخت</option>
                                    <option @if($employee->how_register == 'father)  selected @endif  value="father" >الاب</option>
                                    <option @if($employee->how_register == 'mother)  selected @endif  value="mother" >الام</option>
                                    <option @if($employee->how_register == 'friend)  selected @endif  value="friend" >صديق</option>
                                    <option @if($employee->how_register == 'near)  selected @endif  value="near" >قريب</option>
                                </select>
                                <!--end::Input-->
                            </div>

                            <!--end::Input group-->
                            <div class="fv-row mb-7">
                                <label for="exampleFormControlInput1"
                                       class="form-label">الدولة</label>
                                <select class="form-control form-control-solid mb-3 mb-lg-0"
                                        name="country_id" aria-label="" required id="country2">
                                    <option value="">اختر الدولة</option>
                                    @foreach(\App\Models\Country::all() as $state)
                                        <option @if($employee->country_id == $state->id) selected @endif
                                        value="{{$state->id}}">{{$state->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!--end::Input group-->

                            <div class="fv-row mb-7">
                                <label for="exampleFormControlInput1"
                                       class="form-label">المحاقظة</label>
                                <select class="form-control form-control-solid mb-3 mb-lg-0"
                                        name="city_id" aria-label="" required id="city2">
                                    <option value="">اختر المحاقظة</option>
                                    <option selected
                                            value="{{$employee->City->id}}">{{$employee->City->name}}</option>

                                </select>
                            </div>
                            <div class="fv-row mb-7">
                                <label for="exampleFormControlInput1"
                                       class="form-label">المنطقة</label>
                                <select class="form-control form-control-solid mb-3 mb-lg-0"
                                        name="state_id" aria-label="" required id="state2">
                                    <option value="">اختر المنظقة</option>
                                    <option selected
                                            value="{{$employee->State->id}}">{{$employee->State->name}}</option>

                                </select>
                            </div>

                            <!--end::Input group-->
                            <div class="fv-row mb-7">
                                <div
                                    class="form-check form-switch form-check-custom form-check-solid">
                                    <label class="form-check-label" for="flexSwitchDefault">مفعل
                                        ؟</label>
                                    <input class="form-check-input" name="is_active" type="hidden"
                                           value="0" id="flexSwitchDefault"/>
                                    <input class="form-check-input form-control form-control-solid mb-3 mb-lg-0"
                                           name="is_active" type="checkbox"
                                           value="1" id="flexSwitchDefault"
                                           @if($employee->is_active == 1) checked @endif />
                                </div>
                            </div>
                            <!--end::Input group-->


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

