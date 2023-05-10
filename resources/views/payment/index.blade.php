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
                                    <h1 class="page-name">{{ __('message.balance') }}</h1>
                                    <ol class="breadcrumb">
                                        <li><a href="{{route('preparats.index')}}">{{ __('message.main') }}</a></li>
                                        <li class="active">{{ __('message.balance') }}</li>
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
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th class="">{{ __('message.balance') }}</th>
                                                        <th class=""></th>
                                                        <th class=""></th>
                                                        <th class="">{{\Illuminate\Support\Facades\Auth::user()->summa}} </th>
                                                    </tr>
                                                    </thead>
                                                </table>

                                            <button type="button" class="btn  btn-main pull-right mb-3" onclick="myFunction2()">{{ __('message.account') }}</button>

                                        </div>
                                        <form action="{{route('payment.store',\Illuminate\Support\Facades\Auth::user()->id)}}" method="post" id="myForm2" class="form2 mt-5">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group mt-2">
                                                <label for="contentInput">{{ __('message.number') }}:</label>
                                                <input type="text"  class="form-control @error('number')is-invalid @enderror" id="numberInput"  name="number" placeholder="ХХХХ ХХХХ ХХХХХХ">
                                                @error('number')
                                                <div class="alert alert-danger">{{$message}}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group mt-2">
                                                <label for="priceInput">{{ __('message.date') }}:</label>
                                                <input type="text" class="form-control @error('year')is-invalid @enderror" id="yearInput" name="year" placeholder="MM/YYYY">
                                                @error('year')
                                                <div class="alert alert-danger">{{$message}}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group mt-2">
                                                <label for="termInput">CVC:</label>
                                                <input type="text" class="form-control @error('cvc')is-invalid @enderror" id="cvcInput" name="cvc">
                                                @error('cvc')
                                                <div class="alert alert-danger">{{$message}}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group mt-2">
                                                <label for="termInput">Сумма:</label>
                                                <input type="text" class="form-control @error('summa')is-invalid @enderror" id="summaInput" name="summa">
                                                @error('summa')
                                                <div class="alert alert-danger">{{$message}}</div>
                                                @enderror
                                            </div>
                                            <input type="hidden" name="user_id" value="{{\Illuminate\Support\Facades\Auth::user()->id}}">
                                            <div class="form-group mt-3">
                                                <button type="submit" class="btn btn-success">{{ __('message.topUp') }}</button>
                                            </div>
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
    <script>
        function myFunction2() {
            document.getElementById("myForm2").classList.toggle("s2");
        }
    </script>
@endsection
