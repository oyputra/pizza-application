@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Menu</div>

                <div class="card-body">
                    @if (Auth::check())
                        <form action="{{ route('order.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                @if (session('message'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('message') }}
                                    </div>
                                @endif
                                @if (session('errmessage'))
                                    <div class="alert alert-danger" role="alert">
                                        {{ session('errmessage') }}
                                    </div>
                                @endif
                                <p>Name: {{ auth()->user()->name }}</p>
                                <p>Email: {{ auth()->user()->email }}</p>
                                <p>Phone number: <input type="text" class="form-control" name="phone"></p>
                                <p>Small pizza order: <input type="number" class="form-control" name="small_pizza" value="0"></p>
                                <p>Medium pizza order: <input type="number" class="form-control" name="medium_pizza" value="0"></p>
                                <p>Large pizza order: <input type="number" class="form-control" name="large_pizza" value="0"></p>
                                <p><input type="hidden" name="pizza_id" value="{{ $pizza->id }}"></p>
                                <p><input type="date" name="date" class="form-control"></p>
                                <p><input type="time" name="time" class="form-control"></p>
                                <p><textarea name="message" class="form-control"></textarea></p>
                                <p class="d-grid">
                                    <button class="btn btn-danger" type="submit">Make Order</button>
                                </p>
                            </div>
                        </form>
                    @else
                    <p><a href="{{ route('login') }}">Please login to make order</a></p>                        
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pizza</div>

                <div class="card-body">
                   <div class="row p-3">
                        <img src="{{ Storage::url($pizza->image) }}" class="img-thumbnail" style="width: 100%;">
                        <div class="p-3">
                            <h3>{{ $pizza->name }}</h3>
                            <p>{{ $pizza->description }}</p>
                            <p>Small pizza price: <span class="fw-bold">Rp{{ $pizza->small_pizza_price }}</span></p>
                            <p>Medium pizza price: <span class="fw-bold">Rp{{ $pizza->medium_pizza_price }}</span></p>
                            <p>Large pizza price: <span class="fw-bold">Rp{{ $pizza->large_pizza_price }}</span></p>
                        </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    a.list-group-item {
        font-size: 18px;
    }
    a.list-group-item:hover {
        background-color: red;
        color: #fff;
    }
    .card-header {
        background-color: red;
        color: #fff;
        font-size: 20px;
    }
</style>
@endsection
