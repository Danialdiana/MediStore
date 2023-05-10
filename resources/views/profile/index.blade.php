@extends('layouts.app')
@section('title','PROFILE PAGE')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <section class="user-dashboard page-wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="dashboard-wrapper dashboard-user-profile">
                                    <div class="media">
                                        <div class="pull-left text-center" href="#!">
                                            <img class="media-object user-img" src=" {{$user->image  ? asset('uploads/ava/'.$user->image) : 'https://catherineasquithgallery.com/uploads/posts/2021-02/1614529382_108-p-golova-na-belom-fone-123.png'}}" alt="Image">
                                            <button onclick="myFunction()" class="btn btn-transparent mt-20">{{__('message.img')}}</button>
                                            <form id="myForm" class="form form-control" action="{{route('profile.store',$user->id)}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" value="{{$user->id}}" name="id">
                                                <input type="file" class="form-control @error('image')is-invalid @enderror" id="imageInput" name="image">
                                                <button type="submit" class="btn btn-outline-primary">{{__('message.send')}}</button>
                                            </form>
                                        </div>
                                        <div class="media-body">
                                            <ul class="user-profile-list">
                                                <li><h3>{{__('message.name')}}</h3>  {{$user->name}}</li>
                                                <li><h3>{{__('message.el')}} </h3> {{$user->email}}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <script>
        function myFunction() {
            document.getElementById("myForm").classList.toggle("s");
        }
    </script>

@endsection
