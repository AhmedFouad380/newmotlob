@extends('front.layout')
@section('title')
    الوظائف
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css"
          integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
@endsection
@section('content')



    <!-- this is content of company -->
    <section class="container container-space">
        <div class="row">
            @include('front.Company.sidebar')
            <div class="col-md-8">
                <!-- row -->
                <div class="col-md-12">
                    <div class="row jobs">
                        <div class="col-md-6">
                            <h5> الوظائف
                                <span>({{$data->count()}})</span>
                            </h5>
                        </div>
                        <div class="col-md-6 leftbtn">
                            @inject('companies','App\Models\Company')
                            @if(($companies->find(Auth::guard('company')->id())->company_type == 'private'))
                            @if(\App\Models\CompanyPayment::where('company_id',Auth::guard('company')->id())->where('states','payed')->orderBy('id','desc')->first()
                            && \App\Models\CompanyPayment::where('company_id',Auth::guard('company')->id())->where('states','payed')->orderBy('id','desc')->first()->adv_count_used < \App\Models\CompanyPayment::where('company_id',Auth::guard('company')->id())->where('states','payed')->orderBy('id','desc')->first()->Package->adv_count  )
                                <a href="{{url('AddJob')}}" class="btn btn-primary">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                    إضافة وظيفة جديدة
                                </a>
                            @else
                                <a href="{{url('CompanyPackage')}}" class="btn btn-primary">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                    اشتارك في الباقة لاضافة وظيفة
                                </a>
                            @endif
                            @elseif(($companies->find(Auth::guard('company')->id())->company_type == 'employment'))

                            <a href="{{url('AddJob')}}" class="btn btn-primary">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                    إضافة وظيفة جديدة
                                </a>
                            @else
                                <a href="{{url('CompanyPackage')}}" class="btn btn-primary">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                    اشتارك في الباقة لاضافة وظيفة
                                </a>

                            @endif
                        </div>
                    </div>
                </div>
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
                                    <div class="col-md-4 job-flex-1">
                                        <ul class="job-flex">
                                            <li class="li-3">
                                                <div>
                                                    <i class="fa fa-pencil-square-o" style="color:#4997D2"
                                                       aria-hidden="true"></i>
                                                    <br>
                                                    <a href="{{url('edit-Job',$job->id)}}" class="edit">تعديل</a>
                                                </div>
                                            </li>
                                            <li class="li-4">
                                                <div>
                                                    <a href="{{url('jobDetails',$job->id)}}" class="show">
                                                        <i class="fa fa-eye" style="color:#C3CCDC" aria-hidden="true"></i>
                                                        <br>
                                                        عرض
                                                    </a>
                                                </div>
                                            </li>
                                            <li class="li-4">
                                                <div>
                                                    <a href="{{url('RepeatJob',$job->id)}}" class="green show">
                                                        <i class="fa fa-repeat" aria-hidden="true"></i>
                                                        <br>
                                                        نسخ
                                                    </a>
                                                </div>
                                            </li>

                                            <li class="li-4">
                                                <div>
                                                    <button data-id="{{$job->id}}" class="delete">
                                                        <i class="fa fa-trash-o" style="color:#D41111" aria-hidden="true"></i>
                                                        <br>
                                                        حذف
                                                    </button>
                                                </div>
                                            </li>


                                </ul>
                            </div>
                        </div>
                    </div>
                    </div>
                @endforeach
                <hr>
                <br>

                <div class="col-md-12">
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

@endsection
