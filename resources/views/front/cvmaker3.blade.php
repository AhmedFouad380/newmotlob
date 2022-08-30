@extends('front.layout')
@section('title')
    انشاء السيرة الذاتية
@endsection


@section('content')

    <!-- this is content -->

    <section class="container">
        <form method="post" action="{{url('store-education')}}">
            @csrf
            <div class="row cv-maker">

                <div class="col-md-3 col-11 cv">
                    <div>
                        <h6>مراحل تصميم السيرة الذاتية </h6>
                        <hr>
                        <ul class="ul">
                            <li class="green"><span class="green ">1</span>  <a class="green" href="{{url('cv-maker')}}">المعلومات الشخصية</a></li>
                            <li class="green"><span class="green ">2</span>  <a class="green"  href="{{url('cv-maker-step2')}}">الهدف المهني </a></li>
                            <li class="blue"><span class="blue border-blue">3</span> <a class="blue" href="{{url('cv-maker-step3')}}">التعليم</a></li>
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
                    <h5>التعليم و المنح التدريبية</h5>
                    <p>أضف الشهادة التي حصلت عليها أثناء تدريبك أو دراستك الأكاديمية</p>
                    <div class="row">
                        <div class="form-group col-md-4 col-6">
                            <label> المؤهل  </label>
                            <select class="form-control" required name="type">
                                <option value="collage">جامعة</option>
                                <option value="school">مدرسة</option>
                                <option value="Institute">معهد</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4 col-6">
                            <label> الاسم  </label>
                            <input type="text" class="form-control" required name="name" placeholder="اسم الجامعة- مدرسة - معهد">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4 col-6">
                            <label>الموقع</label>
                            <input type="text" class="form-control" required name="location" placeholder="الموقع">
                        </div>

                        <div class="form-group col-md-4 col-6">
                            <label>المؤهل</label>
                            <input type="text" class="form-control" name="qualification" placeholder="المؤهل">
                        </div>
                        <div class="form-group col-md-4 col-12 ">
                            <label>مجال الدراسة</label>
                            <input type="text" class="form-control" name="area" placeholder="مجال الدراسة">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4 col-6">
                            <label> تاريخ التخرج </label>
                            <input type="date" class="form-control" name="graduation_date">
                        </div>
                        <div class="form-group col-md-4 col-6">
                            <label class="checkbox">
                                <input type="checkbox"> لا زلت أدرس إلى الآن
                            </label>

                        </div>
                        <button type="submit" class="btn btn-primary btn-theme add" >
                            + إضافة
                        </button>
                    </div>
                </div>

                {{--						<div class="col-md-3 cv-table">--}}
                {{--							<ul>--}}
                {{--								<li class="green">--}}
                {{--									<span class="green">سيرة ذاتية</span>--}}
                {{--									<p class="green">الإسم الأول الإسم الأخير</p>--}}
                {{--									<p class="green">البريد الإلكتروني</p>--}}
                {{--									<p class="green">الموجز</p>--}}

                {{--								</li>--}}
                {{--								<li class="blue">التعليم</li>--}}
                {{--								<li>الخبرات</li>--}}
                {{--								<li>المهارات</li>--}}

                {{--							</ul>--}}

                {{--						</div>--}}

            </div>
            <hr>
            <section >
                <div class="row">
                    <div class="col-md-3"    class="none-div">
                </div>
                <div class="col-md-9 col-11">
                    <h5 style="font-weight: bolder">راجع شهادتك الدراسية</h5>
                    <div class="row">
                        @foreach(Auth::guard('web')->user()->education as $key => $data)
                            <div class="col-md-4 ">
                                <div class="data">
                                    <i class="fa fa-trash-o delete" data-id="{{$data->id}}" aria-hidden="true"></i>
                                     {{$data->qualification}}
                                    <br>
                                    {{$data->area}}
                                    <br>
                                    {{$data->name}}
                                    <br>المؤهل
                                    <br> مجال الدراسة :
                                    <br>لسنة :{{$data->graduation_date}}
                                    {{--                                                 <i class="fa fa-pencil-square-o edit" data-id="{{$data->id}}" aria-hidden="true"></i>--}}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                </div>
            </section>
            <hr>
            <div class="row">
                <div class="col-md-12 col-11">
                    <div class="btn-text">
                        <a type="button" class=" btn  btn-theme2"  href="{{url('cv-maker-step2')}}">
                            رجوع للخلف
                        </a>
                        <a href="{{url('cv-maker-step4')}}" type="button" class="btn btn-primary btn-theme" >
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
                            url: '{{url("delete-Education")}}',
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

@endsection
