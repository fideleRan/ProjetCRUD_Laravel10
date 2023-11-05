@extends('layouts.app')
@section('content')
<h1>Create a new Customer</h1>
<hr>
<form action="/customer" method="POST" enctype="multipart/form-data">
    @include('customers.includeCustomer.formCreate')
    <button type="submit" class="btn btn-info my-3">Add customer</button>
</form>
@endsection