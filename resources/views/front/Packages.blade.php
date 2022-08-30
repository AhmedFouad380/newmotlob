@extends('front.layout')
@section('title')
    الباقات
@endsection

@section('css')


@endsection


@section('content')

    <form>
        <section class="container">
            <div class="row">
                <div class="col-md-12 cv-offer-title">
                    <h5 class="h-title">احصل الآن على اشتراكك لتتمكن من تعديل سيرتك الذاتية وطباعتها في أي وقت</h5>
                    <p class="p-title">اضغط على الباقة المناسبة لك و اشترك بها من الآن</p>
                </div>
            </div>
            <section class="cv-offer-center">
                @foreach(\App\Models\Package::where('is_active','active')->get() as $Package)
                    <a  style="text-decoration: none" href="{{url('PaymentUrl',$Package->id)}}">
                <div class="@if($Package->color == 'wight') light
                    @elseif($Package->color == 'blue')  platinum
                    @elseif($Package->color == 'green') silver
                    @elseif($Package->color == 'blue')gold
                    @else
                    light
                    @endif
                    ">
                    <h6>{{$Package->title}}</h6>
                    <h1>{{$Package->price}}</h1>
                    <p class="cv-1">جنيه مصري</p>
                    <p class="p-cv2">
                        <span class="p1-span">@if($Package->type == 'time') لمدة @else لعدد @endif </span>
                        <span class="p2-span">{{$Package->count}}</span>
                        <span class="p3-span">@if($Package->type == 'time') شهور @else مرة @endif </span>
                    </p>
                    <p class="p-cv3">{{$Package->description}}</p>
                </div>
                    </a>
                @endforeach
                </div>
            </section>
            <hr class="offer-line">
            <div class="row cv-btn-offer">
                <a href="{{url('cv-maker-step10')}}" class=" btn  btn-theme2">
                    رجوع للخلف
                </a>
            </div>
        </section>
    </form>

@endsection

