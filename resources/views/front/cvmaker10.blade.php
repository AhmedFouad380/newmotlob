@extends('front.layout')
@section('title')
    انشاء السيرة الذاتية
@endsection

@section('css')

    {{--    <link rel="stylesheet" href="{{asset('website/assets/css/owl.carousel.min.css')}}">--}}
    {{--    <link rel="stylesheet" href="{{asset('website/assets/css/owl.theme.default.css')}}">--}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">

    <style>

        .bluestyle {
            border-color: #269eda !important;
        }
        .slick-slider .element img {
            border: 3px solid ;
        }
        .slick-slider .element{
            height:150px;
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
        <div class="col-md-3 col-11 cv">
            <div>
                <h6>مراحل تصميم السيرة الذاتية </h6>
                <hr>
                <ul class="ul">
                    <li class="green"><span class="green">1</span>  <a class="green" href="{{url('cv-maker')}}">المعلومات الشخصية</a></li>
                    <li class="green"><span class="green">2</span> <a class="green" href="{{url('cv-maker-step2')}}">الهدف المهني </a></li>
                    <li class="green"><span class=" green">3</span> <a  class="green"  href="{{url('cv-maker-step2')}}">التعليم</a></li>
                    <li class="green"><span class="green ">4</span> <a class="green"  href="{{url('cv-maker-step4')}}">الخبــرات </a></li>
                    <li class="green"><span class="green ">5</span> <a class="green"  href="{{url('cv-maker-step5')}}"> المهــارات </a></li>
                    <li class="green"><span class="green ">6</span> <a class="green" href="{{url('cv-maker-step6')}}">اللغات</a> </li>
                    <li class="green"><span class="green ">7</span> <a class="green" href="{{url('cv-maker-step7')}}">المؤتمرات  و الدورات</a></li>
                    <li class="green"><span class="green ">8</span> <a class="green" href="{{url('cv-maker-step8')}}">المعرفين</a></li>
                    <li class="green"><span class="green ">9</span> <a class="green" href="{{url('cv-maker-step9')}}">المنظمات</a></li>
                    <li class="blue"><span class="blue border-blue">10</span> <a class="blue"href="{{url('cv-maker-step10')}}" >الخطوة النهــائية</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-8 col-11 cv-maker6" id="template_view">

        </div>


        <div class="col-md-1 col-11 cv-print">
            @if(\App\Models\Payment::where('user_id',Auth::guard('web')->id())->where('states','payed')->count() > 0)
                <form action="{{url('createPDF')}}" method="get">
                    <input id="temp_id" name="id" type="hidden" >
                    <div class='form-group'>
                        <label >اللغة </label>
                        <select name="lang" class="form-control">
                            <option value="ar">اللغة العربية</option>
                            <option value="en">اللغة الانجليزية</option>
                        </select>
                    </div>
                    <button   type="submit" class="btn btn-primary btn-theme download" >
                        <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                        تنزيل كـ pdf
                    </button>

                </form>
            @endif


        </div>





    </div>
    <hr>

    <section class="container ">
        <div class="row">
            <div class="col-md-12 col-11 exit">
                <button>
                    <i class="fa fa-times" aria-hidden="true"></i>
                    إغلاق
                </button>
            </div>
            <div class="col-md-12 col-11" >
                <div class="slick-slider">
                    @foreach(\App\Models\Template::where('is_active','active')->get() as $template)
                        <div class="element element-1" style="width: 100%!important;" >
                            <img src="{{asset('website/templates/'.$template->image)}}" data-id="{{$template->id}}" style="width: 100%!important;    height: 100%">
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-12 col-11" style="background:#FFF">
                <div class="save">
                    @if(\App\Models\Information::where('user_id',Auth::guard('web')->id())->count() > 0)
                    <a type="button" class="btn btn-primary btn-theme" href="{{url('Packages')}}" style="font-size: 13px">
                        حفظ و دفع
                    </a>
                    @endif
                    {{--                                 <div class="clear"></div>--}}

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
        $('.slick-slider .element img').click(function () {
            $('.slick-slider .element img').removeClass('bluestyle')
            $(this).toggleClass("bluestyle");
            id = $(this).data('id')
            $('#temp_id').val(id)
            $.ajax({
                type: "GET",
                url: "{{url('template')}}",
                data: {"id":id},
                success: function (data) {
                    if(data.message == 'Failed'){
                        Swal.fire({
                            icon: 'error',
                            title: 'عفوا !',
                            text:  " برجاء استكمال المعلومات الشخصية  "
                        })
                    }else {
                        $("#template_view").html(data)
                    }
                }
            })


        })

        $(document).ready(function() {

            $(".slick-slider").slick({
                slidesToShow: 10,
                infinite:false,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,
                variableWidth: false,

                // dots: false, Boolean
                // arrows: false, Boolean
            });


// Image Slider Demo:
// https://codepen.io/vone8/pen/gOajmOo

        });
    </script>
@endsection

