@extends('layouts.app')
@section('content')
    <h3>Information about {{ $customer->name_cust }}</h3>
    <hr>
    @can('create', 'App\\Models\Customer')
        <a href="{{ route('customer.edit', ['customer'=> $customer->id ]) }}" class="btn btn-outline-info my-3"> Edit </a>
    @endcan
    
    <form action="/customer/{{ $customer->id }}" method="POST" style="display: inline">
        @method('delete')
        @csrf
        @can('create', 'App\\Models\Customer')
            <button type="submit" class="btn btn-outline-danger">Delete</button>
        @endcan
    </form>
    <p><strong>Email :</strong>{{ $customer->email }}</p>
    <p><strong>Age :</strong>{{ $customer->age }} Ans</p>
    <p><strong>status :</strong>{{ $customer->status }}</p>
    <p><strong>Company :</strong>{{ $customer->company->name_company }}</p>
    <img src="{{ asset('storage/'.$customer->profile_customer) }}" class="rounded float-start" alt="Profile {{ $customer->name_cust }}" width="200px">
@endsection