@extends('auth/layout/main')

@section('content')
<div class="wrapper vh-100">
  <div class="row align-items-center h-100">
    <form class="col-lg-3 col-md-4 col-10 mx-auto" action="{{'/login'}}" method="POST">
      @csrf
      <div class="text-center">
        <a class="navbar-brand mx-auto mt-2 flex-fill" href="/">
          <img src="/assets/images/logo.png" alt="" style="width: 200px;">
        </a>
        <h1 class="h6 mb-3">Login to access your account</h1>
      </div>
      @if(session('error'))
      <div class="alert alert-danger">
        <b>Opps!</b> {{session('error')}}
      </div>
      @endif
      <div class="form-group">
        <label for="username" class="sr-only">Username</label>
        <input type="text" id="username" name="username" class="form-control form-control-lg" placeholder="Username"
          required autofocus>
        @error('username')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-group">
        <label for="password" class="sr-only">Password</label>
        <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="Password"
          required>
      </div>
      <div class="form-group">
        <div class="custom-control custom-checkbox col-md-6 mb-3">
          <input type="checkbox" class="custom-control-input" name="remember_me" id="remember_me">
          <label class="custom-control-label" for="remember_me"> Stay log in me</label>
        </div>
      </div>
      <button class="btn btn-lg btn-primary btn-block mb-2" type="submit">Login</button>
      <div class="text-center">
        <p class="mt-3 mb-3">Don't have an account? <a href="{{ '/register' }}">Create one</a></p>
      </div>
      <p class="mt-5 mb-3 text-muted text-center">Copyright &copy <script>
        document.write(new Date().getFullYear())
        </script>
      </p>
    </form>
  </div>
</div>
@endsection

@section('script')
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
<script>
window.dataLayer = window.dataLayer || [];

function gtag() {
  dataLayer.push(arguments);
}
gtag('js', new Date());
gtag('config', 'UA-56159088-1');
</script>
@endsection