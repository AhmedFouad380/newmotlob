@extends('front.layout')
@section('title')
    انشاء السيرة الذاتية
@endsection


@section('content')

    <!-- this is content -->

    <section class="container">
        <form method="post" action="{{url('store-experience')}}">
            @csrf
            <div class="row cv-maker">

                <div class="col-md-3 col-11 cv">
                    <div>
                        <h6>مراحل تصميم السيرة الذاتية </h6>
                        <hr>
                        <ul class="ul">
                            <li class="green"><span class="green">1</span>  <a class="green" href="{{url('cv-maker')}}">المعلومات الشخصية</a></li>
                            <li class="green"><span class="green">2</span> <a class="green" href="{{url('cv-maker-step2')}}">الهدف المهني </a></li>
                            <li class="green"><span class=" green">3</span> <a  class="green"  href="{{url('cv-maker-step2')}}">التعليم</a></li>
                            <li class="blue"><span class="blue border-blue">4</span> <a class="blue"  href="{{url('cv-maker-step4')}}">الخبــرات </a></li>
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
                    <h5>دعنا نعمل على خبراتك</h5>
                    <p>.ابدأ بوظيفتك الأخيرة أولاً</p>
                    <div class="row">

                        <div class="form-group col-md-6 col-6">
                            <label> المسمى الوظيفي  </label>
                            <input type="text" class="form-control" required name="name" placeholder="المسمى الوظيفي">
                        </div>
                        <div class="form-group col-md-6 col-6">
                            <label> الشركة  </label>
                            <input type="text" class="form-control" required name="company" placeholder="الشركة">
                        </div>

                    </div>
                    <div class="row">

                        <div class="form-group col-md-6 col-6">
                            <label> المجال  </label>
                            <select class="form-control" name="category_id" id="category_id">
                                @foreach(\App\Models\ExperienceCategory::where('is_active','active')->get() as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6 col-6">
                            <label> التخصص  </label>
                            <select class="form-control" id="specialization_id" name="specialization_id">
                            </select>
                        </div>

                        <div class="form-group col-md-12 col-12">
                            <label> الوصف الوظيفي  </label>
                            <textarea class="form-control" name="description" rows="4"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4 col-6">
                            <label>تاريخ البدأ</label>
                            <input type="date" class="form-control" required name="start_date" placeholder="تاريخ البدأ">
                        </div>

                        <div class="form-group col-md-4 col-6">
                            <label>تاريخ الانتهاء</label>
                            <input type="date" class="form-control" name="end_date" placeholder="تاريخ الانتهاء">
                        </div>
                        <div class="form-group col-md-4 col-12 top-box">
                            <label class="checkbox">
                                <input type="checkbox"> لا زلت اعمل في هذا العمل الى الان
                            </label>

                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4 col-6">
                            <label>  الدولة </label>
                            <select class="form-control" id="country3" name="country_id">
                                <option>اختر </option>
                                @inject('Countries','App\Models\Country')
                                @foreach($Countries->where('is_active','active')->get() as $Country)
                                    <option value="{{$Country->id}}">{{$Country->name}} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4 col-6">
                            <label>  المحافظة</label>
                            <select class="form-control" required id="city3" name="city_id">

                            </select>
                        </div>
                        <div class="form-group col-md-4 col-6">
                            <div class="form-group">
                                <label for="state" >المركز *</label>
                                <select class="form-control wizard-required" id="state3" name="state_id">
                                </select>
                                <div class="wizard-form-error"></div>
                            </div>
                        </div>
                        <div class="form-group col-md-4 col-6">
                            <div class="form-group">
                                <label for="state" >القرية او الحي *</label>
                                <select class="form-control wizard-required" id="village3" name="village_id">
                                </select>
                                <div class="wizard-form-error"></div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-theme add" >
                            + إضافة
                        </button>
                    </div>
                </div>


            </div>
            <hr>
            <section >
                <div class="row">
                    <div class="col-md-3 none-div">
                    </div>
                    <div class="col-md-9 col-11">
                        <h5 style="font-weight: bolder">راجع خبراتك</h5>
                        <div class="row">
                            @foreach(Auth::guard('web')->user()->Experience as $key => $data)
                                <div class="col-md-4 col-12">
                                    <div class="data">
                                        <i class="fa fa-trash-o delete" data-id="{{$data->id}}" aria-hidden="true"></i>
                                         {{$data->name}}  - شركة {{$data->company}} <br>
                                        {{$data->Country->name}} -  {{$data->City->name}} - {{$data->state->name}}  - {{$data->village->name}}
                                        <br> التاريخ : {{\Carbon\Carbon::parse($data->start_date)->format('Y-m')}} :   {{\Carbon\Carbon::parse($data->end_date)->format('Y-m')}}
                                        {{--                                                        <i class="fa fa-pencil-square-o edit" data-id="{{$data->id}}" aria-hidden="true"></i>--}}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>

            {{--            <section class="center col-md-4">--}}

            {{--                <h5>راجع شهادتك الدراسية</h5>--}}
            {{--                <div class="div row" >--}}
            {{--                    @foreach(Auth::guard('web')->user()->ُExperience as $key => $data)--}}
            {{--                        <div class="col-md-4">--}}
            {{--                            {{$key + 1}} . {{$data->name}}   ( {{$data->company}})--}}
            {{--                            <i class="fa fa-pencil-square-o edit" data-id="{{$data->id}}" aria-hidden="true"></i>--}}
            {{--                            <i class="fa fa-trash-o delete" data-id="{{$data->id}}" aria-hidden="true"></i>--}}
            {{--                        </div>--}}
            {{--                    @endforeach--}}
            {{--                </div>--}}

            {{--            </section>--}}
            <hr>
            <div class="row">
                <div class="col-md-12 col-11">
                    <div class="btn-text">
                        <a type="button" class=" btn  btn-theme2" href="{{url('cv-maker-step3')}}" >
                            رجوع للخلف
                        </a>
                        <a href="{{url('cv-maker-step5')}}" type="button" class="btn btn-primary btn-theme" >
                            الخطوة التالية
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </section>

@endsection
@section('js')
    <script type="text/javascript">

        $(".delete").on("click", function () {
            var dataList = $(this).data('id');

            if (dataList) {
                Swal.fire({
                    title: "تحذير.هل انت متأكد؟!",
                    text: "",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#f64e60",
                    confirmButtonText: "نعم",
                    cancelButtonText: "لا",
                    closeOnConfirm: false,
                    closeOnCancel: false
                }).then(function (result) {
                    if (result.value) {
                        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                        $.ajax({
                            url: '{{url("delete-experience")}}',
                            type: "get",
                            data: {'id': dataList, _token: CSRF_TOKEN},
                            dataType: "JSON",
                            success: function (data) {
                                if (data.message == "Success") {
                                    $("input:checkbox:checked").parents("tr").remove();
                                    Swal.fire("نجاح", "تم الحذف بنجاح", "success");
                                    location.reload();
                                } else {
                                    Swal.fire("نأسف", "حدث خطأ ما اثناء الحذف", "error");
                                }
                            },
                            fail: function (xhrerrorThrown) {
                                Swal.fire("نأسف", "حدث خطأ ما اثناء الحذف", "error");
                            }
                        });
                        // result.dismiss can be 'cancel', 'overlay',
                        // 'close', and 'timer'
                    } else if (result.dismiss === 'cancel') {
                        Swal.fire("ألغاء", "تم الالغاء", "error");
                    }
                });
            }
        });
    </script>
    <script>
        $("#country3").on('click , change',function () {
            var wahda = $(this).val();

            if (wahda != '') {
                $.get("{{ URL::to('/get-Cities')}}" + '/' + wahda, function ($data) {
                    $('#city3').html($data);
                });
            }
        });
        $("#state3").on('click , change',function () {
            var wahda = $(this).val();

            if (wahda != '') {
                $.get("{{ URL::to('/getVillage')}}" + '/' + wahda, function ($data) {
                    $('#village3').html($data);
                });
            }
        });
        $("#city3").on('click , change',function () {
            var wahda = $(this).val();

            if (wahda != '') {
                $.get("{{ URL::to('/getState')}}" + '/' + wahda, function ($data) {
                    $('#state3').html($data);
                });
            }
        });
    </script>
    <script>
        $("#category_id").on('click , change',function () {
            var wahda = $(this).val();

            if (wahda != '') {
                $.get("{{ URL::to('/get-specialization')}}" + '/' + wahda, function ($data) {
                    $('#specialization_id').html($data);
                });
            }
        });

    </script>
@endsection
