<div class="dt-buttons flex-wrap">

    <!--end::Filter-->
    <!--begin::Add user-->
    <button type="button" class="btn btn-light-primary me-3" data-bs-toggle="modal"
            data-bs-target="#kt_modal_add_user">
        <i class="bi bi-plus-circle-fill fs-2x"></i>
    </button>

    <!--end::Add user-->
    <button id="delete" class="btn btn-light-danger me-3 font-weight-bolder">
        <i class="bi bi-trash-fill fs-2x"></i>
    </button>

    <!--begin::Modal - Add task-->
    <div class="modal fade" id="kt_modal_add_user" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header" id="kt_modal_add_user_header">
                    <!--begin::Modal title-->
                    <h2 class="fw-bolder">اضافة جديده</h2>
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
                    <form id="" class="form" enctype="multipart/form-data" method="post" action="{{url('store-JobRequests')}}">
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
                                <label class="required fw-bold fs-6 mb-2">نوع المتقدم</label>
                                <select name="type" id="type" class="form-control">
                                    <option value="1">موظف داخل النظام  </option>
                                    <option value="2">موظف خارجي  </option>
                                </select>
                                <!--end::Label-->
                                <!--begin::Input-->

                                <!--end::Input-->
                            </div>
                            <div class="fv-row mb-7" id="users" style="display: block">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">اسم الموظف</label>
                                <select name="user_id" id="container" class="  form-select form-select-lg form-select-solid" data-control="select2">
                                    @foreach(\App\Models\User::where('is_active','active')->get() as $User)
                                        <option value="{{$User->id}}">{{$User->name}}</option>
                                    @endforeach
                                </select>
                                <!--end::Label-->
                            </div>
                            <div id="info" style="display: none">
                                <div class="fv-row mb-7" id="name" >
                                    <!--begin::Label-->
                                    <label class="required fw-bold fs-6 mb-2">اسم الموظف</label>
                                    <input name="user_name" class="form-control ">
                                    <!--end::Label-->
                                </div>
                                <div class="fv-row mb-7" >
                                    <!--begin::Label-->
                                    <label class="required fw-bold fs-6 mb-2">رقم الموظف</label>
                                    <input name="user_phone" class="form-control ">
                                    <!--end::Label-->
                                </div>


                                <div class="fv-row mb-7" >
                                    <!--begin::Label-->
                                    <label class="required fw-bold fs-6 mb-2">العمر</label>
                                    <input name="user_age" type="number" class="form-control ">
                                    <!--end::Label-->
                                </div>
                                <div class="form-group fv-row mb-7">
                                    <label>  الدولة </label>
                                    <select class="form-control wizard-required" id="country3" name="country_id">
                                        @inject('Countries','App\Models\Country')
                                        @foreach($Countries->where('is_active','active')->get() as $Country)
                                            <option value="{{$Country->id}}">{{$Country->name}} </option>
                                        @endforeach
                                    </select>
                                    <div class="wizard-form-error"></div>

                                </div>
                                @inject('City','App\Models\City')
                                <div class="form-group fv-row mb-7">
                                    <label>  المحافظة</label>
                                    <select class="form-control wizard-required" id="city3" name="city_id">

                                    </select>

                                </div>

                                <div class="form-group fv-row mb-7">
                                        <label for="state" >المركز *</label>
                                        <select class="form-control wizard-required" id="state2" name="state_id">
                                        </select>

                                </div>
                                <div class="form-group fv-row mb-7">
                                        <label for="state" >القرية او الحي *</label>
                                        <select class="form-control wizard-required" id="village2" name="village_id">
                                        </select>

                                </div>
                                <div class="fv-row mb-7" >
                                    <!--begin::Label-->
                                    <label class="required fw-bold fs-6 mb-2">cv (pdf)</label>
                                    <input name="cv" type="file" class="form-control ">
                                    <!--end::Label-->
                                </div>
                                <div class="fv-row mb-7"  >
                                    <!--begin::Label-->
                                    <label class="required fw-bold fs-6 mb-2">وصف الموظف</label>
                                    <textarea name="user_description" rows="5" class="form-control "></textarea>
                                    <!--end::Label-->
                                </div>
                                <!--end::Input group-->
                            </div>

                        </div>
                        <input type="hidden" name="job_id" value="{{$id}}">
                        <!--end::Scroll-->
                        <!--begin::Actions-->
                        <div class="text-center pt-15">
                            <button type="reset" class="btn btn-light me-3"
                                    data-bs-dismiss="modal">ألغاء
                            </button>
                            <button type="submit" class="btn btn-primary"
                                    data-kt-users-modal-action="submit">
                                <span class="indicator-label">حفظ</span>
                                <span class="indicator-progress">برجاء الانتظار
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
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
    <!--end::Modal - Add task-->
</div>

<script type="text/javascript">
    $('#type').on('click , change',function () {
        if($(this).val() == 1){
            document.getElementById("info").style.display = "none";
            document.getElementById("users").style.display = "block";

        }else{
            document.getElementById("users").style.display = "none";
            document.getElementById("info").style.display = "block";

        }
    })
    $("#delete").on("click", function () {
        var dataList = [];
        $("input:checkbox:checked").each(function (index) {
            dataList.push($(this).val())
        })

        if (dataList.length > 0) {
            Swal.fire({
                title: "تحذير.هل انت متأكد؟!",
                text: "",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#f64e60",
                confirmButtonText: "نعم",
                cancelButtonText: "لا",
                closeOnConfirm: false,
                closeOnCancel: false
            }).then(function (result) {
                if (result.value) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        url: '{{url("delete-JobRequests")}}',
                        type: "get",
                        data: {'id': dataList, _token: CSRF_TOKEN},
                        dataType: "JSON",
                        success: function (data) {
                            if (data.message == "Success") {
                                $("input:checkbox:checked").parents("tr").remove();
                                Swal.fire("نجاح", "تم الحذف بنجاح", "success");
                                // location.reload();
                            } else {
                                Swal.fire("نأسف", "حدث خطأ ما اثناء الحذف", "error");
                            }
                        },
                        fail: function (xhrerrorThrown) {
                            Swal.fire("نأسف", "حدث خطأ ما اثناء الحذف", "error");
                        }
                    });
                    // result.dismiss can be 'cancel', 'overlay',
                    // 'close', and 'timer'
                } else if (result.dismiss === 'cancel') {
                    Swal.fire("ألغاء", "تم الالغاء", "error");
                }
            });
        }
    });

</script>
<script>

    // $('.dropify').dropify();

    $("#country3").on('click , change',function () {
        var wahda = $(this).val();

        if (wahda != '') {
            $.get("{{ URL::to('/get-Cities')}}" + '/' + wahda, function ($data) {
                $('#city3').html($data);
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
    $("#city3").on('click , change',function () {
        var wahda = $(this).val();

        if (wahda != '') {
            $.get("{{ URL::to('/getState')}}" + '/' + wahda, function ($data) {
                $('#state2').html($data);
            });
        }
    });
    </script>
<script>
    $('#container').select2({
        dropdownParent: $('.modal-body'),
        placeholder:'اختر ...'
    })
                </script>
