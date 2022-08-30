
@extends('front.layout')
@section('title')
    انشاء السيرة الذاتية
@endsection
@section('css')
    <style>
        .Que{
            display: none;
        }
        .active-Que{
            display: block!important;
        }
    </style>
@endsection
@section('content')

    <section class="container">
        <form method="get" action="{{url('cv-maker-step6')}}">
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
                            <li class="blue"><span class="blue border-blue">5</span> <a class="blue"  href="{{url('cv-maker-step5')}}"> المهــارات </a></li>
                            <li ><span >6</span> <a href="{{url('cv-maker-step6')}}">اللغات</a> </li>
                            <li><span>7</span> <a href="{{url('cv-maker-step7')}}">المؤتمرات  و الدورات</a></li>
                            <li><span>8</span><a href="{{url('cv-maker-step8')}}">المعرفين</a></li>
                            <li><span>9</span><a href="{{url('cv-maker-step9')}}">المنظمات</a></li>
                            <li><span>10</span><a href="{{url('cv-maker-step10')}}" >الخطوة النهــائية</a></li>

                        </ul>


                    </div>
                </div>
                <div class="col-md-8 col-11 cv-form">
                    <h5>دعنا نعمل على مهاراتك </h5>
                    <p>اضف مهاراتك المميزة التي تجعلك مختلفاً عن الآخريين و تميزك بها </p>
                    <hr >
                    <?php
                    $active='active-Que' ;
                    ?>
                    <div class="all-que">

                        @foreach(\App\Models\Question::where('is_active','active')->get() as $key => $Que)
                            <div class="row Que Question-{{$key+1}} {{$active}}" data-key="{{$key+1}}">
                                <h5>                            {{$Que->question}}
                                </h5>
                                <div class="flex-between">
                                    @foreach($Que->answer as $key => $answer)
                                        <div class="ask quest-{{$Que->id}} @if($key == 0 || $key == 2 ) ask-left  @endif" data-valueid="{{$answer->id}}" data-value="{{$answer->answer}}" data-id="{{$answer->id}}" data-que_id="{{$Que->id}}">
                                            {{$answer->answer}}
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                            <?php
                            $active='' ;
                            ?>
                        @endforeach
                    </div>


                    <div class="row space">
                        <div class="col-md-12 col-11">
                            <div class="flex-between ">
                                <div class="blue back-que">
                                    <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                                     السابق
                                </div>
                                <div class="fw-bolder">
                                    ( <span class="count"> 1 </span> / <span>{{\App\Models\Question::where('is_active','active')->count()}} </span>)
                                </div>
                                <div class="blue next">
                                    التالي
                                    <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 col-11">
                            <hr class="none-hr">
                        </div>
                    </div>
                    {{--                <div class="row">--}}


                    {{--                    <hr>--}}
                    {{--                </div>--}}


                </div>
                {{--        <div class="col-md-3 cv-table">--}}
                {{--            <ul class="green">--}}
                {{--                <li class="green color">--}}
                {{--                    <span class="green">سيرة ذاتية</span>--}}
                {{--                    <p class="green">الإسم الأول الإسم الأخير</p>--}}
                {{--                    <p class="green">البريد الإلكتروني</p>--}}
                {{--                    <p class="green">الموجز</p>--}}

                {{--                </li>--}}
                {{--                <li class="green color">التعليم</li>--}}
                {{--                <li class="green color">الخبرات</li>--}}
                {{--                <li class="blue">المهارات</li>--}}

                {{--            </ul>--}}

                {{--        </div>--}}
            </div>
            <hr>

            <div class="row">
                <div class="col-md-12 col-11">
                    <div class="btn-text">
                        <a type="button" class=" btn  btn-theme2" href="{{url('cv-maker-step4')}}">
                            رجوع للخلف
                        </a>
                        <button id="submit" type="button" class="btn btn-primary btn-theme button-right" >
                            الخطوة التالية
                        </button>
                    </div>
                </div>
            </div>
            </div>
        </form>
    </section>

@endsection

@section('js')
    <script src="https://cdn.ckeditor.com/4.18.0/basic/ckeditor.js"></script>
    <script>
        $('#submit').click(function () {
            var array = {{\App\Models\Question::where('is_active','active')->count()}}
            var dataList = [];
            var dataList1 = '';
            $(".green-ask").each(function (index) {
                dataList.push($(this).data('valueid'))
            })
            if(dataList.length == array){
                var dataList1 ='<ul>';
                $(".green-ask").each(function (index) {
                    dataList1 += '<li>' + $(this).data('value') + ' </li> ';
                })
                dataList1 += '</url>';

                $.ajax({
                    url: '{{url("cvmaker6Store")}}',
                    type: "get",
                    data: {'skills': dataList},
                    dataType: "JSON",
                    success: function (data) {
                        if (data.message == "Success") {
                            Swal.fire("نجاح", "تم العملية بنجاح", "success");
                            window.location.replace( "{{url('cv-maker-step6-result')}} ");
                        } else {
                            Swal.fire("نأسف", "حدث خطأ ما اثناء الحذف", "error");
                        }
                    },
                    fail: function (xhrerrorThrown) {
                        Swal.fire("نأسف", "حدث خطأ ما اثناء الحذف", "error");
                    }
                });
            }else{
                Swal.fire("نأسف", "الرجاء الاجابة على جميع الاسئلة ", "error");
            }


        })
    </script>

    <script>
        CKEDITOR.replace( 'editor1' );

        $(".ask").click(function(){
            var Que_id = $(this).data('que_id');

            $('.quest-' + Que_id).removeClass("green-ask");

            $(this).toggleClass("green-ask");
        });
        $(".selects").click(function(){
            $(this).toggleClass("text-span-color");
        });

        var boxvar = 1;

        $('.next').click(function() {

            var numDivs = $('.all-que').children().length; //Count children ELements

            if(boxvar < numDivs){
                $('.Question-' + boxvar).removeClass("active-Que");
                boxvar +=1;
                $('.Question-' + boxvar).addClass('active-Que');
                $('.count').html(boxvar)
            }else{

            }


        });
        $('.back-que').click(function() {

            var numDivs = $('.all-que').children().length; //Count children ELements
            boxvar = $('.active-Que').data('key')
            if(boxvar > 1){
                $('.Question-' + boxvar).removeClass("active-Que");
                boxvar -=1;
                $('.Question-' + boxvar).addClass('active-Que');
                $('.count').html(boxvar)

            }else{

            }


        });

        $('.ask').click(function () {
            var dataList ='<ul>';
            $(".green-ask").each(function (index) {
                dataList += '<li>' + $(this).data('value') + ' </li> ';
            })
            dataList += '</url>';
            CKEDITOR.instances.editor1.setData(dataList);
        })
    </script>
@endsection
