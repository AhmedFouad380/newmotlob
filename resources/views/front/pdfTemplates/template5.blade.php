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

<body style="direction: rtl;" onload="window.print()">

<!--  this is resume 3  -->

<section class=" container a4-width3">
    <div class="resume3-top">
        <section class="row">
            <div class="col-md-4 col-4">
                <div class="img-resume3">
                    @if(isset(Auth::guard('web')->user()->info->image))
                        <img src="{{Auth::guard('web')->user()->info->image}}">
                    @else
                        <img src="{{asset('website/assets/images/Rectangle 1 copy.png')}}">
                    @endif
                </div>
            </div>
            <div class="col-md-5 col-5">
                <div class="resume3-info1">
                    <h2>                                {{Auth::guard('web')->user()->info->firstname}}
                        <span class="name-span">   {{Auth::guard('web')->user()->info->lastname}} </span></h2>
                    <span class="block-span-resume3">                                {{Auth::guard('web')->user()->info->job_title}}
</span>

                </div>
            </div>
            <div class="col-md-3 col-3">
                <div class="data-resume3">
                    <div class="adress">
                        <h6>العنوان</h6>
                        <p>{{Auth::guard('web')->user()->info->City->name}} -
                            {{Auth::guard('web')->user()->info->Country->name}}</p>
                    </div>
                    <div class="phone">
                        <h6>رقم الهاتف</h6>
                        <p>{{Auth::guard('web')->user()->info->phone}}</p>
                    </div>
                    <div class="email">
                        <h6>البريد الالكتروني</h6>
                        <p>{{Auth::guard('web')->user()->info->email}}</p>
                    </div>

                </div>
            </div>
        </section>
    </div>
    <section class="row">
        <section class="col-md-8 col-8">
            <div class="parent-divs">
                <div class="work-experience" style="width: 95%;border-bottom: 2px solid #354251;padding-bottom: 20px;">
                    <h4>الهدف المهني :</h4>

                    <div class=" experience-resume3">
                        <div class="row">
                            <div class="col-md-9 col-9">
                                <div>
                                    <h6 class="H6">                         {!! Auth::guard('web')->user()->info->description !!}
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="work-experience" style="width: 95%;border-bottom: 2px solid #354251;padding-bottom: 20px;">
                    <h4>الخبرات :</h4>
                    @foreach(Auth::guard('web')->user()->Experience as $key => $edu)

                        <div class=" experience-resume3">
                            <div class="row">
                                <div class="col-md-3 col-3">
                                    <div>{{\Carbon\Carbon::parse($edu->start_date)->format('Y-m')}} - {{\Carbon\Carbon::parse($edu->end_date)->format('Y-m')}}</div>
                                </div>
                                <div class="col-md-9 col-9">
                                    <div>
                                        <h6 class="H6"> {{$edu->name}}</h6>
                                        <h6 Class="Hh6">{{$edu->company}}</h6>
                                        <p>{{$edu->description}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                <div class="work-experience" style="width: 95%;border-bottom: 2px solid #354251;padding-bottom: 20px;">
                    <h4>المهارات :</h4>

                        <div class=" experience-resume3">
                            <div class="row">
                                <div class="col-md-9 col-9">
                                    <div>
                                        <h6 class="H6">                         {!! Auth::guard('web')->user()->info->skills !!}
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>

                </div>
                @if(count(Auth::guard('web')->user()->Courses) >0)

                    <div class="reference4  " style="width: 95%;border-bottom: 2px solid #354251;padding-bottom: 20px;">
                        <h4>الدورات و المؤتمرات
                            :
                        </h4>
                        <div class="row">
                            @foreach(Auth::guard('web')->user()->Courses as $key => $edu)
                                <div class="col-md-6 col-6">
                                    <div class="border-reference4" style="
    border-right: 2px solid #354251; margin-right: 10px;
}">
                                        <p style="    margin-right: 14px;">
                                            @if($edu->type == 'course ') الدورة @else المؤتمر  @endif : {{$edu->name}}
                                        </p>
                                        <p style="    margin-right: 14px;" class="p2-reference"> التاريخ :  {{$edu->date}}</p>
                                        <p style="    margin-right: 14px;">
                                            الشركة  : {{$edu->company}}
                                        </p>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                @endif

            @if(count(Auth::guard('web')->user()->Knows) >0)

                    <div class="work-experience" >
                        <h4> المعرفيين :
                        </h4>
                        @foreach(Auth::guard('web')->user()->Knows as $key => $edu)

                            <div class=" experience-resume3">
                                <div class="row">

                                    <div class="col-md-9 col-9">
                                        <div>
                                            <h6 class="H6"> الاسم: {{$edu->name}}</h6>
                                            <h6 Class="H6">  الشركة : {{$edu->company}}</h6>
                                            <h6 Class="H6"> {{$edu->description}}
                                            </h6>
                                            <h6 Class="H6">  المسمى الوظيفي : {{$edu->job_title}}
                                            </h6>
                                            <h6 Class="H6">   رقم الهاتف  :{{$edu->phone}}
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                @endif


            </div>
        </section>
        <section class="col-md-4 col-4">
            <div class="pesronal-data">
                <div class="education3">
                    <h4>التعليم :</h4>
                    @foreach(Auth::guard('web')->user()->education as $key => $edu)

                        <div class="enter-major">
                            <h6>{{$edu->qualification}} </h6>
                            <p>{{$edu->name}}
                            </p>
                            <span>( {{\Carbon\Carbon::parse($edu->graduation_date)->format('Y')}} )</span>
                        </div>
                    @endforeach

                </div>
                <div class="preference3">
                    <h4>اللغات :</h4>
                    @inject('lang','App\Models\Lang')
                    @foreach(Auth::guard('web')->user()->LangRelation as $key => $edu)

                        <div class="preference3-data">
                            <h6>{{$lang->find($edu->lang_id)->name}}</h6>
                        </div>
                    @endforeach


                </div>
                <div class="hobbies">
                    <h4>المنظمات :</h4>
                    <div class="row">
                        @foreach(Auth::guard('web')->user()->Organization as $key => $edu)

                            <div class="col-12 col-md-12">
                                <div>{{$edu->name}}</div>
                            </div>

                        @endforeach

                    </div>


                </div>
            </div>
        </section>

    </section>
</section>




</body>

</html>
