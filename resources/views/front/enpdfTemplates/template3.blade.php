<!DOCTYPE html>
<html dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('website/assets/css/bootstrap.css')}}"  type="text/css">
    <link rel="stylesheet" href="{{asset('website/assets/css/all.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('website/assets/css/cv.css')}}" type="text/css">
    <title>resume 2</title>

</head>

<body style="direction: ltr;" onload="window.print()">

<!--  this is resume 3  -->

<section class=" container a4-width" id="invoice">
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
                        <span class="move-span move-span2">{{Auth::guard('web')->user()->info->job_title}}</span>
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
                <div class="profile padding-60">
                    <h4>About me </h4>
                    <p>{!! Auth::guard('web')->user()->info->description !!}</p>
                </div>
                @if(Auth::guard('web')->user()->Experience->count() > 0 )

                    <div class="experience experience-color padding-60">
                        <h4>Experience</h4>
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

                    </div>
                @endif
                @if(count(Auth::guard('web')->user()->Courses) >0)

                    <div class="reference padding-60">
                        <h4>Conferences And Courses
                            :
                        </h4>
                        <div class="row">
                            @foreach(Auth::guard('web')->user()->Courses as $key => $edu)
                                <div class="col-md-6 col-6">
                                    <div class="border-reference">
                                        <p>
                                            @if($edu->type == 'course ') Course @else Conference  @endif : {{$edu->name}}
                                        </p>
                                        <p class="p2-reference"> Date :  {{$edu->date}}</p>
                                        <p>
                                            Company name : {{$edu->company}}
                                        </p>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                @endif
                @if(count(Auth::guard('web')->user()->Organization) >0)

                    <div class="reference padding-60">
                        <h4>Organization</h4>
                        <div class="row">
                            @foreach(Auth::guard('web')->user()->Organization as $key => $edu)
                                <div class="col-md-6 col-6">
                                    <div class="border-reference">
                                        <p>  Company name : {{$edu->name }}</p>
                                        <p class="p2-reference"> Date :  {{$edu->date}}</p>
                                        <p>
                                             {{$edu->job}}
                                        </p>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                @endif
                @if(count(Auth::guard('web')->user()->Knows) >0)

                    <div class="reference padding-60">
                        <h4>References</h4>
                        <div class="row">
                            @foreach(Auth::guard('web')->user()->Knows as $key => $edu)
                                <div class="col-md-6 col-6">
                                    <div class="border-reference">
                                        <p>  Company name : {{$edu->company }}</p>
                                        <p class="p2-reference"> name :  {{$edu->name}}</p>
                                        <p>
                                            Job title : {{$edu->job_title}}
                                        </p>
                                        <p>
                                            phone  :{{$edu->phone}}
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
                    <h4>Education</h4>
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
                    <h4>Languages</h4>
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
                    <h4>Skills</h4>
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
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js"></script>
<script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>

<script src="{{asset('website/assets/js/bootstrap.min.js')}}" ></script>

{{--<script>--}}

{{--    window.onload = function () {--}}
{{--        var HTML_Width = $("#invoice").width() - 100;--}}
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
