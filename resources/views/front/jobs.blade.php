

@extends('front.layout')
@section('title')
    الوظائف
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        $gutter_0: .75rem;
        $gutter_1: 1.25rem;
        $gutter_2: 1.75rem;
        $bg-color: white;

        .sidebar {
            width: 100vw;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        h2 {
            background-color: darken($bg-color, 4%);
            border-top-left-radius: 2px;
            border-top-right-radius: 2px;
            margin-top: -$gutter_0;
            margin-left: -$gutter_1;
            margin-right: -$gutter_1;
            padding: $gutter_0 $gutter_1;
            text-align: center;
            cursor: default;
            font-weight: bolder;
            font-size: 22px;
            padding-top: 15px
        }
        .input-padding {
            padding: 5px 12px 5px 0; !important;
            font-size: 14px;
            /*color: #d0b9fe;*/
            color: #c4c4c4
        }
        .line-div {

            margin-bottom: 28px

        }
        .right-ul-jobs {
            margin-right: 20px
        }
        form {

        label {
            width: 100%;
            text-align: center;
        }
        }
        &:hover {
        h2 {
            background-color: darken($bg-color, 8%);
        }
        }
        }

        #user_age_handler_min, #user_age_handler_max {
            width: 3em;
            margin-left: -1.5em;
            height: 1.6em;
            top: 50%;
            margin-top: -.8em;
            text-align: center;
            line-height: 1.6em;
        }
    </style>
@endsection
@section('content')



    <!-- this is content of company -->
    <section class="container container-space">
        <div class="row">
            <div class="col-md-3 col-12">
                <div class="sidebar">
                    <div class="widget user_widget_search">
                        <h2>البحث </h2>
                        <form id="user_wiget_search_form" class="user_wiget_search_form"  method="GET">
                            <div class="form-group">
                                <label for="user_name">اسم الوظيفة :</label>
                                <input type="text" class="form-control input-padding"  name="title"  value="{{Request::get('title')}}"  >
                            </div>
                            <div class="form-group ">
                                <label>  الدولة :</label>
                                <select class="form-control wizard-required input-padding" id="country3" name="country_id">
                                    <option value="0">الكل</option>
                                    @inject('Countries','App\Models\Country')
                                    @foreach($Countries->where('is_active','active')->get() as $Country)
                                        <option @if(Request::get('country_id') == $Country->id) selected @endif value="{{$Country->id}}">{{$Country->name}} </option>
                                    @endforeach
                                </select>
                                <div class="wizard-form-error"></div>

                            </div>
                            @inject('City','App\Models\City')
                            <div class="form-group ">
                                <label>  المحافظة :</label>
                                <select class="form-control wizard-required input-padding " id="city3" name="city_id">
                                    @if(Request::get('city_id'))
                                        <option  value="{{Request::get('city_id')}}">{{$City->find(Request::get('city_id'))->name}}</option>
                                    @endif                                </select>
                                <div class="wizard-form-error"></div>

                            </div>
                            @inject('state','App\Models\State')

                            <div class="form-group ">
                                <label>  قسم / مركز :</label>
                                <select class="form-control wizard-required input-padding " id="state" name="state_id">
                                    @if(Request::get('state_id'))
                                        <option  value="{{Request::get('state_id')}}">{{$state->find(Request::get('state_id'))->name}}</option>
                                    @endif
                                </select>
                                <div class="wizard-form-error"></div>

                            </div>
                            @inject('Village','App\Models\Village')
                            <div class="form-group ">
                                <label>  شياخة / قرية  :</label>
                                <select class="form-control wizard-required input-padding " id="village_id" name="village_id">
                                    @if(Request::get('village_id'))
                                        <option  value="{{Request::get('state_id')}}">{{$Village->find(Request::get('state_id'))->name}}</option>
                                    @endif
                                </select>
                                <div class="wizard-form-error"></div>

                            </div>
                            <div class="form-group ">
                                <label> المجال : </label>
                                <select class="form-control input-padding " name="category_id" id="category_id">
                                    <option value="0">الكل</option>
                                    @foreach(\App\Models\ExperienceCategory::where('is_active','active')->get() as $category)
                                        <option @if(Request::get('category_id') == $category->id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @inject('specialization_id','App\Models\ExperienceSpecialization')

                            <div class="form-group ">
                                <label> التخصص  :</label>
                                <select class="form-control input-padding " id="specialization_id" name="specialization_id">
                                    @if(Request::get('specialization_id'))
                                        <option  value="{{Request::get('specialization_id')}}">{{$specialization_id->find(Request::get('specialization_id'))->name}}</option>
                                    @endif
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="user_gender">النوع : </label>
                                <select class="form-control custom-select input-padding " name="gender">
                                    <option value="0">الكل</option>
                                    <option value="male">ذكر</option>
                                    <option value="female" >انئى</option>
                                </select>
                            </div>
                            {{--                            <div class="form-group">--}}
                            {{--                                <label for="user_age">العمر</label>--}}
                            {{--                                <div class="row">--}}
                            {{--                                    <div class="form-group col-md-6">--}}
                            {{--                                        <label>الحد الأدنى </label>--}}
                            {{--                                        <select name="min_age" class="form-control wizard-required">--}}
                            {{--                                            --}}{{--                                        <option value="0">لا يشترط</option>--}}
                            {{--                                            @for ($x = 18; $x <= 70; $x++)--}}
                            {{--                                                <option value="{{$x}}">{{$x}}</option>--}}
                            {{--                                            @endfor--}}
                            {{--                                        </select>--}}
                            {{--                                    </div>--}}
                            {{--                                    <div class="form-group col-md-6">--}}
                            {{--                                        <label>الحد الأقصى </label>--}}
                            {{--                                        <select name="max_age" class="form-control wizard-required">--}}
                            {{--                                            --}}{{--                                    <option value="0">لا يشترط</option>--}}
                            {{--                                            @for ($x = 18; $x <= 70; $x++)--}}
                            {{--                                                <option value="{{$x}}">{{$x}}</option>--}}
                            {{--                                            @endfor--}}
                            {{--                                        </select>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                            <br>
                            <div class="row form-group">
                                <label>   متوسط الراتب الأساسى  </label>
                                <div class="form-group col-md-6 col-6 ">
                                    <label   >   من :</label>
                                    <input type="number"  class="form-control wizard-required input-padding  " value="{{Request::get('min_salary')}}" name="min_salary" placeholder="">
                                    <div class="wizard-form-error"></div>

                                </div>
                                <div class="form-group col-md-6 col-6 ">
                                    <label >  الى : </label>
                                    <input type="number"  class="form-control wizard-required input-padding " value="{{Request::get('max_salary')}}"  name="max_salary" placeholder="">
                                    <div class="wizard-form-error"></div>

                                </div>
                            </div>


                            <br>
                            <div class="form-group center" >
                                <button type="submit" class="btn btn-block btn-primary" style="font-size: 14px; margin-bottom:15px ">بحث</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-8 col-12">


                <!-- row -->
                <div class="col-md-12 col-12">
                    <div class="row jobs">
                        <div class="col-md-6">
                            <h5 style="margin-top: 15px"> الوظائف
                                {{--                                <span>({{$data->count()}})</span>--}}
                            </h5>
                            <div class="line-div"></div>
                        </div>
                    </div>
                </div>
                @if(count($data) >0)
                @foreach($data as $job)
                    <div class="col-md-12 col-12 new-job">
                        <div class="row center-jobss" style="padding: 10px;">
                            <div class="col-md-1 col-12">
                                @if(isset($job->Company->image))
                                    <img src="{{$job->Company->image}}" style="margin:5px; width:100px;height: 100px; border-radius: 50%;border: 2px #CCCCCC solid;" >
                                @else
                                    <i class="fa fa-briefcase bag-job" aria-hidden="true"></i>
                                @endif
                            </div>
                            <div class="col-md-7 col-12">
                                <ul class="right-ul-jobs">
                                    <li class="li-1">
                                        <a  style="color:#4997D2"  href="{{url('jobDetails',$job->id)}}">
                                            {{$job->title}}
                                        </a>
                                    </li>
                                    <li class="describe">
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        {{$job->Country->name}} - {{$job->City->name}}
                                    </li>
                                    <li class="li-2" >
                                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                                        {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $job->created_at)->diffForHumans()}}
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-4 col-12 job-flex-1 right-job-flex">
                                <ul class="job-flex" style="list-style:none">

                                    <li class="li-4">
                                        <div>
                                            <a href="{{url('jobDetails',$job->id)}}" class="show" >
                                                <i class="fa fa-eye" style="color:#C3CCDC" aria-hidden="true"></i>
                                                <br>
                                                عرض
                                            </a>
                                        </div>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
                @else
                    <p>
                        عفوا ! لا يوجد وظائف متاحه
                    </p>
                    @endif
                <hr>
                <br>
                <div class="col-md-12 col-12">
                    <nav aria-label="Page navigation example">
                        @php
                            $paginator =$data->appends(request()->input())->links()->paginator;
                                if ($paginator->currentPage() < 2 ){
                                            $link = $paginator->currentPage();
                                }else{
                                     $link = $paginator->currentPage() -1;
                                }
                                if($paginator->currentPage() == $paginator->lastPage()){
                                           $last_links = $paginator->currentPage();
                                }else{
                                           $last_links = $paginator->currentPage() +1;

                                }
                        @endphp
                        @if ($paginator->lastPage() > 1)
                            <ul class="pagination">
                                <li class="{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }} page-item">
                                    <a class="page-link" href="{{ $paginator->url(1) }}">الاول </a>
                                </li>
                                @for ($i = $link; $i <= $last_links; $i++)
                                    <li class="{{ ($paginator->currentPage() == $i) ? ' active' : '' }} page-item">
                                        <a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor
                                <li class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }} page-item">
                                    <a class="page-link"
                                       href="{{ $paginator->url($paginator->lastPage()) }}">الاخير</a>
                                </li>
                            </ul>
                        @endif

                    </nav>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('js')
    <script type="text/javascript">

        $(".delete").on("click", function () {
            var dataList = [];
            dataList.push($(this).data('id'));

            if (dataList.length > 0) {
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
                            url: '{{url("delete-Job")}}',
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

        // $('.dropify').dropify();

        $("#country3").on('click , change',function () {
            var wahda = $(this).val();

            if (wahda != '') {
                $.get("{{ URL::to('/get-Cities')}}" + '/' + wahda, function ($data) {
                    all = '<option value="0">الكل </option>';
                    all +=$data;

                    $('#city3').html(all);
                });
            }
        });

    </script>
    <script>

        // $('.dropify').dropify();

        $("#city3").on('click , change',function () {
            var wahda = $(this).val();

            if (wahda != '') {
                $.get("{{ URL::to('/getState')}}" + '/' + wahda, function ($data) {
                    all = '<option value="0">الكل </option>';
                    all +=$data;
                    $('#state').html(all);
                });
            }
        });

    </script>
    <script>

        // $('.dropify').dropify();

        $("#state").on('click , change',function () {
            var wahda = $(this).val();

            if (wahda != '') {
                $.get("{{ URL::to('/getVillage')}}" + '/' + wahda, function ($data) {
                    all = '<option value="0">الكل </option>';
                    all +=$data;
                    $('#village_id').html(all);
                });
            }
        });

    </script>
    <script>
        $("#category_id").on('click , change',function () {
            var wahda = $(this).val();

            if (wahda != '') {
                $.get("{{ URL::to('/get-specialization')}}" + '/' + wahda, function ($data) {
                    all = '<option value="0">الكل </option>';
                    all +=$data;
                    $('#specialization_id').html(all);
                });
            }
        });

    </script>
@endsection
