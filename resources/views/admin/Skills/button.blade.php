<div class="dt-buttons flex-wrap" xmlns="http://www.w3.org/1999/html">

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
                    <form id="" class="form" enctype="multipart/form-data" method="post" action="{{url('store-Skills')}}">
                    @csrf
                    <!--begin::Scroll-->
                        <div class="d-flex flex-column scroll-y me-n7 pe-7"
                             id="kt_modal_add_user_scroll" data-kt-scroll="true"
                             data-kt-scroll-activate="{default: false, lg: true}"
                             data-kt-scroll-max-height="auto"
                             data-kt-scroll-dependencies="#kt_modal_add_user_header"
                             data-kt-scroll-wrappers="#kt_modal_add_user_scroll"
                             data-kt-scroll-offset="300px">

                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">السؤال</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="question"
                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                       placeholder=""  required/>

                                <!--end::Input-->
                            </div>
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">الترتيب</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="number" name="sort"
                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                       placeholder=""  required/>

                                <!--end::Input-->
                            </div>

                            <div class="fv-row mb-7">
                                <div
                                    class="form-check form-switch form-check-custom form-check-solid">
                                    <label class="form-check-label" for="flexSwitchDefault">مفعل
                                        ؟</label>
                                    <input class="form-check-input" name="is_active" type="hidden"
                                           value="inactive" id="flexSwitchDefault"/>
                                    <input class="form-check-input form-control form-control-solid mb-3 mb-lg-0"
                                           name="is_active" type="checkbox"
                                           value="active" id="flexSwitchDefault"
                                    />
                                </div>
                            </div>
                            <div class="d-flex flex-column fv-row mb-7 " id="questions" style="display: none">
                                <div class="row">
                                    <!--begin::Label-->
                                    <label> الاجابات</label>
                                    <br>
                                    <div class="col-3">
                                        <button type="button" id="add-question"
                                                class="btn btn-light-primary me-3">
                                            <i class="bi bi-plus-circle-fill fs-2x"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-3">
                                        <select name="type[]" class="form-control">
                                            <option>E</option>
                                            <option>I</option>
                                            <option>S</option>
                                            <option>N</option>
                                            <option>T</option>
                                            <option>F</option>
                                            <option>J</option>
                                            <option>P</option>
                                        </select>
                                                                            </div>
                                    <div class="col-7">
                                        <textarea value="" type="text"
                                               name="descriptions[]"
                                                  rows="3"   class="dates  form-control col-6 form-control-solid mb-3 mb-lg-0"
                                                  placeholder="" required > </textarea>
                                    </div>
                                    <div class="col-2">
                                        <button type="button"
                                                class="btn btn-light-danger me-3 delete_question">
                                            <i class="bi bi-trash-fill fs-2x fs-2x"></i>
                                        </button>
                                    </div>
                                </div>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--end::Input group-->


                        </div>
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
<script>
    $('.dropify').dropify();
    CKEDITOR.replace( 'editor1' );
    </script>
<script type="text/javascript">
    $("#add-question").on("click", function () {
        $("#questions").append('<div class="row">' +

            '                                            <div class="col-3">' +
            '  <select name="type[]" class="form-control">\n' +
            '                                            <option>E</option>\n' +
            '                                            <option>I</option>\n' +
            '                                            <option>S</option>\n' +
            '                                            <option>N</option>\n' +
            '                                            <option>T</option>\n' +
            '                                            <option>F</option>\n' +
            '                                            <option>J</option>\n' +
            '                                            <option>P</option>\n' +
            '                                        </select>'+
            '                                             </div>' +

            '                                            <div class="col-7">' +
            '                                        <textarea value="" type="text"\n' +
            '                                               name="descriptions[]"\n' +
            '                                                  rows="3"   class="dates  form-control col-6 form-control-solid mb-3 mb-lg-0"\n' +
            '                                                  placeholder="" required > </textarea>'+
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
                        url: '{{url("delete-Skills")}}',
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

