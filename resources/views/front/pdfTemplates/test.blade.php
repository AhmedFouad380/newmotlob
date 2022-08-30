<!DOCTYPE html>
<html dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap.min.css"> -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet"  href="{{asset('website/assets/css/bootstrap.css')}}">
    <link rel="stylesheet"  href="{{asset('website/assets/css/all.min.css')}}">
    <link rel="stylesheet"  href="{{asset('website/assets/css/style.css')}}">
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>--}}

{{--    <script src="{{asset('website/assets/js/jquery.js')}}" ></script>--}}
{{--        <script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.min.js"--}}
{{--                integrity="sha256-c9vxcXyAG4paArQG3xk6DjyW/9aHxai2ef9RpMWO44A=" crossorigin="anonymous"></script>--}}
{{--        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>--}}
{{--    --}}
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js"></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
    <title>cv</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
    </style>

</head>

<body dir="rtl"  style="font-family: DejaVu Sans">
<section class="container page-size" id="invoice" style="max-width: 1100px!important;">
    <div class="row" >
            <div class="col-md-3">
                <div class="resume-flex">
                    <div class="resume-img">
                        <img src="{{Auth::guard('web')->user()->info->image}}">
                    </div>
                    <div class="resume-info">
                        <h2>{{Auth::guard('web')->user()->info->firstname}} {{Auth::guard('web')->user()->info->lastname}}</h2>
                        <p>{{Auth::guard('web')->user()->info->job_title}}</p>
                    </div>
                    <div class="resume-profile">
                        <h6>نبذه عنى</h6>
                        <p>{!! Auth::guard('web')->user()->info->description !!}</p>
                    </div>
                    <div class="resume-contact">
                        <div>
                            <h6>بيانات التواصل</h6>
                        </div>
                        <div>
                            <p>{{Auth::guard('web')->user()->info->phone}}</p>
                        </div>
                        <div>
                            <p>{{Auth::guard('web')->user()->info->Country->name}} <br>
                                {{Auth::guard('web')->user()->info->City->name}}</p>
                        </div>
                        <div>
                            <p>{{Auth::guard('web')->user()->info->email}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-1 resume-border"></div>

        <div class="col-md-8 " style="    margin-top: 12px;">
            <div class="resume-flex2">
                <div class="row">
                    <div class="col-md-3">
                        <h4> التعليم </h4>
                    </div>
                    <div class="col-md-9">
                        <div class="data-border"></div>
                    </div>
                </div>

                <div class="container">
                    <div class="row repeat">
                        @foreach(Auth::guard('web')->user()->education as $key => $edu)

                            <div class="row">
                                <div class="col-md-12">
                                    <div class=" div-img"></div>
                                    <div class="new-border">
                                        <div class="add-space">
                                            <h3 class="title-h3 m-r-10" style="font-size: 14px!important;">    ( {{\Carbon\Carbon::parse($edu->graduation_date)->format('Y')}} )</h3>
                                            <h3 class="title-h3">{{$edu->name}}</h3>
                                            <h6 class="title-h6">{{$edu->qualification}} - {{$edu->area}} </h6>
                                            <p class="titlep">

                                            </p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>


            </div>
            <br>
            <br>
            <div class="resume-flex2">
                <div class="row">
                    <div class="col-md-3">
                        <h4> الخبرات </h4>
                    </div>
                    <div class="col-md-9">
                        <div class="data-border"></div>
                    </div>
                </div>

                <div class="container">
                    <div class="row repeat">
                        @foreach(Auth::guard('web')->user()->Experience as $key => $edu)

                            <div class="col-md-12 resume-repeat">
                                <div class="row">

                                    <div class="col-md-12">
                                        <div class=" div-img"></div>
                                        <h3 class="title-h3 m-r-10" style="font-size: 14px!important;">  (  {{\Carbon\Carbon::parse($edu->start_date)->format('Y-m')}} : {{\Carbon\Carbon::parse($edu->end_date)->format('Y-m')}})</h3>
                                        <div class="new-border">
                                            <div class="add-space">
                                                <h3 class="title-h3">{{$edu->name}}</h3>
                                                <h6 class="title-h6">{{$edu->company}}</h6>
                                                <p class="titlep">
                                                    {{$edu->description}}
                                                </p>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>


            </div>
            <br>
            <br>
            <div class="resume-flex2">
                <div class="row">
                    <div class="col-md-3">
                        <h4> اللغات </h4>
                    </div>
                    <div class="col-md-9">
                        <div class="data-border"></div>
                    </div>
                </div>

                <div class="container">


                    <div class="row repeat">

                        <div class="col-md-12 resume-repeat">
                            <div class="row">
                                @foreach(Auth::guard('web')->user()->LangRelation as $key => $edu)

                                    <div class="col-md-4">
                                        @inject('lang','App\Models\Lang')
                                        <?php
                                        if($edu->type == 'excellent'){
                                            $value = 100;

                                        }elseif($edu->type == 'very_good'){
                                            $value = 80;
                                        }elseif($edu->type == 'good'){
                                            $value = 60;
                                        }else{
                                            $value = 30;
                                        }
                                        ?>
                                        <div class="donut-chart-container donut-chart-js" data-percentage="{{$value}}">
                                            <p class="donut-chart-value"></p>
                                            <svg class="donut-chart-wrapper">
                                                <circle class="donut-chart-bg" cx="60" cy="50" r="30"></circle>
                                                <circle class="donut-chart" cx="60" cy="50" r="30"></circle>
                                            </svg>
                                            <div class="chart-shadow"></div>
                                            <p class="nameAlgo">{{$lang->find($edu->lang_id)->name}}</p>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>

                    </div>
                </div>


            </div>
            <br>
            <br>

        </div>
    </div>
    <div class="data-border"></div>
    <div class="row" style="margin-top:20px">

        <div class="col-md-12" >

            <div class="resume-flex2">
                <div class="row">
                    <div class="col-md-3">
                        <h4> المهارات </h4>
                    </div>
                    <div class="col-md-9">
                        <div class="data-border"></div>
                    </div>
                </div>

                <div class="container">


                    <div class="row repeat">

                        <div class="col-md-12 resume-repeat">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class=" div-img"></div>
                                    <div class="new-border">
                                        <div class="add-space">
                                            <p class="titlep">
                                                {!!Auth::guard('web')->user()->info->skills!!}
                                            </p>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>
                </div>


            </div>

        </div>
        <div class="col-md-12" >

            <div class="resume-flex2">
                <div class="row">
                    <div class="col-md-3">
                        <h4> المؤتمرات و الدورات
                        </h4>
                    </div>
                    <div class="col-md-9">
                        <div class="data-border"></div>
                    </div>
                </div>

                <div class="container">


                    <div class="row repeat">

                        <div class="col-md-12 resume-repeat">
                            @foreach(Auth::guard('web')->user()->Courses as $key => $edu)

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class=" div-img"></div>
                                        <div class="new-border">
                                            <div class="add-space">
                                                <h3 class="title-h3 m-r-10" style="font-size: 14px!important;">    ( {{\Carbon\Carbon::parse($edu->date)->format('Y')}} )</h3>
                                                <h3 class="title-h3">@if($edu->type == 'course ') دورة @else مؤتمر  @endif : {{$edu->name}}</h3>
                                                <h6 class="title-h6">اسم الشركة :{{$edu->company}}  </h6>
                                                <p class="titlep">

                                                </p>
                                            </div>
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


</section>


    <button onclick="getPDF()">geneterare</button>
</body>

<script src="{{asset('website/assets/js/bootstrap.min.js')}}" ></script>

<script>
    $(document).ready(function() {
        var donutChart = $('.donut-chart-js');

        if(donutChart.length > 0) {

            $.each(donutChart, function(index, item) {
                var donutChartPercentage = $(item).attr('data-percentage');
                var donutChartRadio = $(item).find('.donut-chart').attr("r");
                var donutChartValue = ( (100 - Number(donutChartPercentage)) * (6.28 * Number(donutChartRadio)) )/100;

                $(item).find('.donut-chart-value').html(donutChartPercentage + "%");
                $(item).find('circle.donut-chart').css('stroke-dashoffset', donutChartValue);
            });
        }

    });
</script>
<script src="{{asset('website/assets/html2canvas.js')}}"></script>
<script>

    // function getPDF(){
    //
    //     var HTML_Width = $("#invoice").width();
    //     var HTML_Height = $("#invoice").height();
    //     var top_left_margin = 15;
    //     var PDF_Width = HTML_Width+(top_left_margin*2);
    //     var PDF_Height = (PDF_Width*1.5)+(top_left_margin*2);
    //     var canvas_image_width = HTML_Width;
    //     var canvas_image_height = HTML_Height;
    //
    //     var totalPDFPages = Math.ceil(HTML_Height/PDF_Height)-1;
    //
    //
    //     html2canvas($("#invoice")[0],{allowTaint:true}).then(function(canvas) {
    //         canvas.getContext('2d');
    //
    //         console.log(canvas.height+"  "+canvas.width);
    //
    //
    //         var imgData = canvas.toDataURL("image/jpeg", 1.0);
    //         var pdf = new jsPDF('p', 'pt',  [PDF_Width, PDF_Height]);
    //         pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin,canvas_image_width,canvas_image_height);
    //
    //
    //         for (var i = 1; i <= totalPDFPages; i++) {
    //             pdf.addPage(PDF_Width, PDF_Height);
    //             pdf.addImage(imgData, 'JPG', top_left_margin, -(PDF_Height*i)+(top_left_margin*4),canvas_image_width,canvas_image_height);
    //         }
    //
    //         pdf.save("HTML-Document.pdf");
    //     });
    // };
    function getPDF(){

        var HTML_Width = $("#invoice").width();
        var HTML_Height = $("#invoice").height();
        var top_left_margin = 15;
        var PDF_Width = HTML_Width+(top_left_margin*2);
        var PDF_Height = (PDF_Width*1.5)+(top_left_margin*2);
        var canvas_image_width = HTML_Width;
        var canvas_image_height = HTML_Height;

        var totalPDFPages = Math.ceil(HTML_Height/PDF_Height)-1;


        html2canvas($("#invoice")[0],{allowTaint:true}).then(function(canvas) {
            canvas.getContext('2d');

            console.log(canvas.height+"  "+canvas.width);


            var imgData = canvas.toDataURL("image/jpeg", 1.0);
            var pdf = new jsPDF('p', 'pt',  [PDF_Width, PDF_Height]);
            pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin,canvas_image_width,canvas_image_height);


            for (var i = 1; i <= totalPDFPages; i++) {
                pdf.addText('<hr>');
                pdf.addPage(PDF_Width, PDF_Height);
                pdf.addImage(imgData, 'JPG', top_left_margin, -(PDF_Height*i)+(top_left_margin*4),canvas_image_width,canvas_image_height);
            }

            pdf.save("HTML-Document.pdf");
        });
    };

</script>
{{--<script src="{{asset('website/assets/pdf.js')}}"></script>--}}


</html>
