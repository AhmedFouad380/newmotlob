<!DOCTYPE html>
<html dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="{{asset('website/assets/css/bootstrap.css')}}"  type="text/css">
    <link rel="stylesheet" href="{{asset('website/assets/css/all.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('website/assets/css/ar_cv.css')}}" type="text/css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js"></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>

    <title>Template 2</title>

</head>

<body style="direction: rtl;" onload="window.print()">

<!--  this is resume 2  -->

<section class=" container a4-width" id="invoice" >
    <section class="row">
        <div class="col-md-4 col-4 change-row resume1-color">
            <div  id="sidebar" class="">
                <div class="center-cvimg">
                    <div class="img-size">
                        <img src="{{Auth::guard('web')->user()->info->image}}">
                    </div>
                </div>
                <div class="resume1-about">
                    <h4>
                        <span class="i-color"><i class="fa fa-user" aria-hidden="true"></i></span>
                        نبذه عنى
                    </h4>
                    <p>{!! Auth::guard('web')->user()->info->description !!}</p>
                </div>
                <div class="contact">
                    <h4>بيانات التواصل</h4>
                    <div class="row">
                        <div class="col-md-2 col-2">
                            <div class="icon-blue">
                                <i class="fa fa-user icon-2 " aria-hidden="true"></i>
                                <i class="fa fa-phone icon-2" aria-hidden="true"></i>
                                    <i class="fa fa-envelope icon-2" aria-hidden="true"></i>
                                <i class="fa fa-home icon-2 " aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="col-md-10 col-10 ">
                            <div>
                                <p class="p">{{ Auth::guard('web')->user()->birth_date }}</p>
                                <p class="p">{{Auth::guard('web')->user()->info->phone}}</p>
                                <p class="p">{{Auth::guard('web')->user()->info->email}}</p>
                                <p class="p">
                                    {{Auth::guard('web')->user()->info->Country->name}}  -
                                    {{Auth::guard('web')->user()->info->City->name}}
                                </p>
                                <p class="p">
                                    -{{Auth::guard('web')->user()->State->name}}
                                    -{{Auth::guard('web')->user()->Village->name}}

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="education">
                    <h4>
                        <span class="i-color"><i class="fa fa-book" aria-hidden="true"></i></span>
                        التعليم
                    </h4>
                    @foreach(Auth::guard('web')->user()->education as $key => $edu)
                    <div class="about-education">
                        <p class="resume-date">( {{\Carbon\Carbon::parse($edu->graduation_date)->format('Y')}} )</p>
                        <p class="resume-dgree">{{$edu->name}}</p>
                        <p class="resume-universtiy">{{$edu->qualification}} - {{$edu->area}}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-8 col-8">
            <div class="left-space-cv">
                <div class="row">
                    <div class="col-md-11 col-11">
                        <div>
                            <h1>
                                <span class="color-h">{{Auth::guard('web')->user()->info->firstname}}</span>
                                {{Auth::guard('web')->user()->info->lastname}}
                            </h1>
                            <span class="move-span"> {{Auth::guard('web')->user()->info->job_title}}</span>
                        </div>
                    </div>
                    <div class="col-md-1 col-1">
                        <div class="blue-div"></div>
                    </div>
                </div>

                @if(Auth::guard('web')->user()->Experience->count() > 0 )
                <div class="experience">
                    <h4>الخبرات:</h4>
                    @foreach(Auth::guard('web')->user()->Experience as $key => $edu)

                    <div>
                                <span class="uppercase-span">
                                    {{$edu->name}}
                                    <br>
                                    <b class="captalize-span">{{\Carbon\Carbon::parse($edu->start_date)->format('Y-m')}} - {{\Carbon\Carbon::parse($edu->end_date)->format('Y-m')}}</b>
                                </span>
                        <span class="light-size">{{$edu->company}}</span>
                        <p> {{$edu->description}}.</p>
                    </div>
                    @endforeach
                </div>
                @endif
                @if(Auth::guard('web')->user()->LangRelation->count() > 0 )
                <div class="pro-skills">
                    <h4>اللغات:</h4>
                    <div class="row">
                        @inject('lang','App\Models\Lang')

                    @foreach(Auth::guard('web')->user()->LangRelation as $key => $edu)

                        <div class="repeat">
                            <div class="row">
                                <div class="col-md-3 col-3">
                                    <h6>{{$lang->find($edu->lang_id)->name}}</h6>
                                </div>
                                <div class="col-md-9 col-9">
                                    <div class="progress-div">
                                        <div class="shape1">
                                            <?php
                                            if($edu->type == 'excellent'){
                                                $value = '0px';

                                            }elseif($edu->type == 'very_good'){
                                                $value = '46px';
                                            }elseif($edu->type == 'good'){
                                                $value = '95px';
                                            }else{
                                                $value = '150px';
                                            }
                                            ?>

                                            <div  class="shape2" style="right: {{$value}}!important;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
                @endif
                @if(isset(Auth::guard('web')->user()->info->skills) )
                <div class="interests">
                    <h4>المهارات
                        :
                    </h4>
                    <div class="padding-interests">
                        <div class="row">
                            <div class="col-md-12 col-12">
                                <p>{!!Auth::guard('web')->user()->info->skills!!}</p>
                            </div>

                        </div>
                    </div>
                </div>
                @endif
                @if(count(Auth::guard('web')->user()->Courses) >0)
                <div class="experience">
                    <h4>المؤتمرات و الدورات :</h4>
                    @foreach(Auth::guard('web')->user()->Courses as $key => $edu)

                        <div>
                                <span class="uppercase-span">
                                    @if($edu->type == 'course ') دورة @else مؤتمر  @endif : {{$edu->name}}
                                    <br>
                                    <b class="captalize-span">{{\Carbon\Carbon::parse($edu->date)->format('Y-m')}}</b>
                                </span>
                            <span class="light-size">{{$edu->company}}</span>
                        </div>
                    @endforeach
                </div>
                @endif
                @if(count(Auth::guard('web')->user()->Organization) >0)
                    <div class="experience">
                        <h4>المنظمات :</h4>
                        @foreach(Auth::guard('web')->user()->Organization as $key => $edu)

                            <div>
                                <span class="uppercase-span">
                                    {{$edu->name}}
                                    <br>
                                    <b class="captalize-span">{{\Carbon\Carbon::parse($edu->date)->format('Y-m')}}</b>
                                </span>
                                <span class="light-size">{{$edu->job}}</span>
                            </div>
                        @endforeach
                    </div>
                @endif

            @if(count(Auth::guard('web')->user()->Knows) >0)
                    <div class="interests">
                        <h4>المعرفين
                            :
                        </h4>
                        <div class="padding-interests">
                            <div class="row">
                                @foreach(Auth::guard('web')->user()->Knows as $key => $edu)

                                    <div class="col-md-6 col-6">
                                        <p>  اسم الشركة : {{$edu->company }}</p>
                                        <p> الاسم :  {{$edu->name}}</p>
                                        <p>
                                            المسمى الوظيفي : {{$edu->job_title}}
                                        </p>
                                        <p>
                                            رقم الهاتف  :{{$edu->phone}}
                                        </p>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                @endif
{{--                <div class="interests">--}}
{{--                    <h4>المهارات</h4>--}}
{{--                    <div class="padding-interests">--}}
{{--                        <div class="row">--}}

{{--                            <div class="col-md-3 col-3">--}}
{{--                                <p>travelling</p>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-3 col-3">--}}
{{--                                <p>singing</p>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-3 col-3">--}}
{{--                                <p>sketching</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

            </div>
        </div>
    </section>
</section>



<script src="{{asset('website/assets/js/bootstrap.min.js')}}" ></script>

{{--<script>--}}

{{--    window.onload = function () {--}}
{{--        var HTML_Width = $("#invoice").width() - 200;--}}
{{--        var HTML_Height = $("#invoice").height();--}}
{{--        var top_left_margin = 10;--}}
{{--        var PDF_Width = HTML_Width+(top_left_margin*2);--}}
{{--        var PDF_Height = $('#invoice').height()   ;--}}

{{--        var canvas_image_width = HTML_Width;--}}
{{--        var canvas_image_height = HTML_Height;--}}


{{--        var totalPDFPages = Math.ceil(HTML_Height/PDF_Height)-1;--}}

{{--        html2canvas($("#invoice")[0],{allowTaint:true}).then(function(canvas) {--}}
{{--            canvas.getContext('2d');--}}

{{--            var imgData = canvas.toDataURL("image/jpeg", 1.0);--}}
{{--            var pdf = new jsPDF("p", "pt",  [595.28, PDF_Height]);--}}
{{--            pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin,canvas_image_width,canvas_image_height);--}}

{{--            nextPage = PDF_Height + 30 ;--}}
{{--            for (var i = 1; i <= totalPDFPages; i++) {--}}
{{--                pdf.addPage(PDF_Width, PDF_Height);--}}
{{--                pdf.addImage(imgData, 'JPG', top_left_margin, -(nextPage*i)+(top_left_margin*4),canvas_image_width,canvas_image_height);--}}
{{--            }--}}
{{--            pdf.save("CV.pdf");--}}


{{--        });--}}
{{--    };--}}
{{--</script>--}}

</body>

</html>
