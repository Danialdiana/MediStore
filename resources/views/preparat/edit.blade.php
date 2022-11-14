@extends('layouts.app')

@section('title','EDIT PAGE')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{route('preparats.update',$preparat->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group mt-2">
                        <label for="nameInput">Имя:</label>
                        <input type="text" class="form-control @error('name')is-invalid @enderror" id="nameInput" name="name" value="{{$preparat->name}}">
                        @error('name')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="contentInput">Описание:</label>
                        <textarea class="form-control @error('content')is-invalid @enderror" id="contentInput" rows="3" name="content">{{$preparat->content}}</textarea>
                        @error('content')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="priceInput">Цена:</label>
                        <input type="text" class="form-control @error('price')is-invalid @enderror" id="priceInput" name="price" value="{{$preparat->price}}">
                        @error('price')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="termInput">Срок хранения:</label>
                        <input type="text" class="form-control @error('term')is-invalid @enderror" id="termInput" name="term" value="{{$preparat->term}}">
                        @error('term')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="countryInput">Страна:</label>
                        <input type="text" class="form-control @error('country')is-invalid @enderror" id="countryInput" name="country" value="{{$preparat->country}}">
                        @error('country')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="companyInput">Производитель:</label>
                        <input type="text" class="form-control @error('company')is-invalid @enderror" id="companyInput" name="company" value="{{$preparat->company}}">
                        @error('company')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="selectInput">Категория:</label>
                        <select  class="form-control @error('category_id')is-invalid @enderror " id="selectInput" name="category_id">
                            @foreach($categories as $category)
                                <option @if($category->id==$preparat->category_id) selected @endif value="{{$category->id}}">{{$category->category}}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="selectInput">Тип:</label>
                        <select  class="form-control @error('types_id')is-invalid @enderror" id="selectInput" name="type_id">
                            @foreach($types as $type)
                                <option @if($type->id==$preparat->types_id) selected @endif value="{{$type->id}}">{{$type->type}}</option>
                            @endforeach
                        </select>
                        @error('types_id')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="imageInput">Фото:</label>
                        <img src="{{asset('uploads/'.$preparat->image)}}"
                             width="200px" />
                        <input type="file" class="form-control @error('image')is-invalid @enderror" id="imageInput" name="image" value="{{$preparat->image}}">
                        @error('image')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-success">Сохранить</button>
                    </div>
                </form>
                <div class="containers-button mt-5" style="display: flex;justify-content:space-between;">
                    <a href="{{route('preparats.index')}}" class="btn btn-primary">Главная страница</a>
                    @can('delete',$preparat)
                        <form action="{{route('preparats.destroy',$preparat->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Удалить</button>
                        </form>
                    @endcan
                </div>
            </div>
        </div>
    </div>
@endsection
