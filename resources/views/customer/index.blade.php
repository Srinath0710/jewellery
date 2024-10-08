@extends('layouts.app')

@section('title', 'Categories')

@section('content')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<div class="menu-bar">
    <div class="logo">
        <h1>LOGO</h1>
    </div>
    <ul>
        <li class="{{ request()->routeIs('customer.index') ? 'active' : '' }}">
            <a href="{{ route('customer.index') }}">Home</a>
        </li>
        <li class="{{ request()->is('about') ? 'active' : '' }}">
            <a href="#about">About</a>
        </li>
        <li class="{{ request()->is('services') ? 'active' : '' }}">
            <a href="#services">Services</a>
        </li>
        <li class="{{ request()->routeIs('customer.create') ? 'active' : '' }}">
            <a href="{{ route('customer.create') }}">Add Customer</a>
        </li>
    </ul>
    <div class="search-container">
        {{-- <form action="{{ route('customer.index') }}" method="GET" class="form-inline"> --}}
            <input type="text" name="search" class="form-control" value="{{ request()->input('search') }}" placeholder="Search Categories...">
            <button type="submit">Search</button>
        </form>
    </div>
    <form action="{{ route('logout') }}" method="POST" style="display: inline;margin-right: 38px;">
        @csrf
        <button type="submit"style="background-color: red">Logout</button>
    </form>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="details-container">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Customer List</h3>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="table table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Amount</th>
                                <th>Loan Number</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $customer)
                                <tr>
                                    <td>{{ $customer->name }}</td>
                                    <td>{{ $customer->address }}</td>
                                    <td>{{ $customer->amount }}</td>
                                    <td>{{ $customer->loan_number }}</td>
                                    <td>
                                        <a href="{{ route('customer.edit', ['id' => $customer->id]) }}">Edit</a>
                                        
                                        <form action="{{ route('customer.destroy', ['id' => $customer->id]) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" style="background-color: red; border-color: red;">Delete</button>
                                        </form>
                                        
                                        
                                    </td>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    ul li.active a {
    color: lime;
    font-weight: bold;
}

     .details-container {
        background: white;

     }
    .table {
        width: 100%;
        margin-bottom: 1rem;
        color:black;
        border-collapse: collapse;
    }
    
    .table th, .table td {
        padding: 0.75rem;
        vertical-align: top;
        border-top: 1px solid #dee2e6;
    }

    .table-bordered {
        border: 1px solid #dee2e6;
    }

    .table-bordered th, .table-bordered td {
        border: 1px solid #dee2e6;
    }

    .thead-dark th {
        color: #fff;
        background-color: #343a40;
        border-color: #454d55;
    }

    .btn {
        margin-left: 5px;
    }
</style>

    

<script src="{{ asset('js/details.js') }}"></script>
@endsection
