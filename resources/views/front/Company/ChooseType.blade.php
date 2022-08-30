
@extends('front.layout')
@section('title')
    الاسئلة الشائعة
@endsection
@section('css')
    <style>
        .Que{
            display: none;
        }
        .active-Que{
            display: block!important;
        }
        .tab-pane3{
            display: none;
        }
    </style>
@endsection
@section('content')


    <section class="container">
        <section class="row tab-header ">
            <div class="col-md-12">
                <img src="{{asset('website/assets/images/logo.png')}}" class="logo-header">
            </div>
            <div class="col-md-12 title-header"> اختار نوع الباقة المتاحة للشركات </div>
        </section>
    </section>
    <!-- start tab -->
    <section class="container">
        <ul class="nav nav-tabs " id="myTab" role="tablist">
            <li style=" width:50%; padding: 10px" role="presentation">
                <button  style="border: none;margin-left: 10px;" class="nav-link3 faq-button active item active-item"  data-id="home-tab"  data-bs-toggle="tab" data-bs-target="#private" type="button" role="tab" aria-controls="home" aria-selected="true">شركات خاصة  </button>
            </li>
            <li  style=" width:50%; padding: 10px" role="presentation">
                <button style="border: none;" class="nav-link3 item  faq-button"  id="profile-tab" data-bs-toggle="tab" data-bs-target="#employment" type="button" role="tab" aria-controls="profile" aria-selected="false">شركات توظيف </button>
            </li>

        </ul>
        @inject('setting','App\Models\Setting')
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane3 fade show active" st id="private" role="tabpanel" aria-labelledby="home-tab">
                <!-- collapse item 1 -->
                        <div class="card">
                                <div class="card-body">
                                {!! $setting->find(1)->private_descripition !!}
                                    <br>
                                    <form action="{{url('updateCompanyType')}}" method="post">
                                        @csrf
                                        <input type="hidden" value="private" name="type" >
                                        <button class="btn btn-primary btn-theme" type="submit">اختيار </button>
                                    </form>
                                </div>
                        </div>


            </div>
            <div class="tab-pane3 fade" id="employment" role="tabpanel" aria-labelledby="profile-tab">
                <div class="card">
                    <div class="card-body">
                        {!! $setting->find(1)->employment_description !!}

                        <br>
                        <form action="{{url('updateCompanyType')}}" method="post">
                            @csrf
                            <input type="hidden" value="employment" name="type" >
                            <button class="btn btn-primary btn-theme" type="submit">اختيار </button>
                        </form>
                    </div>
                </div>            </div>
        </div>

    </section>
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script>

        $('.nav-link3').click(function() {

            $('.nav-link3').removeClass("active");
            $('.nav-link3').removeClass("active-item");
            $('.tab-pane3').removeClass("active");
            $('.tab-pane3').removeClass("show");
            $(this).addClass('active');
            $(this).addClass('active-item');
            var target = $(this).data('bs-target');
            $(target).addClass('active show')

        });
        // $('.button-link').click(function() {
        //     out =    ' <i class="fa fa-minus-circle" aria-hidden="true"></i>';
        //
        //     $(this).html(out)
        //
        // });

    </script>
@endsection
