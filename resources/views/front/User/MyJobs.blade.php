

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
            @include('front.User.sidebar')

            <div class="col-md-8">
                <!-- row -->
                <div class="col-md-12">
                    <div class="row jobs">
                        <div class="col-md-6">
                            <h5> الوظائف
                                {{--                                <span>({{$data->count()}})</span>--}}
                            </h5>
                        </div>
                    </div>
                </div>
                @foreach($Jobs as $job)
                    <div class="col-md-12 new-job">
                        <div class="row">
                            <div class="col-md-1">
                                @if(isset($job->Company->image))
                                    <img src="{{$job->Company->image}}" style="margin:5px; width:100px;height: 100px; border-radius: 50%;border: 2px #CCCCCC solid;" >
                                @else
                                    <i class="fa fa-briefcase bag-job" aria-hidden="true"></i>
                                @endif
                            </div>
                            <div class="col-md-7">
                                <ul style="margin-right: 20px;">
                                    <li class="li-1">
                                        <a  style="color:#4997D2"  href="{{url('Job-Details',$job->id)}}">
                                            {{$job->Job->title}}
                                        </a>
                                    </li>
                                    <li class="describe">
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        {{$job->Job->Country->name}} - {{$job->Job->City->name}}
                                    </li>
                                    <li class="li-2" >
                                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                                        {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $job->created_at)->diffForHumans()}}
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-4 job-flex-1">
                                <ul class="job-flex">

                                    <li class="li-4">
                                        <div>
                                            <a href="{{url('jobDetails',$job->id)}}" class="show" >
                                                <i class="fa fa-eye-slash" style="color:#C3CCDC" aria-hidden="true"></i>
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
                <hr>
                <br>
                <div class="col-md-12">
                    <nav aria-label="Page navigation example">
                        @php
                            $paginator =$Jobs->appends(request()->input())->links()->paginator;
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
