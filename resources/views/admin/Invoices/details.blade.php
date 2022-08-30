@extends('admin.layouts.master')

@section('css')
    <link href="{{ URL::asset('admin/assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ URL::asset('admin/assets/plugins/custom/prismjs/prismjs.bundle.css')}}" rel="stylesheet"
          type="text/css"/>
@endsection

@section('style')
    <style>
        @media print {

            .btn{
                display: none;
            }
            #kt_toolbar_container{
                display: none;
            }
            #kt_header{
                display: none;

            }
            .breadcrumb{
                display: none;
            }
            .tit{
                display: none;
            }
        }
    </style>
@endsection

@section('breadcrumb')
    <h1 class="d-flex text-dark fw-bolder my-1 fs-3 ">تفاصيل  فاتورة  رقم : {{$data->num }}	</h1>
    <!--end::Title-->
    <!--begin::Breadcrumb-->
    <ul class="breadcrumb breadcrumb-dot fw-bold text-gray-600 fs-7 my-1">
        <!--begin::Item-->
        <li class="breadcrumb-item text-gray-600">
            <a href="{{ url('/') }}" class="text-gray-600 text-hover-primary">لوحة القيادة</a>
        </li>
        <!--end::Item-->
        <li class="breadcrumb-item text-gray-600">
            <a href="{{ url('Invoices_setting')}}" class="text-gray-600 text-hover-primary">فواتير الشركات</a>
        </li>
        <!--begin::Item-->
        <li class="breadcrumb-item text-gray-500">تفاصيل  فاتورة   رقم : {{$data->num }}	</li>
        <!--end::Item-->
    </ul>
    <!--end::Breadcrumb-->
@endsection

@section('content')

    <div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->
        <!--end::Subheader-->

        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class=" container ">
                <!-- begin::Card-->
                <div class="card card-custom overflow-hidden">
                    <div class="card-body p-0">
                        <!-- begin: Invoice-->
                        <!-- begin: Invoice header-->
                        <div class="row justify-content-center bgi-size-cover bgi-no-repeat py-8 px-8 py-md-27 px-md-0" style="background-image: url({{asset('admin/assets/media/bg/bg-6.jpg')}});">
                            <div class="col-md-9">
                                <div class="d-flex justify-content-between pb-10 pb-md-20 flex-column flex-md-row">
                                    <h1 class="display-4 text-white font-weight-boldest mb-10 tit" >فاتورة </h1>
                                    <div class="d-flex flex-column align-items-md-end px-0">
                                        <!--begin::Logo-->
                                        <a href="#" class="mb-5">
                                            <img src="{{asset('assets/media/logos/logo-light.png')}}" alt=""/>
                                        </a>
                                        <!--end::Logo-->
                                        <span class="text-white d-flex flex-column align-items-md-end opacity-70">
                                            <span>اسم العميل : {{ $data->Company->first_name }}  {{ $data->Company->last_name }}</span>
                                     </span>
                                        <span class="text-white d-flex flex-column align-items-md-end opacity-70">
                                            <span>اسم الشركة : {{ $data->Company->company_name }}</span>
                                     </span>
                                        <span class="text-white d-flex flex-column align-items-md-end opacity-70">
                                            <span>العنوان : {{ $data->Company->Country->name }} - {{ $data->Company->City->name }}</span>
                                     </span>
                                        <span class="text-white d-flex flex-column align-items-md-end opacity-70">
                                            <span>رقم الهاتف : {{ $data->Company->phone }} </span>
                                            <span>الايميل : {{ $data->Company->email }} </span>
                                     </span>

                                            <span class="text-white d-flex flex-column align-items-md-end opacity-70">
                            <span></span>
                        </span>
                                    </div>
                                </div>
                                <div class="border-bottom w-100 opacity-20"></div>
                                <div class="d-flex justify-content-between text-white pt-6">
                                    <div class="d-flex flex-column flex-root">
                                        <span class="font-weight-bolde mb-2r">التاريخ</span>
                                        <span class="opacity-70">{{ $data->date }}</span>
                                    </div>
                                    <div class="d-flex flex-column flex-root">
                                        <span class="font-weight-bolder mb-2">رقم الفاتورة .</span>
                                        <span class="opacity-70"> {{$data->num}}</span>
                                    </div>
                                    <div class="d-flex flex-column flex-root">
                                        <span class="font-weight-bolder mb-2">الحالة.</span>
                                        <span class="opacity-70">@if($data->type == 'payed') مدفوع @else لم يتم الدفع @endif </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end: Invoice header-->

                        <!-- begin: Invoice body-->
                        <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
                            <div class="col-md-9">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th class="pl-0 font-weight-bold text-muted  text-uppercase">الكود</th>
                                            <th class="pl-0 font-weight-bold text-muted  text-uppercase">اسم العميل</th>
                                            <th class="text-right font-weight-bold text-muted text-uppercase">اسم الوظيفة</th>
                                            <th class="text-right font-weight-bold text-muted text-uppercase">تاريخ التوظيف </th>
                                            <th class="text-right font-weight-bold text-muted text-uppercase">المرتب </th>
                                            <th class="text-right font-weight-bold text-muted text-uppercase">رسوم التوظيف </th>
                                            <th class="text-right font-weight-bold text-muted text-uppercase">النسبة او المبلغ </th>
                                            <th class="text-right font-weight-bold text-muted text-uppercase">الرسوم </th>
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
                                </div>
                            </div>
                        </div>
                        <!-- end: Invoice body-->

                        <!-- begin: Invoice footer-->
                        <div class="row justify-content-center bg-gray-100 py-8 px-8 py-md-10 px-md-0">
                            <div class="col-md-9">

                                <div class="d-flex justify-content-between flex-column flex-md-row font-size-lg">
                                    <div class="d-flex flex-column mb-10 mb-md-0">
                                        @if(isset($data->bank_transfer))

                                            <div class="font-weight-bolder font-size-lg mb-3">تحويل بنكي </div>
                                            <div class="d-flex justify-content-between mb-3">
                                                <span class="mr-15 font-weight-bold"> اسم العميل :</span>
                                                <span class="text-right">{{$data->clients->name}}</span></span>
                                            </div>

                                            <div class="d-flex justify-content-between mb-3">
                                                <span class="mr-15 font-weight-bold">رقم التحويل :</span>
                                                <span class="text-right">{{$data->bank_transfer}}</span></span>
                                            </div>
                                        @endif

                                    </div>
                                    @inject('InvoicePayments','App\Models\InvoicePayments')
                                    <div class="d-flex flex-column text-md-right">
                                        <span class="font-size-lg font-weight-bolder mb-1">الاجمالي  :  {{$data->total_price}}</span>
                                        <span class=" font-weight-boldest text-danger mb-1" >المدفوع : {{$InvoicePayments->where('invoice_id',$data->id)->sum('price')}} </span>
                                        <span class="font-size-lg font-weight-bolder mb-1"> المتبقى  :{{$data->total_price - $InvoicePayments->where('invoice_id',$data->id)->sum('price')}} </span>
                                        <span></span>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- end: Invoice footer-->

                        <!-- begin: Invoice action-->
                        <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
                            <div class="col-md-9">
                                <div class="d-flex justify-content-between">
                                    <button type="button" class="btn btn-light-primary font-weight-bold" onclick="window.print();">تحميل الفاتورة</button>
                                    <button type="button" class="btn btn-primary font-weight-bold" onclick="window.print();">طباعة الفاتورة</button>
                                </div>
                            </div>
                        </div>
                        <!-- end: Invoice action-->

                        <!-- end: Invoice-->
                    </div>
                </div>
                <!-- end::Card-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
@endsection

@section('script')
    <script src="{{ URL::asset('admin/assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
    <script src="{{ URL::asset('admin/assets/js/custom/widgets.js')}}"></script>


    <?php
    $message = session()->get("message");
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
@endsection

