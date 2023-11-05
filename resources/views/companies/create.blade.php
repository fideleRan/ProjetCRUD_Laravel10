@extends('layouts.app')
@section('content')
    <h1>Add a new Company</h1>
    <hr>
    <form action="/company" method="POST" enctype="multipart/form-data">
        @include('companies.includeCompany.formCreateComany')
        <button type="submit" class="btn btn-info">Add company</button>
    </form>
@endsection