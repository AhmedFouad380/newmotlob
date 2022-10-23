@extends('front.layout')
@section('title')
    انشاء السيرة الذاتية
@endsection


@section('content')

    <!-- this is content -->

    <section class="container">
        <form method="post" action="{{url('store-language')}}">
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
                            <li class="green"><span class="green ">4</span> <a class="green"  href="{{url('cv-maker-step4')}}">الخبــرات </a></li>
                            <li class="green"><span class="green ">5</span> <a class="green"  href="{{url('cv-maker-step5')}}"> المهــارات </a></li>
                            <li class="blue"><span class="blue border-blue">6</span> <a class="blue" href="{{url('cv-maker-step6')}}">اللغات</a> </li>
                            <li><span>7</span> <a href="{{url('cv-maker-step7')}}">المؤتمرات  و الدورات</a></li>
                            <li><span>8</span><a href="{{url('cv-maker-step8')}}">المعرفين</a></li>
                            <li><span>9</span><a href="{{url('cv-maker-step9')}}">المنظمات</a></li>
                            <li><span>10</span><a href="{{url('cv-maker-step10')}}" >الخطوة النهــائية</a></li>

                        </ul>

                    </div>
                </div>

                <div class="col-md-8 col-11 cv-form">
                    <h5>اختر اللغات </h5>
                    <div class="row">

                        <div class="form-group col-md-12 col-12">
                            <label> اللغة   </label>
                            <select class="form-control" oninvalid="this.setCustomValidity('هذا الحقل مطلوب' )"  required  name="lang_id" >
                                @foreach(\App\Models\Lang::where('is_active','active')->get() as $lang)
                                    <option value="{{$lang->id}}">{{$lang->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-12 col-12">
                            <label>  المستوى </label>
                            <select name="type" class="form-control" oninvalid="this.setCustomValidity('هذا الحقل مطلوب' )"  required >
                                <option value="excellent" >ممتاز </option>
                                <option value="very_good">جيد جدا </option>
                                <option  value="good">جيد </option>
                                <option value="bad">ضعيف </option>
                            </select>
                        </div>
                        <div class="form-group col-md-4 col-12">
                            <button type="submit" class="btn btn-primary btn-theme add" >
                                + إضافة
                            </button>
                        </div>
                    </div>
                </div>

                {{--                <div class="col-md-3 cv-table">--}}
                {{--                    <ul>--}}
                {{--                        <li class="green">--}}
                {{--                            <span class="green">سيرة ذاتية</span>--}}
                {{--                            <p class="green">الإسم الأول الإسم الأخير</p>--}}
                {{--                            <p class="green">البريد الإلكتروني</p>--}}
                {{--                            <p class="green">الموجز</p>--}}

                {{--                        </li>--}}
                {{--                        <li class="blue">التعليم</li>--}}
                {{--                        <li>الخبرات</li>--}}
                {{--                        <li>المهارات</li>--}}

                {{--                    </ul>--}}

                {{--                </div>--}}

            </div>
            <hr>
            <section >
                <div class="row">
                    <div class="col-md-3 none-div">
                    </div>
                    <div class="col-md-9 col-11">
                        <h5 style="font-weight: bolder">راجع لغاتك</h5>
                        <div class="row">
                            @inject('lang','App\Models\Lang')
                            @foreach(Auth::guard('web')->user()->LangRelation as $key => $data)
                                <div class="col-md-4 col-12 ">
                                    <div class="data">
                                        {{$key + 1}} . {{$lang->find($data->lang_id)->name }}   ( {{__('lang.'.$data->type)}} )
                                        {{--                                                        <i class="fa fa-pencil-square-o edit" data-id="{{$data->id}}" aria-hidden="true"></i>--}}
                                        <i class="fa fa-trash-o delete" data-id="{{$data->id}}" aria-hidden="true"></i>
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
                        <a type="button" class=" btn  btn-theme2" href="{{url('cv-maker-step5')}}" >
                            رجوع للخلف
                        </a>
                        <a href="{{url('cv-maker-step7')}}" type="button" class="btn btn-primary btn-theme" >
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
                            url: '{{url("delete-language")}}',
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

    </script>

@endsection
