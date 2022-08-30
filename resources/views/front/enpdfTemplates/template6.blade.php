<!DOCTYPE html>
<html dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="{{asset('website/assets/css/bootstrap.css')}}"  type="text/css">
    <link rel="stylesheet" href="{{asset('website/assets/css/all.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('website/assets/css/cv.css')}}" type="text/css">

    <title>Tamplate 6</title>

</head>

<body style="direction: ltr;">

<!--  this is resume 5  -->

<section class=" container a4-width-6">
    <section class="row">
        <div class="col-lg-4 col-md-4 col-4 change-row">
            <div class="resume5-left">
                <div class="resume5-data">
                    <div class="image-clip">
                        <img src="{{asset('website/assets/images/Clip.png')}}">
                    </div>
                    <div class="border-resume5">
                        @if(isset(Auth::guard('web')->user()->info->image))
                            <img src="{{Auth::guard('web')->user()->info->image}}">
                        @else
                            <img src="{{asset('website/assets/images/Your Picture.png')}}">
                        @endif
                    </div>
                    <div class="resume5-data2">
                        <h1> {{Auth::guard('web')->user()->info->firstname}}   {{Auth::guard('web')->user()->info->lastname}}</h1>
                        <span>   {{Auth::guard('web')->user()->info->job_title}} </span>
                    </div>
                    <div class="resume5-data3">
                        <h6>about me</h6>
                        <span class="line5"><span class="line55"></span></span>
                        <p> {!! Auth::guard('web')->user()->info->description !!}</p>
                    </div>
                    <div class="resume5-data3 resume-5contact">
                        <h6>contact</h6>
                        <span class="line5"><span class="line55"></span></span>
                        <div class="bottom-div">
                            <strong>address:</strong>
                            <div>{{Auth::guard('web')->user()->info->City->name}} -
                                {{Auth::guard('web')->user()->info->Country->name}} </div>
                        </div>
                        <div class="bottom-div">
                            <strong>phone:</strong>
                            <div>{{Auth::guard('web')->user()->info->phone}}</div>
                        </div>
                        <div class="bottom-div">
                            <strong>email:</strong>
                            <div>{{Auth::guard('web')->user()->info->email}}</div>
                        </div>
                    </div>

                    <div class="resume5-data3 resume5-reference">
                        <h6>reference</h6>
                        <span class="line5"><span class="line55"></span></span>
                        @foreach(Auth::guard('web')->user()->Knows as $key => $edu)

                        <div class="bottom-div">
                            <strong>{{$edu->name}}</strong>
                            <div class="resume5-pp"><span >company name :</span> {{$edu->company}}</div>
                            <div class="resume5-pp"><span>job title : </span>  {{$edu->job_title}}</div>
                            <div class="resume5-pp"><span>phone:</span>   :{{$edu->phone}} </div>
                            <div class="resume5-pp">{{$edu->description}}</div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-8 col-md-8 col-8 change-row">
            <div class="resume5-right resume5-right2">
                <div class="resume5-data22">
                    <div class="resume5-experience">
                        <h2 class="experience5-h2">experience</h2>
                        <div class="line-gray"><div class="line-blue"></div></div>
                        @foreach(Auth::guard('web')->user()->Experience as $key => $edu)

                        <div class="width-5">
                            <div class="row">
                                <div class="col-md-4 col-4 col-lg-4">
                                    <h3 class="job-title55 job-title5">{{$edu->name}}</h3>
                                    <span class="date5">{{\Carbon\Carbon::parse($edu->start_date)->format('Y-m')}} - {{\Carbon\Carbon::parse($edu->end_date)->format('Y-m')}}</span>
                                </div>
                                <div class="col-md-8 col-8 col-lg-8">
                                    <h3 class="job-title5">{{$edu->company}}</h3>
                                    <p class="text5">{{$edu->description}}  .</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="resume5-education">
                        <h2 class="experience5-h2">education</h2>
                        <div class="line-gray"><div class="line-blue"></div></div>
                        @foreach(Auth::guard('web')->user()->education as $key => $edu)

                            <div class="width-5">
                                <div class="row">
                                    <div class="col-md-4 col-4 col-lg-4">
                                        <h3 class="job-title55 job-title5">{{$edu->qualification}}</h3>
                                        <span class="date5"></span>
                                    </div>
                                    <div class="col-md-8 col-8 col-lg-8">
                                        <h3 class="job-title5">( {{\Carbon\Carbon::parse($edu->graduation_date)->format('Y')}} )</h3>
                                        <p class="text5">{{$edu->name}}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>
                    <div class="resume5-education">
                        <h2 class="experience5-h2">Skills</h2>
                        <div class="line-gray"><div class="line-blue"></div></div>

                            <div class="width-5">
                                <div class="row">

                                    <div class="col-md-12 col-12 col-lg-12">
                                        <p class="text5">        {!! Auth::guard('web')->user()->info->description !!}</p>
                                    </div>
                                </div>
                            </div>


                    </div>
                    <div class="resume5-hobbies">
                        <h2 class="experience5-h2">Languages</h2>
                        <div class="line-gray"><div class="line-blue"></div></div>
                        <div class="hobbies5">
                            <div class="row">
                                @inject('lang','App\Models\Lang')
                                @foreach(Auth::guard('web')->user()->LangRelation as $key => $edu)
                                    <div class="col-md-4 col-4 col-lg-4">
                                        <div class="text-hobbies"> <span class="dott55"></span>{{$lang->find($edu->lang_id)->name}}</div>
                                    </div>
                                @endforeach

                            </div>
                        </div>

                    </div>
                    <br>
                    <div class="resume5-hobbies">
                        <h2 class="experience5-h2">Organization</h2>
                        <div class="line-gray"><div class="line-blue"></div></div>
                        <div class="hobbies5">
                            <div class="row">
                                @foreach(Auth::guard('web')->user()->Organization as $key => $edu)
                                    <div class="col-md-4 col-4 col-lg-4">
                                        <div class="text-hobbies"> <span class="dott55"></span>{{$edu->name}}</div>
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




</body>

</html>
