@extends('front.layout')
@section('title')
    انشاء السيرة الذاتية
@endsection


@section('content')
    <!-- this is content -->

    <section class="container">
        <form method="get" action="{{url('cv-maker-step6')}}" id="form-submit">
            <div class="row cv-maker">
                <div class="col-md-3 cv">
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

                <div class="col-md-9 cv-form">
                    <h5> المهارات </h5>
                    <p> نتيجة اختبار المهارات   </p>
                    <div class="row">

                        <div class="form-group col-md-12">
                            <textarea rows="5" id="editor1" required  class="form-control" name="skills">{!! $dataList1 !!}</textarea>
                        </div>
                    </div>

                </div>


                {{--						<div class="col-md-3 cv-table">--}}
                {{--							<ul>--}}
                {{--								<li>--}}
                {{--									<span>سيرة ذاتية</span>--}}
                {{--									<p>{{Auth::guard('web')->user()->info->firstname}} {{ Auth::guard('web')->user()->info->lastname}}</p>--}}
                {{--									<p>{{Auth::guard('web')->user()->info->email}}</p>--}}
                {{--									<p>{{Auth::guard('web')->user()->info->phone}}</p>--}}

                {{--								</li>--}}
                {{--								<li>التعليم</li>--}}
                {{--								<li>الخبرات</li>--}}
                {{--								<li>المهارات</li>--}}

                {{--							</ul>--}}

                {{--						</div>--}}



            </div>
            <hr>
            <div class="row cv-btn">
                <a type="button"  class=" btn  btn-theme2" href="{{url('cv-maker')}}" >
                    رجوع للخلف
                </a>
                <a type="submit" class=" submit btn btn-primary btn-theme float-left " >
                    الخطوة التالية
                </a>

            </div>
        </form>

    </section>

@endsection
@section('js')
    <script src="https://cdn.ckeditor.com/4.18.0/basic/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'editor1' );
    </script>
    <script>
        $('.submit').click(function () {
            $('#form-submit').submit();

        })
    </script>
@endsection

