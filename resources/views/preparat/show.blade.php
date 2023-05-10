@extends('layouts.app')
@section('title','SHOW PAGE')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class=" container py-3">
                    <div class="row ">
                        <div class="row g-0">
                                <div class="col-md-4 m-xl-3">
                                    <img
                                        src="{{asset('uploads/'.$preparat->image)}}"
                                        alt="Trendy Pants and Shoes"
                                        class="img-fluid rounded-start"
                                        height="200px"
                                    />
                                </div>
                                <div class="col-md-7">
                                    <div class="card-body">
                                        <h1 class="card-title text-center">{{$preparat-> {'name_'.app()->getLocale()} }} </h1>
                                        <p class="card-text mt-3">{{$preparat->{'content_'.app()->getLocale()} }}</p>
                                        <h2 class="card-text text-center m-5">{{$preparat->price}} T</h2>
                                        <h5 class="card-text text-muted">{{__('message.edate')}}:________{{$preparat->{'term_'.app()->getLocale()} }}</h5>
                                        <h5 class="card-text text-muted">{{__('message.country')}}:_______________{{$preparat->{'country_'.app()->getLocale()} }}</h5>
                                        <h5 class="card-text text-muted">{{__('message.m')}}:________{{$preparat->{'company_'.app()->getLocale()} }}</h5>
                                        @auth()
                                            <div class="col-4">
                                                <form action="{{route('preparats.cart',$preparat->id)}}" method="post">
                                                    @csrf
                                                    <input type="hidden" value="{{$preparat->id}}" name="preparat_id">
                                                    <select class="form-select" name="count">
                                                        @for($i=1;$i<=10;$i++)
                                                            <option {{$count==$i ? 'selected' : ''}} value="{{$i}}">{{$i}}</option>
                                                        @endfor
                                                    </select>
                                                    <button class="btn btn-success" type="submit">{{__('message.tcart')}}</button>
                                                </form>
                                            </div>
                                        @endauth
                                    </div>
                                </div>
                            <div class="card-footer justify-content-around">
                                @can('update',$preparat)
                                    <a href="{{route('preparats.edit',$preparat->id)}}" class="btn btn-success">{{__('message.edit')}}</a>
                                @endcan
                                <a href="{{route('preparats.index')}}" class="btn btn-primary">{{__('message.main')}}</a>
                            </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-6">
                @can('create',\App\Models\Comment::class)
                    <form action="{{route('comments.store')}}" method="post">
                        @csrf
                        <input type="hidden" name="preparat_id" value="{{$preparat->id}}">
                        <label for="contentInput">{{__('message.comment')}}:</label>
                        <textarea class="form-control" id="contentInput" rows="3" name="content"></textarea>
                        <button class="btn btn-secondary mt-3" type="submit">{{__('message.save')}}</button>
                    </form>
                @endcan
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-8">
                @foreach($comment as $commentary)
                    <div class="card mt-3">
                        <div class="card-body">
                            <h5 class="card-title">{{$commentary->user->name}}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{$commentary->created_at}}</h6>
                            <p class="card-text">{{$commentary->content}}</p>
                            <div class="containers-button" style="display: flex;justify-content:space-between;">
                                @can('update',$commentary)
                                    <a href="{{route('comments.edit',[$commentary->id])}}" class="btn btn-outline-primary">{{__('message.edit')}}</a>                                @endcan
                               @can('delete',$commentary)
                                    <form action="{{route('comments.destroy',$commentary->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-outline-danger" type="submit">{{__('message.delete')}}</button>
                                    </form>
                                @endcan
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
