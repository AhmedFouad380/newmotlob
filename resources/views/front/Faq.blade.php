
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
    </style>
@endsection
@section('content')


<section class="container">
    <section class="row tab-header ">
        <div class="col-md-12">
            <img src="{{asset('website/assets/images/logo.png')}}" class="logo-header">
        </div>
        <div class="col-md-12 title-header"> الأسئـلة الشائـعة</div>
    </section>
</section>
<!-- start tab -->
<section class="container">
    <ul class="nav nav-tabs faq-tabs" id="myTab" role="tablist">
        <li class=" faq-tab" role="presentation">
            <button class="nav-link faq-button active item active-item" data-id="home-tab" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">الباحث عن العمل</button>
        </li>
        <li class=" faq-tab" role="presentation">
            <button class="nav-link item  faq-button"  id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">الرسوم</button>
        </li>
        <li class=" faq-tab" role="presentation">
            <button class="nav-link item  faq-button" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">الشركات</button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <!-- collapse item 1 -->
            <div id="accordion">
                <?php
                $active = 'show';
                ?>
                @foreach(\App\Models\Faq::where('is_active','active')->where('type','works')->get() as $key => $faq)

                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0"> {{$faq->title}}
                                <button class="btn btn-link button-link" data-toggle="collapse" data-target="#collapseOne{{$key}}" aria-expanded="true" aria-controls="collapseOne">
                                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                </button>
                            </h5>
                        </div>
                        <div id="collapseOne{{$key}}" class="collapse {{$active}}" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                                {{$faq->description}}
                            </div>
                        </div>
                    </div>

                    <?php
                    $active = '';
                    ?>
                @endforeach
            </div>

        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div id="accordion">
                <?php
                $active = 'show';
                ?>
                @foreach(\App\Models\Faq::where('is_active','active')->where('type','payment')->get() as $key => $faq)

                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0"> {{$faq->title}}
                                <button class="btn btn-link button-link" data-toggle="collapse" data-target="#collapsetow{{$key}}" aria-expanded="true" aria-controls="collapseOne">
                                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                </button>
                            </h5>
                        </div>
                        <div id="collapsetow{{$key}}" class="collapse {{$active}}" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                                {{$faq->description}}
                            </div>
                        </div>
                    </div>

                    <?php
                    $active = '';
                    ?>
                @endforeach            </div>
        </div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            <div id="accordion">
                <?php
                $active = 'show';
                $icon = '<i class="fa fa-plus-circle" aria-hidden="true"></i>';
                ?>
                @foreach(\App\Models\Faq::where('is_active','active')->where('type','companies')->get() as $key => $faq)

                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0"> {{$faq->title}}
                                <button class="btn btn-link button-link" data-toggle="collapse" data-target="#collapseAt{{$key}}" aria-expanded="true" aria-controls="collapseOne">
                                    <i class="fa fa-minus-circle" aria-hidden="true"></i>
                                </button>
                            </h5>
                        </div>
                        <div id="collapseAt{{$key}}" class="collapse {{$active}}" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                                {{$faq->description}}
                            </div>
                        </div>
                    </div>

                        <?php
                        $active = '';
                        $icon = '<i class="fa fa-plus-circle" aria-hidden="true"></i>';
                        ?>
                @endforeach


            </div>
        </div>
    </div>

</section>
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script>

    $('.nav-link').click(function() {

        $('.nav-link').removeClass("active");
        $('.nav-link').removeClass("active-item");
        $('.tab-pane').removeClass("active");
        $('.tab-pane').removeClass("show");
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
