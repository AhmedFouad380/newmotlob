@extends('front.layout')
@section('title')
    الصفحة الشخصية
@endsection


@section('content')


    <!-- this is content of company -->
    <section class="container container-space">
        <div class="row container width-seeker">
            <div class="col-md-12  job-border " style="border-top: 3px solid #269eda;">
                <div class="row seeker-space">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="seeker-img">
                                    <img src="{{$data->Info->image}}">
                                    <div class="seeker-btn"><button>تعديل</button></div>
                                </div>
                            </div>
                            <div class="col-md-9 seeker-info">
                                <h5> {{$data->Info->firstname}}   {{$data->Info->lastname}}</h5>
                                <p class="mail">{{$data->Info->email}}</p>
                                <p class="gray-color tel">
                                    <i class="fa fa-phone" aria-hidden="true"></i>

                                    {{$data->Info->phone}}
                                </p>
                                <p class="gray-color">
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                    {{$data->Country->name}} - {{$data->City->name}}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="seeker-flex">
                            <div>
                                {{$data->Info->job_title}}
                            </div>
                            <div class="cv-div">
                                <button class="blue">
                                    <i class="fa fa-file-text" aria-hidden="true"></i>
                                    السيرة الذاتية
                                </button>
                            </div>
                            <div class="blue socail-icons">
                                <i class="fa fa-facebook" aria-hidden="true"></i>
                                <i class="fa fa-twitter" aria-hidden="true"></i>
                                <i class="fa fa-instagram" aria-hidden="true"></i>
                                <i class="fa fa-youtube" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 s-border">
                <div class="row">
                    <div class="col-md-12 seeker-border">
                        <div class="row seeker-info-2">
                            <div class="col-md-6">
                                <h5>
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    المعلومات الشخصية
                                </h5>
                            </div>
                            @if(Auth::guard('web')->check() &&  Auth::guard('web')->id() == $data->id)
                            <div class="col-md-6  style-btn">
                                <button class="blue">تعديل</button>
                            </div>
                                @endif
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row seeker-info-3">
                            <div class="row space-right1">
                                <div class="col-md-4 col-12">
                                    <div class="row">
                                        <div class="col-md-6 col-8 data-job-size gray-color">
                                            <span><i class="fa fa-user" aria-hidden="true"></i></span>
                                            السن
                                        </div>
                                        <div class="col-md-6 col-4 data-job-size">
                                            {{$data->age}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="row">
                                        <div class="col-md-6 col-8 data-job-size gray-color">
                                            <span><i class="fa fa-male" aria-hidden="true"></i></span>
                                            النوع
                                        </div>
                                        <div class="col-md-6 col-4 data-job-size">
                                           @if($data->type == 'male')
                                               ذكر
                                            @else
                                            انثى
                                               @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="row">
                                        <div class="col-md-6 col-8 data-job-size gray-color">
                                            <span><i class="fa fa-male" aria-hidden="true"></i></span>
                                            العمر
                                        </div>
                                        <div class="col-md-6 col-4 data-job-size">
                                            {{\Carbon\Carbon::parse($data->birth_date)->age}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="row">
                                        <div class="col-md-6 col-8 data-job-size gray-color">
                                            <span><i class="fa fa-user-o" aria-hidden="true"></i></span>
                                            الحالة الاجتماعية
                                        </div>
                                        <div class="col-md-6 col-4 data-job-size">
                                           @if($data->relationship == 'married')
                                               متزوج
                                            @else
                                            اعزب
                                               @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="row">
                                        <div class="col-md-6 col-8 data-job-size gray-color">
                                            <span><i class="fa fa-info-circle" aria-hidden="true"></i></span>
                                            التجنيد او الخدمة العامة
                                        </div>
                                        <div class="col-md-6 col-4 data-job-size">
                                            @if($data->Info->military == 'not_yet')
                                                لم ينتهي
                                            @elseif($data->Info->military == 'ended')
                                                ادا الخدمة
                                            @elseif($data->Info->military == 'with_out')
                                                معفى
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="row">
                                        <div class="col-md-6 col-8 data-job-size gray-color">
                                            <span><i class="fa fa-usd" aria-hidden="true"></i></span>
                                            الراتب الحالي
                                        </div>
                                        <div class="col-md-6 col-4 data-job-size">
                                            {{$data->Info->current_salary}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="row">
                                        <div class="col-md-6 col-8 data-job-size gray-color">
                                            <span><i class="fa fa-usd" aria-hidden="true"></i></span>
                                            الراتب المتوقع
                                        </div>
                                        <div class="col-md-6 col-4 data-job-size">
                                            {{$data->Info->expected_salary}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="row">
                                        <div class="col-md-6 col-8 data-job-size gray-color">
                                            <span><i class="fa fa-id-card" aria-hidden="true"></i></span>
                                            الرخصة
                                        </div>
                                        <div class="col-md-6 col-4 data-job-size">
                                            @if($data->Info->is_car_licenses == 1)
                                                متوفر
                                            @else
                                                غير متوفرة
                                            @endif
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 seeker-info-4">
                <div class="row">
                    <div class="col-md-6 ">
                        <div class="s-border">
                        <div class="row ">
                            <div class="col-md-12 ">
                                <div class="seeker-border  seeker-info-2">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h5>
                                                <i class="fa fa-building-o" aria-hidden="true"></i>
                                                خبرات العمل السابقة
                                            </h5>
                                        </div>
                                        @if(Auth::guard('web')->check() && $data->id == Auth::guard('web')->id())
                                            <div class="col-md-6  style-btn"    >
                                                <a href="{{url('cv-maker-step4')}}" class="blue">تعديل</a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                            @php
                             $count = count($data->Experience);
                            @endphp
                            @foreach($data->Experience as $key => $experience)
                        <div class="row sp-seeker @if($key+1 == $count) last-sp  @else bottom-seeker @endif">
                            <div class="col-md-7">
                                <div class="row">
                                    <div class="col-md-6 ">
                                        <div style="width: 100px; height: 100px;">
                                        <i class="fa fa-briefcase bag-job" style="color: #ccc;font-size: 80px"></i>
                                        </div>

                                    </div>
                                    <div class="col-md-6" >
                                        <p class="blue">{{$experience->name}}</p>
                                        <p>شركة :  {{$experience->company}}</p>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-5" style="display: flex;
                                                    flex-direction: row-reverse;">
                                <div style="font-size: 13px; margin-top: 15px; color: #252525">
                                    {{$experience->start_date}} - {{$experience->end_date}}
                                </div>
                            </div>
                        </div>
                            @endforeach
                        <div class=" seeker-border top-seeker">
                            <div class="col-md-12 ">
                                <div>
                                    <a href="#" target="_blank" class="blue">مشاهدة المزيد</a>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>

                    <div class="col-md-6 ">
                        <div class="s-border">
                        <div class="row" style="margin-bottom: 67px;">
                            <div class="col-md-12 ">
                                <div class=" seeker-border seeker-info-2">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h5>
                                                <i class="fa fa-cog" aria-hidden="true"></i>
                                                المؤتمرات و الدورات

                                            </h5>
                                        </div>
                                        @if(Auth::guard('web')->check() && $data->id == Auth::guard('web')->id())
                                            <div class="col-md-6  style-btn"    >
                                                <a href="{{url('cv-maker-step7')}}" class="blue">تعديل</a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                @foreach($data->Courses as $course)
                                <div class="col-md-12">
                                    <div class="row sp-seeker bottom-seeker">
                                        <div class="col-md-3">
                                            @if($course->type == 'course')
                                            <p class="gray-color">الدورة : </p>
                                            <p class="gray-color">الشركة :</p>
                                            @else
                                                <p class="gray-color"> المؤتمر : </p>
                                                <p class="gray-color"> المكان :</p>
                                            @endif
                                        </div>
                                        <div class="col-md-7">
                                            <p class="blue">{{$course->name}}</p>
                                            <p>{{$course->company}}</p>
                                        </div>

                                    </div>
                                </div>
                                    @endforeach
                            </div>
                        </div>
                        <div class=" seeker-border top-seeker">
                            <div class="col-md-12">
                                <div>
                                    <a href="#" target="_blank" class="blue">مشاهدة المزيد</a>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>


                </div>
            </div>
            <div class="col-md-12 s-border">
                <div class="row seeker-border seeker-info-2">
                    <div class="row">
                        <div class="col-md-6 ">
                            <h5>
                                <i class="fa fa-file-text" aria-hidden="true"></i>
                                 المعرفين

                            </h5>
                        </div>
                        @if(Auth::guard('web')->check() && $data->id == Auth::guard('web')->id())
                            <div class="col-md-6  style-btn"    >
                                <a href="{{url('cv-maker-step8')}}" class="blue">تعديل</a>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="row seeker-info-5">
                    @php
                        $count = count($data->Knows);
                    @endphp
                    @foreach($data->Knows as $Key =>$knows)
                    <div class="col-md-4 @if($Key + 1 != $count )   border-info-5  @endif  sp-5">
                        <h6 class="blue">{{$knows->name}} </h6>
                        <div class="row info-5-space">
                            <div class="col-md-5 gray-color">
                                رقم الهاتف
                            </div>
                            <div class="col-md-7">
                                {{$knows->phone}}
                            </div>
                        </div>
                        <div class="row info-5-space">
                            <div class="col-md-5 gray-color">
                                البريد الالكتروني
                            </div>
                            <div class="col-md-7">
                                {{$knows->email}}
                            </div>
                        </div>
                        <div class="row info-5-space">
                            <div class="col-md-5 gray-color">
                                المسمى الوظيفي
                            </div>
                            <div class="col-md-7">
                                {{$knows->job_title}}
                            </div>
                        </div>
                        <div class="row info-5-space">
                            <div class="col-md-5 gray-color">
                                الشركة
                            </div>
                            <div class="col-md-7">
                                {{$knows->company}}
                            </div>
                        </div>
                    </div>
                        @endforeach
                </div>

            </div>
            <div class="col-md-12 seeker-info-4">
                <div class="row">
                    <div class="col-md-6 ">
                        <div class="s-border">
                            <div class="row">
                                <div class="col-md-12 ">
                                    <div class="  seeker-border seeker-info-2">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h5>
                                                    <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                                                    التعليم
                                                </h5>
                                            </div>
                                            @if(Auth::guard('web')->check() && $data->id == Auth::guard('web')->id())
                                            <div class="col-md-6  style-btn"    >
                                                <a href="{{url('cv-maker-step3')}}" class="blue">تعديل</a>
                                            </div>
                                                @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    @foreach($data->education as $education)
                                    <div class="col-md-12">
                                        <div class="row sp-seeker bottom-seeker">
                                            <div class="col-md-4">
                                                <p class="blue">{{$education->qualification}} </p>
                                                <p>{{$education->name}} </p>
                                                <p class="gray-color"> تخصص : {{$education->area}}</p>
                                            </div>
                                            <div class="col-md-8 left-date">
                                                <p>{{$education->graduation_date}}</p>
                                            </div>

                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="s-border">
                            <div class="row">
                                <div class="col-md-12 ">
                                    <div class="  seeker-border seeker-info-2">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h5>
                                                    <i class="fa fa-globe" aria-hidden="true"></i>
                                                    اللغات
                                                </h5>
                                            </div>
                                            @if(Auth::guard('web')->check() && $data->id == Auth::guard('web')->id())
                                                <div class="col-md-6  style-btn"    >
                                                    <a href="{{url('cv-maker-step6')}}" class="blue">تعديل</a>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            <div class="row">
                                @inject('lang','App\Models\Lang')
                                @foreach($data->LangRelation as $LangRelation)
                                <div class="col-md-12">
                                    <div class="row sp-seeker bottom-seeker">
                                        <div class="col-md-3">
                                            <p class="blue"> {{$lang->find($LangRelation->lang_id)->name}} </p>
                                            <p>{{__('lang.'.$LangRelation->type)}}</p>
                                        </div>
                                        <div class="col-md-9 left-date">
                                            <p>
                                                @if($LangRelation->type == 'excellent')
                                                <i class="fa fa-star rated " aria-hidden="true"></i>
                                                <i class="fa fa-star rated" aria-hidden="true"></i>
                                                <i class="fa fa-star rated" aria-hidden="true"></i>
                                                <i class="fa fa-star rated" aria-hidden="true"></i>
                                                @elseif($LangRelation->type == 'very_good')
                                                    <i class="fa fa-star rated " aria-hidden="true"></i>
                                                    <i class="fa fa-star rated" aria-hidden="true"></i>
                                                    <i class="fa fa-star rated" aria-hidden="true"></i>
                                                    <i class="fa fa-star " aria-hidden="true"></i>
                                                @elseif($LangRelation->type == 'good')
                                                    <i class="fa fa-star rated " aria-hidden="true"></i>
                                                    <i class="fa fa-star rated" aria-hidden="true"></i>
                                                    <i class="fa fa-star " aria-hidden="true"></i>
                                                    <i class="fa fa-star " aria-hidden="true"></i>
                                                @elseif($LangRelation->type == 'bad')
                                                    <i class="fa fa-star rated " aria-hidden="true"></i>
                                                    <i class="fa fa-star " aria-hidden="true"></i>
                                                    <i class="fa fa-star " aria-hidden="true"></i>
                                                    <i class="fa fa-star " aria-hidden="true"></i>
                                                @endif
                                            </p>
                                        </div>

                                    </div>
                                </div>
                                @endforeach
                            </div>


                        </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>

    @endsection
