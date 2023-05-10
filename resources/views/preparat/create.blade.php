@extends('layouts.app')

@section('title','CREATE PAGE')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{route('preparats.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mt-2">
                        <label for="nameInput">{{__('message.name')}}</label>
                        <input type="text" class="form-control @error('name')is-invalid @enderror" id="nameInput" name="name">
                        @error('name')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="nameInput">{{__('message.namekz')}}</label>
                        <input type="text" class="form-control @error('name_kz')is-invalid @enderror" id="nameInput" name="name_kz">
                        @error('name_kz')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="nameInput">{{__('message.nameru')}}</label>
                        <input type="text" class="form-control @error('name_ru')is-invalid @enderror" id="nameInput" name="name_ru">
                        @error('name_ru')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="nameInput">{{__('message.nameen')}}</label>
                        <input type="text" class="form-control @error('name_en')is-invalid @enderror" id="nameInput" name="name_en">
                        @error('name_en')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="contentInput">{{__('message.description')}}</label>
                        <textarea class="form-control @error('content')is-invalid @enderror" id="contentInput" rows="3" name="content"></textarea>
                        @error('content')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="contentInput">{{__('message.dkz')}}</label>
                        <textarea class="form-control @error('content_kz')is-invalid @enderror" id="contentInput" rows="3" name="content_kz"></textarea>
                        @error('content_kz')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="contentInput">{{__('message.dru')}}</label>
                        <textarea class="form-control @error('content_ru')is-invalid @enderror" id="contentInput" rows="3" name="content_ru"></textarea>
                        @error('content_ru')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="contentInput">{{__('message.den')}}</label>
                        <textarea class="form-control @error('content_en')is-invalid @enderror" id="contentInput" rows="3" name="content_en"></textarea>
                        @error('content_en')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="priceInput">{{__('message.price')}}</label>
                        <input type="text" class="form-control @error('price')is-invalid @enderror" id="priceInput" name="price">
                        @error('price')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="termInput">{{__('message.term')}}</label>
                        <input type="text" class="form-control @error('term')is-invalid @enderror" id="termInput" name="term">
                        @error('term')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="termInput">{{__('message.termkz')}}</label>
                        <input type="text" class="form-control @error('term_kz')is-invalid @enderror" id="termInput" name="term_kz">
                        @error('term_kz')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="termInput">{{__('message.termru')}}</label>
                        <input type="text" class="form-control @error('term_ru')is-invalid @enderror" id="termInput" name="term_ru">
                        @error('term_ru')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="termInput">{{__('message.termen')}}</label>
                        <input type="text" class="form-control @error('term_en')is-invalid @enderror" id="termInput" name="term_en">
                        @error('term_en')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="countryInput">{{__('message.country')}}</label>
                        <input type="text" class="form-control @error('country')is-invalid @enderror" id="countryInput" name="country">
                        @error('country')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="countryInput">{{__('message.ckz')}}</label>
                        <input type="text" class="form-control @error('country_kz')is-invalid @enderror" id="countryInput" name="country_kz">
                        @error('country_kz')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="countryInput">{{__('message.cru')}}</label>
                        <input type="text" class="form-control @error('country_ru')is-invalid @enderror" id="countryInput" name="country_ru">
                        @error('country_ru')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="countryInput">{{__('message.cen')}}</label>
                        <input type="text" class="form-control @error('country_en')is-invalid @enderror" id="countryInput" name="country_en">
                        @error('country_en')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="companyInput">{{__('message.company')}}</label>
                        <input type="text" class="form-control @error('company')is-invalid @enderror" id="companyInput" name="company">
                        @error('company')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="companyInput">{{__('message.companykz')}}</label>
                        <input type="text" class="form-control @error('company_kz')is-invalid @enderror" id="companyInput" name="company_kz">
                        @error('company_kz')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="companyInput">{{__('message.companyru')}}</label>
                        <input type="text" class="form-control @error('company_ru')is-invalid @enderror" id="companyInput" name="company_ru">
                        @error('company_ru')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="companyInput">{{__('message.companyen')}}</label>
                        <input type="text" class="form-control @error('company_en')is-invalid @enderror" id="companyInput" name="company_en">
                        @error('company_en')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="selectInput">{{__('message.category')}}</label>
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
                        <label for="selectInput">{{__('message.type')}}</label>
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
                        <label for="imageInput">{{__('message.photo')}}</label>
                        <input type="file" class="form-control @error('image')is-invalid @enderror" id="imageInput" name="image">
                        @error('image')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-success">{{__('message.save')}}</button>
                    </div>
                </form>
                <a href="{{route('preparats.index')}}" style="margin-left: 600px;" class="btn btn-primary">{{__('message.main')}}</a><br>
            </div>
        </div>
    </div>
@endsection
