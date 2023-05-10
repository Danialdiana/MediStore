@extends('layouts.adm')

@section('title','ROLES PAGE')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <form action="{{route('adm.users.search')}}" method="GET">
                    <div class="input-group mb-3">
                        <input type="text" name="search" class="form-control" placeholder="{{__('message.here')}}" aria-label="Username" aria-describedby="basic-addon1">
                        <button type="submit" class="btn btn-outline-info">{{__('message.search')}}</button>
                    </div>
                </form>

                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{__('message.tname')}}</th>
                        <th scope="col">{{__('message.temail')}}</th>
                        <th scope="col">{{__('message.trole')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @for($i=0; $i<count($users); $i++)
                        <tr>
                            <th scope="row">{{$i+1}}</th>
                            <td>{{$users[$i]->name}}</td>
                            <td>{{$users[$i]->email}}</td>
                            <td>
                                <form action="{{route('adm.users.update',$users[$i]->id)}}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <select  class="form-control @error('role_id')is-invalid @enderror" id="selectInput" name="role_id">
                                        @foreach($roles as $r)
                                            <option @if($r->id==$users[$i]->role_id) selected @endif value="{{$r->id}}">{{$r->role}}</option>
                                        @endforeach
                                    </select>
                                    <button type="submit" class="btn btn-primary">{{__('message.change')}}</button>
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
