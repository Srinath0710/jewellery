@extends('layouts.app')

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
        <li class="{{ request()->routeIs('customer.create') ? 'active' : '' }}">
            <a href="{{ route('customer.create') }}">Add Customer</a>
        </li>
    </ul>
    <form action="{{ route('logout') }}" method="POST" style="display: inline; margin-right: 38px;">
        @csrf
        <button type="submit" style="background-color: red">Logout</button>
    </form>
</div>

<div class="details-container">
    <h1>Loan Delivery Details</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form id="detailsForm" action="{{ route('customer.store') }}" method="POST">
        @csrf
        <div class="detailsForm">
            <div class="personal-info">
                <div class="input-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="input-group">
                    <label for="relation">Relation:</label>
                    <input type="text" id="relation" name="relation" required>
                </div>
                <div class="input-group">
                    <label for="door_no">Door No:</label>
                    <input type="number" id="door_no" name="door_no">
                </div>
                <div class="input-group">
                    <label for="address1">Address 1:</label>
                    <input type="text" id="address1" name="address1">
                </div>
                <div class="input-group">
                    <label for="address2">Address 2:</label>
                    <input type="text" id="address2" name="address2">
                </div>
            </div>
            
            <div class="personal-info">
                <div class="input-group">
                    <label for="date_of_purchase">Date:</label>
                    <input type="date" id="date_of_purchase" name="date_of_purchase" required>
                </div>
                <div class="input-group">
                    <label for="renewal_date">Renewal Date:</label>
                    <input type="date" id="renewal_date" name="renewal_date">
                </div>
                <div class="input-group">
                    <label for="contact_number">Mobile:</label>
                    <input type="number" id="contact_number" name="contact_number" required>
                </div>
                <div class="input-group">
                    <label for="place">Place:</label>
                    <input type="text" id="place" name="place" required>
                </div>
            </div>
            
            <div class="extra-info">
                <div class="input-group">
                    <label for="loan_number">Loan Number:</label>
                    <input type="text" id="loan_number" name="loan_number">
                </div>
                <div class="input-group">
                    <label for="gold_items">Gold Items:</label>
                    <input type="text" id="gold_items" name="gold_items">
                </div>
                <div class="input-group">
                    <label for="qty">Qty:</label>
                    <input type="text" id="qty" name="qty">
                </div>
                <div class="input-group">
                    <label for="gold_weight">Net Weight:</label>
                    <input type="number" id="gold_weight" name="gold_weight">
                </div>
                <div class="input-group">
                    <label for="gross_weight">Gross Weight:</label>
                    <input type="number" id="gross_weight" name="gross_weight">
                </div>
            </div>
            
            <div class="personal-info">
                <div class="input-group">
                    <label for="other_items">Other Items:</label>
                    <input type="text" id="other_items" name="other_items">
                </div>
                <div class="input-group">
                    <label for="amount">Amount:</label>
                    <input type="text" id="amount" name="amount" required>
                </div>
                <div class="input-group">
                    <label for="interest_percentage">Interest %:</label>
                    <input type="text" id="interest_percentage" name="interest_percentage" required>
                </div>
                <div class="input-group">
                    <label for="interest_amount">Interest Amount:</label>
                    <input type="text" id="interest_amount" name="interest_amount">
                </div>
                <div class="input-group">
                    <label for="total_amount">Total Amount:</label>
                    <input type="text" id="total_amount" name="total_amount">
                </div>
            </div>
        </div>
        
        <div style="display: flex; gap: 10px; margin-top: 20px;">
            <button type="submit" style="background-color: green; color: white; padding: 10px; border: none; cursor: pointer;">Submit</button>
            <button type="reset" style="background-color: rgb(124, 15, 15); color: white; padding: 10px; border: none; cursor: pointer;">Clear</button>
            <button type="button" style="background-color: rgb(204, 0, 0);color: white; padding: 10px; border: none; cursor: pointer;" onclick="window.location.href='{{ route('customer.index') }}'">Cancel</button>
        </div>
    </form>
</div>
@endsection
