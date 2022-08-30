
@extends('front.layout')
@section('title')
    الشكاوي
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

    <div class="row">
        @include('front.Company.sidebar')
        <div class="col-md-10">
            <div class="col-md-12">
                <div class="row jobs">
                    <div class="col-md-6">
                        <h5> الشكاوي
                        </h5>
                    </div>

                </div>
            </div>
            <hr>
    <!-- start tab -->

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <!-- collapse item 1 -->
                <div id="accordion">
                    <?php
                    $active = 'show';
                    ?>
                    @foreach($data as $key => $faq)

                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">الاسم :  {{$faq->User->name}}
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
