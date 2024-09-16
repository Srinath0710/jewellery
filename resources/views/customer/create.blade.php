@extends('layout')

@section('content')
    <h2>Add Customer</h2>

    <form action="{{ route('customer.store') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Customer Name" required>
        <input type="text" name="contact_number" placeholder="Contact Number">
        <input type="number" step="0.01" name="amount" placeholder="Amount">
        <button type="submit">Add Customer</button>
    </form>
@endsection
