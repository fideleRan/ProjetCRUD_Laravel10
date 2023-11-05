@extends('layouts.app')
@section('content')
<h1>List of customers</h1>
@can('create', 'App\\Models\Customer')
  <a href="customer/create" class="btn btn-outline-info"> Create a new customer </a>
@endcan

<hr>
<table class="table">
    <thead>
      <tr>
        <th scope="col"></th>
        <th scope="col"></th>
        <th scope="col">Name</th>
        <th scope="col">Age</th>
        <th scope="col">Email</th>
        <th scope="col">Status</th>
        <th scope="col">Company</th>
        <th scope="col">Show</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($customers as $customer ) 
        <tr>
            <th scope="row">{{ $customer->id }}</th>
            <th><img src="{{ asset('storage/'.$customer->profile_customer) }}" class="rounded-circle float-start" alt="Profile {{ $customer->name_cust }}" width="50px"></th>
            <td>{{ $customer->name_cust }}</td>
            <td>{{ $customer->age }}</td>
            <td>{{ $customer->email }}</td>
            <td>{{ $customer->status }}</td>
            <td style="text-align: center; vertical-align: middle">{{ $customer->company->name_company }} 
              <img src="{{ asset('storage/'.$customer->company->image_company) }}" class="rounded-circle float-start" alt="Profile {{ $customer->company->name_company }}" width="50px">
            </td>
            <td><a href="/customer/{{ $customer->id }}" class="btn btn-outline-warning">SHOW</a> </td>
        </tr>
      @endforeach
    </tbody>
</table>
@endsection