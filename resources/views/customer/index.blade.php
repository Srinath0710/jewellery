@extends('layout')

@section('content')
<a href="{{ route('customer.create') }}">Add New Customer</a>

    <h2>Customer List</h2>
    @foreach($customers as $customer)
        <div>
            <h3>{{ $customer->name }}</h3>
            <p>{{ $customer->contact_number }}</p>
            <a href="{{ route('customer.edit', $customer->id) }}">Edit</a>
            <form action="{{ route('customer.destroy', $customer->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </div> 
    @endforeach
@endsection
 