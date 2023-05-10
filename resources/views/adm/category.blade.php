@extends('layouts.adm')

@section('title','CATEGORY PAGE')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{__('message.category')}}</th>
                        <th scope="col">#</th>
                    </tr>
                    </thead>
                    <tbody>
                    @for($i=0; $i<count($category); $i++)
                        <tr>
                            <th scope="row">{{$i+1}}</th>
                            <td>{{$category[$i]->category}}</td>
                            <td>
                                <form action="{{route('adm.categories.destroy',$category[$i]->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger" type="submit">{{__('message.delete')}}</button>
                                </form>
                            </td>
                        </tr>
                    @endfor
                    </tbody>
                </table>

                <form action="{{route('adm.categories.store')}}" method="post">
                    @csrf
                    <input type="text" name="category" placeholder="Input new category" class="form-control">
                    <button type="submit" class="btn btn-primary">{{__('message.add')}}</button>
                </form>
            </div>
        </div>
    </div>
@endsection

