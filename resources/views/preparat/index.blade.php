@extends('layouts.app')

@section('title','MediStore')
@section('content')
    <div class="hero-slider">
        <div class="slider-item th-fullpage hero-area" style="background-image: url({{asset('assetss/images/slider/slider-1.jpg')}});">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 text-center">
                        <p data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".1">{{__('message.bHeader')}}</p>
                        <h1 data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".5">{{__('message.bBody')}}</h1>
                        <a data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".8" class="btn" href="shop.html">{{__('message.more')}}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="slider-item th-fullpage hero-area" style="background-image: url({{asset('assetss/images/slider/slider-2.jpg')}});">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 text-left">
                        <p data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".1">{{__('message.b2Header')}}</p>
                        <h1 data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".5">{{__('message.b2Header')}}</h1>
                        <a data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".8" class="btn" href="shop.html">{{__('message.more')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                    <h1 class="text-center"><strong>{{__('message.main')}}</strong></h1>
                    <div class="container py-5">
                        <div class="row">
                        @foreach($preparats as $preparat)
                                <div class="col-lg-4 col-md-12 mb-4" >
                                    <div class="card justify-content-center">
                                        <div class="bg-image hover-overlay ripple mx-auto" data-mdb-ripple-color="light">
                                            <img src="{{asset('uploads/'.$preparat->image)}}"  height="100px" />
                                        </div>
                                        <div class="card-body" style="height: 200px;">
                                            <h4 class="card-title text-center">{{$preparat-> {'name_'.app()->getLocale()} }}</h4>
                                            <p class="card-text">{{$preparat-> {'content_'.app()->getLocale()} }}</p>
                                            <h4 class="card-text text-center mt-5">{{$preparat->price}} T</h4>
                                        </div>
                                        <div class="card-footer" style="display: flex;justify-content:space-between;">
                                            <a href="{{route('preparats.show',$preparat->id)}}" class="btn  btn-main">{{__('message.more')}}</a>
                                            @if(\Illuminate\Support\Facades\Auth::user())
                                            <form action="{{route('preparat.select',$preparat->id)}}" method="post">
                                                @csrf
                                              <button class="like" type="submit" style="@if(\Illuminate\Support\Facades\Auth::user()->products()->where('preparat_id',$preparat->id)->first()) color:black;@else color:red;@endif"><span>♥</span></button>
                                            </form>
                                            @else
                                            @endif
                                        </div>
                                    </div>
                                </div>
                        @endforeach
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection
