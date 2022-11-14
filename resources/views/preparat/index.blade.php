@extends('layouts.app')

@section('title','MediStore')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                    <h1 class="text-center"><strong>Главная страница</strong></h1>
                    <div class="container py-5">
                        <div class="row">
                        @foreach($preparats as $preparat)
                                <div class="col-lg-4 col-md-12 mb-4">
                                    <div class="card justify-content-center">
                                        <div class="bg-image hover-overlay ripple mx-auto" data-mdb-ripple-color="light">
                                            <img src="{{asset('uploads/'.$preparat->image)}}"  height="100px" />
                                        </div>
                                        <div class="card-body">
                                            <h4 class="card-title text-center">{{$preparat->name}}</h4>
                                            <p class="card-text">{{$preparat->content}}</p>
                                            <h4 class="card-text text-center">{{$preparat->price}} T</h4>
                                        </div>
                                        <div class="card-footer">
                                            <a href="{{route('preparats.show',$preparat->id)}}" class="btn btn-primary">Смотреть</a>
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
