@extends('front.layout')
@section('title')
    الوظائف
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('content')

    <!-- this is content of the job-->
    <section class="container job-width">
        <div class="row padding-job-right">
            <div class="col-md-12 col-11 job-border">
                <div class="row">
                    <div class="bottom-border">
                        <div class="col-md-12 col-12 ">
                            <div class="row ">
                                <div class="col-md-2 col-12 job-center block-job-img">
                                    <div class="img-job">
                                        @if(isset($data->Company->image))
                                            <img src="{{$data->Company->image}}" style="width:100px;height: 100px; border-radius: 50%;border: 2px #CCCCCC solid;" >
                                        @else
                                            <i class="fa fa-briefcase bag-job" aria-hidden="true"></i>
                                        @endif
                                    </div>
                                    <div class=" gray-color size-lighter">نشرت                                  {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->diffForHumans()}}
                                    </div>
                                </div>
                                <div class="col-md-10 col-12">
                                    <h6 class="blue h6-center">{{$data->title}} </h6>
                                    <div class="row">
                                        <div class="col-md-12 col-12">
                                            <div class="row">
                                                <div class="col-md-6 col-6 gray-color ul-job">
                                                 <span>
                                                      <i class="fa fa-briefcase" aria-hidden="true"></i>
                                                </span>
                                                    <small> الشركة</small>
                                                </div>
                                                <div class="col-md-6 col-6 ul-job-2">
                                                    <small>{{$data->Company->company_name}}</small>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-6 gray-color ul-job">
                                                 <span>
                                                       <i class="fa fa-map-marker" aria-hidden="true"></i>
                                                </span>
                                                    <small> مقر الشركة  </small>
                                                </div>
                                                <div class="col-md-6 col-6 ul-job-2">
                                                    <small>{{$data->Company->Country->name}} - {{$data->Company->City->name}} - {{$data->Company->State->name}} - {{$data->Company->Village->name}}</small>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-6 gray-color ul-job">
                                                 <span>
                                                       <i class="fa fa-users" aria-hidden="true"></i>
                                                </span>
                                                    <small>العمالة المطلوبة </small>
                                                </div>
                                                <div class="col-md-6 col-6 ul-job-2">
                                                    <small >{{$data->employees_count}}</small>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-2 col-12 job-center none-job-img">
                                        <div class="img-job">
                                            @if(isset($data->Company->image))
                                                <img src="{{$data->Company->image}}" style="width:100px;height: 100px; border-radius: 50%;border: 2px #CCCCCC solid;" >
                                            @else
                                                <i class="fa fa-briefcase bag-job" aria-hidden="true"></i>
                                            @endif
                                        </div>
                                        <div class=" gray-color size-lighter">نشرت                                  {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->diffForHumans()}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 col-12 margin-job">
                            <div class="row">
                                <div class="col-md-3 col-12 ">
                                    @if(Auth::guard('company')->check())
                                        <a href="{{url('JobApplicants',$data->id)}}" class=" btn btn-primary job-btn">شاهد المتقدمين</a>

                                    @elseif(Auth::guard('web')->check() )
                                        @if(! \App\Models\JobRequest::where('job_id',$data->id)->where('user_id',Auth::guard('web')->id() )->first())
                                            <form  action="{{url('JobApplay')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="job_id" value="{{$data->id}}">
                                                <button type="submit" class="   btn-primary job-btn">تقديم على الوظيقة</button>
                                            </form>
                                        @else
                                            <button disable  class="    btn-primary job-btn" style="border:1px solid #c4c4c4!important; background-color: #c4c4c4!important;"> تم التقديم على الوظيفة</button>
                                        @endif

                                    @endif
                                </div>
                                <div class="col-md-9 col-9">
                                    <ul class="ul-3">
                                        <li>
                                            <span>{{\App\Models\JobRequest::where('job_id',$data->id)->count()}}</span>
                                            متقدمين
                                        </li>
                                        <li class="gray-color">
                                            <span>{{\App\Models\JobRequest::where('job_id',$data->id)->where('is_read','readed')->count()}}</span>
                                            تم مشاهدتهم
                                        </li>
                                        <li class="green ">
                                            <span>{{\App\Models\JobRequest::where('job_id',$data->id)->where('type','accepted')->count()}}</span>
                                            مناسبين
                                        </li>
                                        <li class="red">
                                            <span>{{\App\Models\JobRequest::where('job_id',$data->id)->where('type','rejected')->count()}}</span>
                                            مرفوضين
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-11 job-border">
                <div class="row">
                    <div class="col-md-12 col-12 move-h6">
                        <h6>متطلبات الوظيفة</h6>
                    </div>
                </div>
                <div class="row space-right1">
                    <div class="col-md-6 col-12">
                        <div class="row">
                            <div class="col-md-6 col-8 data-job-size gray-color">
                                <span><i class="fa fa-clock-o" aria-hidden="true"></i></span>
                                فترة العمل
                            </div>
                            <div class="col-md-6 col-4 data-job-size">
                                {{__('lang.'.$data->job_time)}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-8 data-job-size gray-color">
                                <span><i class="fa fa-calendar-o" aria-hidden="true"></i></span>
                                سنين الخبرة
                            </div>
                            <div class="col-md-6 col-4 data-job-size">
                                {{$data->min_experience}} - {{$data->max_experience}} سنوات
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-8 data-job-size gray-color">
                                <span>
                                    <i class="fa fa-male" aria-hidden="true"></i>
                                  </span>
                                النوع
                            </div>
                            <div class="col-md-6 col-4 data-job-size">
                                {{__('lang.type'.$data->gender)}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-8 data-job-size gray-color">
                                <span><i class="fa fa-list" aria-hidden="true"></i></span>
                                العنوان
                            </div>
                            <div class="col-md-6 col-4 data-job-size">
                                {{$data->Country->name}} - {{$data->City->name}} - {{$data->State->name}} - {{$data->Village->name}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="row">
                            <div class="col-md-6 col-8 data-job-size gray-color">
                                <span><i class="fa fa-user" aria-hidden="true"></i></span>
                                السن
                            </div>
                            <div class="col-md-6 col-4 data-job-size">
                                {{$data->min_age}} - {{$data->max_age}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-8 data-job-size gray-color">
                                <span><i class="fa fa-graduation-cap" aria-hidden="true"></i></span>
                                المؤهل
                            </div>
                            <div class="col-md-6 col-4 data-job-size">
                                {{$data->JobQualification->name}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-8 data-job-size gray-color">
                                <span><i class="fa fa-laptop" aria-hidden="true"></i></span>
                                المجال
                            </div>
                            <div class="col-md-6 col-4 data-job-size">
                                {{$data->ExperienceCategory->name}}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-8 data-job-size gray-color">
                                <span><i class="fa fa-list" aria-hidden="true"></i></span>
                                التخصص
                            </div>
                            <div class="col-md-6 col-4 data-job-size">
                                {{$data->ExperienceSpecialization->name}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-11 job-border">
                <div class="row">
                    <div class="col-md-12 col-12 move-h6">
                        <h6>الراتب ونوع العمل</h6>
                    </div>
                </div>
                <div class="row space-right1">
                    <div class="col-md-6 col-12">
                        <div class="row">
                            <div class="col-md-6 col-8 data-job-size gray-color">
                                <span><i class="fa fa-usd" aria-hidden="true"></i></span>
                                الراتب الاساسي
                            </div>
                            <div class="col-md-6 col-4 data-job-size">
                                @if($data->is_active_salary == 'active')
                                {{$data->min_salary}} - {{$data->max_salary}} {{$data->Currency->name}}
                                @else
                                مخفى
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-8 data-job-size gray-color">
                                <span><i class="fa fa-calendar-o" aria-hidden="true"></i></span>
                                الحوافز الاضافية
                            </div>
                            <div class="col-md-6 col-4 data-job-size">
                                @if($data->is_active_salary == 'active')
                                {{$data->extra_min_salary}} - {{$data->extra_max_salary}} {{$data->Currency->name}}
                                @else
                                مخفى
                                @endif
                            </div>
                        </div>
                        @if($data->is_car_licenses == 1)
                        <div class="row">
                            <div class="col-md-6 col-8 data-job-size gray-color">
                                <span><i class="fa fa-calendar-o" aria-hidden="true"></i></span>
                                رخصة القيادة
                            </div>
                            <div class="col-md-6 col-4 data-job-size">
                                {{$data->type_car_licenses}}
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="row">
                            <div class="col-md-6 col-8 data-job-size gray-color">
                                <span><i class="fa fa-user" aria-hidden="true"></i></span>
                                نوع العمل
                            </div>
                            <div class="col-md-6 col-4 data-job-size">
                                {{$data->JobType->name}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-8 data-job-size gray-color">
                                <span><i class="fa fa-user" aria-hidden="true"></i></span>
                                المستوى الوظيفي
                            </div>
                            <div class="col-md-6 col-4 data-job-size">
                                {{$data->JobLevel->name}}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            @if(count($data->job_other_requirements) > 0)
            <div class="col-md-12 col-11 job-border">
                <div class="row">
                    <div class="col-md-12 col-12 move-h6">
                        <h6>متطلبات اخري</h6>
                    </div>
                </div>
                <div class="row space-right1">
                    @inject('JobOtherRequirement','App\Models\JobOtherRequirement')
                    @inject('JobOtherRequirementAnswer','App\Models\JobOtherRequirementAnswer')
                    @foreach($data->job_other_requirements as $var)
                    <div class="col-md-6 col-12">
                        <div class="row">
                            <div class="col-md-6 col-8 data-job-size gray-color">
                                <span><i class="fa fa-list" aria-hidden="true"></i></span>
                                {{$JobOtherRequirement->find($var->job_requirement_id)->name}}
                            </div>
                            <div class="col-md-6 col-4 data-job-size">
                                {{$JobOtherRequirementAnswer->find($var->job_requirement_answers_id)->name}}
                            </div>
                        </div>
                    </div>
                        @endforeach
                </div>
            </div>
            @endif
            @if(count($data->jobfeatures)  > 0)
                <div class="col-md-12 col-11 job-border">
                    <div class="row">
                        <div class="col-md-12 col-12 move-h6">
                            <h6>مميزات الوظيفة</h6>
                        </div>
                    </div>
                    <div class="row space-right1">
                        @inject('JobOtherRequirement','App\Models\JobFeatures')
                        @inject('JobOtherRequirementAnswer','App\Models\JobFeaturesAnswer')
                        @foreach($data->jobfeatures as $var)
                            <div class="col-md-6 col-12">
                                <div class="row">
                                    <div class="col-md-6 col-8 data-job-size gray-color">
                                        <span><i class="fa fa-list" aria-hidden="true"></i></span>
                                        {{$JobOtherRequirement->find($var->job_features_id)->name}}
                                    </div>
                                    <div class="col-md-6 col-4 data-job-size">
                                        {{$JobOtherRequirementAnswer->find($var->job_features_answers_id)->name}}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
            @if(isset($data->description))
                <div class="col-md-12 col-11 job-border">
                    <div class="row">
                        <div class="col-md-12 col-12 move-h6">
                            <h6>وصف الوظيفة</h6>
                        </div>
                    </div>
                    <div class="row space-right1">
                            <div class="col-md-12 col-12">
                               {!! $data->description !!}
                            </div>
                    </div>
                </div>
            @endif
            <section class="col-md-12 col-11 main-1">
                <section class="container-fluid">
                    <h3> "وظائف مثل وظيفة"مسئول إئتمان خارجي</h3>
                    <section >
                        <div class="row">
                            @foreach(\App\Models\Job::where('is_active','active')->inRandomOrder()->limit(12)->get() as $job)
                                <div class="col-md-3 col-11 ">
                                    <div class="box">
                                        <li>{{$job->title}} </li>
                                        <li><span><i class="fa fa-briefcase"></i>{{$job->Company->company_name}} </span> </li>
                                        <li><i class="fa fa-map-marker"></i>{{$job->Country->name}} - {{$job->City->name}} - {{$job->state->name}} - {{$job->village->name}} </li>
                                        <li><i class="fa fa-user"></i>النوع : {{__('lang.type'.$job->gender)}} </li>
                                        <li><i class="fa fa-list"></i>السن : {{$job->min_age}} : {{$job->max_age}} </li>
                                        <li><i class="fa fa-list"></i>المؤهل   : {{$job->JobQualification->name}} </li>
                                        <li><i class="fa fa-list"></i>المرتب  : {{$job->min_salary}} : {{$job->max_salary}} </li>
                                        <li><i class="fa fa-calendar"></i>{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $job->created_at)->diffForHumans()}}</li>
                                        <a href="{{url('jobDetails',$job->id)}}">
                                            تفاصيل
                                        </a>
                                    </div>
                                    </a>
                                </div>
                            @endforeach


                        </div>
                    </section>
                    <a href="#" target="_blank"> شاهد جميع الوظائف الجديدة على مطلوب...</a>
                </section>
            </section>

        </div>
@endsection
