@extends('layouts.app')
@section('content')
<h1>Edit {{ $company->name_company }}'s company</h1>
<hr>
<form action="/company/{{ $company->id }}" method="POST">
    @method('PATCH')
    @include('companies.includeCompany.formEditCompany')
    <button type="submit" class="btn btn-outline-info my-3">Update company</button>
</form>
@endsection