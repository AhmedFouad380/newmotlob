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
    <h1 class="d-flex text-dark fw-bolder my-1 fs-3">تعديل بيانات اكود النتائج</h1>
    <!--end::Title-->
    <!--begin::Breadcrumb-->
    <ul class="breadcrumb breadcrumb-dot fw-bold text-gray-600 fs-7 my-1">
        <!--begin::Item-->
        <li class="breadcrumb-item text-gray-600">
            <a href="{{ url('/') }}" class="text-gray-600 text-hover-primary">لوحة القيادة</a>
        </li>
        <!--end::Item-->
        <!--begin::Item-->
        <li class="breadcrumb-item text-gray-500">قائمة اكود النتائج</li>
        <li class="breadcrumb-item text-gray-500">تعديل بيانات اكود النتائج</li>
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
                        <h3 class="fw-bolder m-0">تعديل بيانات اكود النتائج</h3>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--begin::Card header-->
                <!--begin::Content-->
                <div id="kt_account_settings_profile_details" class="collapse show">
                    <!--begin::Form-->
                    <form id="kt_account_profile_details_form" enctype="multipart/form-data" action="{{url('update-ResultCode')}}" class="form"
                          method="post">
                    @csrf
                    <!--begin::Card body-->
                        <div class="card-body border-top p-9">


                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">الكود</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="code"
                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                       placeholder="الكود" value="{{$employee->code}}"  required/>
                                <input type="hidden" value="{{$employee->id}}" name="id">
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--end::Input group-->




                                <div class="d-flex flex-column fv-row mb-7 " id="questions" >
                                    <div class="row">
                                        <!--begin::Label-->
                                        <label> النتائج </label>
                                        <br>
                                        <div class="col-3">
                                            <button type="button" id="add-question"
                                                    class="btn btn-light-primary me-3">
                                                <i class="bi bi-plus-circle-fill fs-2x"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="row">
                                        @foreach($employee->SkillResult as $SkillResult)
                                        <div class="col-10">
                                            <textarea
                                                   name="text[]"
                                                   class="dates form-control col-6 form-control-solid mb-3 mb-lg-0"
                                                      required> {{$SkillResult->text}} </textarea>
                                        </div>
                                        <div class="col-2">
                                            <button type="button"
                                                    class="btn btn-light-danger me-3 delete_question">
                                                <i class="bi bi-trash-fill fs-2x fs-2x"></i>
                                            </button>
                                        </div>
                                            @endforeach
                                    </div>
                                    <!--end::Input-->
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.1.3/css/dropify.min.css" integrity="sha512-XS4z2x4/njM0ACHTf0QRI/mgWzv2/B4wxD/7JDoUeBvHDhdhFiE7Z3hzevia3pbyr16ufKB6/NUyQ/hBGEAMDw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.1.3/js/dropify.min.js" integrity="sha512-wxJL2RnxGAn2d92YTYdRLjrgIW5fAlhVnnq35EAU7Mmkg4v93cOiPxX/RpG1CCHpoSr6VNcx++6CgQ3B3FoD9Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.ckeditor.com/4.18.0/full-all/ckeditor.js"></script>

    <script>
        $('.dropify').dropify();
        CKEDITOR.replace( 'editor1' );
    </script>
    <script>
        $("#state").change(function () {
            var wahda = $(this).val();

            if (wahda != '') {
                $.get("{{ URL::to('/get-branch')}}" + '/' + wahda, function ($data) {
                    var outs = "";
                    $.each($data, function (title, id) {
                        console.log(title)
                        outs += '<option value="' + id + '">' + title + '</option>'
                    });
                    $('#branche').html(outs);
                });
            }
        });
    </script>

    <script>
        $("#add-question").on("click", function () {
            $("#questions").append('<div class="row">' +
                '                                            <div class="col-10">' +
                '                                                <textarea  name="text[]"' +
                '                                                       class="dates form-control col-6 form-control-solid mb-3 mb-lg-0"' +
                '                                                        required> </textarea>' +
                '                                            </div>' +
                '                                            <div class="col-2">' +
                '                                                     <button type="button"' +
                '                                                        class="btn btn-light-danger me-3 delete_question">' +
                '                                                    <i class="bi bi-trash-fill fs-2x fs-2x"></i>' +
                '                                                </button>' +
                '                                             </div>' +
                '                                        </div>');
        });

        $(document).on('click', '.delete_question', function () {
            $(this).parent().parent().remove();
        });
    </script>

@endsection


