@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Orders</li>
                </ol>
            </nav>
            <div class="card">
                <div class="card-header">{{ __('Order') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">User</th>
                            <th scope="col">Phone/Email</th>
                            <th scope="col">Date/Time</th>
                            <th scope="col">Pizza</th>
                            <th scope="col">S</th>
                            <th scope="col">M</th>
                            <th scope="col">L</th>
                            <th scope="col">Total($)</th>
                            <th scope="col">Message</th>
                            <th scope="col">Status</th>
                            <th scope="col">Accept</th>
                            <th scope="col">Reject</th>
                            <th scope="col">Completed</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <th scope="row">{{ $order->user->name }}</th>
                                    <td>{{ $order->user->email }} <br> {{ $order->phone }}</td>
                                    <td>{{ $order->date }}/{{ $order->time }}</td>
                                    <td>{{ $order->pizza->name }}</td>
                                    <td>{{ $order->small_pizza }}</td>
                                    <td>{{ $order->medium_pizza }}</td>
                                    <td>{{ $order->large_pizza }}</td>
                                    <td>{{  ($order->small_pizza * $order->pizza->small_pizza_price) +
                                            ($order->medium_pizza * $order->pizza->medium_pizza_price) +
                                            ($order->large_pizza * $order->pizza->large_pizza_price)
                                        }}</td>
                                    <td>{{ $order->message }}</td>
                                    <td>{{ $order->status }}</td>

                                    <form action="{{ route('order.status', $order->id) }}" method="POST">
                                        @csrf
                                        <td>
                                            <input name="status" type="submit" value="accepted" class="btn btn-primary btn-sm">
                                        </td>
                                        <td>
                                            <input name="status" type="submit" value="rejected" class="btn btn-danger btn-sm">
                                        </td>
                                        <td>
                                            <input name="status" type="submit" value="completed" class="btn btn-success btn-sm">
                                        </td>

                                    </form>
                                </tr>
                            @endforeach
                        </tbody>
                      </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
