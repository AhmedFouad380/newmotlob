

@extends('front.layout')
@section('title')
    الوظائف
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .none{
            display:none!important;
        }
        .block{
            display: block!important;
        }
        .label-radio{
            align-items: center;
            padding: 20px;
            border: 0.5px solid #ccc;
            background: #fff;
            margin: 0 0 8px 8px;
            font-weight: 500;
            font-size: 14px;
            cursor: pointer;
            border-radius: 4px;
            height: 48px;
            min-width: 144px;
            color: #777;
            display: inline-flex;
        }
        .label-radio input{
            margin:10px
        }
    </style>
@endsection
@section('content')



    <!-- this is content of company -->
    <section class="container container-space">
        <div class="row cv-maker">
            <div class="col-md-2">
                <ul class="company-data">
                    <li class="list blue gray" id="list1"  data-value="step1">بيانات الوظيفة الاساسية</li>
                    <li class="list" id="list2" data-value="step2">متطلبات الوظيفة الاساسية</li>
                    <li class="list" id="list3"  >الراتب</li>
                    <li class="list" id="list4" >متطلبات اخري ( اختياري )</li>
                    <li class="list" id="list5" >مميزات الوظيفة ( اختياري ) </li>
                </ul>
            </div>
            <div class="col-md-8 cv-form">
                <form method="post" class="form-wizard" action="{{url('Store-Job')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="steps" id="step1">
                        <!-- row -->
                        <h5>اضافة وظيفة جديدة </h5>
                        <p>بيانات الوظيفة الاساسية  </p>
                        @csrf

                        <div class="row">

                            <div class="form-group col-md-4">
                                <label>   اسم الوظيفة  </label>
                                <input type="text" required class="form-control wizard-required" value="" name="title" placeholder="">
                                <div class="wizard-form-error">
                                    <div style="font-size: 13px">هذا الحقل مطلوب</div>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label> المجال  </label>
                                <select class="form-control wizard-required" name="experience_category_id" id="experience_category_id">
                                    @foreach(\App\Models\ExperienceCategory::where('is_active','active')->get() as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                <div class="wizard-form-error">
                                    <div style="font-size: 13px">هذا الحقل مطلوب</div>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label> التخصص  </label>
                                <select class="form-control wizard-required" id="specialization_id" name="specialization_id">
                                </select>
                                <div class="wizard-form-error">
                                    <div style="font-size: 13px">هذا الحقل مطلوب</div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>  الدولة </label>
                                <select class="form-control wizard-required" id="country3" name="country_id">
                                    @inject('Countries','App\Models\Country')
                                    @foreach($Countries->where('is_active','active')->get() as $Country)
                                        <option value="{{$Country->id}}">{{$Country->name}} </option>
                                    @endforeach
                                </select>
                                <div class="wizard-form-error">
                                    <div style="font-size: 13px">هذا الحقل مطلوب</div>
                                </div>
                            </div>
                            @inject('City','App\Models\City')
                            <div class="form-group col-md-4">
                                <label>  المدينة</label>
                                <select class="form-control wizard-required" id="city3" name="city_id">

                                </select>
                                <div class="wizard-form-error">
                                    <div style="font-size: 13px">هذا الحقل مطلوب</div>
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label>  المنطقة</label>
                                <select class="form-control wizard-required" id="state" name="state_id">

                                </select>
                                <div class="wizard-form-error">
                                    <div style="font-size: 13px">هذا الحقل مطلوب</div>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label>  القرية </label>
                                <select class="form-control wizard-required" id="village" name="village_id">

                                </select>
                                <div class="wizard-form-error">
                                    <div style="font-size: 13px">هذا الحقل مطلوب</div>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label>  عدد الموظفيين المطلوبية</label>
                                <input type="number" required class="form-control wizard-required"  name="employees_count" placeholder="">
                                <div class="wizard-form-error">
                                    <div style="font-size: 13px">هذا الحقل مطلوب</div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label>نوع الوظيفه : </label>
                            @foreach(\App\Models\JobType::where('is_active','active')->get() as $JobType)
                                <div class="form-group col-md-2">
                                    <label class="label-radio" >
                                        <input type="radio"  name="job_type_id" class="wizard-required" value="{{$JobType->id}}">
                                        {{$JobType->name}}
                                    </label>
                                    <div class="wizard-form-error"></div>

                                </div>
                            @endforeach

                        </div>
                        <div class="row">
                            <br>
                            <label>مواعيد العمل  : </label>
                            <div class="form-group col-md-2">
                                <label class="label-radio">
                                    <input type="radio"  name="job_time"  class="wizard-required" value="morning" placeholder="">
                                    صباحية فقط
                                </label>
                                <div class="wizard-form-error"></div>

                            </div>
                            <div class="form-group col-md-2">

                                <label class="label-radio">
                                    <input type="radio"  name="job_time" class="wizard-required" value="evening" placeholder="">
                                    مسائية فقط
                                </label>
                                <div class="wizard-form-error"></div>

                            </div>
                            <div class="form-group col-md-2">
                                <label class="label-radio">
                                    <input type="radio"  name="job_time"   class="wizard-required" value="both" placeholder="">
                                    صباحية ومسائية
                                </label>
                                <div class="wizard-form-error"></div>

                            </div>


                        </div>
                        <br>

                        <div class="row">
                            <div class="form-group col-md-8">
                                <label>تفاصيل الوظيفة  :</label>
                                <textarea rows="5"  name="description"  clas id="editor1" class=" wizard-required form-control "></textarea>
                            </div>
                            <div class="wizard-form-error">
                                <div style="font-size: 13px">هذا الحقل مطلوب</div>
                            </div>
                        </div>
                        <hr>
                        <button class="btn btn-primary next pull-left"  type="button" data-num="2">التالي</button>
                    </div>
                    <div class="steps" style="display: none" id="step2">
                        <!-- row -->
                        <h5>اضافة وظيفة جديدة </h5>
                        <p>متطلبات الوظيفة الاساسية
                        </p>
                        @csrf

                        <div class="row">

                            <div class="form-group col-md-8">
                                <label>   المؤهل الوظيفي  المطلوب  </label>

                                <select class="form-control wizard-required" name="job_qualification_id" >
                                    @foreach(\App\Models\JobQualification::where('is_active','active')->get() as $JobQualification)
                                        <option value="{{$JobQualification->id}}">{{$JobQualification->name}}</option>
                                    @endforeach
                                </select>
                                <div class="wizard-form-error"></div>

                            </div>


                        </div>
                        <div class="row">
                            <label>المستوى الوظيفي : </label>
                            @foreach(\App\Models\JobLevel::where('is_active','active')->get() as $JobType)
                                <div class="form-group col-md-2">
                                    <label class="label-radio" >
                                        <input type="radio"  class="wizard-required" name="job_level_id" style="margin:10px"   value="{{$JobType->id}}" placeholder="العنوان بالتفصيل">
                                        {{$JobType->name}}
                                    </label>
                                    <div class="wizard-form-error"></div>

                                </div>
                            @endforeach
                        </div>
                        <br>
                        <div class="row">
                            <label>   سنين الخبره : </label>
                            <div class="form-group col-md-3">
                                <label>الحد الأدنى </label>
                                <select name="min_experience" class="form-control wizard-required">
                                    {{--                                        <option value="0">لا يشترط</option>--}}
                                    @for ($x = 1; $x <= 20; $x++)
                                        <option value="{{$x}}">{{$x}}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label>الحد الاقصى </label>
                                <select name="max_experience" class="form-control wizard-required">
                                    {{--                                        <option value="0">لا يشترط</option>--}}
                                    @for ($x = 1; $x <= 40; $x++)
                                        <option value="{{$x}}">{{$x}}</option>
                                    @endfor
                                </select>
                            </div>

                        </div>
                        <div class="row">
                            <label>السن المطلوب ( اختيارى ) : </label>
                            <div class="form-group col-md-3">
                                <label>الحد الأدنى </label>
                                <select name="min_age" class="form-control wizard-required">
                                    {{--                                        <option value="0">لا يشترط</option>--}}
                                    @for ($x = 18; $x <= 70; $x++)
                                        <option value="{{$x}}">{{$x}}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label>الحد الأقصى </label>
                                <select name="max_age" class="form-control wizard-required">
                                    {{--                                    <option value="0">لا يشترط</option>--}}
                                    @for ($x = 18; $x <= 70; $x++)
                                        <option value="{{$x}}">{{$x}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <br>
                            <label  >رخصة قيادة   : </label>
                            <div class="form-group col-md-2">
                                <label class="label-radio"  >
                                    <input type="radio"  name="is_car_licenses"   class="is_car_licenses wizard-required"  value="0" placeholder="العنوان بالتفصيل">
                                    لا بشترط
                                </label>
                            </div>
                            <div class="form-group col-md-2">
                                <label class="label-radio"  >
                                    <input type="radio"  name="is_car_licenses"   class="is_car_licenses wizard-required"  value="1" placeholder="العنوان بالتفصيل">
                                    يشترط
                                </label>
                            </div>



                        </div>
                        <br>
                        <div class="row none"  id="type_car_licenses">
                            <div class="form-group col-md-4">
                                <label>  نوع الرخصه  </label>
                                <select name="type_car_licenses wizard-required"  class="form-control">
                                    <option value="درجة اولى">درجة اولى </option>
                                    <option value="درجة ثانية">درجة ثانية </option>
                                    <option value="درجة ثالثة">درجة ثالثة </option>
                                </select>
                            </div>
                        </div>
                        <hr>
                        <button class="btn back btn-theme2" data-num="1" type="button" > السابقة</button>
                        <button class="btn btn-primary next pull-left"  type="button" data-num="3">التالي</button>
                    </div>
                    <div class="steps" style="display: none" id="step3">
                        <!-- row -->
                        <h5>اضافة وظيفة جديدة </h5>
                        <p>الراتب
                        </p>

                        <div class="row">
                            <label>   متوسط الراتب الأساسى  </label>
                            <div class="form-group col-md-4">
                                <label   >  من</label>
                                <input type="number" required class="form-control wizard-required" value="" name="min_salary" placeholder="">
                                <div class="wizard-form-error"></div>

                            </div>
                            <div class="form-group col-md-4">
                                <label >  الى</label>
                                <input type="number" required class="form-control wizard-required"   name="max_salary" placeholder="">
                                <div class="wizard-form-error"></div>

                            </div>
                        </div>
{{--                        @inject('companies','App\Models\Company')--}}
{{--                        @if(($companies->find(Auth::guard('company')->id())->company_type == 'employment'))--}}
{{--                            <div class="row">--}}
{{--                                <div class="form-group col-md-4">--}}
{{--                                    <label   >  رسوم الدفع على الوظيفة</label>--}}
{{--                                    <input type="number" required class="form-control wizard-required" value="" name="tax" placeholder="">--}}
{{--                                    <div class="wizard-form-error"></div>--}}

{{--                                </div>--}}
{{--                                <div class="form-group col-md-4">--}}
{{--                                    <label >  فترة الضمان</label>--}}
{{--                                    <select name="warranty_period" class="form-control">--}}
{{--                                        <option value="1">شهر </option>--}}
{{--                                        <option value="2">شهرين  </option>--}}
{{--                                        <option value="3">3 اشهر </option>--}}
{{--                                    </select>--}}
{{--                                    <div class="wizard-form-error"></div>--}}

{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @endif--}}
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>  نوع العملة </label>
                                <select class="form-control wizard-required" name="currency_id">
                                    @foreach(\App\Models\JobCurrency::where('is_active','active')->get() as $Country)
                                        <option value="{{$Country->id}}">{{$Country->name}} </option>
                                    @endforeach
                                </select>
                                <div class="wizard-form-error"></div>

                            </div>
                            <div class="form-group col-md-4">
                                <label>  إظهر الراتب الأساسى فى إعلان الوظيفة </label>
                                <select class="form-control wizard-required" name="is_active_salary">
                                    <option value="active">تفعيل </option>
                                    <option value="inactive">عدم تفعيل </option>
                                </select>
                                <div class="wizard-form-error"></div>

                            </div>


                        </div>
                        <div class="row">
                            <label>   ادخل الراتب الإضافى حوافز او عمولات ( اختيارى )</label>
                            <div class="form-group col-md-4">
                                <label>  من</label>
                                <input type="number" required class="form-control wizard-required" value="" name="extra_min_salary" placeholder="">
                                <div class="wizard-form-error"></div>

                            </div>
                            <div class="form-group col-md-4">
                                <label>  الى</label>
                                <input type="number" required class="form-control wizard-required"   name="extra_max_salary" placeholder="">
                                <div class="wizard-form-error"></div>

                            </div>

                        </div>


                        <hr>
                        <button class="btn back btn-theme2" data-num="2" type="button" > السابقة</button>
                        <button class="btn btn-primary next pull-left"  type="button" data-num="4">التالي</button>
                    </div>
                    <div class="steps" style="display: none" id="step4">
                        <!-- row -->
                        <h5>اضافة وظيفة جديدة </h5>
                        <p>متطلبات اخري ( اختياري )

                        </p>
                        @foreach(\App\Models\JobOtherRequirement::where('is_active','active')->get() as $JobOtherRequirement)
                            <div class="row">
                                <label> {{$JobOtherRequirement->name}}  </label>
                                <div class="form-group col-md-2">
                                    <label class="label-radio" >
                                        <input type="radio"  style="margin: 10px;" class="wizard-required" value="0" name="JobOtherRequirement-{{$JobOtherRequirement->id}}" >
                                        لا يشترط
                                    </label>
                                    <div class="wizard-form-error"></div>

                                </div>
                                @foreach($JobOtherRequirement->answers as $answer )
                                    <div class="form-group col-md-2">
                                        <label class="label-radio" >
                                            <input type="radio"  style="margin: 10px;" class="wizard-required" value="{{$answer->id}}" name="JobOtherRequirement-{{$JobOtherRequirement->id}}" >
                                            {{$answer->name}}
                                        </label>
                                        <div class="wizard-form-error"></div>

                                    </div>
                                @endforeach

                            </div>
                        @endforeach


                        <hr>
                        <button class="btn back btn-theme2" data-num="3" type="button" > السابقة</button>
                        <button class="btn btn-primary next pull-left"  type="button" data-num="5">التالي</button>
                    </div>
                    <div class="steps" style="display: none" id="step5">
                        <!-- row -->
                        <h5>اضافة وظيفة جديدة </h5>
                        <p>متطلبات اخري ( اختياري )

                        </p>
                        @foreach(\App\Models\JobFeatures::where('is_active','active')->get() as $JobOtherRequirement)
                            <div class="row">
                                <label> {{$JobOtherRequirement->name}}  </label>
                                <div class="form-group col-md-2">
                                    <label class="label-radio" >
                                        <input type="radio"  style="margin: 10px;" class="wizard-required" value="0" name="JobFeatures-{{$JobOtherRequirement->id}}" >
                                        لا يشترط
                                    </label>
                                    <div class="wizard-form-error"></div>

                                </div>
                                @foreach($JobOtherRequirement->answers as $answer )
                                    <div class="form-group col-md-2">
                                        <label class="label-radio" >
                                            <input type="radio"  style="margin: 10px;"  class="wizard-required" value="{{$answer->id}}" name="JobFeatures-{{$JobOtherRequirement->id}}" >
                                            {{$answer->name}}
                                        </label>
                                        <div class="wizard-form-error"></div>

                                    </div>
                                @endforeach

                            </div>
                        @endforeach


                        <hr>
                        <button class="btn back btn-theme2" data-num="3" type="button" > السابقة</button>
                        <button class="btn btn-primary   pull-left"  type="submit" >حفظ</button>
                    </div>

                </form>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script src="https://cdn.ckeditor.com/4.18.0/basic/ckeditor.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        CKEDITOR.replace( 'editor1' );
    </script>

    <script>
        $('.is_car_licenses').on('click',function () {
            value = $(this).val()
            if(value == 1){
                $('#type_car_licenses').removeClass('none');
                $('#type_car_licenses').addClass('block');
            }else{
                $('#type_car_licenses').removeClass('block');
                $('#type_car_licenses').addClass('none');

            }
        })
        $(".next").on('click',function () {
            num = $(this).data('num');
            current = num - 1 ;
            var parentFieldset = jQuery(this).parents('#step'+current);
            var next = jQuery(this);
            var nextWizardStep = true;
            parentFieldset.find('.wizard-required').each(function(){
                if($(this).attr("type") == 'radio'){
                    // if( $(this).checked  ) {
                    //     jQuery(this).siblings(".wizard-form-error").slideUp();
                    // } else {
                    //     alert(  $(this).attr("name"));
                    //     jQuery(this).siblings(".wizard-form-error").slideDown();
                    //     nextWizardStep = false;
                    // }
                }else{
                    var thisValue = jQuery(this).val();
                    if( thisValue == "") {

                        jQuery(this).siblings(".wizard-form-error").slideDown();
                        nextWizardStep = false;
                    }
                    else {
                        jQuery(this).siblings(".wizard-form-error").slideUp();
                    }
                }

            })
            if(nextWizardStep){
                $('.steps').removeClass('block');
                $('.steps').addClass('none');
                $('#step'+num).removeClass('none')
                $('#step'+num).addClass('block')
                $('.list').removeClass('blue gray');
                $('#list'+num).addClass('blue gray')
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'عفوا ...',
                    text: 'الرجاء استكمال البيانات!',
                })
            }
        })
        $(".back").on('click',function () {
            num = $(this).data('num');
            $('.steps').removeClass('block');
            $('.steps').addClass('none');
            $('#step'+num).removeClass('none')
            $('#step'+num).addClass('block')
            $('.list').removeClass('blue gray');
            $('#list'+num).addClass('blue gray')

        })
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

        // $('.dropify').dropify();

        $("#city3").on('click , change',function () {
            var wahda = $(this).val();

            if (wahda != '') {
                $.get("{{ URL::to('/getState')}}" + '/' + wahda, function ($data) {
                    $('#state').html($data);
                });
            }
        });

    </script>
    <script>

        // $('.dropify').dropify();

        $("#state").on('click , change',function () {
            var wahda = $(this).val();

            if (wahda != '') {
                $.get("{{ URL::to('/getVillage')}}" + '/' + wahda, function ($data) {
                    $('#village').html($data);
                });
            }
        });

    </script>

@endsection
