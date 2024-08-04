<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GaiaEcho</title>
  @vite('resources/css/app.css')
</head>
<body class="bg-slate-100 overflow-y-hidden">
  <header class="w-full py-5 px-5 z-50">
    <div class="float-end flex flex-row gap-4 items-center">
      <img src="{{ asset("assets/globe.png") }}" alt="" class="w-6">
      <a href="/" class="bg-mainGreen h-min w-20 justify-center py-px text-sm rounded-lg flex font-thin text-white items-center">Home</a>
      <a href="" class="">Privacy Policy</a>
    </div>
    <img src="{{ asset("assets/logo.png") }}" class="w-28" alt="">
  </header>
  <main class="absolute z-10 top-10 left-0 w-full h-full justify-center">
    <div class="">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto h-screen lg:py-0">
        </div>
    </div>
  </main>
  <div class="absolute top-10 left-0 h-full w-full flex items-center justify-around">
    <img src="{{ asset("assets/error.png") }}" class="w-full md:w-1/2" alt="">
  </div>
</body>
</html>
