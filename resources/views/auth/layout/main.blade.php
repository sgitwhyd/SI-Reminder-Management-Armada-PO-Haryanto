<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="favicon.ico">
  <title>Authentification</title>
  <!-- Simple bar CSS -->
  <link rel="stylesheet" href="{{url('css/simplebar.css')}}">
  <!-- Fonts CSS -->
  <link
    href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">
  <!-- Icons CSS -->
  <link rel="stylesheet" href="{{url('css/feather.css')}}">
  <!-- App CSS -->
  <link rel="stylesheet" href="{{url('css/app-light.css')}}" id="lightTheme" disabled>
  <link rel="stylesheet" href="{{url('css/app-dark.css')}}" id="darkTheme">
</head>
<body class="dark" style="overflow-x: hidden;">
  @yield('content')
  <script src="{{url('js/jquery.min.js')}}"></script>
  <script src="{{url('js/popper.min.js')}}"></script>
  <script src="{{url('js/moment.min.js')}}"></script>
  <script src="{{url('js/bootstrap.min.js')}}"></script>
  <script src="{{url('js/simplebar.min.js')}}"></script>
  <script src='{{url('js/jquery.stickOnScroll.js')}}'></script>
  <script src='{{url('js/jquery.validate.min.js')}}'></script>
  <script src="{{url('js/tinycolor-min.js')}}"></script>
  <script src="{{url('js/config.js')}}"></script>
  <script src="{{url('js/apps.js')}}"></script>
  @yield('script')
</body>
</html>
</body>
</html>