@extends('front.layout')
@section('title')
    انشاء السيرة الذاتية
@endsection

@section('css')

    {{--    <link rel="stylesheet" href="{{asset('website/assets/css/owl.carousel.min.css')}}">--}}
    {{--    <link rel="stylesheet" href="{{asset('website/assets/css/owl.theme.default.css')}}">--}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">

    <style>
        .slick-slider .element{
            height:100px;
            width:100px;
            background-color:#000;
            color:#fff;
            border-radius:5px;
            display:inline-block;
            margin:0px 10px;
            display:-webkit-box;
            display:-ms-flexbox;
            display:flex;
            -webkit-box-pack:center;
            -ms-flex-pack:center;
            justify-content:center;
            -webkit-box-align:center;
            -ms-flex-align:center;
            align-items:center;
            font-size:20px;
        }
        .slick-slider .slick-disabled {
            opacity : 0;
            pointer-events:none;
        }
    </style>
@endsection


@section('content')              <!-- this is content -->

<section class="container">
    <div class="row cv-maker">
        <div class="col-md-3 cv">
            <div>
                <h6>مراحل تصميم السيرة الذاتية </h6>
                <hr>
                <ul class="ul">
                    <li class="green"><span class="green">1</span>المعلومات الشخصية</li>
                    <li class="green"><span class="green">2</span>الموجـز</li>
                    <li class="green"><span class="green">3</span>التعليـم</li>
                    <li class="green"><span class="green">4</span>الخبـرات</li>
                    <li class="green"><span class="green">5</span>المهـارات</li>
                    <li class="green"><span class="green">7</span>الاحداث و الدورات</li>
                    <li class="green"><span class="green">8</span>المعرفين</li>
                    <li class="green"><span class="green">9</span>المنظمات</li>
                    <li class="blue"><span class="blue border-blue">10</span>الخطوة النهـائية</li>
                </ul>
            </div>
        </div>
        <div class="col-md-8 cv-maker6">

            <div class="maker-resume1 row">
                <h5>
                    سيرة <br>
                    ذاتية
                </h5>
                <h2>{{Auth::guard('web')->user()->info->firstname }} {{Auth::guard('web')->user()->info->lastname }}</h2>
                <p>{{Auth::guard('web')->user()->info->email }}</p>
                <p>{{Auth::guard('web')->user()->info->phone }}</p>

            </div>
            <div class="maker-resume2 row">
                <div class="col-md-2 word">
                    الموجز
                </div>
                <div class="col-md-10 words">
                    مجال الدراسةمجال الدراسة*دمجال الدراسة*دددمجال
                    الدراسة*ددمجال الدراسة*دد*دددمجال الدراسة*دد
                    مجال الدراسةمجال الدراسة*دمجال الدراسة*دددمجال
                    الدراسة*ددمجال الدراسة*دد*دددمجال الدراسة
                    مجال الدراسةمجال الدراسة*دمجال الدراسة*دددمجال
                    الدراسة*ددمجال الدراسة*دد*دددمجال الدراسة
                    مجال الدراسةمجال الدراسة*دمجال الدراسة*دددمجال
                    الدراسة*ددمجال الدراسة*دد*دددمجال الدراسة
                </div>
            </div>
            <div class="maker-resume3 row">
                <div class="col-md-2 word">
                    التعليم
                </div>
                <div class="col-md-8 words">
                    كلية الحاسبات . جامعة أسيوط
                </div>
                <div class="col-md-2 words">
                    (2017-2013)
                </div>

            </div>
            <div class="maker-resume4 row">
                <div class="col-md-2 word">
                    الخبرات
                </div>
                <div class="col-md-10 words">
                    --------------------------------------------------------
                    --------------
                    Lorem ipsum dolor sit amet.
                    Lorem ipsum dolor sit amet.
                    Lorem ipsum dolor sit amet.
                    Lorem ipsum dolor sit amet.
                    Lorem ipsum dolor sit amet.
                    Lorem ipsum dolor sit amet.
                    Lorem ipsum dolor sit amet.
                    Lorem ipsum dolor sit amet.
                    Lorem ipsum dolor sit amet.
                    Lorem ipsum dolor sit amet.
                    Lorem ipsum dolor sit amet.
                    Lorem ipsum dolor sit amet.
                    Lorem ipsum dolor sit amet.
                    Lorem ipsum dolor sit amet.
                    Lorem ipsum dolor sit amet.
                    Lorem ipsum dolor sit amet.
                    Lorem ipsum dolor sit amet.
                    rem ipsum dolor sit amet.
                    Lorem ipsum dolor sit amet.
                    Lorem ipsum dolor sit amet.
                    Lorem ipsum dolor sit amet.
                    Lorem ipsum dolor sit amet.
                    Lorem ipsum dolor sit amet.
                    Lorem ipsum dolor sit amet.
                    Lorem ipsum dolor sit amet.
                    Lorem ipsum dolor sit amet.
                    Lorem ipsum dolor sit amet.
                    Lorem ipsum dolor sit amet.
                    Lorem ipsum dolor sit amet.
                    Lorem ipsum dolor sit amet.
                    Lorem ipsum dolor sit amet.
                    Lorem ipsum dolor sit amet.
                    Lorem ipsum dolor sit amet.
                    Lorem ipsum dolor sit amet.
                    Lorem ipsum dolor sit amet.
                </div>

            </div>
        </div>


        <div class="col-md-1 cv-print">
            <button type="button" class=" btn  btn-theme2 print" data-toggle="modal" data-target="#registerUser">
                <i class="fa fa-print" aria-hidden="true"></i>
                طباعة
            </button>
            <button type="button" class="btn btn-primary btn-theme download" data-toggle="modal" data-target="#login">
                <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                تنزيل كـ pdf
            </button>


        </div>





    </div>
    <hr>

    <section class="container ">
        <div class="row">
            <div class="col-md-12 exit">
                <button>
                    <i class="fa fa-times" aria-hidden="true"></i>
                    إغلاق
                </button>
            </div>
            <div class="col-md-12" >
                <div class="slick-slider">
                    <div class="element element-1">1</div>
                    <div class="element element-2">2</div>
                    <div class="element element-3">3</div>
                    <div class="element element-4">4</div>
                    <div class="element element-5">4</div>
                    <div class="element element-6">6</div>
                    <div class="element element-7">7</div>
                    <div class="element element-8">8</div>
                    <div class="element element-9">9</div>
                    <div class="element element-10">10</div>
                </div>
            </div>
            <div class="col-md-12" style="background:#FFF">
                <div class="save">
                    <a type="button" class="btn btn-primary btn-theme" href="{{url('PaymentUrl')}}">
                        حفظ و دفع
                    </a>
                    <div class="clear"></div>

                </div>
            </div>
        </div>
    </section>

</section>


@endsection

@section('js')
    {{--    <script src="{{asset('website/assets/js/owl.carousel.min.js')}}"></script>--}}
    <script src="https://cdn.jsdelivr.net/jquery.slick/1.4.1/slick.min.js"></script>
    {{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css"></script>--}}

    <script>
        $(document).ready(function() {

            $(".slick-slider").slick({
                slidesToShow: 10,
                infinite:false,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000
                // dots: false, Boolean
                // arrows: false, Boolean
            });


// Image Slider Demo:
// https://codepen.io/vone8/pen/gOajmOo

        });
    </script>
@endsection
