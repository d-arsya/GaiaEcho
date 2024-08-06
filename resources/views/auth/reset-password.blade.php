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
      <a href="/register" class="bg-mainGreen h-min w-20 justify-center py-px text-sm rounded-lg flex font-thin text-white items-center">Daftar</a>
      <a href="" class="">Privacy Policy</a>
    </div>
    <img src="{{ asset("assets/logo.png") }}" class="w-28" alt="">
</header>
<main class="absolute z-10 top-10 left-0 w-full h-full justify-center">
    <div class="">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto h-screen lg:py-0">
            <div class="w-full bg-white rounded-2xl max-w-md">
                <div class="p-10">
                    <h1 class="text-sm text-gray-500 font-semibold leading-tight tracking-tight">
                        Selamat datang kembali,
                    </h1>
                    <h1 class="text-4xl font-bold leading-tight tracking-tight text-gray-900">
                        Ubah sandi anda
                    </h1>
                    @error('failed')
                    <div class="p-2 bg-red-300 rounded-lg w-full text-sm text-red-100 mt-3 italic">{{ $message }}</div>
                    @enderror
                    @error('password')
                    <div class="p-2 bg-red-300 rounded-lg w-full text-sm text-red-100 mt-3 italic">{{ $message }}</div>
                    @enderror
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div>
                            <label for="email" class="mt-6 ml-4 block mb-1 text-sm font-medium text-gray-900">Email</label>
                            <input value="{{ old('email') }}" type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-primary-600 focus:border-primary-600 block w-full py-2.5 px-4" placeholder="Masukkan email anda" required="">
                        </div>
                        <div>
                            <label for="password" class="mt-6 ml-4 block mb-1 text-sm font-medium text-gray-900">Kata Sandi Baru</label>
                            <input type="password" name="password" id="password" placeholder="Masukkan kata sandi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-primary-600 focus:border-primary-600 block w-full py-2.5 px-4" required="">
                        </div>
                        <div>
                            <label for="password" class="mt-6 ml-4 block mb-1 text-sm font-medium text-gray-900">Konfirmasi Sandi</label>
                            <input type="password" name="password_confirmation" id="password" placeholder="Konfirmasi kata sandi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-primary-600 focus:border-primary-600 block w-full py-2.5 px-4" required="">
                        </div>
                        <a href="/login" class="text-end font-bold text-xs hover:underline mt-1 text-mainGreen float-end">Sudah ingat?</a>
                        <button type="submit" class="mt-6 w-full text-white bg-mainGreen font-bold rounded-full text-lg px-5 py-2 text-center">Ubah</button>
                        <p class="mt-6 text-sm text-center font-light text-gray-500">
                            Belum mempunyai akun? <a href="/register" class="font-medium text-mainGreen hover:underline">Buat sekarang</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </main>
  <div class="absolute top-10 left-0 h-full w-full flex items-center justify-around">
    <img src="{{ asset("assets/kiri.png") }}" class="w-1/3" alt="">
    <img src="{{ asset("assets/kanan.png") }}" class="w-1/3" alt="">
  </div>
</body>
</html>
