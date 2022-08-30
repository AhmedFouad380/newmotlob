<!DOCTYPE html>
<html dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="{{asset('website/assets/css/bootstrap.css')}}"  type="text/css">
    <link rel="stylesheet" href="{{asset('website/assets/css/all.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('website/assets/css/cv.css')}}" type="text/css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js"></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
    <title>CV</title>

</head>
<body dir="rtl">
<section class="container page-size " id="invoice" style="width:600px!important;">
    <section class="row " id="firstPage" style="max-height: 800px;">

        <div class="col-md-3 col-3 resume-border">
            <div class=" resume-img center">
                <img src="{{Auth::guard('web')->user()->info->image}}">
            </div>
            <div class=" col-md-12 resume-info ">
                <div class="width-inhert">
                    <h3>{{Auth::guard('web')->user()->info->firstname}} {{Auth::guard('web')->user()->info->lastname}}</h3>
                    <p>{{Auth::guard('web')->user()->info->job_title}}</p>
                </div>
            </div>
            <div class=" col-md-12 resume-profile">
                <div class="width-inhert">
                    <h6>نبذه عنى</h6>
                    <p>{!! Auth::guard('web')->user()->info->description !!}</p>
                </div>
            </div>
            <div class=" col-md-12 resume-contact">
                <div class="width-inhert">
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
        <div class="col-md-9  col-9 " >
{{--            education--}}
            <div class="row ">
                <div class="col-md-12 ">
                    <div class="row margin-50">
                        <div class="col-md-3">
                            <h4 class="resume-h4">التعليم</h4>
                        </div>
                        <div class=" col-md-9 " style="align-self:center">
                            <div class="data-border"></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                        <div class="row repeat">
                            @foreach(Auth::guard('web')->user()->education as $key => $edu)
                            <div class="col-md-12 resume-repeat">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="date">   ( {{\Carbon\Carbon::parse($edu->graduation_date)->format('Y')}} )</div>
                                    </div>

                                    <div class="col-md-9">
                                        <div class="div-img"></div>

                                        <div class="new-border">
                                            <div class="add-space">
                                                <h3 class="title-h3">{{$edu->name}}</h3>
                                                <h6 class="title-h6">{{$edu->qualification}} - {{$edu->area}}</h6>
                                                <p class="titlep">
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
{{--            end education--}}
{{--start experience --}}
            <div class="row ">
                <div class="col-md-12 ">
                    <div class="row margin-50">
                        <div class="col-md-3">
                            <h4 class="resume-h4">الخبرات </h4>
                        </div>
                        <div class=" col-md-9 " style="align-self:center">
                            <div class="data-border"></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="row repeat">
                        @foreach(Auth::guard('web')->user()->Experience as $key => $edu)
                            <div class="col-md-12 resume-repeat">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="date">     {{\Carbon\Carbon::parse($edu->start_date)->format('Y-m')}} <br> {{\Carbon\Carbon::parse($edu->end_date)->format('Y-m')}}</div>
                                    </div>

                                    <div class="col-md-9">
                                        <div class="div-img"></div>

                                        <div class="">
                                            <div class="add-space new-border">
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
{{--end experience--}}
            {{--start experience --}}
            {{--end experience--}}

        </div>

    </section>
    <section class="row " id="firstPage2">

    <div class="data-border"></div>
        <div class="row ">
            <div class="col-md-12 ">
                <div class="row margin-50">
                    <div class="col-md-3">
                        <h4 class="resume-h4">اللغات </h4>
                    </div>
                    <div class=" col-md-9 " style="align-self:center">
                        <div class="data-border"></div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="row repeat">
                    @foreach(Auth::guard('web')->user()->LangRelation as $key => $edu)

                        <div class="col-md-4">
                            @inject('lang','App\Models\Lang')
                            <?php
                            if($edu->type == 'excellent'){
                                $value = 'ممتاز';

                            }elseif($edu->type == 'very_good'){
                                $value = 'جيد جدا';
                            }elseif($edu->type == 'good'){
                                $value = 'جيد';
                            }else{
                                $value = 'ضعيف';
                            }
                            ?>
                            <h4 style="text-align: center; font-size:18px!important">{{$lang->find($edu->lang_id)->name}}</h4>
                            <h6 style="text-align: center"> ( {{$value}} ) </h6>
{{--                            <div class="donut-chart-container donut-chart-js" data-percentage="{{$value}}">--}}
{{--                                <p class="donut-chart-value"></p>--}}
{{--                                <svg class="donut-chart-wrapper">--}}
{{--                                    <circle class="donut-chart-bg" cx="60" cy="50" r="30"></circle>--}}
{{--                                    <circle class="donut-chart" cx="60" cy="50" r="30"></circle>--}}
{{--                                </svg>--}}
{{--                                <div class="chart-shadow"></div>--}}
{{--                                <p class="nameAlgo">{{$lang->find($edu->lang_id)->name}}</p>--}}
{{--                            </div>--}}
                        </div>
                    @endforeach
                </div>
            </div>

        </div>

        <div class="col-md-12  col-12 ">
        {{--            Skills --}}
        <div class="row ">
            <div class="col-md-12 ">
                <div class="row margin-50">
                    <div class="col-md-3">
                            <h4 class="resume-h4">المهارات</h4>
                    </div>
                    <div class=" col-md-9 " style="align-self:center">
                        <div class="data-border"></div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="row repeat">

                    <div class="col-md-12 resume-repeat">
                        <div class="row">
                            <div class="col-md-12">
                                <div class=" div-img"></div>
                                <div class="">
                                    <div class="add-space new-border">
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
        {{--            end Skills--}}

        {{--start المؤتمرات و الدورات --}}
        <div class="row ">
            <div class="col-md-12 ">
                <div class="row margin-50">
                    <div class="col-md-3">
                        <h4 class="resume-h4">المؤتمرات و الدورات</h4>
                    </div>
                    <div class=" col-md-9 " style="align-self:center">
                        <div class="data-border"></div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="row repeat">

                    <div class="col-md-12 resume-repeat">
                        <div class="row">
                            @foreach(Auth::guard('web')->user()->Courses as $key => $edu)

                                <div class="col-md-4">
                                    <div class=" div-img"></div>
                                    <div class="">
                                        <div class="add-space new-border">
                                            <h3 class="title-h3 m-r-10" style="font-size: 14px!important;">    ( {{\Carbon\Carbon::parse($edu->date)->format('Y')}} )</h3>
                                            <h3 class="title-h3">@if($edu->type == 'course ') دورة @else مؤتمر  @endif : {{$edu->name}}</h3>
                                            <h6 class="title-h6">اسم الشركة :{{$edu->company}}  </h6>

                                        </div>
                                    </div>

                                </div>
                            @endforeach
                        </div>

                    </div>

                </div>
            </div>

        </div>
        {{--end المؤتمرات و الدورات--}}

        {{--start 8 المعرفين --}}
        <div class="row ">
            <div class="col-md-12 ">
                <div class="row margin-50">
                    <div class="col-md-3">
                        <h4 class="resume-h4">المعرفين</h4>
                    </div>
                    <div class=" col-md-9 " style="align-self:center">
                        <div class="data-border"></div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="row repeat">

                    <div class="col-md-12 resume-repeat">
                        <div class="row">

                            @foreach(Auth::guard('web')->user()->Knows as $key => $edu)

                                <div class="col-md-4">
                                    <div class=" div-img"></div>
                                    <div class="">
                                        <div class="add-space new-border">
                                            <h3 class="title-h3 m-r-10" style="font-size: 14px!important;">  اسم الشركة : {{$edu->company }}</h3>
                                            <h3 class="title-h3">الاسم :  {{$edu->name}}</h3>
                                            <h6 class="title-h3">
                                                المسمى الوظيفي : {{$edu->job_title}}
                                            </h6>
                                            <h6 class="title-h3">
                                                رقم الهاتف  :{{$edu->phone}}
                                            </h6>
                                            <h6 class="title-h3">
                                                البريد الالكتروني : {{$edu->email}}
                                            </h6>


                                            </h6>

                                        </div>
                                    </div>

                                </div>
                            @endforeach
                        </div>

                    </div>

                </div>
            </div>

        </div>
        {{--end 8 المعرفين--}}

    </div>
    </section>

</section>
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

    window.onload = function () {
        var HTML_Width = $("#invoice").width();
        var HTML_Height = $("#invoice").height();
        var top_left_margin = 10;
        var PDF_Width = HTML_Width+(top_left_margin*2);
        var PDF_Height = $("#invoice").height() + 30 ;

        var canvas_image_width = HTML_Width;
        var canvas_image_height = HTML_Height;


        var totalPDFPages = Math.ceil(HTML_Height/PDF_Height)-1;

        html2canvas($("#invoice")[0],{allowTaint:true}).then(function(canvas) {
            canvas.getContext('2d');

            var imgData = canvas.toDataURL("image/jpeg", 1.0);
                var pdf = new jsPDF("p", "pt",  [595.28, PDF_Height]);
            pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin,canvas_image_width,canvas_image_height);

            nextPage = PDF_Height + 30 ;
            for (var i = 1; i <= totalPDFPages; i++) {
                pdf.addPage(PDF_Width, PDF_Height);
                pdf.addImage(imgData, 'JPG', top_left_margin, -(nextPage*i)+(top_left_margin*4),canvas_image_width,canvas_image_height);
            }
            pdf.save("CV.pdf");

        // var HTML_Width = $("#invoice").width();
        // var HTML_Height = $("#invoice").height();
        // var top_left_margin = 15;
        // // var PDF_Width = $("#invoice").width();
        // // var PDF_Height = $("#firstPage").height();
        // var PDF_Width = HTML_Width+(top_left_margin*2);
        // var PDF_Height = 210+32;
        // var canvas_image_width = HTML_Width;
        // var canvas_image_height = HTML_Height;
        //
        // var totalPDFPages = Math.ceil(HTML_Height/PDF_Height)-1;
        //
        //
        // html2canvas($("#invoice")[0],{allowTaint:true}).then(function(canvas) {
        //     canvas.getContext('2d');
        //
        //     console.log(canvas.height+"  "+canvas.width);
        //     console.log(canvas_image_width+"  "+canvas_image_height);
        //     console.log(PDF_Width+"  "+PDF_Height);
        //
        //
        //     var imgData = canvas.toDataURL("image/jpeg", 1.0);
        //     var pdf = new jsPDF('p','mm','a4');
        //     pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin,canvas_image_width,canvas_image_height);
        //
        //     nextPage = PDF_Height + 25;
        //     for (var i = 1; i <= totalPDFPages; i++) {
        //         pdf.addPage(PDF_Width, PDF_Height);
        //         pdf.addImage(imgData, 'JPG', top_left_margin, -(nextPage*i)+(top_left_margin*4),canvas_image_width,canvas_image_height);
        //     }
        //
        //     pdf.save("HTML-Document.pdf");
        });
    };
</script>
</html>
