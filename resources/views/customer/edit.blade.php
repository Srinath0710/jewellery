@extends('layout')

@section('content')
    <h2>Edit Customer</h2>

    <form action="{{ route('customer.update', $customer->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="name" value="{{ $customer->name }}" required>
        <input type="text" name="contact_number" value="{{ $customer->contact_number }}">
        <input type="number" step="0.01" name="amount" value="{{ $customer->amount }}">
        <button type="submit">Update Customer</button>
    </form>
@endsection
