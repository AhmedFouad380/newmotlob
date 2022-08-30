@extends('front.layout')
@section('title')
    الصفحة الرئيسية
@endsection
@section('content')

    <div class="container">
        <div class="row ">
            <div class="col-md-6 into-text">
                <section>
                    <h3>ابحث عن أفضل</h3>
                    <h3>
                        <span class="img-title">الوظائف</span>
                        في مصر
                    </h3>
                </section>


                <section>
                    <section>
                        <div class="flex-title">
                            <p>هل تبحث عن وظائف شاغرة و فرص وظيفية ؟</p>
                            <div class="image-img">
                                <img src="{{asset('website/assets/images/logo3.png')}}">
                            </div>
                        </div>
                        <p class="p">يساعدك في البحث عن وظيفة في مصر </p>
                    </section>
                </section>




                <section>
                    <form action="{{url('Jobs')}}">
                        <div class="form-group">
                            <label for="firstInput"></label>
                            <div class="row">
                                <div class="col-md-5 col-5">
                                    <!-- <i class="fa fa-briefcase icon icon-1" aria-hidden="true"></i> -->
                                    <input type="text" id="firstInput" name="title" ng-model="obj.firstInput" class="form-control input-2" placeholder="ابحث عن وظيفة...">
                                </div>
                                <div class="col-md-5 col-5">
                                    <!-- <i class="fa fa-map-marker icon" aria-hidden="true"></i> -->
                                    <select id="secondInput" name="country_id" ng-model="obj.secondInput" class="form-control" placeholder="الموقع">
                                        <option>الموقع</option>
                                        @foreach(\App\Models\Country::all() as $country)
                                            <option value="{{$country->id}}">{{$country->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2 col-2">
                                    <button type="submit" class="search" ><i class="fa fa-search" aria-hidden="true"></i></button>
                                </div>

                            </div>
                        </div>
                    </form>
                </section>
            </div>
            <div class="col-md-6">
                <img src="{{asset('website/assets/images/intro.f31c1628.png')}}" class="into-img">
            </div>
        </div>
    </div>
    </header>

    <!-- this is  section 1 in main  -->

    <section class="container-fluied main-1">
        <section class="container">
            <h3> أحدث الوظائف</h3>
            <div class="hr"></div>
            <section >
                <div class="row">
                    @foreach(\App\Models\Job::where('is_active','active')->inRandomOrder()->limit(12)->get() as $job)
                        <div class="col-md-3  ">
                            <div class="box">
                                <li>{{$job->title}} </li>
                                <li><span><i class="fa fa-briefcase"></i>{{$job->Company->company_name}} </span> </li>
                                <li><i class="fa fa-map-marker"></i>{{$job->Country->name}} - {{$job->City->name}} - {{$job->state->name}} - {{$job->village->name}} </li>
                                <li><i class="fa fa-user"></i>النوع : {{__('lang.type'.$job->gender)}} </li>
                                <li><i class="fa fa-list"></i>السن : {{$job->min_age}} : {{$job->max_age}} </li>
                                <li><i class="fa fa-list"></i>المؤهل   : {{$job->JobQualification->name}} </li>
                                <li><i class="fa fa-list"></i>المرتب  : {{$job->min_salary}} : {{$job->max_salary}} </li>
                                <li><i class="fa fa-calendar"></i>{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $job->created_at)->diffForHumans()}}</li>
                                <a href="{{url('jobDetails',$job->id)}}">
                                     تفاصيل
                                </a>
                            </div>
                            </a>
                        </div>
                    @endforeach


                </div>
            </section>
            <a href="{{url('Jobs')}}" target="_blank"> شاهد جميع الوظائف الجديدة على مطلوب...</a>
        </section>
    </section>

    <!-- this is testimonial -->
    <!-- this is section 2 in main -->
    <section class="testimonial text-center">
        <div class="container">

            <div class="heading white-heading">
                ماذا يقول عنا عملائنا
            </div>
            <div id="testimonial4" class="carousel slide testimonial4_indicators testimonial4_control_button thumb_scroll_x swipe_x" data-ride="carousel" data-pause="hover" data-interval="5000" data-duration="2000">

                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <div class="testimonial4_slide">
                            <div class="row">
                                <div class="col-md-5 first-img">
                                    <img src="{{asset('website/assets/images/path-2.png')}}" class="img-circle img-responsive" />
                                    <h6>أحمد حسين</h6>
                                    <h6>عامل في مزرعة</h6>
                                </div>
                                <div class="col-md-7">
                                    <section class="first-mark"></section>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
                                    <section class="second-mark"></section>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="testimonial4_slide">
                            <div class="row">
                                <div class="col-md-5 first-img">
                                    <img src="{{asset('website/assets/images/path-2.png')}}" class="img-circle img-responsive" />
                                    <h6>أحمد حسين</h6>
                                    <h6>عامل في مزرعة</h6>
                                </div>
                                <div class="col-md-7">
                                    <section class="first-mark"></section>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
                                    <section class="second-mark"></section>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="testimonial4_slide">
                            <div class="row">
                                <div class="col-md-5 first-img">
                                    <img src="{{asset('website/assets/images/path-2.png')}}" class="img-circle img-responsive" />
                                    <h6>أحمد حسين</h6>
                                    <h6>عامل في مزرعة</h6>
                                </div>
                                <div class="col-md-7">
                                    <section class="first-mark"></section>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
                                    <section class="second-mark"></section>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#testimonial4" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#testimonial4" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
        </div>
    </section>

    <!-- this is section 3 in main -->
    <section class="container main-2">
        <h4> استعد لمزيد من الفرص !</h4>
        <h5> انت على بعض خطوات قصيرة من الوظيفة المناسبة </h5>
        <a class="btn btn-primary btn-theme" href="#" role="button"> انـضم إلـينـا </a>
    </section>

@endsection
