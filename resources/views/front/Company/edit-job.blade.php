

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
                <form method="post" class="form-wizard" action="{{url('Update-Job')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="steps" id="step1">
                        <!-- row -->
                        <h5>اضافة وظيفة جديدة </h5>
                        <p>بيانات الوظيفة الاساسية  </p>
                        @csrf

                        <div class="row">

                            <div class="form-group col-md-4">
                                <label>   اسم الوظيفة  </label>
                                <input type="text" required class="form-control wizard-required" value="{{$data->title}}" name="title" placeholder="">
                                <input type="hidden" required class="form-control wizard-required" value="{{$data->id}}" name="id" >
                                <div class="wizard-form-error"></div>

                            </div>
                            <div class="form-group col-md-4">
                                <label> المجال  </label>
                                <select class="form-control wizard-required" name="experience_category_id" id="experience_category_id ">
                                    @foreach(\App\Models\ExperienceCategory::where('is_active','active')->get() as $category)
                                        <option @if($data->experience_category_id == $category->id ) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                <div class="wizard-form-error"></div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>  الدولة </label>
                                <select class="form-control wizard-required" id="country3" name="country_id">
                                    @inject('Countries','App\Models\Country')
                                    @foreach($Countries->where('is_active','active')->get() as $Country)
                                        <option @if($data->country_id == $Country->id) selected @endif  value="{{$Country->id}}">{{$Country->name}} </option>
                                    @endforeach
                                </select>
                                <div class="wizard-form-error"></div>

                            </div>
                            @inject('City','App\Models\City')
                            <div class="form-group col-md-4">
                                <label>  المدينة</label>
                                <select class="form-control wizard-required" id="city3" name="city_id">
                                    <option value="{{$data->city_id}}">{{$City->find($data->city_id)->name}} </option>
                                </select>
                                <div class="wizard-form-error"></div>

                            </div>


                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>  عدد الموظفيين المطلوبية</label>
                                <input type="number" required class="form-control wizard-required" value="{{$data->employees_count}}"  name="employees_count" placeholder="">
                                <div class="wizard-form-error"></div>

                            </div>
                        </div>
                        <div class="row">
                            <label>نوع الوظيفه : </label>
                            @foreach(\App\Models\JobType::where('is_active','active')->get() as $JobType)
                                <div class="form-group col-md-2">
                                    <label class="label-radio" >
                                        <input type="radio"  name="job_type_id" class="wizard-required" @if($JobType->id == $data->job_type_id) checked @endif value="{{$JobType->id}}">
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
                                    <input type="radio"  name="job_time"   @if($data->job_time == 'morning' ) checked @endif  class="wizard-required" value="morning" placeholder="">
                                    صباحية فقط
                                </label>
                                <div class="wizard-form-error"></div>

                            </div>
                            <div class="form-group col-md-2">

                                <label class="label-radio">
                                    <input type="radio"  name="job_time" class="wizard-required"   @if($data->job_time == 'evening' ) checked @endif  value="evening" placeholder="">
                                    مسائية فقط
                                </label>
                                <div class="wizard-form-error"></div>

                            </div>
                            <div class="form-group col-md-2">
                                <label class="label-radio">
                                    <input type="radio"  name="job_time"   @if($data->job_time == 'both' ) checked @endif    class="wizard-required" value="both" placeholder="">
                                    صباحية ومسائية
                                </label>
                                <div class="wizard-form-error"></div>

                            </div>


                        </div>
                        <br>

                        <div class="row">
                            <div class="form-group col-md-8">
                                <label>تفاصيل الوظيفة  :</label>
                                <textarea rows="5"  name="description"  clas id="editor1" class="form-control "></textarea>
                            </div>
                            <div class="wizard-form-error"></div>

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
                                        <option  @if($data->job_qualification_id == $JobQualification->id ) selected @endif   value="{{$JobQualification->id}}">{{$JobQualification->name}}</option>
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
                                        <input type="radio"  class="wizard-required" name="job_level_id" style="margin:10px" @if($data->job_level_id == $JobType->id) checked @endif    value="{{$JobType->id}}" placeholder="العنوان بالتفصيل">
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
                                        <option  @if($data->min_experience == $x) selected @endif  value="{{$x}}">{{$x}}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label>الحد الأدنى </label>
                                <select name="max_experience" class="form-control wizard-required">
                                    {{--                                        <option value="0">لا يشترط</option>--}}
                                    @for ($x = 1; $x <= 40; $x++)
                                        <option  @if($data->max_experience == $x) selected @endif value="{{$x}}">{{$x}}</option>
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
                                        <option  @if($data->min_age == $x) selected @endif  value="{{$x}}">{{$x}}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label>الحد الأقصى </label>
                                <select name="max_age"  class="form-control wizard-required">
                                    {{--                                    <option value="0">لا يشترط</option>--}}
                                    @for ($x = 18; $x <= 70; $x++)
                                        <option  @if($data->max_age == $x) selected @endif value="{{$x}}">{{$x}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <br>
                            <label  >رخصة قيادة   : </label>
                            <div class="form-group col-md-2">
                                <label class="label-radio"  >
                                    <input type="radio"  name="is_car_licenses"   @if($data->is_car_licenses == 0) checked @endif   class="is_car_licenses wizard-required"  value="0" placeholder="العنوان بالتفصيل">
                                    لا بشترط
                                </label>
                            </div>
                            <div class="form-group col-md-2">
                                <label class="label-radio"  >
                                    <input type="radio"  name="is_car_licenses"    @if($data->is_car_licenses == 1) checked @endif  class="is_car_licenses wizard-required"  value="1" placeholder="العنوان بالتفصيل">
                                    يشترط
                                </label>
                            </div>



                        </div>
                        <br>
                        <div class="row  @if($data->is_car_licenses == 0) none @endif "  id="type_car_licenses">
                            <div class="form-group col-md-4">
                                <label>  نوع الرخصه  </label>
                                <select name="type_car_licenses"  class="form-control wizard-required">
                                    <option  @if($data->type_car_licenses == 'درجة اولى') selected @endif  value="درجة اولى">درجة اولى </option>
                                    <option @if($data->type_car_licenses == 'درجة ثانية') selected @endif  value="درجة ثانية">درجة ثانية </option>
                                    <option @if($data->type_car_licenses == 'درجة ثالثة') selected @endif   value="درجة ثالثة">درجة ثالثة </option>
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
                                <input type="number" required class="form-control wizard-required" value="{{$data->min_salary}}" name="min_salary" placeholder="">
                                <div class="wizard-form-error"></div>

                            </div>
                            <div class="form-group col-md-4">
                                <label >  الى</label>
                                <input type="number" required class="form-control wizard-required"    value="{{$data->max_salary}}"  name="max_salary" placeholder="">
                                <div class="wizard-form-error"></div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>  نوع العملة </label>
                                <select class="form-control wizard-required" name="currency_id">
                                    @foreach(\App\Models\JobCurrency::where('is_active','active')->get() as $Country)
                                        <option @if($data->currency_id == $Country->id) selected @endif  value="{{$Country->id}}">{{$Country->name}} </option>
                                    @endforeach
                                </select>
                                <div class="wizard-form-error"></div>

                            </div>
                            <div class="form-group col-md-4">
                                <label>  إظهر الراتب الأساسى فى إعلان الوظيفة </label>
                                <select class="form-control wizard-required" name="is_active_salary">
                                    <option @if($data->is_active_salary == 'active') selected @endif  value="active">تفعيل </option>
                                    <option @if($data->is_active_salary == 'inactive') selected @endif  value="inactive">عدم تفعيل </option>
                                </select>
                                <div class="wizard-form-error"></div>

                            </div>


                        </div>
                        <div class="row">
                            <label>   ادخل الراتب الإضافى حوافز او عمولات ( اختيارى )</label>
                            <div class="form-group col-md-4">
                                <label>  من</label>
                                <input type="number" required class="form-control wizard-required" value="{{$data->extra_min_salary}}" name="extra_min_salary" placeholder="">
                                <div class="wizard-form-error"></div>

                            </div>
                            <div class="form-group col-md-4">
                                <label>  الى</label>
                                <input type="number" required class="form-control wizard-required"  value="{{$data->extra_max_salary}}"  name="extra_max_salary" placeholder="">
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
                        @inject('JobRequeirementRelation','App\Models\JobRequeirementRelation')
                        @foreach(\App\Models\JobOtherRequirement::where('is_active','active')->get() as $JobOtherRequirement)
                            <div class="row">
                                <label> {{$JobOtherRequirement->name}}  </label>
                                <div class="form-group col-md-2">
                                    <label class="label-radio" >
                                        <input type="radio"  style="margin: 10px;" class="wizard-required" checked value="0"  name="JobOtherRequirement-{{$JobOtherRequirement->id}}" >
                                        لا يشترط
                                    </label>
                                    <div class="wizard-form-error"></div>

                                </div>
                                @foreach($JobOtherRequirement->answers as $answer )
                                    <div class="form-group col-md-2">
                                        <label class="label-radio" >
                                            <input type="radio"  style="margin: 10px;"   @if($JobRequeirementRelation->where('job_id',$data->id)->where('job_requirement_answers_id',$answer->id)->count() > 0) checked @endif class="wizard-required" value="{{$answer->id}}" name="JobOtherRequirement-{{$JobOtherRequirement->id}}" >
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
                        @inject('JobFeaturesRelation','App\Models\JobFeaturesRelation')
                    @foreach(\App\Models\JobFeatures::where('is_active','active')->get() as $JobOtherRequirement)
                            <div class="row">
                                <label> {{$JobOtherRequirement->name}}  </label>
                                <div class="form-group col-md-2">
                                    <label class="label-radio" >
                                        <input type="radio"  style="margin: 10px;" checked class="wizard-required" value="0" name="JobFeatures-{{$JobOtherRequirement->id}}" >
                                        لا يشترط
                                    </label>
                                    <div class="wizard-form-error"></div>

                                </div>
                                @foreach($JobOtherRequirement->answers as $answer )
                                    <div class="form-group col-md-2">
                                        <label class="label-radio" >
                                            <input type="radio"  style="margin: 10px;"   @if($JobFeaturesRelation->where('job_id',$data->id)->where('job_features_answers_id',$answer->id)->count() > 0) checked @endif  class="wizard-required" value="{{$answer->id}}" name="JobFeatures-{{$JobOtherRequirement->id}}" >
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
                        alert(  $(this).attr("name"));

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
@endsection
