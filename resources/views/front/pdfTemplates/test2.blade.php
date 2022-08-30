<!DOCTYPE html>
<html dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap.min.css"> -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>cv</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        .row {
            --bs-gutter-x: 1.5rem;
            --bs-gutter-y: 0;
            display: flex;
            flex-wrap: wrap;
            margin-top: calc(var(--bs-gutter-y) * -1);
            margin-left: calc(var(--bs-gutter-x) * -0.5);
            margin-right: calc(var(--bs-gutter-x) * -0.5);
        }
        .col-md-1, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-10, .col-md-11, .col-md-12 {
            float: right !important;
        }

        .col-md-12 {
            width: 100%;
            flex: 0 0 auto;

        }

        .col-md-11 {
            width: 91.66666666666666%;
            flex: 0 0 auto;
        }

        .col-md-10 {
            width: 83.33333333333334%;
            flex: 0 0 auto;
        }

        .col-md-9 {
            width: 75%;
            flex: 0 0 auto;
        }

        .col-md-8 {
            width: 66.66666666666666%;
        }

        .col-md-7 {
            width: 58.333333333333336%;
        }

        .col-md-6 {
            width: 50%;
        }

        .col-md-5 {
            width: 41.66666666666667%;
        }

        .col-md-4 {
            width: 33.33333333333333%;
            flex: 0 0 auto;
        }

        .col-md-3 {
            width: 25%;
            flex: 0 0 auto;

        }

        .col-md-2 {
            width: 16.666666666666664%;
        }

        .col-md-1 {
            width: 8.333333333333332%;
        }

        .border-top1{
            border-top:5px solid #000000;
            position: fixed;
            top: 0;
        }
        .border-bottom1{
            border-bottom:5px solid #000000;
            position: fixed;
            bottom: 0;
        }
        .border-right1{
            border-right:5px solid #000000;
            position: fixed;
            right: 0;
        }
        .border-left1{
            border-left:5px solid #000000;
            position: fixed;
            left: 0;
        }
        /* this is resume1 */
        .page-size {
            /*border: 2px solid #343240;*/
            margin-top: 30px;
            margin-bottom: 30px;
            width: 97%;
            min-height:100%;
        }
        .resume-profile p {
            font-size: 13px;
        }

        .width-inhert {
            width: 100%
        }
        .resume-img {
            border-radius: 50%;
            width: 100%;
            text-align: center;
            margin-top: 35px
        }
        .resume-img img {
            padding: 3px;
            border-radius: 50%;
            border: 3px solid #000;
            width: inherit;
            height: inherit;
        }
        .resume-info {
            margin-top: 30px;
            text-transform: uppercase;
            text-align: center;
        }
        .resume-info h1 {
            font-weight: lighter;
            font-size: 22px;
            letter-spacing: -1px;
            line-height: 30px;
        }
        }
        .resume-info p {
            font-weight: lighter;
            font-size: 15px;
            line-height: 55px;
            text-transform: uppercase;
            line-height: 12px ;
        }
        .resume-profile {
            margin-top: 70px;
            margin-bottom: 70px;
            text-align: center;
        }
        .resume-contact {
            text-align: center;
        }
        .resume-profile h6 ,
        .resume-contact h6 {
            text-transform: uppercase;
            font-weight: bolder;
            border-bottom: 1px solid #33313F;
            padding-bottom: 20px;
        }
        ز
        .resume-profile p ,
        .resume-contact p {
            font-size: 9px;
            font-weight: lighter;
            line-height: 25px;
            margin-bottom:0;
        }
        .resume-border {
            border-left: 2px solid #343240;
            width: 2px !important;
        }
        .resume-h4 {
            text-transform: uppercase;
            font-size: 20px;
            font-weight: bolder;
            width: 100%;
        }
        .margin-50 {
            margin-top: 50px;
            padding-left: 40px;
        }
        .data-border {
            width: 100%;
            height: 1px;
            margin-top: 18px;
            background-color: #343240;
        }
        .repeat {
            margin-top: 30px;
            /*padding-left: 100px;*/
        }
        .resume-repeat {
            width: 100%;
        }
        .div-img  {
            background: url('../images/bullet-cv.png') no-repeat;
            width: 20px;
            height: 20px;
            margin-top: -5px;
            position: absolute;
            margin-right: -12px;

        }
        .new-border {
            border-right: 1px solid #33313F;
            margin-left: -57px;
            height: 100%;
        }
        .add-space {
            padding-left: 25px;
            padding-right: 8px;
        }
        .date {
            font-size: 13px;
            font-weight: lighter;
        }

        .title-h3 {
            font-size: 16px;
            font-weight: lighter;
            text-transform: capitalize;
        }
        .title-h6 {
            font-size: 15px;
            font-weight: lighter;
            text-transform: capitalize;
        }
        .m-r-10{
            margin-right:10px
        }
        .titlep {
            margin-top: 0;
            font-size: 9px;
            font-weight: lighter;
            line-height: 25px;
            text-align: justify;
            text-transform: capitalize;
            margin-top: -8px !important;
            margin-bottom: 10px

        }
        /*chart css*/

        .donut-chart-container {
            display: inline-block;
            margin: 0 auto;
            position: relative;
            background-color: #fff;
            margin-right:8px;
        }

        .donut-chart-wrapper {
            -webkit-transform: rotate(-90deg);
            transform: rotate(-90deg);
            width: 110px;
            height: 110px;
            display: block;
            position: relative;
            z-index: 20;
        }

        .donut-chart {
            fill: transparent;
            stroke: #5d6163;
            stroke-width: 30px;
            stroke-dasharray: 193px;
            stroke-dashoffset:282.6px;
            -webkit-transition: stroke-dashoffset 1.5s ease-in;
            transition: stroke-dashoffset 1.5s ease-in;
        }

        .donut-chart-bg {
            fill: #fff;
            stroke: #d6d6d6;
            stroke-width: 30px;
        }

        .donut-chart-value,
        .chart-shadow {
            position: absolute;
            left: 50%;
            top: 50%;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }

        .donut-chart-value {
            color: #5e5e5e;
            z-index: 50;
            margin: 0;
            font-weight: bold;
            font-size: 9px;
            margin-top:-25px;
            margin-left: -5px;
        }

        .chart-shadow {
            width: 82px;
            height: 88px;
            background-color: #fff;
            box-shadow: 0 3px 5px rgba(0, 0, 0, 0.1);
            border-radius: 50%;
            margin-top:-25px;
        }

        .nameAlgo {
            text-align:center;
        }
        @media print {
            page-size{
                width:100%;
            }
            .div-img{

                /*margin-right: 20px;*/
            }
            /*chart css*/

            .donut-chart-container {
                display: inline-block;
                margin: 0 auto;
                position: relative;
                background-color: #fff;
                margin-right:8px;
            }

            .donut-chart-wrapper {
                -webkit-transform: rotate(-90deg);
                transform: rotate(-90deg);
                width: 110px;
                height: 110px;
                display: block;
                position: relative;
                z-index: 20;
            }

            .donut-chart {
                fill: transparent;
                stroke: #5d6163;
                stroke-width: 30px;
                stroke-dasharray: 193px;
                stroke-dashoffset:282.6px;
                -webkit-transition: stroke-dashoffset 1.5s ease-in;
                transition: stroke-dashoffset 1.5s ease-in;
            }

            .donut-chart-bg {
                fill: #fff;
                stroke: #d6d6d6;
                stroke-width: 30px;
            }

            .donut-chart-value,
            .chart-shadow {
                position: absolute;
                left: 50%;
                top: 50%;
                -webkit-transform: translate(-50%, -50%);
                transform: translate(-50%, -50%);
            }

            .donut-chart-value {
                color: #5e5e5e;
                z-index: 50;
                margin: 0;
                font-weight: bold;
                font-size: 9px;
                margin-top:-25px;
                margin-left: -5px;
            }

            .chart-shadow {
                width: 82px;
                height: 88px;
                background-color: #fff;
                box-shadow: 0 3px 5px rgba(0, 0, 0, 0.1);
                border-radius: 50%;
                margin-top:-25px;
            }

            .nameAlgo {
                text-align:center;
            }
        }
    </style>

</head>

<body dir="rtl"  style="font-family: DejaVu Sans; ">
<section class="container page-size" id="invoice" style="             margin-top: 30px;
            margin-bottom: 30px;
            width: 97%;
            min-height:100%;
max-width: 1320px;padding-left: var(--bs-gutter-x, 0.75rem);padding-right: var(--bs-gutter-x, 0.75rem);margin-left: auto;margin-right: auto;">
    <div class="border-top1"></div>
    <div class="border-bottom1"></div>
    <div class="border-right1"></div>
    <div class="border-left1"></div>

    <div class="row">
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
    <div class="row">

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
                                    <h3 class="title-h3 m-r-10" style="font-size: 14px!important;">  (  {{\Carbon\Carbon::parse($edu->start_date)->format('Y-m')}} : {{\Carbon\Carbon::parse($edu->end_date)->format('Y-m')}})</h3>
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

    </div>

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
</script>
<script src="{{asset('website/assets/html2canvas.js')}}"></script>
<script>
    window.onload = function () {
        html2canvas(document.getElementById('invoice'),{
            onrendered: function (canvas) {
                var img = canvas.toDataURL('image/png');
                var doc = new jsPDF();
                doc.addImage(img,'png',20,20)
                doc.save('testa.pdf')
            }
        });
    }
</script>
<script src="{{asset('website/assets/pdf.js')}}"></script>


</html>
