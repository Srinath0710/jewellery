@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<div class="menu-bar">
    <div class="logo">
        <h1>LOGO</h1>
    </div>
    <ul>
        <li><a href="{{ route('customer.index') }}">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#services">Services</a></li>
        <li><a href="{{ route('customer.create') }}">Add Customer</a></li>
    </ul>
    <div class="search-container">
        <input type="text" placeholder="Search...">
        <button type="submit">Search</button>
    </div>
    <form action="{{ route('logout') }}" method="POST" style="display: inline;margin-right: 38px;">
        @csrf
        <button type="submit" style="background-color: red">Logout</button>
    </form>
</div>

<div class="details-container">
    <h2>Additional Information</h2>
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        {{-- <strong>Whoops!</strong> There were some problems with your input.<br><br> --}}
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form id="detailsForm" action="{{ route('customer.store') }}" method="POST" onsubmit="return submitDetails()">
        @csrf
        <div class="detailsForm">
            <div class="persnol-info">
                <div class="input-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="input-group">
                    <label for="address">Address:</label>
                    <input type="text" id="address" name="address">
                </div>
                <div class="input-group">
                    <label for="contact_number">Contact Number:</label>
                    <input type="number" id="contact_number" name="contact_number" required>
                </div>
                <div class="input-group">
                    <label for="amount">Amount:</label>
                    <input type="text" id="amount" name="amount">
                </div>
                <div class="input-group">
                    <label for="date_of_purchase">Date of Purchase:</label>
                    <input type="date" id="date_of_purchase" name="date_of_purchase" required>
                </div>
                <div class="input-group">
                    <label for="renewal_date">Renewal Date</label>
                    <input type="date" id="renewal_date" name="renewal_date">
                </div>
            </div>

            <div class="extra-info">
                <div class="input-group">
                    <label for="loan_number">Loan Number:</label>
                    <input type="text" id="loan_number" name="loan_number">
                </div>
                <div class="input-group">
                    <label for="interest_percentage">Interest Percentage</label>
                    <input type="number" id="interest_percentage" name="interest_percentage">
                </div>
                <div class="input-group">
                    <label for="gold_weight">Gold weight:</label>
                    <input type="number" id="gold_weight" name="gold_weight">
                </div>
                <div class="input-group">
                    <label for="silver_weight">Silver weight:</label>
                    <input type="number" id="silver_weight" name="silver_weight">
                </div>
                <div class="input-group">
                    <label for="number_of_gold">Number of Gold:</label>
                    <input type="number" id="number_of_gold" name="number_of_gold">
                </div>
                <div class="input-group">
                    <label for="number_of_silver">Number of Silver:</label>
                    <input type="number" id="number_of_silver" name="number_of_silver">
                </div>
                <div class="input-group">
                    <label for="gold">Gold:</label>
                    <input type="text" id="gold" name="gold">
                </div>
            </div>
        </div>

        <div class="error-message" id="errorDetailsMessage"></div>
        <button type="submit">Submit</button>
    </form>
</div>

<script src="{{ asset('js/details.js') }}"></script>

@endsection
