@extends('front.layout')
@section('title')
    الباقات
@endsection

@section('css')

    <style>
        .noneopacity{
            opacity: unset!important;
        }
        .nav-link{
            opacity: .5;
        }
        td{
            font-size:16px;
        }
    </style>
@endsection


@section('content')

    <section class="container job-width">
        <div class="row">
            <div class="col-md-12 jobb-border">
                <div class="row take-space control-1">
                    <div class="col-md-6 flex-h6">
                        <h6>
                            <i class="fa fa-list" aria-hidden="true"></i>
                            اسعار باقات الخدمات
                        </h6>
                    </div>

                </div>
            </div>
            <div class="col-md-12 job-border">
                <div class="row take-space ">

                    <div class="container col-md-12 control-tab ">
{{--                        <div class="row">--}}
{{--                            <div class="col-md-12 cv-offer-title">--}}
{{--                                <h5 class="h-title"></h5>--}}
{{--                                <p class="p-title">اضغط على الباقة المناسبة لك و اشترك بها من الآن</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}

                        <div class="control-2">
                            <ul class="nav nav-tabs" id="myTab" role="tablist" style="border-radius: 5px">
                                <li class="nav-item" role="presentation">
                                    <button class=" item-border nav-link noneopacity active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">
                                        <br>
                                        <span class="black-span"></span>
                                        <p> اسعار 3 شهور</p>
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="item-border nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#home2" type="button" role="tab" aria-controls="profile" aria-selected="false">
                                        <br>
                                        <span class="black-span"></span>
                                        <p> اسعار 6 شهور</p>
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="item-border nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#home3" type="button" role="tab" aria-controls="profile" aria-selected="false">
                                        <br>
                                        <span class="red-span"></span>
                                        <p> اسعار 9 شهور</p>
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class=" item-border nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#home4" type="button" role="tab" aria-controls="contact" aria-selected="false">
                                        <br>
                                        <span class="green-span"></span>
                                        <p> اسعار 12 شهر</p>
                                    </button>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <form>
                                    <section class="container">

                                        <section class="cv-offer-center row">
                                            @foreach(\App\Models\CompanyPackage::where('is_active','active')->where('months','3')->get() as $Package)
                                                <div class="col-lg-3  col-md-4 col-12" >

                                                    <div class="@if($Package->color == 'wight') light
                    @elseif($Package->color == 'blue')  platinum
                    @elseif($Package->color == 'green') silver
                    @elseif($Package->color == 'red')gold
                    @else
                                                        light
@endif
                                                        ">
                                                        <h6>{{$Package->title}}</h6>
                                                        <br>
                                                        <p class="cv-1">
                                                            {{$Package->description}}
                                                        </p>
                                                        <h1>{{$Package->price}}</h1>
                                                        <p class="cv-1">جنيه مصري</p>

                                                        <p class="p-cv3">
                                                            <a  class="btn @if($Package->color == 'wight') light
                    @elseif($Package->color == 'blue')  platinum
                    @elseif($Package->color == 'green') silver
                    @elseif($Package->color == 'red')gold
                    @else
                                                                light
@endif " style="text-decoration: none" href="{{url('PaymentPackage',$Package->id)}}">
                                                                <i class="fa fa-shopping-cart"></i>
                                                                اطلب الان

                                                            </a>
                                                        </p>
                                                    </div>
                                                    <div style="width:200px!important; font-size: 12px">
                                                        <hr>
                                                        <p >
                                                            {!! $Package->long_description !!}
                                                        </p>
                                                    </div>
                                                </div>

                                            @endforeach
                                        </section>
                                        <hr class="offer-line">
                                    </section>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="home2" role="tabpanel" aria-labelledby="profile-tab">
                                <form>
                                    <section class="container">


                                        <section class="cv-offer-center row">
                                            @foreach(\App\Models\CompanyPackage::where('is_active','active')->where('months','6')->get() as $Package)
                                                <div class="col-lg-3  col-md-4 col-12" >

                                                    <div class="@if($Package->color == 'wight') light
                    @elseif($Package->color == 'blue')  platinum
                    @elseif($Package->color == 'green') silver
                    @elseif($Package->color == 'red')gold
                    @else
                                                        light
@endif
                                                        ">
                                                        <h6>{{$Package->title}}</h6>
                                                        <br>
                                                        <p class="cv-1">
                                                            {{$Package->description}}
                                                        </p>
                                                        <h1>{{$Package->price}}</h1>
                                                        <p class="cv-1">جنيه مصري</p>

                                                        <p class="p-cv3">
                                                            <a  class="btn @if($Package->color == 'wight') light
                    @elseif($Package->color == 'blue')  platinum
                    @elseif($Package->color == 'green') silver
                    @elseif($Package->color == 'red')gold
                    @else
                                                                light
@endif " style="text-decoration: none" href="{{url('PaymentPackage',$Package->id)}}">
                                                                <i class="fa fa-shopping-cart"></i>
                                                                اطلب الان

                                                            </a>
                                                        </p>
                                                    </div>
                                                    <div style="width:200px!important; font-size: 12px">
                                                        <hr>
                                                        <p >
                                                            {!! $Package->long_description !!}
                                                        </p>
                                                    </div>
                                                </div>

                                            @endforeach
                                        </section>
                                        <hr class="offer-line">
                                    </section>
                                </form>

                            </div>
                            <div class="tab-pane fade" id="home3" role="tabpanel" aria-labelledby="contact-tab">
                                <form>
                                    <section class="container">

                                        <section class="cv-offer-center row">
                                            @foreach(\App\Models\CompanyPackage::where('is_active','active')->where('months','9')->get() as $Package)
                                                <div class="col-lg-3  col-md-4 col-12" >

                                                    <div class="@if($Package->color == 'wight') light
                    @elseif($Package->color == 'blue')  platinum
                    @elseif($Package->color == 'green') silver
                    @elseif($Package->color == 'red')gold
                    @else
                                                        light
@endif
                                                        ">
                                                        <h6>{{$Package->title}}</h6>
                                                        <br>
                                                        <p class="cv-1">
                                                            {{$Package->description}}
                                                        </p>
                                                        <h1>{{$Package->price}}</h1>
                                                        <p class="cv-1">جنيه مصري</p>

                                                        <p class="p-cv3">
                                                            <a  class="btn @if($Package->color == 'wight') light
                    @elseif($Package->color == 'blue')  platinum
                    @elseif($Package->color == 'green') silver
                    @elseif($Package->color == 'red')gold
                    @else
                                                                light
@endif " style="text-decoration: none" href="{{url('PaymentPackage',$Package->id)}}">
                                                                <i class="fa fa-shopping-cart"></i>
                                                                اطلب الان

                                                            </a>
                                                        </p>
                                                    </div>
                                                    <div style="width:200px!important; font-size: 12px">
                                                        <hr>
                                                        <p >
                                                            {!! $Package->long_description !!}
                                                        </p>
                                                    </div>
                                                </div>

                                            @endforeach
                                        </section>
                                        <hr class="offer-line">
                                    </section>
                                </form>

                            </div>
                            <div class="tab-pane fade" id="home4" role="tabpanel" aria-labelledby="contact-tab">
                                <form>
                                    <section class="container">

                                        <section class="cv-offer-center row">
                                            @foreach(\App\Models\CompanyPackage::where('is_active','active')->where('months','12')->get() as $Package)
                                                <div class="col-lg-3  col-md-4 col-12" >

                                                    <div class="@if($Package->color == 'wight') light
                    @elseif($Package->color == 'blue')  platinum
                    @elseif($Package->color == 'green') silver
                    @elseif($Package->color == 'blue')gold
                    @else
                                                        light
@endif
                                                        ">
                                                        <h6>{{$Package->title}}</h6>
                                                        <br>
                                                        <p class="cv-1">
                                                            {{$Package->description}}
                                                        </p>
                                                        <h1>{{$Package->price}}</h1>
                                                        <p class="cv-1">جنيه مصري</p>

                                                        <p class="p-cv3">
                                                            <a  class="btn @if($Package->color == 'wight') light
                    @elseif($Package->color == 'blue')  platinum
                    @elseif($Package->color == 'green') silver
                    @elseif($Package->color == 'red')gold
                    @else
                                                                light
@endif " style="text-decoration: none" href="{{url('PaymentPackage',$Package->id)}}">
                                                                <i class="fa fa-shopping-cart"></i>
                                                                اطلب الان

                                                            </a>
                                                        </p>
                                                    </div>
                                                    <div style="width:200px!important; font-size: 12px">
                                                        <hr>
                                                        <p >
                                                            {!! $Package->long_description !!}
                                                        </p>
                                                    </div>
                                                </div>

                                            @endforeach
                                        </section>
                                        <hr class="offer-line">
                                    </section>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection
@section('js')

    <script>
        $('.nav-link').click(function(){
            $('.nav-link').removeClass('noneopacity');
            $(this).addClass('noneopacity')
            var value = $(this).data('bs-target');
            $('.tab-pane').removeClass('show');
            $('.tab-pane').removeClass('active');
            $(value).addClass(' show active');
        });

    </script>
@endsection

