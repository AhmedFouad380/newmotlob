@extends('front.layout')
@section('title')
     فاتورة رقم : {{$data->num}}
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
            color:#269eda!important
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
                            <h5>      فاتورة رقم : {{$data->num}}

                            </h5>
                        </div>
{{--                        <div class="col-md-6 leftbtn">--}}
{{--                            @if($data->type == 'unpayed')--}}
{{--                                <button class="btn btn-primary" href="{{url('PayInvoice',$data->id)}}">ادفع الفاتورة</button>--}}
{{--                            @endif--}}
{{--                        </div>--}}
                    </div>
                </div>
                <hr>
                <br>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4     col-12">
                            رقم الفاتورة
                            <br>
                            {{$data->num}}
                            <br>
                            تاريخ الفاتورة :
                            <br>
                            {{$data->date}}
                            <br>
                        </div>
                        <div class="col-md-4 col-12">
                            <span style="color:#269eda;"> فاتورة من</span>
                            <br>
                            محمد عرابي
                            <br>
                            مطلوب
                            <br>
                            ش عبدالعال الحسنين 20
                            <br>
                            https://mattlob.com
                            <br>
                            info@mattlob.com
                            <br>
                            01009675608
                        </div>
                        <div class="col-md-4 col-12">
                            <span style="color:#269eda;"> فاتورة الى</span>
                            <br>
                            السيد/ {{$data->Company->first_name}} - {{$data->Company->last_name}}
                            <br>
                            {{$data->Company->company_name}}
                            <br>
                            {{$data->Company->Country->name}} -  {{$data->Company->City->name}}
                            <br>
                            {{$data->Company->email}}
                            <br>
                            {{$data->Company->phone}}
                        </div>
                    </div>
                </div>
                <br><br>
                <div class="col-md-12">
                    <table class="table">
                        <thead style="background-color: #f4f8fa">
                        <tr >
                            <th class="pl-0 font-weight-bold    text-uppercase">الكود</th>
                            <th class="pl-0 font-weight-bold    text-uppercase">اسم العميل</th>
                            <th class="text-right font-weight-bold   text-uppercase">اسم الوظيفة</th>
                            <th class="text-right font-weight-bold   text-uppercase">تاريخ التوظيف </th>
                            <th class="text-right font-weight-bold   text-uppercase">المرتب </th>
                            <th class="text-right font-weight-bold   text-uppercase">رسوم التوظيف </th>
                            <th class="text-right font-weight-bold   text-uppercase">النسبة او المبلغ </th>
                            <th class="text-right font-weight-bold   text-uppercase">الرسوم </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data->Details as $detail)
                            <tr class="font-weight-boldest font-size-lg">
                                <td class=" pt-7">
                                    {{$detail->id}}
                                </td>
                                <td class="pl-0 pt-7">
                                    {{$detail->JobRequest->User->name}}
                                </td>
                                <td class="text-right pt-7">{{$detail->JobRequest->Job->title}}</td>
                                <td class="text-right pt-7">{{$detail->JobRequest->date_of_hiring}}</td>
                                <td class="text-right pt-7">{{$detail->JobRequest->salary}}</td>
                                <td class="text-right pt-7">@if($data->recruitment_fee_postpaid_monthly == 'percentage') نسبة شهري مسبقا @else ثابت @endif </td>
                                <td class="text-right pt-7">{{$data->percentage_postpaid_monthly}}</td>
                                <td class="text-danger pr-0 pt-7 text-right">{{$detail->price }}</td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="row justify-content-center bg-gray-100 py-8 px-8 py-md-10 px-md-0" >
                        <div class="col-md-9">

                            <div class="d-flex justify-content-between flex-column flex-md-row font-size-lg">
                                <div class="d-flex flex-column mb-10 mb-md-0">


                                        <div class="d-flex justify-content-between mb-3">
                                        </div>

                                </div>
                                @inject('InvoicePayments','App\Models\InvoicePayments')
                                <div class="d-flex flex-column text-md-right" style="border: 1px #f4f8fa solid; background-color: #f4f8fa;    width: 200px;
    left: 99px;
    position: absolute;
padding:20px;">
                                    <span class="font-size-lg font-weight-bolder mb-1">الاجمالي  :  {{$data->total_price}}</span>
                                    <span class=" font-weight-boldest text-danger mb-1" >المدفوع : {{$InvoicePayments->where('invoice_id',$data->id)->sum('price')}} </span>
                                    <span class="font-size-lg font-weight-bolder mb-1"> المتبقى  :{{$data->total_price - $InvoicePayments->where('invoice_id',$data->id)->sum('price')}} </span>
                                    <span></span>
                                </div>
                                <br>

                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
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
