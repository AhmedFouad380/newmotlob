@extends('admin.layouts.master')

@section('css')
    <link href="{{ URL::asset('admin/assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ URL::asset('admin/assets/plugins/custom/prismjs/prismjs.bundle.css')}}" rel="stylesheet"
          type="text/css"/>
@endsection

@section('style')
    <style>
        @media (min-width: 992px) {
            .aside-me .content {
                padding-right: 30px;
            }
        }

        .select2-container .select2-selection--single .select2-selection__clear {
            padding-right: 355px;
        }
    </style>
@endsection

@section('breadcrumb')
    <h1 class="d-flex text-dark fw-bolder my-1 fs-3">الاعدادات</h1>
    <!--end::Title-->
    <!--begin::Breadcrumb-->
    <ul class="breadcrumb breadcrumb-dot fw-bold text-gray-600 fs-7 my-1">
        <!--begin::Item-->
        <li class="breadcrumb-item text-gray-600">
            <a href="{{ url('/') }}" class="text-gray-600 text-hover-primary">لوحة القيادة</a>
        </li>
        <!--end::Item-->
        <!--begin::Item-->
        <li class="breadcrumb-item text-gray-500">فواتير الشركات </li>
        <!--end::Item-->
    </ul>
    <!--end::Breadcrumb-->
@endsection

@section('content')
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <!--begin::Post-->


        <div class="content flex-row-fluid" id="kt_content">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Card body-->
                <div class="card-body pt-0">

                    <!--begin::Table-->
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

                            <th class="min-w-125px"> رقم الفاتورة  </th>
                            <th class="min-w-125px"> اسم العميل  </th>
                            <th class="min-w-125px"> رقم العميل  </th>
                            <th class="min-w-125px"> رسوم التوظيف   </th>
                            <th class="min-w-125px">النسبه او المبلغ  </th>
                            <th class="min-w-125px"> اجمالي الفاتورة   </th>
                            <th class="min-w-125px"> الحالة  </th>
                            <th class=" min-w-100px">الاجراءات</th>
                        </tr>
                        <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->


                        <!--end::Table body-->
                    </table>
                    <!--end::Table-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Post-->
    </div>
@endsection

@section('script')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.1.3/css/dropify.min.css" integrity="sha512-XS4z2x4/njM0ACHTf0QRI/mgWzv2/B4wxD/7JDoUeBvHDhdhFiE7Z3hzevia3pbyr16ufKB6/NUyQ/hBGEAMDw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.1.3/js/dropify.min.js" integrity="sha512-wxJL2RnxGAn2d92YTYdRLjrgIW5fAlhVnnq35EAU7Mmkg4v93cOiPxX/RpG1CCHpoSr6VNcx++6CgQ3B3FoD9Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.ckeditor.com/4.18.0/full-all/ckeditor.js"></script>

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
                    url: '{{ route('Invoices.datatable.data') }}',
                    data: {

                    }
                },
                columns: [
                    {data: 'checkbox', name: 'checkbox', "searchable": false, "orderable": false},
                    {data: 'num', name: 'num', "searchable": true, "orderable": true},
                    {data: 'company_id', name: 'company_id', "searchable": false, },
                    {data: 'user_phone', name: 'user_phone', "searchable": false},
                    {data: 'recruitment_fee_postpaid_monthly', name: 'recruitment_fee_postpaid_monthly', "searchable": false},
                    {data: 'percentage_postpaid_monthly', name: 'percentage_postpaid_monthly', "searchable": false},
                    {data: 'total_price', name: 'total_price', "searchable": false, "orderable": true},
                    {data: 'type', name: 'type', "searchable": true, "orderable": true},
                    {data: 'actions', name: 'actions', "searchable": false, "orderable": false},

                ]
            });
            $.ajax({
                url: "{{ URL::to('/add-button-Invoices')}}",
                success: function (data) { $('.add_button').append(data); },
                dataType: 'html'
            });
        });
    </script>
    <?php
    $message = session()->get("message");
    $error = session()->get("messageError");

    ?>
    @if( session()->has("message"))
        <script>
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": true,
                "progressBar": true,
                "positionClass": "toast-bottom-right",
                "preventDuplicates": false,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            toastr.success("نجاح", "{{$message}}");
        </script>

    @endif
    @if( session()->has("messageError"))
        <script>
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": true,
                "progressBar": true,
                "positionClass": "toast-bottom-right",
                "preventDuplicates": false,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            toastr.error("عفوا", "{{$error}}");
        </script>

    @endif

@endsection

