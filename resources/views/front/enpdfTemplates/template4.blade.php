<!DOCTYPE html>
<html dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="{{asset('website/assets/css/bootstrap.css')}}"  type="text/css">
    <link rel="stylesheet" href="{{asset('website/assets/css/all.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('website/assets/css/cv.css')}}" type="text/css">
    <title>مطلوب || سيرة ذاتية</title>

</head>
<style>
    @media print {
        a[href]:after {
            content: none !important;
        }
    }
</style>
<body style="direction: ltr;" onload="window.print()">

<!--  this is resume 4  -->

<section class=" container a4-width " id="invoice">
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
                        <h4> Contact us </h4>
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
                        <h4>Education</h4>
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

                        <h4 class="">Languages</h4>
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
                    <h4>profile</h4>
                    <p class="p44">
                        {!! Auth::guard('web')->user()->info->description !!}
                    </p>


                </div>


                <div class="experience4">
                    <h4>experience</h4>
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
                    <h4>Skills</h4>
                    <p class="p44">
                        {!! Auth::guard('web')->user()->info->description !!}
                    </p>


                </div>
                @if(count(Auth::guard('web')->user()->Knows) >0)

                    <div class="reference4">
                        <h4>reference</h4>
                        <div class="row">
                            @foreach(Auth::guard('web')->user()->Knows as $key => $edu)
                                <div class="col-md-6 col-6">
                                    <div class="border-reference reference4-lastspan ">
                                        <span>  company name : {{$edu->company }}</span>
                                        <span class="p2-reference"> name :  {{$edu->name}}</span>
                                        <span>
                                        job title : {{$edu->job_title}}
                                    </span>
                                        <span>
                                        phone  :{{$edu->phone}}
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


<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js"></script>
<script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>

<link href="https://kendo.cdn.telerik.com/2022.2.621/styles/kendo.default-main.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-1.12.3.min.js"></script>
<script src="https://kendo.cdn.telerik.com/2022.2.621/js/kendo.all.min.js"></script>


<script src="{{asset('website/assets/js/bootstrap.min.js')}}" ></script>
<script>

</script>
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
