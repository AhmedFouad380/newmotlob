@extends('front.layout')
@section('title')
    انشاء السيرة الذاتية
@endsection


@section('content')
    <!-- this is content -->

    <section class="container">
        <form method="get" action="{{url('cv-maker-step3')}}" id="form-submit">
            <div class="row cv-maker">
                <div class="col-md-3 col-11 cv">
                    <div>
                        <h6>مراحل تصميم السيرة الذاتية </h6>
                        <hr>
                        <ul class="ul">
                            <li class="green"><span class="green ">1</span>  <a class="green" href="{{url('cv-maker')}}">المعلومات الشخصية</a></li>
                            <li class="blue"><span class="blue border-blue">2</span>  <a class="blue"  href="{{url('cv-maker-step2')}}">الهدف المهني </a></li>
                            <li ><span >3</span> <a href="{{url('cv-maker-step3')}}">التعليم</a></li>
                            <li ><span >4</span> <a href="{{url('cv-maker-step4')}}">الخبــرات </a></li>
                            <li><span>5</span> <a href="{{url('cv-maker-step5')}}"> المهــارات </a></li>
                            <li ><span >6</span> <a href="{{url('cv-maker-step6')}}">اللغات</a> </li>
                            <li><span>7</span> <a href="{{url('cv-maker-step7')}}">المؤتمرات  و الدورات</a></li>
                            <li><span>8</span><a href="{{url('cv-maker-step8')}}">المعرفين</a></li>
                            <li><span>9</span><a href="{{url('cv-maker-step9')}}">المنظمات</a></li>
                            <li><span>10</span><a href="{{url('cv-maker-step10')}}" >الخطوة النهــائية</a></li>


                        </ul>

                    </div>
                </div>

                <div class="col-md-8 col-11 cv-form">
                    <h5> الهدف المهني</h5>
                    <p>قم باضافة غايتك و هدفك من انشاء هذه السيرة الذاتية  </p>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <textarea rows="5" id="editor1"  oninvalid="this.setCustomValidity('هذا الحقل مطلوب' )"  required  class=" .cke_rtl form-control" name="description">
                                @if(Auth::guard('web')->user()->info->description)
                                    {{Auth::guard('web')->user()->info->description}}
                                @else
                                    اتحلى بالجدية والمثابرة، تخرجت في كلية القانون، وأبحث عن ةظيفة مساعد إدارة، أعمل، وأريد أن أعمل لدى شركتكم لأكسب تجربة وخبرة وأحقق أهدافها في الوقت عينه
                                @endif
                            </textarea>
                        </div>
                    </div>

                </div>



            </div>
            <hr>
            <div class="row">
                <div class="col-md-12 col-11">
                    <div class="btn-text">
                        <a type="button"  class=" btn  btn-theme2" href="{{url('cv-maker')}}" >
                            رجوع للخلف
                        </a>
                        <a type="submit" class=" submit btn btn-primary btn-theme" >
                            الخطوة التالية
                        </a>
                    </div>
                </div>
            </div>
        </form>

    </section>

@endsection
@section('js')
    <script src="https://cdn.ckeditor.com/4.18.0/basic/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'editor1' ).config.contentsLangDirection = 'rtl';

    </script>
    <script>
        $('.submit').click(function () {
            $('#form-submit').submit();

        })
    </script>
@endsection

