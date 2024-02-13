@extends('auth/layout/main')

@section('content')
<div class="wrapper vh-100">
  <div class="row align-items-center h-100">
    <form class="col-lg-6 col-md-8 col-10 mx-auto" action="{{'/register'}}" method="post">
      @csrf
      <div class="text-center">
        <a class="navbar-brand mx-auto mt-2 flex-fill" href="#">
          <svg version="1.1" id="logo" class="navbar-brand-img brand-md" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120" xml:space="preserve">
            <g>
              <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
              <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
              <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
            </g>
          </svg>
        </a>
        <h2 class="my-3">Register</h2>
      </div>
      <div class="form-group">
        <label for="username">Username</label>
        <input type="username" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{old('username')}}" required>
        @error('password')
        <div class="invalid-feedback"> Username harus diisi.</div>
        @enderror
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{old('email')}}"required>
        @error('password')
        <div class="invalid-feedback"> Email tidak valid.</div>
        @enderror
      </div>
      <hr class="my-4">
      <div class="row mb-4">
        <div class="col-md-6">
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
            @error('password')
            <div class="invalid-feedback"> {{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for="confirm_password">Confirm Password</label>
            <input type="password" class="form-control @error('confirm_password') is-invalid @enderror" id="confirm_password" name="confirm_password">
            @error('confirm_password')
            <div class="invalid-feedback"> {{ $message }}</div>
            @enderror
          </div>
        </div>
        <div class="col-md-6">
          <p class="mb-2">Password requirements</p>
          <p class="small text-muted mb-2"> To create a new password, you have to meet all of the following requirements: </p>
          <ul class="small text-muted pl-4 mb-0">
            <li> Minimum 8 character </li>
            <li>At least one special character</li>
            <li>At least one number</li>
            <li>Can’t be the same as a previous password </li>
          </ul>
        </div>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign up</button>
      <div class="text-center">
        <p class="mt-3 mb-3">Already have an account? <a href="{{ '/login' }}">Sign in</a></p>
      </div>
      <p class="mt-5 mb-3 text-muted text-center">Copyright &copy <script>document.write(new Date().getFullYear())</script></p>
    </form>
  </div>
</div>
@endsection

@section('script')
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
    <script> 
    // (function () {
    //   'use strict';
    //   window.addEventListener('load', function () {
    //     // Fetch all the forms we want to apply custom Bootstrap validation styles to
    //     var forms = document.getElementsByClassName('needs-validation');
    //     // Loop over them and prevent submission
    //     var validation = Array.prototype.filter.call(forms, function (form) {
    //       form.addEventListener('submit', function (event) {
    //         if (form.checkValidity() === false) {
    //           event.preventDefault();
    //           event.stopPropagation();
    //         }
    //         form.classList.add('was-validated');
    //       }, false);
    //     });
    //   }, false);
    // })();

      window.dataLayer = window.dataLayer || [];

      function gtag()
      {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      gtag('config', 'UA-56159088-1');
    </script>
@endsection