@extends('front.layout')
@section('title')
    انشاء السيرة الذاتية
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('content')
    <!-- this is content -->

    <section class="container">
        <div class="row cv-maker">
            <div class="col-md-3 col-11 cv">
                <div>
                    <h6>مراحل تصميم السيرة الذاتية </h6>
                    <hr>
                    <ul class="ul">
                        <li class="blue"><span class="blue border-blue">1</span>  <a class="blue" href="{{url('cv-maker')}}">المعلومات الشخصية</a></li>
                        <li ><span >2</span> <a href="{{url('cv-maker-step2')}}">الهدف المهني </a></li>
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
                <h5>لنبدأ بالمعلومات الشخصية </h5>
                <p>قم بتضمين اسمك الكامل و طريقة واحدة على الأقل للوصول إليك من قبل أصحاب العمل </p>
                <form method="post" action="cv-maker-step2" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <div class="form-group col-md-6 col-12">
                            <label> الصورة </label>
                            <input type="file"  class="dropify form-control" data-default-file="{{Auth::guard('web')->user()->info->image}}" name="image" >
                        </div>

                    </div>
                    <div class="row mob-margin">

                        <div class="form-group col-md-4 col-6">
                            <label> الإسم الأول </label>
                            <input type="text" required class="form-control" value="{{Auth::guard('web')->user()->info->firstname}}" name="firstname" placeholder="الإسم الأول">
                        </div>
                        <div class="form-group col-md-4 col-6">
                            <label>  الإسم الأخير</label>
                            <input type="text" required class="form-control"  value="{{Auth::guard('web')->user()->info->lastname}}" name="lastname" placeholder="الإسم الأخير">
                        </div>

                        <div class="form-group col-md-4 col-12">
                            <label> تاريخ الميلاد </label>
                            <input type="date" required class="form-control" disabled name="date"  value="{{Auth::guard('web')->user()->birth_date}}">
                        </div>

                    </div>
                    <div class="row">
                        <div class="form-group col-md-4 col-6">
                            <label>  الهاتف</label>
                            <input type="tel" disabled required class="form-control"  value="{{Auth::guard('web')->user()->phone}}" name="phone" placeholder="الهاتف">
                        </div>
                        <div class="form-group col-md-4 col-6">
                            <label> البريد الإلكتروني </label>
                            <input type="email" disabled required class="form-control" value="{{Auth::guard('web')->user()->email}}" name="email" placeholder="البريد الالكتروني">
                        </div>
                        <div class="form-group col-md-4 col-12">
                            <label>  المسمى الوظيفي</label>
                            <input type="text" oninvalid="this.setCustomValidity('هذا الحقل مطلوب' )"  required  class="form-control"  value="{{Auth::guard('web')->user()->info->job_title}}" name="job_title" placeholder="المسمى الوظيفي">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4 col-6">
                            <label>  الدولة</label>
                            @inject('Countries','App\Models\Country')

                            <select class="form-control" oninvalid="this.setCustomValidity('هذا الحقل مطلوب' )"  required  id="country3" name="country_id">
                                @if(Auth::guard('web')->user()->info->country_id)
                                @foreach($Countries->where('is_active','active')->get() as $Country)
                                    <option @if(Auth::guard('web')->user()->info->country_id == $Country->id)  selected @endif value="{{$Country->id}}">{{$Country->name}} </option>
                                @endforeach
                                @else
                                    @foreach($Countries->where('is_active','active')->get() as $Country)
                                        <option @if(Auth::guard('web')->user()->country_id == $Country->id)  selected @endif value="{{$Country->id}}">{{$Country->name}} </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        @inject('City','App\Models\City')
                        <div class="form-group col-md-4 col-6">
                            <label>  المحافظة</label>
                            <select class="form-control"  oninvalid="this.setCustomValidity('هذا الحقل مطلوب' )"  required  id="city3" name="city_id">
                                @if(Auth::guard('web')->user()->info->city_id)
                                    <option value="{{Auth::guard('web')->user()->info->city_id}}">{{Auth::guard('web')->user()->info->City->name}}</option>
                                @else
                                        <option value="{{Auth::guard('web')->user()->city_id}}">{{Auth::guard('web')->user()->info->City->name}}</option>
                                @endif
                            </select>
                        </div>
                        @inject('State','App\Models\State')

                        <div class="form-group col-md-4 col-6">
                            <div class="form-group">
                                <label for="state" >المركز *</label>
                                <select class="form-control wizard-required" oninvalid="this.setCustomValidity('هذا الحقل مطلوب' )"  required  id="state2" name="state_id">
                                    @if(Auth::guard('web')->user()->info->state_id)
                                        @if(Auth::guard('web')->user()->info->state_id)
                                            <option value="{{Auth::guard('web')->user()->info->state_id}}">{{$State->find(Auth::guard('web')->user()->info->state_id)->name}}</option>
                                        @endif
                                    @else
                                        <option value="{{Auth::guard('web')->user()->state_id}}">{{Auth::guard('web')->user()->State->name}}</option>
                                    @endif
                                </select>
                                <div class="wizard-form-error"></div>
                            </div>
                        </div>
                        @inject('Village','App\Models\Village')

                        <div class="form-group col-md-4 col-6">
                            <div class="form-group">
                                <label for="state" >القرية او الحي *</label>
                                <select class="form-control wizard-required" oninvalid="this.setCustomValidity('هذا الحقل مطلوب' )"  required  id="village2" name="village_id">
                                    @if(Auth::guard('web')->user()->info->village_id)
                                        @if(Auth::guard('web')->user()->info->village_id)
                                            <option value="{{Auth::guard('web')->user()->info->village_id}}">{{Auth::guard('web')->user()->Village->name}}</option>
                                        @endif
                                    @else
                                        <option value="{{Auth::guard('web')->user()->village_id}}">{{Auth::guard('web')->user()->Village->name}}</option>
                                    @endif
                                </select>
                                <div class="wizard-form-error"></div>
                            </div>
                        </div>

                        <div class="form-group col-md-4 col-12">
                            <label>العنوان بالتفصيل  </label>
                            <input type="text" class="form-control" name="address"  value="{{Auth::guard('web')->user()->info->address}}" placeholder="العنوان بالتفصيل">
                        </div>


                        <div class="form-group col-md-4 col-12">
                            <label>العنوان تفصيل 2  </label>
                            <input type="text" class="form-control" name="address2"  value="{{Auth::guard('web')->user()->info->address2}}" placeholder=" العنوان بالتفصيل 2">
                        </div>
                    </div>


            </div>







        </div>
        <hr>
        <div class="row cv-btn">
            <div class="col-md-12 col-12">
                <div class="btn-text">
                    <button type="submit" class="btn btn-primary btn-theme" style="font-size: 12px">
                        الخطوة التالية
                    </button>
                </div>
            </div>

        </div>
        </form>

    </section>

@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>

        $('.dropify').dropify();

        $("#country3").on('click , change',function () {
            var wahda = $(this).val();

            if (wahda != '') {
                $.get("{{ URL::to('/get-Cities')}}" + '/' + wahda, function ($data) {
                    $('#city3').html($data);
                });
            }
        });

    </script>
@endsection
