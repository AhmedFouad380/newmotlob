<!DOCTYPE html>
<html dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="{{asset('website/assets/css/bootstrap.css')}}"  type="text/css">
    <link rel="stylesheet" href="{{asset('website/assets/css/all.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('website/assets/css/ar_cv.css')}}" type="text/css">
    <title>مطلوب || سيرة ذاتية</title>

</head>

<body style="direction: rtl;">

<!--  this is resume 4  -->

<section class=" container a4-width3" style="width: 180mm!important;">
    <section class="row">
        <div class="col-lg-4 col-md-4 col-4 change-row">
            <div class="resume4-img">
                <div class="resume4-image">
                    @if(isset(Auth::guard('web')->user()->info->image))
                        <img src="{{Auth::guard('web')->user()->info->image}}">
                    @else
                        <img src="{{asset('assets/images/image.png')}}">
                    @endif
                </div>
                <div class="resume4-color">
                </div>
            </div>
            <div class="margin4">
                <div class="resume4-contact">
                    <div class="resume4-bottom">
                        <h4>معلومات التواصل</h4>
                        <div class="row">
                            <div class="col-md-2 col-lg-2 col-2">
                                <div class="icon-yellow-4">
                                            <span>
                                                <i class="fa fa-phone" aria-hidden="true"></i>
                                            </span>
                                    <span>
                                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                            </span>
                                    <span>
                                                <i class="fa fa-home" aria-hidden="true"></i>
                                            </span>
                                </div>
                            </div>
                            <div class="col-md-10 col-10 ">
                                <div class="contact4-span">
                                    <span>{{Auth::guard('web')->user()->info->phone}}</span>
                                    <span>{{Auth::guard('web')->user()->info->email}}</span>
                                    <span>{{Auth::guard('web')->user()->info->City->name}} -
                                    {{Auth::guard('web')->user()->info->Country->name}}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="resume4-education">
                    <div class="resume4-bottom">
                        <h4>التعليم</h4>
                        @foreach(Auth::guard('web')->user()->education as $key => $edu)
                            <div class="about4-education">
                                <p class="resume4-date" >( {{\Carbon\Carbon::parse($edu->graduation_date)->format('Y')}} )</p>
                                <p  class="resume4-dgree">{{$edu->qualification}} </p>
                                <p  class="resume4-dgree">  {{$edu->area}}</p>
                                <p class="resume4-universtiy" >{{$edu->name}}</p>

                            </div>
                        @endforeach
                    </div>

                </div>
                <div class="resume4-languge">
                    <div>
                        @inject('lang','App\Models\Lang')

                        <h4 class="">اللغات</h4>
                        <div class="row div4">
                            @foreach(Auth::guard('web')->user()->LangRelation as $key => $edu)
                                <div class="col-md-2 col-2">
                                    <div class="squre squre-color4"></div>
                                </div>
                                <div class="col-md-10 col-10">
                                    <div class="captalize-div ">{{$lang->find($edu->lang_id)->name}}</div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-8 col-md-8 col-8 change-row">
            <div class="left-resum4">
                <div class="row">
                    <div class="col-md-11 col-11">
                        <div>
                            <h1 class="h1-resume4">
                                {{Auth::guard('web')->user()->info->firstname}}    {{Auth::guard('web')->user()->info->lastname}}


                            </h1>
                            <span class="span4header">
                                {{Auth::guard('web')->user()->info->job_title}}
                            </span>
                        </div>
                    </div>
                    <div class="col-md-1 col-1">
                        <div class="yellow-div4"></div>
                    </div>
                </div>
                <div class="profile4 resume4-bottom">
                    <h4>نيذه عني </h4>
                    <p class="p44">
                        {!! Auth::guard('web')->user()->info->description !!}
                    </p>


                </div>


                <div class="experience4 resume4-bottom">
                    <h4>الخبرات</h4>
                    @foreach(Auth::guard('web')->user()->Experience as $key => $edu)

                        <div class="div-experience4">
                                    <span class="captalize4-span">
                                                                            {{$edu->name}}

                                    </span>
                            <span class="captalize4-span">{{$edu->company}} / {{\Carbon\Carbon::parse($edu->start_date)->format('Y-m')}} - {{\Carbon\Carbon::parse($edu->end_date)->format('Y-m')}}</span>
                            <p class="p44">{{$edu->description}}</p>
                        </div>
                    @endforeach

                </div>
                <div class="profile4 resume4-bottom">
                    <h4>المهارات</h4>
                    <p class="p44">
                        {!! Auth::guard('web')->user()->info->skills !!}
                    </p>


                </div>
                @if(count(Auth::guard('web')->user()->Knows) >0)

                    <div class="reference4">
                        <h4>المعرفيين</h4>
                        <div class="row">
                            @foreach(Auth::guard('web')->user()->Knows as $key => $edu)
                                <div class="col-md-6 col-6">
                                    <div class="border-reference reference4-lastspan ">
                                        <span>  اسم الشركة : {{$edu->company }}</span>
                                        <span class="p2-reference"> الاسم :  {{$edu->name}}</span>
                                        <span>
                                        المسمى الوظيفي : {{$edu->job_title}}
                                    </span>
                                        <span>
                                        رقم الهاتف  :{{$edu->phone}}
                                    </span>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                    @endif
            </div>

        </div>
    </section>
</section>



</body>

</html>
