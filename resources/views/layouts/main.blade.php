<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MyBlog | My Awesome Blog</title>

    <link href='https://fonts.googleapis.com/css?family=Raleway:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
    @yield('stylesheets')
</head>
<body>
  @include('layouts.partials.header')

  @yield('content')

  @include('layouts.partials.footer')


  <script src="{{asset('js/bootstrap.min.js')}}"></script>
  @yield('scripts')
</body>
</html>
