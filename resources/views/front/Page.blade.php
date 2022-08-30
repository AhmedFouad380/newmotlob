@extends('front.layout')
@section('title')
    {{$data->title}}
@endsection


@section('content')
    <!-- this is content -->

    <section class="container">
        <div class="row cv-maker">
            <h2>    {{$data->title}}
            </h2>
            @if(isset($data->image))
            <div class="col-md-8">
            {!! $data->description !!}
            </div>
            <div class="col-md-4">
                <img src="{{asset($data->image)}}" class="page-image">
            </div>
            @else
                <div class="col-md-10">
                    {!! $data->description !!}
                </div>
            @endif
        </div>
    </section>
@endsection
