@extends('layout.navbar')

@section('container')
<link href="css/login.css" rel="stylesheet" type="text/css">
<div class="containerlogin">
<div class="login">
    <h1 class="text-center">LOGIN</h1>
    <form action="/login" method="post" class="needs-validation">
        @csrf
        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        @if(session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('loginError') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        <div class="form-group was-validated">
            <label class="form-label" for="email">Email</label>
            <input class="form-control" type="email" id="email" name="email" value="{{ old('email') }}" autofocus required>
            @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group was-validated">
            <label class="form-label" for="password">Password</label>
            <input class="form-control" type="password" id="password" name="password" required>
            @error('pass')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group form-check">
            <input class="form-check-input" type="checkbox" id="check">
            <label class="form-check-label" for="check">Remember Me</label>
        </div>

        <input class="btn btn-success w-100 mb-2" type="submit" value="Login">
        <small>Belum memiliki akun ? <a href="/register">Register disini</a> </small>
    </form>
</div>
</div>
@endsection
