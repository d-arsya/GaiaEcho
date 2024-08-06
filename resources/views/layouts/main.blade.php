<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GaiaEcho</title>
  @vite('resources/css/app.css')
</head>
<body class="bg-grey-1 md:p-0 pb-24">


    @include('partials.header')
    @include('partials.leftbar')

    <div class="md:ml-56 md:mr-96 mt-16 p-4 pr-8 pt-8">
        @yield('container')
    </div>
    @include('partials.rightbar')
    @stack('scripts')

</body>
</html>
