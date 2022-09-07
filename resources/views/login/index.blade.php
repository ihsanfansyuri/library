@extends('layouts.main')

@section('container')

  <div class="col-md-5">
    <form action="{{ route('login.auth') }}" method="POST"> 
      @csrf
      <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control @error('email')
          is-invalid
        @enderror" id="email" name="email" autofocus>
        @error('email')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control @error('password')
          is-invalid
        @enderror" id="password" name="password">
        @error('password')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <button type="submit" class="btn btn-primary">Login</button>
    </form>
  </div>

  <div class="col-md-5 mt-2">
    <p>Don't have an account?<a href="/register"> Register Now!</a></p>
  </div>

@endsection