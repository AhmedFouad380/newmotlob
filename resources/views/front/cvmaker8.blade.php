@extends('front.layout')
@section('title')
    انشاء السيرة الذاتية
@endsection


@section('content')

    <!-- this is content -->

    <section class="container">
        <form method="post" action="{{url('store-knows')}}">
            @csrf
            <div class="row cv-maker">

                <div class="col-md-3 col-11 cv">
                    <div>
                        <h6>الشهادات و الدورات </h6>
                        <hr>
                        <ul class="ul">
                            <li class="green"><span class="green">1</span>  <a class="green" href="{{url('cv-maker')}}">المعلومات الشخصية</a></li>
                            <li class="green"><span class="green">2</span> <a class="green" href="{{url('cv-maker-step2')}}">الهدف المهني </a></li>
                            <li class="green"><span class=" green">3</span> <a  class="green"  href="{{url('cv-maker-step2')}}">التعليم</a></li>
                            <li class="green"><span class="green ">4</span> <a class="green"  href="{{url('cv-maker-step4')}}">الخبــرات </a></li>
                            <li class="green"><span class="green ">5</span> <a class="green"  href="{{url('cv-maker-step5')}}"> المهــارات </a></li>
                            <li class="green"><span class="green ">6</span> <a class="green" href="{{url('cv-maker-step6')}}">اللغات</a> </li>
                            <li class="green"><span class="green ">7</span> <a class="green" href="{{url('cv-maker-step7')}}">المؤتمرات  و الدورات</a></li>
                            <li class="blue"><span class="blue border-blue">8</span> <a class="blue" href="{{url('cv-maker-step8')}}">المعرفين</a></li>
                            <li><span>9</span><a href="{{url('cv-maker-step9')}}">المنظمات</a></li>
                            <li><span>10</span><a href="{{url('cv-maker-step10')}}" >الخطوة النهــائية</a></li>
                        </ul>

                    </div>
                </div>

                <div class="col-md-8 col-11 cv-form">
                    <h5>اضف ملرومات المعرفين</h5>
                    <p>المعرف يمكن ان يكون زميل عمل او مدير سابق او استاذ جامعه</p>
                    <div class="row">

                        <div class="form-group col-md-5 col-6">
                            <label> الاسم  </label>
                            <input type="text" class="form-control" oninvalid="this.setCustomValidity('هذا الحقل مطلوب' )"  required  name="name" placeholder="اسم ">
                        </div>

                        <div class="form-group col-md-5 col-6">
                            <label> المسمى الوظيفي  </label>
                            <input type="text" class="form-control" oninvalid="this.setCustomValidity('هذا الحقل مطلوب' )"  required  name="job_title" placeholder="المسمى الوظيفي ">
                        </div>
                        <div class="form-group col-md-10 col-12">
                            <label> الشركة</label>
                            <input type="text" class="form-control"  oninvalid="this.setCustomValidity('هذا الحقل مطلوب' )"  required  name="company" placeholder="اسم الشركة">
                        </div>

                    </div>
                    <div class="row">
                        <div class="form-group col-md-5 col-6">
                            <label> البريد الالكتروني</label>
                            <input type="text" class="form-control" name="email" placeholder="البريد الالكتروني">
                        </div>
                        <div class="form-group col-md-5 col-6">
                            <label>رقم الهاتف </label>
                            <input type="number" class="form-control" oninvalid="this.setCustomValidity('هذا الحقل مطلوب' )"  required  name="phone" placeholder="رقم الهاتف">
                        </div>
                        <div class="col-md-2 col-12">
                            <button type="submit" class="btn btn-primary btn-theme add" >
                                + إضافة
                            </button>
                        </div>

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
                    <div class="col-md-3 none-div">
                    </div>
                    <div class="col-md-9 col-12">
                        <h5 style="font-weight: bolder">راجع المعرفين</h5>
                        <div class="row">
                            @foreach(Auth::guard('web')->user()->knows as $key => $data)
                                <div class="col-md-4 col-12 ">
                                    <div class="data">
                                        <i class="fa fa-trash-o delete" data-id="{{$data->id}}" aria-hidden="true"></i>
                                        الاسم : {{$data->name}} <br>
                                        رقم الهاتف : {{$data->phone}}   <br>
                                        البريد الالكتروني : {{$data->email}}
                                        المسمى الوظيفي : {{$data->job_title}} <br>
                                        الشركة : {{$data->company}}
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
                        <a type="button" class=" btn  btn-theme2" href="{{url('cv-maker-step7')}}">
                            رجوع للخلف
                        </a>
                        <a href="{{url('cv-maker-step9')}}" type="button" class="btn btn-primary btn-theme" >
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
                            url: '{{url("delete-knows")}}',
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
