@extends('layouts.app')

@section('title','CREATE PAGE')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{route('preparats.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mt-2">
                        <label for="nameInput">Имя:</label>
                        <input type="text" class="form-control @error('name')is-invalid @enderror" id="nameInput" name="name">
                        @error('name')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="contentInput">Описание:</label>
                        <textarea class="form-control @error('content')is-invalid @enderror" id="contentInput" rows="3" name="content"></textarea>
                        @error('content')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="priceInput">Цена:</label>
                        <input type="text" class="form-control @error('price')is-invalid @enderror" id="priceInput" name="price">
                        @error('price')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="termInput">Срок хранения:</label>
                        <input type="text" class="form-control @error('term')is-invalid @enderror" id="termInput" name="term">
                        @error('term')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="countryInput">Страна:</label>
                        <input type="text" class="form-control @error('country')is-invalid @enderror" id="countryInput" name="country">
                        @error('country')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="companyInput">Производитель:</label>
                        <input type="text" class="form-control @error('company')is-invalid @enderror" id="companyInput" name="company">
                        @error('company')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="selectInput">Категория:</label>
                        <select  class="form-control @error('category_id')is-invalid @enderror " id="selectInput" name="category_id">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->category}}</option>
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
                                <option value="{{$type->id}}">{{$type->type}}</option>
                            @endforeach
                        </select>
                        @error('types_id')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="imageInput">Фото:</label>
                        <input type="file" class="form-control @error('image')is-invalid @enderror" id="imageInput" name="image">
                        @error('image')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-success">Сохранить</button>
                    </div>
                </form>
                <a href="{{route('preparats.index')}}" style="margin-left: 600px;" class="btn btn-primary">Главная страница</a><br>
            </div>
        </div>
    </div>
@endsection
