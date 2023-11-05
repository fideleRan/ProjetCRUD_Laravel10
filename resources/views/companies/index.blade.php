@extends('layouts.app')
@section('content')
    <h1>List of companies</h1>
    <a href="company/create" class="btn btn-outline-info"> Create a new company </a>
    <hr>
    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Created at</th>
            <th scope="col">Update at</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($companies as $company)
          <tr>
            <th scope="row"><img src="{{ asset('storage/'.$company->image_company) }}" class="rounded-circle float-start" alt="Profile {{ $company->name_company }}" width="50px"></th>
            <td><a href="/company/{{ $company->id }}">{{ $company->name_company }}</a></td>
            <td>{{ $company->created_at }}</td>
            <td>{{ $company->updated_at }}</td>
          </tr>
        @endforeach
        </tbody>
    </table>
@endsection