<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GaiaEcho</title>
  @vite('resources/css/app.css')
  
</head>
<body class="bg-grey-1
@if($active=='management')
{{ 'overflow-y-hidden' }}
@endif
">
  
  
@include('partials.header')
@include('partials.leftbar')


@if ($active=='management')
<div class="ml-56 mt-16 pt-3 h-screen pb-22">
  @yield('container')
</div>
@else 
<div class="ml-56 mr-96 mt-16 p-4 pr-8 pt-8">
  @yield('container')
</div>
@endif
@include('partials.rightbar')
</body>
</html>