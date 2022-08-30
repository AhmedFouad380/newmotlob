@extends('front.layout')
@section('title')
    الوظائف
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css"
          integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    {{--    <link href="{{asset('admin/assets/css/style.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />--}}

    <link href="{{ URL::asset('admin/assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" >
    <link href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css" rel="stylesheet" >


    <style>

        th {
            padding-right: 10px;
            color: #181c32;
            background: #f3f6f9;

            font-size: 15px;
        }
        td {
            font-size: 15px;
        }
        .table > tbody {
            vertical-align: inherit;
        }
        .table > thead {
            vertical-align: bottom;
        }
        .table > :not(:first-child) {
            border-top: 2px solid currentColor;
        }

        .caption-top {
            caption-side: top;
        }

        .table-sm > :not(caption) > * > * {
            padding: 0.5rem 0.5rem;
        }

        .table-bordered > :not(caption) > * {
            border-width: 1px 0;
        }
        .table-bordered > :not(caption) > * > * {
            border-width: 0 1px;
        }

        .table-borderless > :not(caption) > * > * {
            border-bottom-width: 0;
        }
        .table-borderless > :not(:first-child) {
            border-top-width: 0;
        }

        .table-striped > tbody > tr:nth-of-type(odd) > * {
            --bs-table-accent-bg: var(--bs-table-striped-bg);
            color: var(--bs-table-striped-color);
        }

        .table-active {
            --bs-table-accent-bg: var(--bs-table-active-bg);
            color: var(--bs-table-active-color);
        }

        .table-hover > tbody > tr:hover > * {
            --bs-table-accent-bg: var(--bs-table-hover-bg);
            color: var(--bs-table-hover-color);
        }

        .table-primary {
            --bs-table-bg: #ccecfd;
            --bs-table-striped-bg: #c2e0f0;
            --bs-table-striped-color: #000000;
            --bs-table-active-bg: #b8d4e4;
            --bs-table-active-color: #000000;
            --bs-table-hover-bg: #bddaea;
            --bs-table-hover-color: #000000;
            color: #000000;
            border-color: #b8d4e4;
        }

        .table-secondary {
            --bs-table-bg: #fafafc;
            --bs-table-striped-bg: #eeeeef;
            --bs-table-striped-color: #000000;
            --bs-table-active-bg: #e1e1e3;
            --bs-table-active-color: #000000;
            --bs-table-hover-bg: #e7e7e9;
            --bs-table-hover-color: #000000;
            color: #000000;
            border-color: #e1e1e3;
        }

        .table-success {
            --bs-table-bg: #dcf5e7;
            --bs-table-striped-bg: #d1e9db;
            --bs-table-striped-color: #000000;
            --bs-table-active-bg: #c6ddd0;
            --bs-table-active-color: #000000;
            --bs-table-hover-bg: #cce3d6;
            --bs-table-hover-color: #000000;
            color: #000000;
            border-color: #c6ddd0;
        }

        .table-info {
            --bs-table-bg: #e3d7fb;
            --bs-table-striped-bg: #d8ccee;
            --bs-table-striped-color: #000000;
            --bs-table-active-bg: #ccc2e2;
            --bs-table-active-color: #000000;
            --bs-table-hover-bg: #d2c7e8;
            --bs-table-hover-color: #000000;
            color: #000000;
            border-color: #ccc2e2;
        }

        .table-warning {
            --bs-table-bg: #fff4cc;
            --bs-table-striped-bg: #f2e8c2;
            --bs-table-striped-color: #000000;
            --bs-table-active-bg: #e6dcb8;
            --bs-table-active-color: #000000;
            --bs-table-hover-bg: #ece2bd;
            --bs-table-hover-color: #000000;
            color: #000000;
            border-color: #e6dcb8;
        }

        .table-danger {
            --bs-table-bg: #fcd9e2;
            --bs-table-striped-bg: #efced7;
            --bs-table-striped-color: #000000;
            --bs-table-active-bg: #e3c3cb;
            --bs-table-active-color: #000000;
            --bs-table-hover-bg: #e9c9d1;
            --bs-table-hover-color: #000000;
            color: #000000;
            border-color: #e3c3cb;
        }

        .table-light {
            --bs-table-bg: #F5F8FA;
            --bs-table-striped-bg: #e9ecee;
            --bs-table-striped-color: #000000;
            --bs-table-active-bg: #dddfe1;
            --bs-table-active-color: #000000;
            --bs-table-hover-bg: #e3e5e7;
            --bs-table-hover-color: #000000;
            color: #000000;
            border-color: #dddfe1;
        }

        .table-dark {
            --bs-table-bg: #181C32;
            --bs-table-striped-bg: #24273c;
            --bs-table-striped-color: #ffffff;
            --bs-table-active-bg: #2f3347;
            --bs-table-active-color: #ffffff;
            --bs-table-hover-bg: #292d41;
            --bs-table-hover-color: #ffffff;
            color: #ffffff;
            border-color: #2f3347;
        }

        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        .nav-tabs .nav-link.active {
            color:#269eda;
            border-bottom: #269eda 2px solid;
        }
        .nav-tabs .nav-link{
            color:#000000;
            font-size: 15px;
        }
    </style>
@endsection
@section('content')



    <!-- this is content of company -->
    <section class="container container-space">
        <div class="row">
            @include('front.Company.sidebar')
            <div class="col-md-10">
                <!-- row -->
                <div class="col-md-12">
                    <div class="row jobs">
                        <div class="col-md-6">
                            <h5> الحسابات
                            </h5>
                        </div>
                        <div class="col-md-6 leftbtn">

                        </div>
                    </div>
                </div>
                <hr>
                <br>
                <div class="col-md-12">
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


                </div>
            </div>
        </div>
    </section>
    <div class="modal fade bs-edit-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
         aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content card card-outline-info">
                <div class="modal-header card-header">
                    <h3 class="modal-title" id="myLargeModalLabel"></h3>
                    <button type="button" class="" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">

                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>



    <script src="{{ URL::asset('admin/assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>

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
                    url: '{{ route('InvoicesCompany.datatable.data') }}',
                    data: {
                    company_id:{{Auth::guard('company')->id()}}
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
        });
    </script>
    <script >
        $(".type").on(' change',function(){
            var id=$(this).data('id');
            var value = $(this).val();
            if(value != 'new') {

                $.ajax({
                    type: "GET",
                    url: "{{url('get-report-form')}}",
                    data: {"id": id, 'value': value},
                    success: function (data) {
                        $(".bs-edit-modal-lg .modal-body").html(data)
                        $(".bs-edit-modal-lg").modal('show')
                        $(".bs-edit-modal-lg").on('hidden.bs.modal', function (e) {
                            //   $('.bs-edit-modal-lg').empty();
                            $('.bs-edit-modal-lg').hide();
                        })

                        // $("#data-"+id).html(data)
                    }
                })
            }
        })
        $(".type2").on(' change',function(){
            var id=$(this).data('id');
            if(value != 'new'){
                var value = $(this).val();
                $.ajax({
                    type: "GET",
                    url: "{{url('get-report-form')}}",
                    data: {"id":id ,'value':value},
                    success: function (data) {
                        $(".bs-edit-modal-lg .modal-body").html(data)
                        $(".bs-edit-modal-lg").modal('show')
                        $(".bs-edit-modal-lg").on('hidden.bs.modal', function (e) {
                            //   $('.bs-edit-modal-lg').empty();
                            $('.bs-edit-modal-lg').hide();
                        })
                        //
                        // $("#data2-"+id).html(data)
                    }
                })
            }
        })

    </script>


@endsection
