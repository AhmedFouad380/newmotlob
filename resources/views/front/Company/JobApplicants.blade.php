

@extends('front.layout')
@section('title')
    المتقدمين
@endsection
@section('css')
    <link href="{{asset('admin/assets/css/style.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{ URL::asset('admin/assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" >

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .noneopacity{
            opacity: unset!important;
        }
        .nav-link{
            opacity: .5;
        }
        td{
            font-size:16px;
        }
    </style>
@endsection
@section('content')


    <!-- this is content of the control applicants -->
<section class="container job-width">
    <div class="row">
        <div class="col-md-12 jobb-border">
            <div class="row take-space control-1">
                <div class="col-md-6 flex-h6">
                    <h6>
                        <i class="fa fa-user-o" aria-hidden="true"></i>
                        إدارة المتقدميين
                    </h6>
                </div>
                <div class="col-md-6 flex-this">
                    <div>
                        <a href="{{url('jobDetails',$data->id)}}" target="self">
                            <i class="fa fa-angle-double-right color-a" aria-hidden="true"></i>
                            العودة إلى الوظائف
                        </a>
                        @if(\App\Models\CompanyPayment::where('states','payed')->orderBy('id','desc')->first() && \App\Models\CompanyPayment::where('states','payed')->orderBy('id','desc')->first()->adv_count_used < \App\Models\CompanyPayment::where('states','payed')->orderBy('id','desc')->first()->Package->adv_count  )
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
        </div>
        <div class="col-md-12 job-border">
            <div class="row take-space ">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <h6>{{$data->title}} <span class="gray-color">( {{\App\Models\JobRequest::where('job_id',$data->id)->count()}}  متقدم )</span></h6>
    {{--                            <span class="red span-red"> انتهت </span>--}}
                        </div>
                        <div class="col-md-6 flex-this-p">
                            <p class="gray-color">نشرت بتاريخ <span class="green">{{\Carbon\Carbon::parse($data->created_at)->format('Y-m-d')}}</span></p>
{{--                            <p class="gray-color">انتهت بتاريخ<span class="red">12 سبتمبر 2022</span></p>--}}
                        </div>
                    </div>

                </div>
                <div class="container col-md-12 control-tab ">
                    <div class="control-2">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class=" item-border nav-link noneopacity active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">
                                <i class="fa fa-user-o" aria-hidden="true"></i>
                                <span class="black-span">{{\App\Models\JobRequest::where('job_id',$data->id)->whereIn('type',['new','pending'])->where('is_read','unread')->count()}}</span>
                                <p>متقدمين <span class="gray-color">(لم تشاهدهم)</span></p>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="item-border nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#home2" type="button" role="tab" aria-controls="profile" aria-selected="false">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                                <span class="black-span">{{\App\Models\JobRequest::where('job_id',$data->id)->whereIn('type',['new','pending'])->where('is_read','readed')->count()}}</span>
                                <p>متقدمين <span class="gray-color">(شاهدتهم)</span></p>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="item-border nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#home3" type="button" role="tab" aria-controls="profile" aria-selected="false">
                                <i class="fa  fa-check" aria-hidden="true"></i>
                                <span class="red-span">{{\App\Models\JobRequest::where('job_id',$data->id)->where('type','accepted')->count()}}</span>
                                <p class="green">متقدمين <span>(مناسبين)</span></p>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class=" item-border nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#home4" type="button" role="tab" aria-controls="contact" aria-selected="false">
                                <i class="fa fa-times" aria-hidden="true"></i>
                                <span class="green-span">{{\App\Models\JobRequest::where('job_id',$data->id)->where('type','rejected')->count()}}</span>
                                <p class="red">متقدمين <span>(مرفوضين)</span></p>
                            </button>
                        </li>
                    </ul>
                    </div>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <table class="table align-middle table-row-dashed fs-4 gy-5" id="users_table">
                                <!--begin::Table head-->
                                <thead>
                                <!--begin::Table row-->

                                <tr class="text-start text-muted fw-bolder fs-5 text-uppercase gs-0">
                                    <th class="w-10px pe-2">
                                        <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                            <input class="form-check-input" type="checkbox" data-kt-check="true"
                                                   data-kt-check-target="#users_table .form-check-input" value="1"/>
                                        </div>
                                    </th>

                                    <th class="min-w-125px">الاسم </th>
                                    <th class="min-w-125px">السن </th>
                                    <th class="min-w-125px">العنوان   </th>
                                    <th class="min-w-125px">الوقت </th>
                                    <th class=" min-w-100px">الاجراءات</th>
                                </tr>
                                <!--end::Table row-->
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->


                                <!--end::Table body-->
                            </table>

                        </div>
                        <div class="tab-pane fade" id="home2" role="tabpanel" aria-labelledby="profile-tab">
                            <table class="table align-middle table-row-dashed fs-4 gy-5" id="users_table2">
                                <!--begin::Table head-->
                                <thead>
                                <!--begin::Table row-->

                                {{--                                <tr class="text-start text-muted fw-bolder fs-5 text-uppercase gs-0">--}}
                                {{--                                    <th class="w-10px pe-2">--}}
                                {{--                                        <div class="form-check form-check-sm form-check-custom form-check-solid me-3">--}}
                                {{--                                            <input class="form-check-input" type="checkbox" data-kt-check="true"--}}
                                {{--                                                   data-kt-check-target="#users_table .form-check-input" value="1"/>--}}
                                {{--                                        </div>--}}
                                {{--                                    </th>--}}

                                {{--                                    <th class="min-w-125px">الاسم </th>--}}
                                {{--                                    <th class="min-w-125px">الحالة </th>--}}
                                {{--                                    <th class="min-w-125px">تم الاضافة بواسطة  </th>--}}
                                {{--                                    <th class="min-w-125px">تم التعديل  بواسطة </th>--}}
                                {{--                                    <th class=" min-w-100px">الاجراءات</th>--}}
                                {{--                                </tr>--}}
                                <!--end::Table row-->
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->


                                <!--end::Table body-->
                            </table>

                        </div>
                        <div class="tab-pane fade" id="home3" role="tabpanel" aria-labelledby="contact-tab">
                            <table class="table align-middle table-row-dashed fs-4 gy-5" id="users_table3">
                                <!--begin::Table head-->
                                <thead>
                                <!--begin::Table row-->

                                {{--                                <tr class="text-start text-muted fw-bolder fs-5 text-uppercase gs-0">--}}
                                {{--                                    <th class="w-10px pe-2">--}}
                                {{--                                        <div class="form-check form-check-sm form-check-custom form-check-solid me-3">--}}
                                {{--                                            <input class="form-check-input" type="checkbox" data-kt-check="true"--}}
                                {{--                                                   data-kt-check-target="#users_table .form-check-input" value="1"/>--}}
                                {{--                                        </div>--}}
                                {{--                                    </th>--}}

                                {{--                                    <th class="min-w-125px">الاسم </th>--}}
                                {{--                                    <th class="min-w-125px">الحالة </th>--}}
                                {{--                                    <th class="min-w-125px">تم الاضافة بواسطة  </th>--}}
                                {{--                                    <th class="min-w-125px">تم التعديل  بواسطة </th>--}}
                                {{--                                    <th class=" min-w-100px">الاجراءات</th>--}}
                                {{--                                </tr>--}}
                                <!--end::Table row-->
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->


                                <!--end::Table body-->
                            </table>

                        </div>
                        <div class="tab-pane fade" id="home4" role="tabpanel" aria-labelledby="contact-tab">
                            <table class="table align-middle table-row-dashed fs-4 gy-5" id="users_table4">
                                <!--begin::Table head-->
                                <thead>
                                <!--begin::Table row-->

                                {{--                                <tr class="text-start text-muted fw-bolder fs-5 text-uppercase gs-0">--}}
                                {{--                                    <th class="w-10px pe-2">--}}
                                {{--                                        <div class="form-check form-check-sm form-check-custom form-check-solid me-3">--}}
                                {{--                                            <input class="form-check-input" type="checkbox" data-kt-check="true"--}}
                                {{--                                                   data-kt-check-target="#users_table .form-check-input" value="1"/>--}}
                                {{--                                        </div>--}}
                                {{--                                    </th>--}}

                                {{--                                    <th class="min-w-125px">الاسم </th>--}}
                                {{--                                    <th class="min-w-125px">الحالة </th>--}}
                                {{--                                    <th class="min-w-125px">تم الاضافة بواسطة  </th>--}}
                                {{--                                    <th class="min-w-125px">تم التعديل  بواسطة </th>--}}
                                {{--                                    <th class=" min-w-100px">الاجراءات</th>--}}
                                {{--                                </tr>--}}
                                <!--end::Table row-->
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->


                                <!--end::Table body-->
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('js')
    <script src="{{ URL::asset('admin/assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>

    <script type="text/javascript">
        $(function () {
            var table = $('#users_table').DataTable({
                processing: true,
                serverSide: true,
                autoWidth: false,
                responsive: true,
                aaSorting: [],
                "dom": "<'card-header border-0 p-0 pt-6'<'card-title' <'d-flex align-items-center position-relative my-1'f> r> <'card-toolbar' <'d-flex justify-content-end add_button'B> r>>  <'row'l r> <''t><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable
                lengthMenu: [[10, 25, 50, 100, 250, -1], [10, 25, 50, 100, 250, "الكل"]],
                "language": {
                    search: '<i class="fa fa-eye" aria-hidden="true"></i>',
                    searchPlaceholder: 'بحث سريع',
                    "url": "{{ url('admin/assets/ar.json') }}"
                },
                buttons: [
                    {extend: 'print', className: 'btn btn-light-primary me-3', text: '<i class="bi bi-printer-fill fs-2x"></i>'},
                    // {extend: 'pdf', className: 'btn btn-raised btn-danger', text: 'PDF'},
                    {extend: 'excel', className: 'btn btn-light-primary me-3', text: '<i class="bi bi-file-earmark-spreadsheet-fill fs-2x"></i>'},
                    // {extend: 'colvis', className: 'btn secondary', text: 'إظهار / إخفاء الأعمدة '}

                ],
                ajax: {
                    url: '{{ route('JobApplicants.datatable.data') }}',
                    data: {
                        type:'pending',
                        is_read:'unread',
                        job_id:'{{$data->id}}'

                    }
                },
                columns: [
                    {data: 'checkbox', name: 'checkbox', "searchable": false, "orderable": false},
                    {data: 'name', name: 'name', "searchable": true, "orderable": true},
                    {data: 'Age', name: 'Age', "searchable": true, "orderable": true},
                    {data: 'Address', name: 'Address', "searchable": true, "orderable": true},
                    {data: 'created_at', name: 'Address', "searchable": true, "orderable": true},
                    {data: 'actions', name: 'actions', "searchable": false, "orderable": false},

                ]
            });
            {{--$.ajax({--}}
            {{--    url: "{{ URL::to('/add-button-Lang')}}",--}}
            {{--    success: function (data) { $('.add_button').append(data); },--}}
            {{--    dataType: 'html'--}}
            {{--});--}}
        });
    </script>

    <script type="text/javascript">
        $(function () {
            var table = $('#users_table2').DataTable({
                processing: true,
                serverSide: true,
                autoWidth: false,
                responsive: true,
                aaSorting: [],
                "dom": "<'card-header border-0 p-0 pt-6'<'card-title' <'d-flex align-items-center position-relative my-1'f> r> <'card-toolbar' <'d-flex justify-content-end add_button'B> r>>  <'row'l r> <''t><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable
                lengthMenu: [[10, 25, 50, 100, 250, -1], [10, 25, 50, 100, 250, "الكل"]],
                "language": {
                    search: '<i class="fa fa-eye" aria-hidden="true"></i>',
                    searchPlaceholder: 'بحث سريع',
                    "url": "{{ url('admin/assets/ar.json') }}"
                },
                buttons: [
                    {extend: 'print', className: 'btn btn-light-primary me-3', text: '<i class="bi bi-printer-fill fs-2x"></i>'},
                    // {extend: 'pdf', className: 'btn btn-raised btn-danger', text: 'PDF'},
                    {extend: 'excel', className: 'btn btn-light-primary me-3', text: '<i class="bi bi-file-earmark-spreadsheet-fill fs-2x"></i>'},
                    // {extend: 'colvis', className: 'btn secondary', text: 'إظهار / إخفاء الأعمدة '}

                ],
                ajax: {
                    url: '{{ route('JobApplicants.datatable.data') }}',
                    data: {
                        type:['new','pending'],
                        is_read:'readed',
                        job_id:'{{$data->id}}'

                    }
                },
                columns: [
                    {data: 'checkbox', name: 'checkbox', "searchable": false, "orderable": false},
                    {data: 'name', name: 'name', "searchable": true, "orderable": true},
                    {data: 'Age', name: 'Age', "searchable": true, "orderable": true},
                    {data: 'Address', name: 'Address', "searchable": true, "orderable": true},
                    {data: 'created_at', name: 'Address', "searchable": true, "orderable": true},
                    {data: 'actions', name: 'actions', "searchable": false, "orderable": false},

                ]
            });
            {{--$.ajax({--}}
            {{--    url: "{{ URL::to('/add-button-Lang')}}",--}}
            {{--    success: function (data) { $('.add_button').append(data); },--}}
            {{--    dataType: 'html'--}}
            {{--});--}}
        });
    </script>
    <script type="text/javascript">
        $(function () {
            var table = $('#users_table3').DataTable({
                processing: true,
                serverSide: true,
                autoWidth: false,
                responsive: true,
                aaSorting: [],
                "dom": "<'card-header border-0 p-0 pt-6'<'card-title' <'d-flex align-items-center position-relative my-1'f> r> <'card-toolbar' <'d-flex justify-content-end add_button'B> r>>  <'row'l r> <''t><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable
                lengthMenu: [[10, 25, 50, 100, 250, -1], [10, 25, 50, 100, 250, "الكل"]],
                "language": {
                    search: '<i class="fa fa-eye" aria-hidden="true"></i>',
                    searchPlaceholder: 'بحث سريع',
                    "url": "{{ url('admin/assets/ar.json') }}"
                },
                buttons: [
                    {extend: 'print', className: 'btn btn-light-primary me-3', text: '<i class="bi bi-printer-fill fs-2x"></i>'},
                    // {extend: 'pdf', className: 'btn btn-raised btn-danger', text: 'PDF'},
                    {extend: 'excel', className: 'btn btn-light-primary me-3', text: '<i class="bi bi-file-earmark-spreadsheet-fill fs-2x"></i>'},
                    // {extend: 'colvis', className: 'btn secondary', text: 'إظهار / إخفاء الأعمدة '}

                ],
                ajax: {
                    url: '{{ route('JobApplicants.datatable.data') }}',
                    data: {
                        type:'accepted',
                        job_id:'{{$data->id}}'

                    }
                },
                columns: [
                    {data: 'checkbox', name: 'checkbox', "searchable": false, "orderable": false},
                    {data: 'name', name: 'name', "searchable": true, "orderable": true},
                    {data: 'Age', name: 'Age', "searchable": true, "orderable": true},
                    {data: 'Address', name: 'Address', "searchable": true, "orderable": true},
                    {data: 'created_at', name: 'Address', "searchable": true, "orderable": true},
                    {data: 'actions', name: 'actions', "searchable": false, "orderable": false},

                ]
            });
            {{--$.ajax({--}}
            {{--    url: "{{ URL::to('/add-button-Lang')}}",--}}
            {{--    success: function (data) { $('.add_button').append(data); },--}}
            {{--    dataType: 'html'--}}
            {{--});--}}
        });
    </script>
    <script type="text/javascript">
        $(function () {
            var table = $('#users_table4').DataTable({
                processing: true,
                serverSide: true,
                autoWidth: false,
                responsive: true,
                aaSorting: [],
                "dom": "<'card-header border-0 p-0 pt-6'<'card-title' <'d-flex align-items-center position-relative my-1'f> r> <'card-toolbar' <'d-flex justify-content-end add_button'B> r>>  <'row'l r> <''t><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable
                lengthMenu: [[10, 25, 50, 100, 250, -1], [10, 25, 50, 100, 250, "الكل"]],
                "language": {
                    search: '<i class="fa fa-eye" aria-hidden="true"></i>',
                    searchPlaceholder: 'بحث سريع',
                    "url": "{{ url('admin/assets/ar.json') }}"
                },
                buttons: [
                    {extend: 'print', className: 'btn btn-light-primary me-3', text: '<i class="bi bi-printer-fill fs-2x"></i>'},
                    // {extend: 'pdf', className: 'btn btn-raised btn-danger', text: 'PDF'},
                    {extend: 'excel', className: 'btn btn-light-primary me-3', text: '<i class="bi bi-file-earmark-spreadsheet-fill fs-2x"></i>'},
                    // {extend: 'colvis', className: 'btn secondary', text: 'إظهار / إخفاء الأعمدة '}

                ],
                ajax: {
                    url: '{{ route('JobApplicants.datatable.data') }}',
                    data: {
                        type:'rejected',
                        job_id:'{{$data->id}}'
                    }
                },
                columns: [
                    {data: 'checkbox', name: 'checkbox', "searchable": false, "orderable": false},
                    {data: 'name', name: 'name', "searchable": true, "orderable": true},
                    {data: 'Age', name: 'Age', "searchable": true, "orderable": true},
                    {data: 'Address', name: 'Address', "searchable": true, "orderable": true},
                    {data: 'created_at', name: 'Address', "searchable": true, "orderable": true},
                    {data: 'actions', name: 'actions', "searchable": false, "orderable": false},

                ]
            });
            {{--$.ajax({--}}
            {{--    url: "{{ URL::to('/add-button-Lang')}}",--}}
            {{--    success: function (data) { $('.add_button').append(data); },--}}
            {{--    dataType: 'html'--}}
            {{--});--}}
        });
    </script>

    <script>
        $('.nav-link').click(function(){
            $('.nav-link').removeClass('noneopacity');
            $(this).addClass('noneopacity')
            var value = $(this).data('bs-target');
            $('.tab-pane').removeClass('show');
            $('.tab-pane').removeClass('active');
            $(value).addClass(' show active');
        });

    </script>
    @endsection
