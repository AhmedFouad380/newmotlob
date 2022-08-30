

@extends('front.layout')
@section('title')
    بحث عن مواظفين
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
                            <i class="fa fa-users" aria-hidden="true"></i>
                            بحث عن مواظفين
                        </h6>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="sidebar">
                    <div class="widget user_widget_search">
                        <h2>البحث </h2>
                        <form id="user_wiget_search_form" class="user_wiget_search_form"  method="GET">
                            <div class="form-group">
                                <label for="user_name">اسم الوظيفة :</label>
                                <input type="text" class="form-control"  name="title"  value="{{Request::get('title')}}"  >
                            </div>
                            <div class="form-group ">
                                <label>  الدولة :</label>
                                <select class="form-control wizard-required" id="country3" name="country_id">
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
                                <label>  المدينة :</label>
                                <select class="form-control wizard-required" id="city3" name="city_id">
                                    @if(Request::get('city_id'))
                                        <option  value="{{Request::get('city_id')}}">{{$City->find(Request::get('city_id'))->name}}</option>
                                    @endif                                </select>
                                <div class="wizard-form-error"></div>

                            </div>
                            @inject('state','App\Models\State')

                            <div class="form-group ">
                                <label>  المنطقة :</label>
                                <select class="form-control wizard-required" id="state" name="state_id">
                                    @if(Request::get('state_id'))
                                        <option  value="{{Request::get('state_id')}}">{{$state->find(Request::get('state_id'))->name}}</option>
                                    @endif
                                </select>
                                <div class="wizard-form-error"></div>

                            </div>
                            <div class="form-group ">
                                <label> المجال : </label>
                                <select class="form-control" name="category_id" id="category_id">
                                    <option value="0">الكل</option>
                                    @foreach(\App\Models\ExperienceCategory::where('is_active','active')->get() as $category)
                                        <option @if(Request::get('category_id') == $category->id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @inject('specialization_id','App\Models\ExperienceSpecialization')

                            <div class="form-group ">
                                <label> التخصص  :</label>
                                <select class="form-control" id="specialization_id" name="specialization_id">
                                    @if(Request::get('specialization_id'))
                                        <option  value="{{Request::get('specialization_id')}}">{{$specialization_id->find(Request::get('specialization_id'))->name}}</option>
                                    @endif
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="user_gender">النوع : </label>
                                <select class="form-control custom-select" name="gender">
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
                                <div class="form-group col-md-6">
                                    <label   >   من :</label>
                                    <input type="number"  class="form-control wizard-required" value="{{Request::get('min_salary')}}" name="min_salary" placeholder="">
                                    <div class="wizard-form-error"></div>

                                </div>
                                <div class="form-group col-md-6">
                                    <label >  الى : </label>
                                    <input type="number"  class="form-control wizard-required" value="{{Request::get('max_salary')}}"  name="max_salary" placeholder="">
                                    <div class="wizard-form-error"></div>

                                </div>
                            </div>


                            <br>
                            <div class="form-group center" >
                                <button type="submit" class="btn btn-block btn-primary">بحث</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-9 job-border">
                <div class="row take-space ">

                    <div class="container col-md-12 control-tab ">
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
                                    <th class="min-w-125px">المسمى الوظيفي </th>
                                    <th class="min-w-125px">السن </th>
                                    <th class="min-w-125px">العنوان   </th>
{{--                                    <th class="min-w-125px">الوقت </th>--}}
{{--                                    <th class=" min-w-100px">الاجراءات</th>--}}
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
                    {extend: 'print', className: 'btn btn-light-primary me-3', text: '<i class="fa fa-print"></i>'},
                    // {extend: 'pdf', className: 'btn btn-raised btn-danger', text: 'PDF'},
                    {extend: 'excel', className: 'btn btn-light-primary me-3', text: '<i class="fa fa-file-excel-o"></i>'},
                    // {extend: 'colvis', className: 'btn secondary', text: 'إظهار / إخفاء الأعمدة '}

                ],
                ajax: {
                    url: '{{ route('SearchEmployees.datatable.data') }}',
                    data: {

                    }
                },
                columns: [
                    {data: 'checkbox', name: 'checkbox', "searchable": false, "orderable": false},
                    {data: 'name', name: 'name', "searchable": true, "orderable": true},
                    {data: 'job_title', name: 'job_title', "searchable": true, "orderable": true},
                    {data: 'age', name: 'age', "searchable": true, "orderable": true},
                    {data: 'address', name: 'address', "searchable": true, "orderable": true},
                    // {data: 'created_at', name: 'created_at', "searchable": true, "orderable": true},
                    // {data: 'actions', name: 'actions', "searchable": false, "orderable": false},

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
