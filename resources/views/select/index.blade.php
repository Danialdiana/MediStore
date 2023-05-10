@extends('layouts.app')

@section('title','Select page')
@section('content')
    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="content">
                        <h1 class="page-name">                                        {{ __('message.chosen') }}
                        </h1>
                        <ol class="breadcrumb">
                            <li><a href="{{route('preparats.index')}}">{{ __('message.main') }}</a></li>
                            <li class="active">                                        {{ __('message.chosen') }}
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="container py-5">
                    <div class="row">
                        @foreach($preparats as $preparat)
                            <div class="col-lg-4 col-md-12 mb-4">
                                <div class="card justify-content-center">
                                    <div class="bg-image hover-overlay ripple mx-auto" data-mdb-ripple-color="light">
                                        <img src="{{asset('uploads/'.$preparat->image)}}"  height="100px" />
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title text-center">{{$preparat-> {'name_'.app()->getLocale()} }}</h4>
                                        <p class="card-text">{{$preparat-> {'content_'.app()->getLocale()} }}</p>
                                        <h4 class="card-text text-center">{{$preparat->price}} T</h4>
                                    </div>
                                    <div class="card-footer" style="display: flex;justify-content:space-between;">
                                        <a href="{{route('preparats.show',$preparat->id)}}" class="btn  btn-main">{{__('message.more')}}</a>
                                        <form action="{{route('select.destroy',$preparat->id)}}" method="post">
                                            @csrf
                                            <button class="like" type="submit" style="color: black"><span>♥</span></button>
                                        </form>
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
