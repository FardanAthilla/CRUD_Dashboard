@extends('layouts.main')

@section('content')
<section class="vh-100">
  <div class="container py-5 h-100">
    <div class="row d-flex align-items-center justify-content-center h-100">
      <div class="col-md-8 col-lg-7 col-xl-6">
        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
          class="img-fluid" alt="Phone image">
      </div>
      <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
        <form action="/login" method="POST">
          @csrf
          <!-- Email input -->
          <div class="form-outline mb-4">
            <label class="form-label" name="email" for="email">Email address</label>
            <input type="email" name="email"  id="email" class="form-control form-control-lg" />
          </div>

          <!-- Password input -->
          <div class="form-outline mb-4">
            <label class="form-label" name="password" for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control form-control-lg" />
          </div>

          

          <!-- Submit button -->
          <button type="submit" class="btn btn-primary btn-lg btn-block" style="width: 100%;">Sign in</button>
          
          <div class="d-flex justify-content-center pt-4">
            <p class="text-center">Don't have an account? <a href="/register" class="link-info">Register here</a></p>
        </div>
      
        @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

        @if(session()->has('loginError'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('loginError') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
        @endif

        </form>
      </div>
    </div>
  </div>
</section>

@endsection
