@extends('layouts.adm')

@section('title','COMMENT PAGE')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <form action="{{route('adm.comments.search')}}" method="GET">
                    <div class="input-group mb-3">
                        <input type="text" name="search" class="form-control" placeholder="Input text" aria-label="Content" aria-describedby="basic-addon1">
                        <button type="submit" class="btn btn-outline-info">Search</button>
                    </div>
                </form>

                @foreach($comment as $commentary)
                    <div class="card mt-3">
                        <div class="card-body">
                            <h5 class="card-title">{{$commentary->user->name}} <br><a href="{{route('preparats.show',$commentary->preparat->id)}}">{{$commentary->preparat->name}} </a></h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{$commentary->created_at}}</h6>
                            <p class="card-text">{{$commentary->content}}</p>
                            <div class="containers-button" style="display: flex;justify-content:space-between;">
                                <a href="{{route('comments.edit',[$commentary->id])}}" class="btn btn-outline-primary">Edit</a>
                                <form action="{{route('comments.destroy',$commentary->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger" type="submit">DELETE</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
