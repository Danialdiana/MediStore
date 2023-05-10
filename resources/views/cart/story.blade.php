@extends('layouts.app')
@section('title','CART PAGE')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <section class="page-header">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="content">
                                    <h1 class="page-name">{{ __('message.history') }}</h1>
                                    <ol class="breadcrumb">
                                        <li><a href="{{route('preparats.index')}}">{{ __('message.main') }}</a></li>
                                        <li class="active">{{ __('message.history') }}</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <div class="page-wrapper">
                    <div class="cart shopping">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <div class="block">
                                        <div class="product-list">
                                            <form method="post">
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th class="">{{ __('message.namep') }}</th>
                                                        <th class="">{{ __('message.price') }}</th>
                                                        <th class="">{{ __('message.count') }}</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($prep as $p)
                                                        <tr class="">
                                                            <td class="">
                                                                <div class="product-info">
                                                                    <img width="80" src="{{asset('uploads/'.$p->image)}}" alt="" />
                                                                    <a href="{{route('preparats.show',$p->id)}}">{{$p->name}}</a>
                                                                </div>
                                                            </td>
                                                            <td class="">{{$p->price}} T</td>
                                                            <td class="">{{$p->pivot->count}}</td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
