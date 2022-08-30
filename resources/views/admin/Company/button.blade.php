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
                    <form id="" class="form" method="post" action="{{url('store-Companies')}}">
                    @csrf
                    <!--begin::Scroll-->
                        <div class="d-flex flex-column scroll-y me-n7 pe-7"
                             id="kt_modal_add_user_scroll" data-kt-scroll="true"
                             data-kt-scroll-activate="{default: false, lg: true}"
                             data-kt-scroll-max-height="auto"
                             data-kt-scroll-dependencies="#kt_modal_add_user_header"
                             data-kt-scroll-wrappers="#kt_modal_add_user_scroll"
                             data-kt-scroll-offset="300px">

                                <div class="form-group fv-row mb-7">
                                    <label  for="fname">الاسم الاول *<br> </label>
                                    <input type="text" class="form-control  wizard-required" name="first_name" id="first_name">
                                    <div class="wizard-form-error"></div>
                                </div>
                                <div class="form-group fv-row mb-7">
                                    <label  for="last_name">الاسم الثاني   *</label>
                                    <input type="text" class="form-control wizard-required " name="last_name" id="id_number">
                                    <div class="wizard-form-error"></div>
                                </div>
                                <div class="form-group fv-row mb-7">
                                    <label  for="company_name">اسم الشركة   *</label>
                                    <input type="text" class="form-control wizard-required " name="company_name" id="company_name">
                                    <div class="wizard-form-error"></div>
                                </div>
                                <div class="form-group fv-row mb-7">
                                    <label  for="email">البريد الالكتروني *</label>
                                    <input type="email" class="form-control wizard-required" id="email" name="email">
                                    <div class="wizard-form-error"></div>
                                </div>
                                <div class="form-group fv-row mb-7">
                                    <label  for="birth_date">تاريخ الميلاد *</label>
                                    <input type="date" class="form-control wizard-required" id="birth_date" name="birth_date">
                                    <div class="wizard-form-error"></div>
                                </div>
                                <div class="form-group fv-row mb-7">
                                    <label  for="birth_date">نوع الشركة *</label>
                                    <select name="type" class="form-control wizard-required" >
                                        <option value="private">شركة خاصة</option>
                                        <option value="employment">شركة توظيف</option>
                                    </select>
                                    <div class="wizard-form-error"></div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group fv-row mb-7">
                                            <label for="country" >الدولة *</label>
                                            <select class="form-control wizard-required" id="country2" name="country_id">
                                                @inject('Countries','App\Models\Country')
                                                @foreach($Countries->where('is_active','active')->get() as $Country)
                                                    <option value="{{$Country->id}}">{{$Country->name}} </option>
                                                @endforeach
                                            </select>
                                            <div class="wizard-form-error"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class="form-group fv-row mb-7">
                                            <label for="country" >المحافظة *</label>
                                            <select class="form-control wizard-required" id="city2" name="city_id">
                                            </select>
                                            <div class="wizard-form-error"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group fv-row mb-7">
                                            <label for="state" >المركز *</label>
                                            <select class="form-control wizard-required" id="state2" name="state_id">
                                            </select>
                                            <div class="wizard-form-error"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group fv-row mb-7">
                                            <label for="state" >القرية او الحي *</label>
                                            <select class="form-control wizard-required" id="village2" name="village_id">
                                            </select>
                                            <div class="wizard-form-error"></div>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group fv-row mb-7">
                                    <label  for="phone">رقم الهاتف  *</label>
                                    <input type="number" class="form-control " id="phone" name="phone">
                                    <div class="wizard-form-error"></div>
                                </div>

                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group fv-row mb-7">
                                            <label for="type" >المجال  *</label>
                                            <select class="form-control" id="experience_category_id" name="experience_category_id">
                                                @foreach(\App\Models\ExperienceCategory::where('is_active','active')->get() as $data)
                                                    <option value="{{$data->id}}">{{$data->name}} </option>
                                                @endforeach
                                            </select>
                                            <div class="wizard-form-error"></div>
                                        </div>
                                    </div>

                                    {{--                                    <div class="col-md-6">--}}
                                    {{--                                        <div class="form-group">--}}
                                    {{--                                            <label for="how_register" >القائم على العمل  *</label>--}}
                                    {{--                                            <select class="form-control" name="how_register" id="how_register">--}}
                                    {{--                                                <option value="same">نفسه </option>--}}
                                    {{--                                                <option value="father">الاب </option>--}}
                                    {{--                                                <option value="mother"> الام </option>--}}
                                    {{--                                                <option value="brother">الاخ </option>--}}
                                    {{--                                                <option value="sister">الاخت </option>--}}
                                    {{--                                                <option value="friend">صديق </option>--}}
                                    {{--                                                <option value="near"> قريب </option>--}}
                                    {{--                                            </select>--}}
                                    {{--                                            <div class="wizard-form-error"></div>--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </div>--}}

                                </div>

                                <div class="form-group fv-row mb-7">
                                    <label  for="password">كلمة المرور  *</label>
                                    <input type="password" class="form-control " id="password" name="password">
                                    <div class="wizard-form-error"></div>
                                </div>

                                <div class="form-group fv-row mb-7">
                                    <label  for="confirmPaswword">تاكيد كلمة المرور  *</label>
                                    <input type="password" class="form-control" id="confirmPaswword" name="password_confirmation">
                                    <div class="wizard-form-error"></div>
                                </div>
                                <hr>




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

<script type="text/javascript">

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
                        url: '{{url("delete-Companies")}}',
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

