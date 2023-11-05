@extends('layouts.app')
@section('content')
<h3>Information about {{ $company->name_company }}</h3>
    <hr>
    <a href="/company/{{ $company->id }}/edit" class="btn btn-outline-info my-3"> Edit company </a>
    <form action="/company/{{ $company->id }}" method="POST" style="display: inline">
        @method('delete')
        @csrf
        <button type="submit" class="btn btn-outline-danger">Delete</button>
    </form>
    <p><strong>Name company :</strong>{{ $company->name_company }}</p>
    <p><strong>Created at :</strong>{{ $company->created_at }}</p>
    <p><strong>Update at :</strong>{{ $company->updated_at }}</p>
    <img src="{{ asset('storage/'.$company->image_company) }}" class="rounded float-start" alt="Profile {{ $company->name_company }}" width="500px">

@endsection