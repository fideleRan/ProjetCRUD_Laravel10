@extends('layouts.app')
@section('content')
    <h1>Contact us</h1>
    <hr>
    <form action="/contact" method="POST">
        @csrf
        @guest
            <div class="form-goup">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                    id="floatingInput" placeholder="Name" name="name" value="{{ old('name')}}"  >
                    <label for="floatingInput">Name</label>
                    @error('name')
                        <div class="invalid-feedback">{{ $errors -> first('name') }}</div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" 
                    id="floatingInput" placeholder="name@example.com" name="email" value="{{ old('email')}}" >
                    <label for="floatingInput">Email</label>
                    @error('email')
                        <div class="invalid-feedback">{{ $errors -> first('email') }}</div>
                    @enderror
                </div> 
                <div class="form-floating">
                    <textarea class="form-control @error('comment') is-invalid @enderror" placeholder="Leave a comment here" 
                    id="floatingTextarea" style="height: 120px;" name="comment">{{ old('comment') }}</textarea>
                    <label for="floatingTextarea">Comments</label>
                    @error('comment')
                        <div class="invalid-feedback">{{ $errors->first('comment') }}</div>
                    @enderror
                </div>
            </div>
        @else
            <div class="form-goup">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                    id="floatingInput" placeholder="Name" name="name" value="{{ old('name') ?? Auth::user()->name }}"  >
                    <label for="floatingInput">Name</label>
                    @error('name')
                        <div class="invalid-feedback">{{ $errors -> first('name') }}</div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" 
                    id="floatingInput" placeholder="name@example.com" name="email" value="{{ old('email') ?? Auth::user()->email }}" >
                    <label for="floatingInput">Email</label>
                    @error('email')
                        <div class="invalid-feedback">{{ $errors -> first('email') }}</div>
                    @enderror
                </div> 
                <div class="form-floating">
                    <textarea class="form-control @error('comment') is-invalid @enderror" placeholder="Leave a comment here" 
                    id="floatingTextarea" style="height: 120px;" name="comment">{{ old('comment') }}</textarea>
                    <label for="floatingTextarea">Comments</label>
                    @error('comment')
                        <div class="invalid-feedback">{{ $errors->first('comment') }}</div>
                    @enderror
                </div>
            </div>
        @endguest
        
        <button type="submit" class="btn btn-outline-success my-3" style="display: flex">Send Email</button>
    </form>
@endsection