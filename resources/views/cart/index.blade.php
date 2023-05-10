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
                                    <h1 class="page-name"> {{ __('message.cart') }}</h1>
                                    <ol class="breadcrumb">
                                        <li><a href="{{route('preparats.index')}}"> {{ __('message.main') }}</a></li>
                                        <li class="active"> {{ __('message.cart') }}</li>
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
                                                        <th class="">###</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($preparat as $p)
                                                        <tr class="">
                                                        <td class="">
                                                            <div class="product-info">
                                                                <img width="80" src="{{asset('uploads/'.$p->image)}}" alt="" />
                                                                <a href="{{route('preparats.show',$p->id)}}">{{$p->name}}</a>
                                                            </div>
                                                        </td>
                                                        <td class="">{{$p->price}} T</td>
                                                            <td class="">{{$p->pivot->count}}</td>
                                                            <td class="">
                                                            <form action="{{route('cart.destroy',$p->id)}}" method="post">
                                                                @csrf
                                                                <button type="submit" class="btn btn-outline-danger">{{ __('message.delete') }}</button>
                                                            </form>
                                                            </td>
                                                    </tr>
                                                    @endforeach
                                                    <tr class="">
                                                        <td class="">
                                                            <div class="product-info">
                                                                <a href="#!">{{ __('message.summa') }}</a>
                                                            </div>
                                                        </td>
                                                        <td class=""></td>
                                                        <td class=""></td>
                                                        <td class="">{{$sum}}</td>
                                                    </tr>
                                                    <tr class="">
                                                        <td class="">
                                                            <div class="product-info">
                                                                <a href="{{route('payment.index')}}">{{ __('message.balance') }}</a>
                                                            </div>
                                                        </td>
                                                        <td class=""></td>
                                                        <td class=""></td>
                                                        <td class="">{{\Illuminate\Support\Facades\Auth::user()->summa}}</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <form action="{{route('cart.sales')}}" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn  btn-main pull-right">{{ __('message.BUY') }}</button>
                                                </form>

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
