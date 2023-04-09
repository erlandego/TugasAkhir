@extends('layout.navbar')

@section('container')

<section class="vh-100 bg-image"
  style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-3">
                <h2 class="text-center">Welcome !</h2>
                <form action="/register" method="post">
                    @csrf
                    <input type="text" placeholder="First Name" name="firstname" class="form-control mt-2 @error('firstname') is-invalid @enderror" value="{{ old('firstname') }}"/>
                    <input type="text" placeholder="Fam" name ="lastname" class="form-control mt-2 @error('lastname') is-invalid @enderror" value="{{ old('lastname') }}"/>
                    <input type="email" placeholder="Email" name="email" class="form-control mt-2 @error('email') is-invalid @enderror" value="{{ old('email') }}"/>
                    <input type="password" placeholder="Password" name="pass" class="form-control mt-2 @error('pass') is-invalid @enderror">
                    <input type="password" placeholder="Re-Type Password" name="repass" class="form-control mt-2 @error('repass') is-invalid @enderror">
                    <button type="submit" class="btn btn-primary mt-2 w-100" style="border-radius: 10px">Register</button>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
