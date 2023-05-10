@extends('layouts.adm')

@section('title','ADM PANEL')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{__('message.preparat')}}</th>
                        <th scope="col">{{__('message.user')}}</th>
                        <th scope="col">{{__('message.count')}}</th>
                        <th scope="col">{{__('message.price')}}</th>
                        <th scope="col">##</th>
                    </tr>
                    </thead>
                    <tbody>
                    @for($i=0; $i<count($p); $i++)
                        <tr>
                            <th scope="row">{{$i}}</th>
                            <td>{{$p[$i]->preparat->name}}</td>
                            <td>{{$p[$i]->user->name}}</td>
                            <td>{{$p[$i]->count}}</td>
                            <td>
                                {{$p[$i]->preparat->price*$p[$i]->count}}
                            </td>
                            <td>
                                <form action="{{route('adm.orders.confirm',$p[$i]->id)}}" method="post" >
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-outline-primary">{{__('message.confirm')}}</button>
                                </form>
                            </td>
                        </tr>
                    @endfor
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
