<section class="container page-size">
    <section class="row">
        <div class="col-md-3">
            <div class="resume-flex">
                <div class="resume-img">
                    <img src="{{Auth::guard('web')->user()->info->image}}">
                </div>
                <div class="resume-info">
                    <h1>{{Auth::guard('web')->user()->info->firstname}} {{Auth::guard('web')->user()->info->lastname}}</h1>
                    <p>{{Auth::guard('web')->user()->info->job_title}}</p>
                </div>
                <div class="resume-profile">
                    <h6>نبذا عنى</h6>
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
        </div>
    </section>
</section>

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


{{--    <section class="row" dir="ltr">--}}
{{--        <div class="col-md-3">--}}
{{--            <div class="resume-flex">--}}
{{--                <div class="resume-img">--}}
{{--                    <img src="{{Auth::guard('web')->user()->info->image}}">--}}
{{--                </div>--}}
{{--                <div class="resume-info">--}}
{{--                    <h1>{{Auth::guard('web')->user()->info->firstname}}<br>{{Auth::guard('web')->user()->info->lastname}}</h1>--}}
{{--                    <p>{{Auth::guard('web')->user()->info->job_title}}</p>--}}
{{--                </div>--}}
{{--                <div class="resume-profile">--}}
{{--                    <h6>About me </h6>--}}
{{--                    <p>{!! Auth::guard('web')->user()->info->description !!}</p>--}}
{{--                </div>--}}
{{--                <div class="resume-contact">--}}
{{--                    <div>--}}
{{--                        <h6>Info</h6>--}}
{{--                    </div>--}}
{{--                    <div>--}}
{{--                        <p>{{Auth::guard('web')->user()->info->phone}}</p>--}}
{{--                    </div>--}}
{{--                    <div>--}}
{{--                        <p>{{Auth::guard('web')->user()->info->Country->name}} <br>--}}
{{--                            {{Auth::guard('web')->user()->info->City->name}}  </p>--}}
{{--                    </div>--}}
{{--                    <div>--}}
{{--                        <p>{{Auth::guard('web')->user()->info->email}}--}}
{{--                            </p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-md-1 resume-border"></div>--}}

{{--        <div class="col-md-8">--}}
{{--            <div class="resume-flex2">--}}
{{--                <div>--}}
{{--                    <div class="data-flex">--}}
{{--                        <h4>Education</h4>--}}
{{--                        <div class="data-border"></div>--}}
{{--                    </div>--}}
{{--                    <div class="container">--}}
{{--                        <div class="row repeat">--}}
{{--                            <div class="col-md-12 resume-repeat">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-md-2">--}}
{{--                                        <div class="date"> 2004 -2009</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-1 div-img">--}}
{{--                                        <div></div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-8">--}}

{{--                                        <div class="new-border">--}}
{{--                                            <div class="add-space">--}}
{{--                                                <h3 class="title-h3">degree title</h3>--}}
{{--                                                <h6 class="title-h6">universty / school name</h6>--}}
{{--                                                <p class="titlep">--}}
{{--                                                    Lorem ipsum dolor sit amet.--}}
{{--                                                    Lorem ipsum dolor sit amet.--}}
{{--                                                    Lorem ipsum dolor sit amet.--}}
{{--                                                    Lorem ipsum dolor sit amet.--}}
{{--                                                    Lorem ipsum dolor sit amet.--}}
{{--                                                </p>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-12 resume-repeat">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-md-2">--}}
{{--                                        <div class="date"> 2004 -2009</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-1 div-img">--}}
{{--                                        <div></div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-8">--}}

{{--                                        <div class="new-border">--}}
{{--                                            <div class="add-space">--}}
{{--                                                <h3 class="title-h3">degree title</h3>--}}
{{--                                                <h6 class="title-h6">universty / school name</h6>--}}
{{--                                                <p class="titlep">--}}
{{--                                                    Lorem ipsum dolor sit amet.--}}
{{--                                                    Lorem ipsum dolor sit amet.--}}
{{--                                                    Lorem ipsum dolor sit amet.--}}
{{--                                                    Lorem ipsum dolor sit amet.--}}
{{--                                                    Lorem ipsum dolor sit amet.--}}
{{--                                                </p>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-12 resume-repeat">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-md-2">--}}
{{--                                        <div class="date"> 2004 -2009</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-1 div-img">--}}
{{--                                        <div></div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-8">--}}

{{--                                        <div class="new-border">--}}
{{--                                            <div class="add-space">--}}
{{--                                                <h3 class="title-h3">degree title</h3>--}}
{{--                                                <h6 class="title-h6">universty / school name</h6>--}}
{{--                                                <p class="titlep">--}}
{{--                                                    Lorem ipsum dolor sit amet.--}}
{{--                                                    Lorem ipsum dolor sit amet.--}}
{{--                                                    Lorem ipsum dolor sit amet.--}}
{{--                                                    Lorem ipsum dolor sit amet.--}}
{{--                                                    Lorem ipsum dolor sit amet.--}}
{{--                                                </p>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                        </div>--}}
{{--                    </div>--}}


{{--                </div>--}}

{{--                <div class="row">--}}
{{--                    <div class="col-md-3">--}}
{{--                    <h4>education</h4>--}}
{{--                    <div class="data-border"></div>--}}
{{--                </div>--}}

{{--                <div class="container">--}}
{{--                    <div class="row repeat">--}}
{{--                        <div class="col-md-12 resume-repeat">--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-md-2">--}}
{{--                                    <div class="date"> 2004 -2009</div>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-1 div-img">--}}
{{--                                    <div></div>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-8">--}}

{{--                                    <div class="new-border">--}}
{{--                                        <div class="add-space">--}}
{{--                                            <h3 class="title-h3">degree title</h3>--}}
{{--                                            <h6 class="title-h6">universty / school name</h6>--}}
{{--                                            <p class="titlep">--}}
{{--                                                Lorem ipsum dolor sit amet.--}}
{{--                                                Lorem ipsum dolor sit amet.--}}
{{--                                                Lorem ipsum dolor sit amet.--}}
{{--                                                Lorem ipsum dolor sit amet.--}}
{{--                                                Lorem ipsum dolor sit amet.--}}
{{--                                            </p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-12 resume-repeat">--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-md-2">--}}
{{--                                    <div class="date"> 2004 -2009</div>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-1 div-img">--}}
{{--                                    <div></div>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-8">--}}

{{--                                    <div class="new-border">--}}
{{--                                        <div class="add-space">--}}
{{--                                            <h3 class="title-h3">degree title</h3>--}}
{{--                                            <h6 class="title-h6">universty / school name</h6>--}}
{{--                                            <p class="titlep">--}}
{{--                                                Lorem ipsum dolor sit amet.--}}
{{--                                                Lorem ipsum dolor sit amet.--}}
{{--                                                Lorem ipsum dolor sit amet.--}}
{{--                                                Lorem ipsum dolor sit amet.--}}
{{--                                                Lorem ipsum dolor sit amet.--}}
{{--                                            </p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-12 resume-repeat">--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-md-2">--}}
{{--                                    <div class="date"> 2004 -2009</div>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-1 div-img">--}}
{{--                                    <div></div>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-8">--}}

{{--                                    <div class="new-border">--}}
{{--                                        <div class="add-space">--}}
{{--                                            <h3 class="title-h3">degree title</h3>--}}
{{--                                            <h6 class="title-h6">universty / school name</h6>--}}
{{--                                            <p class="titlep">--}}
{{--                                                Lorem ipsum dolor sit amet.--}}
{{--                                                Lorem ipsum dolor sit amet.--}}
{{--                                                Lorem ipsum dolor sit amet.--}}
{{--                                                Lorem ipsum dolor sit amet.--}}
{{--                                                Lorem ipsum dolor sit amet.--}}
{{--                                            </p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                    </div>--}}
{{--                </div>--}}

{{--                <div>--}}
{{--                    <div class="data-flex">--}}
{{--                        <h4>language <br> skills</h4>--}}
{{--                        <div class="data-border"></div>--}}
{{--                    </div>--}}
{{--                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.--}}
{{--                        Eveniet provident, possimus molestiae minus repudiandae eos--}}
{{--                        id temporibus, blanditiis hic sed expedita excepturi sequi vitae--}}
{{--                        veniet provident, possimus molestiae minus repudiandae eos--}}
{{--                        id temporibus, blanditiis hic sed expedita excepturi sequi vitae--}}
{{--                        veniet provident, possimus molestiae minuexcepturi sequi vitae--}}
{{--                        magni eligendi animi ab a delectus.</p>--}}
{{--                </div>--}}


{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
