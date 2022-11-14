@extends('layouts.app')
@section('title','Comment edit page')
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
                                    <h1 class="card-title text-center">{{$preparat->name}} </h1>
                                    <p class="card-text mt-3">{{$preparat->content}}</p>
                                    <h2 class="card-text text-center m-5">{{$preparat->price}} T</h2>
                                    <h5 class="card-text text-muted">Срок годности:________{{$preparat->term}}</h5>
                                    <h5 class="card-text text-muted">Страна:_______________{{$preparat->country}}</h5>
                                    <h5 class="card-text text-muted">Производитель:________{{$preparat->company}}</h5>
                                </div>
                            </div>
                            <div class="card-footer justify-content-around">
                                <a href="{{route('preparats.edit',$preparat->id)}}" class="btn btn-success">Изменить</a>
                                <a href="{{route('preparats.index')}}" class="btn btn-primary">Главная страница</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 ">
                <form action="{{route('comments.update',$comment->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="preparat_id" value="{{$preparat->id}}">
                    <label for="commentInput" class=" mt-7" >Отзыв:</label>
                    <textarea class="form-control mt-2" id="commentInput" name="content" cols="50" rows="5">{{$comment->content}}</textarea>
                    <button class="btn btn-success mt-3" type="submit">SAVE COMMENT</button>
                </form>
            </div>
        </div>
    </div>
@endsection
