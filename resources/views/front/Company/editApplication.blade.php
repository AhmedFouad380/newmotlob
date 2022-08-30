

@extends('front.layout')
@section('title')
    الوظائف
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .none{
            display:none!important;
        }
        .block{
            display: block!important;
        }
        .label-radio{
            align-items: center;
            padding: 20px;
            border: 0.5px solid #ccc;
            background: #fff;
            margin: 0 0 8px 8px;
            font-weight: 500;
            font-size: 14px;
            cursor: pointer;
            border-radius: 4px;
            height: 48px;
            min-width: 144px;
            color: #777;
            display: inline-flex;
        }
        .label-radio input{
            margin:10px
        }
    </style>
@endsection
@section('content')



    <!-- this is content of company -->
    <section class="container container-space">
        <div class="row">
            @include('front.Company.sidebar')

            <div class="col-md-8 cv-form">
                <form method="post" class="form-wizard" action="{{url('Update-Job-application')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="steps" id="step1">
                        <!-- row -->
                        <h5> الوظيفة :   {{$data->Job->title}} </h5>
                        <p> اسم الموظف : {{$data->User->name}}  </p>
                        @csrf

                        <div class="row">

                            <div class="form-group col-md-12">
                                <input type="hidden" name="id" value="{{$data->id}}">
                                <label> الحالة  </label>
                                <select class="form-control wizard-required" name="type" id="type ">
                                    <option @if($data->type == 'new') selected @endif value="new"> {{__('lang.new')}} </option>
                                    <option @if($data->type == 'pending') selected @endif value="pending "> {{__('lang.pending')}}  </option>
                                    <option @if($data->type == 'accepted') selected @endif value="accepted"> {{__('lang.accepted')}}   </option>
                                    <option @if($data->type == 'rejected') selected @endif value="rejected"> {{__('lang.rejected')}}   </option>
                                    <option @if($data->type == 'absentee') selected @endif value="absentee"> {{__('lang.absentee')}}   </option>
                                    <option @if($data->type == 'other_meeting') selected @endif value="other_meeting"> {{__('lang.other_meeting')}}   </option>
                                </select>
                                <div class="wizard-form-error"></div>

                            </div>
                            <div class="form-group col-md-12">
                                <label> تاريخ المقابلة  </label>
                                <input type="datetime-local" name="interview_date" value="{{$data->interview_date}}" class="form-control">
                                <div class="wizard-form-error"></div>

                            </div>
                            <div class="form-group col-md-12">
                                <label> الوصف   </label>
                                <textarea rows="5" name="interview_description" class="form-control">{{$data->interview_description}}</textarea>
                                <div class="wizard-form-error"></div>

                            </div>
                        </div>

                        <hr>
                        <button class="btn btn-primary  pull-left"  type="submit" >حفظ</button>
                    </div>

                </form>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script src="https://cdn.ckeditor.com/4.18.0/basic/ckeditor.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        CKEDITOR.replace( 'editor1' );
    </script>

    <script>
        $('.is_car_licenses').on('click',function () {
            value = $(this).val()
            if(value == 1){
                $('#type_car_licenses').removeClass('none');
                $('#type_car_licenses').addClass('block');
            }else{
                $('#type_car_licenses').removeClass('block');
                $('#type_car_licenses').addClass('none');

            }
        })
        $(".next").on('click',function () {
            num = $(this).data('num');
            current = num - 1 ;
            var parentFieldset = jQuery(this).parents('#step'+current);
            var next = jQuery(this);
            var nextWizardStep = true;
            parentFieldset.find('.wizard-required').each(function(){
                if($(this).attr("type") == 'radio'){
                    // if( $(this).checked  ) {
                    //     jQuery(this).siblings(".wizard-form-error").slideUp();
                    // } else {
                    //     alert(  $(this).attr("name"));
                    //     jQuery(this).siblings(".wizard-form-error").slideDown();
                    //     nextWizardStep = false;
                    // }
                }else{
                    var thisValue = jQuery(this).val();
                    if( thisValue == "") {
                        alert(  $(this).attr("name"));

                        jQuery(this).siblings(".wizard-form-error").slideDown();
                        nextWizardStep = false;
                    }
                    else {
                        jQuery(this).siblings(".wizard-form-error").slideUp();
                    }
                }

            })
            if(nextWizardStep){
                $('.steps').removeClass('block');
                $('.steps').addClass('none');
                $('#step'+num).removeClass('none')
                $('#step'+num).addClass('block')
                $('.list').removeClass('blue gray');
                $('#list'+num).addClass('blue gray')
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'عفوا ...',
                    text: 'الرجاء استكمال البيانات!',
                })
            }
        })
        $(".back").on('click',function () {
            num = $(this).data('num');
            $('.steps').removeClass('block');
            $('.steps').addClass('none');
            $('#step'+num).removeClass('none')
            $('#step'+num).addClass('block')
            $('.list').removeClass('blue gray');
            $('#list'+num).addClass('blue gray')

        })
    </script>

    <script>

        // $('.dropify').dropify();

        $("#country3").on('click , change',function () {
            var wahda = $(this).val();

            if (wahda != '') {
                $.get("{{ URL::to('/get-Cities')}}" + '/' + wahda, function ($data) {
                    $('#city3').html($data);
                });
            }
        });

    </script>
@endsection
