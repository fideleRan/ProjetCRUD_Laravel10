@extends('layouts.app')
@section('content')
<h1>Edit {{ $customer->name_cust }}'s profil</h1>
<form action="/customer/{{ $customer->id }}" method="POST" enctype="multipart/form-data">
    @method('PATCH')
    @include('customers.includeCustomer.formEdit')
    <button type="submit" class="btn btn-info">Update customer</button>
</form>
@endsection