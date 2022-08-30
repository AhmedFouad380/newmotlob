@extends('admin.layouts.master')

@section('css')
    <link href="{{asset('admin/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet"
          type="text/css"/>
@endsection

@section('breadcrumb')
    <h1 class="d-flex text-dark fw-bolder my-1 fs-3">لوحة القيادة</h1>
@endsection

@section('content')
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <!--begin::Post-->
        <div class="content flex-row-fluid" id="kt_content">
            <!--begin::Row-->
            <div class="row g-5 g-lg-10">
                <!--begin::Col-->
                <div class="col-xl-4 mb-xl-10 mb-5">
                    <!--begin::Mixed Widget 2-->
                    <div class="card card-xl-stretch mb-5 mb-xl-8">
                        <!--begin::Header-->
                        <div class="card-header border-0 bg-primary py-5">
                            <h3 class="card-title fw-bolder text-white"> الايرادات و المصروفات </h3>
                            <div class="card-toolbar">
                                <!--begin::Menu-->

                                <!--end::Menu-->
                            </div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body p-0">
                            <!--begin::Chart-->
                            <div class="mixed-widget-2-chart card-rounded-bottom bg-primary" data-kt-color="primary"
                                 style="height: 200px"></div>
                            <!--end::Chart-->
                            <!--begin::Stats-->
                            <div class="card-p mt-n20 position-relative">
                                <!--begin::Row-->
                                <div class="row g-0">
                                    <!--begin::Col-->
                                    <div class="col bg-light-warning px-6 py-8 rounded-2 me-7 mb-7">
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen032.svg-->
                                        <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none">
                                            <rect x="8" y="9" width="3" height="10" rx="1.5" fill="black"/>
                                            <rect opacity="0.5" x="13" y="5" width="3" height="14" rx="1.5"
                                                  fill="black"/>
                                            <rect x="18" y="11" width="3" height="8" rx="1.5" fill="black"/>
                                            <rect x="3" y="13" width="3" height="6" rx="1.5" fill="black"/>
                                        </svg>
                                    </span>
                                        <!--end::Svg Icon-->
                                        <a href="#" class="text-warning fw-bold fs-6">سندات القبض</a>
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col bg-light-primary px-6 py-8 rounded-2 mb-7">
                                        <!--begin::Svg Icon | path: icons/duotune/finance/fin006.svg-->
                                        <span class="svg-icon svg-icon-3x svg-icon-primary d-block my-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none">
                                            <rect x="8" y="9" width="3" height="10" rx="1.5" fill="black"/>
                                            <rect opacity="0.5" x="13" y="5" width="3" height="14" rx="1.5"
                                                  fill="black"/>
                                            <rect x="18" y="11" width="3" height="8" rx="1.5" fill="black"/>
                                            <rect x="3" y="13" width="3" height="6" rx="1.5" fill="black"/>
                                        </svg>
                                    </span>
                                        <!--end::Svg Icon-->
                                        <a href="#" class="text-primary fw-bold fs-6">سندات الصرف</a>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Row-->
                                <!--begin::Row-->
                                <div class="row g-0">
                                    <!--begin::Col-->
                                    <div class="col bg-light-danger px-6 py-8 rounded-2 me-7">
                                        <!--begin::Svg Icon | path: icons/duotune/abstract/abs027.svg-->
                                        <span class="svg-icon svg-icon-3x svg-icon-danger d-block my-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3"
                                                  d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z"
                                                  fill="black"/>
                                            <path
                                                d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z"
                                                fill="black"/>
                                        </svg>
                                    </span>
                                        <!--end::Svg Icon-->
                                        <a href="#" class="text-danger fw-bold fs-6 mt-2">المطالبة المالية </a>
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col bg-light-success px-6 py-8 rounded-2">
                                        <!--begin::Svg Icon | path: icons/duotune/communication/com010.svg-->
                                        <span class="svg-icon svg-icon-3x svg-icon-success d-block my-2">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                               viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3"
                                                  d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z"
                                                  fill="black"/>
                                            <path
                                                d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z"
                                                fill="black"/>
                                        </svg>
                                    </span>
                                        <!--end::Svg Icon-->
                                        <a href="#" class="text-success fw-bold fs-6 mt-2">كشف حساب عميل </a>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Stats-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Mixed Widget 2-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-xl-4 mb-5">
                    <!--begin::Row-->
                    <div class="row g-5 g-lg-10">
                        <!--begin::Col-->
                        <div class="col-lg-6 mb-5 mb-lg-10">
                            <!--begin::Tiles Widget 5-->
                            <a href="#" class="card bg-primary h-150px">
                                <!--begin::Body-->
                                <div class="card-body d-flex flex-column justify-content-between">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                                    <span class="svg-icon svg-icon-white svg-icon-2hx ms-n1 flex-grow-1">

                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M6 8.725C6 8.125 6.4 7.725 7 7.725H14L18 11.725V12.925L22 9.725L12.6 2.225C12.2 1.925 11.7 1.925 11.4 2.225L2 9.725L6 12.925V8.725Z"
                                                fill="black"/>
                                            <path opacity="0.3"
                                                  d="M22 9.72498V20.725C22 21.325 21.6 21.725 21 21.725H3C2.4 21.725 2 21.325 2 20.725V9.72498L11.4 17.225C11.8 17.525 12.3 17.525 12.6 17.225L22 9.72498ZM15 11.725H18L14 7.72498V10.725C14 11.325 14.4 11.725 15 11.725Z"
                                                  fill="black"/>
                                        </svg>
                                </span>
                                    <!--end::Svg Icon-->
                                    <div class="d-flex flex-column">
                                        <div class="text-white fw-bolder fs-1 mb-0 mt-5"> 100 </div>
                                        <div class="text-white fw-bold fs-6">اعلانات الوظائف</div>
                                    </div>
                                </div>
                                <!--end::Body-->
                            </a>
                            <!--end::Tiles Widget 5-->
                        </div>
                        <div class="col-lg-6 mb-5 mb-lg-10">
                            <!--begin::Tiles Widget 5-->
                            <a href="{{url('Requests')}}" class="card bg-dark h-150px">
                                <!--begin::Body-->
                                <div class="card-body d-flex flex-column justify-content-between">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                                    <span class="svg-icon svg-icon-white svg-icon-2hx ms-n1 flex-grow-1">

                                                                                 <svg xmlns="http://www.w3.org/2000/svg"
                                                                                      width="24" height="24"
                                                                                      viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3"
                                                  d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z"
                                                  fill="black"/>
                                            <path
                                                d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z"
                                                fill="black"/>
                                        </svg>

                                </span>
                                    <!--end::Svg Icon-->
                                    <div class="d-flex flex-column">
                                        @inject('Driver','App\Models\User')
                                        <div
                                            class="text-white fw-bolder fs-1 mb-0 mt-5">{{$Driver->count()}}</div>
                                        <div class="text-white  fs-6" style="font-size: 12px!important">العملاء
                                            الجدد
                                        </div>
                                    </div>
                                </div>
                                <!--end::Body-->
                            </a>
                            <!--end::Tiles Widget 5-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <!--end::Col-->
                    </div>
                    <div class="row g-5 g-lg-10">
                        <!--begin::Col-->
                        <div class="col-lg-6 mb-5 mb-lg-10">
                            <!--begin::Tiles Widget 5-->
                            <a href="#" class="card bg-danger  h-150px">
                                <!--begin::Body-->
                                <div class="card-body d-flex flex-column justify-content-between">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                                    <span class="svg-icon svg-icon-white svg-icon-2hx ms-n1 flex-grow-1">

                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none">
                                            <rect x="8" y="9" width="3" height="10" rx="1.5" fill="black"/>
                                            <rect opacity="0.5" x="13" y="5" width="3" height="14" rx="1.5"
                                                  fill="black"/>
                                            <rect x="18" y="11" width="3" height="8" rx="1.5" fill="black"/>
                                            <rect x="3" y="13" width="3" height="6" rx="1.5" fill="black"/>
                                        </svg>
                                </span>
                                    <!--end::Svg Icon-->
                                    <div class="d-flex flex-column">
                                        @inject('Driver','App\Models\Company')
                                        <div
                                            class="text-white fw-bolder fs-1 mb-0 mt-5">{{$Driver->count()}}</div>
                                        <div class="text-white  fs-6" style="font-size: 12px!important">اصحاب العمل</div>
                                    </div>
                                </div>
                                <!--end::Body-->
                            </a>
                            <!--end::Tiles Widget 5-->
                        </div>
                        <div class="col-lg-6 mb-5 mb-lg-10">
                            <!--begin::Tiles Widget 5-->
                            <a href="#" class="card bg-danger  h-150px">
                                <!--begin::Body-->
                                <div class="card-body d-flex flex-column justify-content-between">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                                    <span class="svg-icon svg-icon-white svg-icon-2hx ms-n1 flex-grow-1">

                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none">
                                            <rect x="8" y="9" width="3" height="10" rx="1.5" fill="black"/>
                                            <rect opacity="0.5" x="13" y="5" width="3" height="14" rx="1.5"
                                                  fill="black"/>
                                            <rect x="18" y="11" width="3" height="8" rx="1.5" fill="black"/>
                                            <rect x="3" y="13" width="3" height="6" rx="1.5" fill="black"/>
                                        </svg>
                                </span>
                                    <!--end::Svg Icon-->
                                    <div class="d-flex flex-column">
                                        @inject('Driver','App\Models\Company')
                                        <div
                                            class="text-white fw-bolder fs-1 mb-0 mt-5">{{$Driver->count()}}</div>
                                        <div class="text-white  fs-6" style="font-size: 12px!important">العملاء</div>
                                    </div>
                                </div>
                                <!--end::Body-->
                            </a>
                            <!--end::Tiles Widget 5-->
                        </div>

                        <!--end::Col-->
                        <!--begin::Col-->
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                    <!--begin::Row-->
                    <!--end::Row-->
                    <!--begin::Engage widget 4-->

                    <!--end::Engage widget 4-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-xl-4 mb-xl-10 mb-5">
                    <!--begin::Mixed Widget 1-->
                    <div class="card h-md-100">
                        <!--begin::Body-->
                        <div class="card-body p-0">
                            <!--begin::Header-->
                            <div class="px-9 pt-7 card-rounded h-275px w-100 bg-info">
                                <!--begin::Heading-->
                                <div class="d-flex flex-stack">
                                    <div class="card-toolbar">
                                        <!--begin::Menu-->
                                        <button type="button"
                                                class="btn btn-sm btn-light btn-color-primary btn-active-light-primary"
                                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen024.svg-->
                                            <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                         viewBox="0 0 24 24">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="5" y="5" width="5" height="5" rx="1" fill="#000000"/>
                                            <rect x="14" y="5" width="5" height="5" rx="1" fill="#000000"
                                                  opacity="0.3"/>
                                            <rect x="5" y="14" width="5" height="5" rx="1" fill="#000000"
                                                  opacity="0.3"/>
                                            <rect x="14" y="14" width="5" height="5" rx="1" fill="#000000"
                                                  opacity="0.3"/>
                                        </g>
                                    </svg>
                                </span>
                                            <!--end::Svg Icon-->
                                        </button>
                                        <!--begin::Menu 1-->
                                        <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px"
                                             data-kt-menu="true" id="kt_menu_61a08bf50cf89">
                                            <!--begin::Header-->
                                            <form>
                                                <div class="px-7 py-5">
                                                </div>
                                                <!--end::Header-->
                                                <!--begin::Menu separator-->
                                                <div class="separator border-gray-200"></div>
                                                <!--end::Menu separator-->
                                                <!--begin::Form-->
                                                <div class="px-7 py-5">
                                                    <!--begin::Input group-->
                                                    <div class="mb-10">
                                                        <!--begin::Label-->
                                                        <label class="form-label fw-bold">من </label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <div>
                                                            <input type="date" id="to" class="form-control">
                                                        </div>
                                                        <!--end::Input-->
                                                    </div>
                                                    <div class="mb-10">
                                                        <!--begin::Label-->
                                                        <label class="form-label fw-bold">الى </label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <div>
                                                            <input type="date" id="from" class="form-control">
                                                        </div>
                                                        <!--end::Input-->
                                                    </div>

                                                    <!--end::Input group-->
                                                    <!--begin::Actions-->
                                                    <div class="d-flex justify-content-end">
                                                        <button type="reset"
                                                                class="btn btn-sm btn-light btn-active-light-primary me-2"
                                                                data-kt-menu-dismiss="true">الغاء
                                                        </button>
                                                        <button type="button" class="btn btn-sm btn-primary"
                                                                id="getMoney" data-kt-menu-dismiss="true">بحث
                                                        </button>
                                                    </div>
                                                    <!--end::Actions-->
                                                </div>
                                            </form>

                                            <!--end::Form-->
                                        </div>
                                        <!--end::Menu 1-->
                                        <!--end::Menu-->
                                    </div>

                                </div>
                                <!--end::Heading-->
                                <!--begin::Balance-->
                                <div class="d-flex text-center flex-column text-white pt-8">
                                    <span class="fw-bold "
                                          style="font-size: 20px; ">اجمالي دخل الرحلات حسب الخدمات  </span>
                                </div>

                                <!--end::Balance-->
                            </div>
                            <!--end::Header-->
                            <!--begin::Items-->
                            <div id="MoneyData"
                                 class="bg-body shadow-sm card-rounded mx-9 mb-9 px-6 py-9 position-relative z-index-1"
                                 style="margin-top: -100px">
                                <!--begin::Item-->
                                <div class="d-flex text-center flex-column text-white pt-8">
                                    <span class="fw-bold fs-7" style="color:#000">اجمالي دخل الرحلات  </span>
                                    <span class="fw-bolder fs-2x pt-1"
                                          style="color:#000"> 100 </span>
                                </div>

                            <!--end::Item-->
                            </div>
                            <!--end::Items-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Mixed Widget 1-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->

            <!--begin::Row-->
            <!--end::Row-->



            <!--begin::Calendar Widget 1-->
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bolder text-dark">My Calendar</span>
                        {{--                    <span class="text-muted mt-1 fw-bold fs-7">Preview monthly events</span>--}}
                    </h3>
                    <div class="card-toolbar">
                        <a href="#" class="btn btn-light-primary" data-bs-toggle="modal"
                           data-bs-target="#kt_modal_new_card">انشاء حدث</a>

                    </div>
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body">
                    <!--begin::Calendar-->
                    <div id="kt_calendar_widget_1"></div>
                    <!--end::Calendar-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Calendar Widget 1-->

        </div>
        <!--end::Post-->
    </div>
    <div class="modal fade" id="kt_modal_new_card" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header">
                    <!--begin::Modal title-->
                    <h2>اضافة حدث</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none">
                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                          transform="rotate(-45 6 17.3137)" fill="black"/>
                                    <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                          transform="rotate(45 7.41422 6)" fill="black"/>
                                </svg>
                            </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>
                <!--end::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <!--begin::Form-->
                    <form action="{{url('store_event')}}" method="post">

                        <div class="modal-body">
                            @csrf
                            <div class="form-group">
                                <label> العنوان</label>
                                <input type="text" name="title" class="form-control">

                            </div>
                            <div class="form-group">
                                <label> التاريخ</label>
                                <input type="date" name="date" class="form-control">
                            </div>
                            <div class="form-group">
                                <label> الوقت</label>
                                <input type="time" name="time" class="form-control">
                            </div>
                            <div class="form-group">
                                <label> الوصف</label>
                                <textarea name="description" class="form-control" rows="6"></textarea>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">الغاء
                            </button>
                            <button type="submit" class="btn btn-primary">حفظ</button>
                        </div>
                    </form>
                    <!--end::Form-->
                </div>
                [
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>


@endsection

@section('script')
    <script src="{{asset('admin/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js')}}"></script>
       <script src="{{asset('admin/assets/js/custom/widgets.js')}}"></script>
    <script src="{{asset('admin/assets/js/custom/apps/chat/chat.js')}}"></script>

    <script src="{{asset('admin/assets/js/custom/modals/create-app.js')}}"></script>
    <script src="{{asset('admin/assets/js/custom/modals/upgrade-plan.js')}}"></script>
    <script src="{{asset('admin/assets/js/custom/modals/create-project/type.js')}}"></script>
    <script src="{{asset('admin/assets/js/custom/modals/create-project/budget.js')}}"></script>
    <script src="{{asset('admin/assets/js/custom/modals/create-project/settings.js')}}"></script>
    <script src="{{asset('admin/assets/js/custom/modals/create-project/team.js')}}"></script>
    <script src="{{asset('admin/assets/js/custom/modals/create-project/targets.js')}}"></script>
    <script src="{{asset('admin/assets/js/custom/modals/create-project/files.js')}}"></script>
    <script src="{{asset('admin/assets/js/custom/modals/create-project/complete.js')}}"></script>
    <script src="{{asset('admin/assets/js/custom/modals/create-project/main.js')}}"></script>
    <script>

        $("#getMoney").click(function () {
            var to = $('#to').val();
            var from = $('#from').val();

            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: "GET",
                url: "{{url('getMoney')}}",
                data: {"to": to, "from": from},
                success: function (data) {
                    $("#MoneyData").html(data)
                }
            })

        })
        $(document).ready(function () {
            $("#project_state").submit(function (e) {
                e.preventDefault();

                var project_to = $('#project_to').val();
                var project_from = $('#project_from').val();

                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type: "GET",
                    url: "{{url('projectState')}}",
                    data: {"project_to": project_to, "project_from": project_from},
                    success: function (data) {
                        $("#items2").html(data)
                        $('#kt_menu_project_state').hide();

                    }
                })

            })
        });

        $("#getLevel").click(function () {
            var id = $('#idContract').val();
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: "GET",
                url: "{{url('Get_Levels')}}",
                data: {"id": id},
                success: function (data) {
                    $("#items").html(data)
                    $('#kt_menu_61a08bf50cf89').hide();
                }
            })

            $.ajax({
                type: "GET",
                url: "{{url('contractName')}}",
                data: {"id": id},
                success: function (data) {
                    $("#contractName").html(data)
                }
            })
        })
    </script>


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

