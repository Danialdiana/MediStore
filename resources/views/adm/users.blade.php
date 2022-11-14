@extends('layouts.adm')

@section('title','ADM PANEL')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <form action="{{route('adm.users.search')}}" method="GET">
                    <div class="input-group mb-3">
                        <input type="text" name="search" class="form-control" placeholder="Input username" aria-label="Username" aria-describedby="basic-addon1">
                        <button type="submit" class="btn btn-outline-info">Search</button>
                    </div>
                </form>

                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Ban/Unban</th>
                    </tr>
                    </thead>
                    <tbody>
                    @for($i=0; $i<count($users); $i++)
                        <tr>
                            <th scope="row">{{$i+1}}</th>
                            <td>{{$users[$i]->name}}</td>
                            <td>{{$users[$i]->email}}</td>
                            <td>{{$users[$i]->role->role}}</td>
                            <td>
                                <form action="@if($users[$i]->is_active) {{route('adm.users.ban',$users[$i]->id)}} @else {{route('adm.users.unban',$users[$i]->id)}} @endif" method="post">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn {{$users[$i]->is_active ? 'btn-danger': 'btn-success'}}"> @if($users[$i]->is_active)BAN @else UNBAN @endif</button>
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
