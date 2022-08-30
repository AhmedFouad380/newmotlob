    <link rel="stylesheet" href="{{asset('website/assets/css/all.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('website/assets/css/ar_cv.css')}}" type="text/css">

<body style="direction: rtl;">

<!--  this is resume 3  -->

<section class=" container a4-width" style="width: 180mm!important;">
    <section class="row">
        <section class="col-md-8 col-8 change-row">
            <div class="resume2-color">
                <div class="adress-resume">
                    <div>
                        <h1>
                            {{Auth::guard('web')->user()->info->firstname}}
                            <span class="color-hh">
                                                            {{Auth::guard('web')->user()->info->lastname}}
                            </span>
                        </h1>
                        <span class="move-span move-span2">
                            {{Auth::guard('web')->user()->info->job_title}}</span>
                    </div>
                </div>
                <div class="data-resume2">
                    <div class="row">
                        <div class="col-md-1 col-1">
                            <div class="icon-yellow">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <i class="fa fa-envelope icon-2" aria-hidden="true"></i>
                                <i class="fa fa-home" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="col-md-9 col-9">
                            <div>
                                <p>{{Auth::guard('web')->user()->info->phone}}</p>
                                <p>{{Auth::guard('web')->user()->info->email}}</p>
                                <p>{{Auth::guard('web')->user()->info->City->name}} -
                                    {{Auth::guard('web')->user()->info->Country->name}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="profile">
                    <h4>نبذه عنى</h4>
                    <p>{!! Auth::guard('web')->user()->info->description !!}</p>
                </div>
                @if(Auth::guard('web')->user()->Experience->count() > 0 )

                <div class="experience experience-color">
                    <h4>الخبرات</h4>
                    @foreach(Auth::guard('web')->user()->Experience as $key => $edu)
                    <div>
                                    <span class="uppercase-span">
                                    {{$edu->name}}
                                            <b class="captalize-span">present</b>
                                    </span>
                        <span class="light-size">{{$edu->company}} / {{\Carbon\Carbon::parse($edu->start_date)->format('Y-m')}} - {{\Carbon\Carbon::parse($edu->end_date)->format('Y-m')}}</span>
                        <p>{{$edu->description}}.</p>
                    </div>
                    @endforeach
                    <div>
                                <span class="uppercase-span">
                                    senior ux designer -
                                    <b class="captalize-span">2016</b>
                                </span>
                        <span class="light-size">company name / location</span>
                        <p>Lorem ipsum dolor sit y na amet consectetur adipisicing elit
                            Lorem ipsum dolor sit amet consectetur adipisicing elit
                            Lorem ipsum dolor sit amet consectetur adipisicing elit
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                </div>
                @endif
                @if(count(Auth::guard('web')->user()->Knows) >0)

                <div class="reference">
                    <h4>المعرفين</h4>
                    <div class="row">
                        @foreach(Auth::guard('web')->user()->Knows as $key => $edu)
                        <div class="col-md-6 col-6">
                            <div class="border-reference">
                                <p>  اسم الشركة : {{$edu->company }}</p>
                                <p class="p2-reference"> الاسم :  {{$edu->name}}</p>
                                <p>
                                    المسمى الوظيفي : {{$edu->job_title}}
                                </p>
                                <p>
                                    رقم الهاتف  :{{$edu->phone}}
                                </p>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
                @endif
            </div>
        </section>
        <section class="col-md-4 col-4 change-row ">
            <div class="image-resume2">
                <div class="border-img-resume2">
                    @if(isset(Auth::guard('web')->user()->info->image))
                        <img src="{{Auth::guard('web')->user()->info->image}}">
                    @else
                        <img src="{{asset('assets/images/Clip.png')}}">

                    @endif
                    <div class="dott-color"></div>
                </div>
            </div>
            <div class="padding-info-resume2">
                <div class="education-resume2">
                    <h4>التعليم</h4>
                    @foreach(Auth::guard('web')->user()->education as $key => $edu)
                        <div class="education-p">
                            <p >( {{\Carbon\Carbon::parse($edu->graduation_date)->format('Y')}} )</p>
                            <p >{{$edu->name}}</p>
                            <p >{{$edu->qualification}} </p>
                            <p> {{$edu->area}}</p>
                        </div>
                    @endforeach


                </div>
                <div class="language">
                    @inject('lang','App\Models\Lang')
                    <h4>اللغات</h4>
                    <div class="row">
                        @foreach(Auth::guard('web')->user()->LangRelation as $key => $edu)
                        <div class="col-md-2 col-2">
                            <div class="squre"></div>
                        </div>
                        <div class="col-md-10 col-10">
                            <div class="captalize-div top-div-resume2">{{$lang->find($edu->lang_id)->name}}</div>
                        </div>
                            @endforeach
                    </div>
                </div>
                <div class="skills">
                    <h4>المهارات</h4>
                    <div class="row">
                        <div class="col-md-2 col-2">
                            <div class="squre"></div>
                        </div>
                        <div class="col-md-10 col-10">
                            <div class="captalize-div top-div-resume2">{!!Auth::guard('web')->user()->info->skills!!}</div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </section>
</section>



