<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GaiaEcho</title>
  @vite('resources/css/app.css')
</head>
<body class="bg-slate-100 overflow-y-hidden">
  <header class="w-full py-5 px-5">
    <div class="float-end flex flex-row gap-4 items-center">
      <img src="{{ asset('assets/globe.png') }}" alt="" class="w-6">
      <a href="/login" class="bg-mainGreen h-min w-20 justify-center py-px text-sm rounded-lg flex font-thin text-white items-center">Masuk</a>
      <a href="" class="">Privacy Policy</a>
    </div>
    <img src="{{ asset('assets/logo.png') }}" class="w-28" alt="">
  </header>
  <main class="absolute z-20 top-10 left-0 w-full h-full justify-center">
    <div class="">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto h-screen lg:py-0">
            <div class="w-full bg-white rounded-2xl max-w-md">
                <div class="p-10 space-y-3">
                    <h1 class="text-sm text-gray-500 font-semibold leading-tight tracking-tight">
                        Buat akun anda,
                    </h1>
                    <h1 class="text-4xl font-bold leading-tight tracking-tight text-gray-900">
                        Daftar
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="/register" method="post">
                        @csrf 
                        <div>
                            <label for="email" class="ml-4 block mb-1 text-sm font-medium text-gray-900">Email</label>
                            <input value="{{ old('email') }}" type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-primary-600 focus:border-primary-600 block w-full py-2.5 px-4 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan email" required="">
                            @error('email')
                            <p class="ml-4 mt-1 text-xs text-red-500 italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="password" class="ml-4 block mb-1 text-sm font-medium text-gray-900">Kata sandi</label>
                            <input type="password" name="password" id="password" placeholder="Masukkan kata sandi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-primary-600 focus:border-primary-600 block w-full py-2.5 px-4 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                            @error('password')
                            <p class="ml-4 mt-1 text-xs text-red-500 italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <input type="submit" value="Daftar" class="w-full text-white bg-mainGreen font-bold rounded-full text-sm px-5 py-2.5 text-center">
                        <p class="text-sm text-center font-light text-gray-500 dark:text-gray-400">
                            Sudah mempunyai akun? <a href="/login" class="font-medium text-mainGreen hover:underline">Masuk</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </main>
  <div class="absolute top-10 left-0 h-full w-full flex items-center justify-around">
    <img src="{{ asset('assets/kiri.png') }}" class="w-1/3" alt="">
    <img src="{{ asset('assets/kanan.png') }}" class="w-1/3" alt="">
  </div>
</body>
</html>
