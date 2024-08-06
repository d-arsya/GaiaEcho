<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GaiaEcho</title>
  @vite('resources/css/app.css')
</head>
<body class="bg-grey-1">
    

@include('admin.partials.header')
@include('admin.partials.leftbar')



<div class="md:ml-56 mt-16 md:mb-0 mb-36 p-4 pt-8">
   @yield('container')
</div>



</body>
</html>