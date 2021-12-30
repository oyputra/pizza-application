@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Customers</li>
                </ol>
            </nav>
            <div class="card">
                <div class="card-header">{{ __('Customers') }}</div>

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
                            <th scope="col">Email</th>
                            <th scope="col">Member since</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($customers as $customer)
                                <tr>
                                    <th scope="row">{{ $customer->name }}</th>
                                    <td>{{ $customer->email }}</td>
                                    <td>{{ \Carbon\Carbon::parse($customer->created_at)->format('d M Y') }}</td>
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
