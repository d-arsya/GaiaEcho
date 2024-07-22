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
      <a href="/login" class="bg-mainGreen h-min w-20 justify-center py-px text-sm rounded-lg flex font-thin text-white-1 items-center">Login</a>
      <a href="" class="font-semibold">Privacy Policy</a>
    </div>
    <img src="{{ asset('assets/logo.png') }}" class="w-28" alt="">
  </header>
  <main class="absolute z-20 top-10 left-0 w-full h-full justify-center">
    <div class="">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto h-screen lg:py-0">
            <div class="w-full bg-white rounded-2xl max-w-md">
                <div class="p-10 space-y-3">
                    <h1 class="text-sm text-gray-500 font-semibold leading-tight tracking-tight">
                        Configure your account
                    </h1>
                    <h1 class="text-4xl font-bold leading-tight tracking-tight text-gray-900">
                        Setup
                    </h1>
                    <form class="space-y-4" action="/setup" method="post" enctype="multipart/form-data">
                        @csrf 
                        <div class="m-auto flex w-24 h-24 rounded-full overflow-hidden font-bold text-center justify-center items-center bg-gray-200">
                          <label for="imgInput" class="h-full w-full">
                            <img id="thumbnail" src="{{ asset('assets/default_avatar.png') }}" class="w-full h-full" alt="">
                          </label>
                        </div>
                        <input type="file" name="image" accept="image/png, image/jpeg, image/jpg" id="imgInput" class="hidden">
                        <div>
                            <label for="name" class="mt-6 ml-4 block mb-1 text-sm font-medium text-gray-900">Name</label>
                            <input type="text" value="{{ old('name') }}" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-primary-600 focus:border-primary-600 block w-full py-2.5 px-4 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Set your name" required="">
                        </div>
                        <div class="relative">
                            <label for="email" class="ml-4 block mb-1 text-sm font-medium text-gray-900">Username</label>
                            <span class="absolute left-4 top-8 text-gray-300">@</span>
                            <input type="text" value="" name="username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-primary-600 focus:border-primary-600 block w-full py-2.5 pl-10 pr-4 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Set your username" required="">
                            @error('username')
                            <p class="text-xs text-red-500 italic ml-4 mt-1">{{ $message }}</p>
                                
                            @enderror
                          </div>
                        <input type="submit" value="Next" class="w-full text-white-1 bg-mainGreen font-bold rounded-full text-sm px-5 py-2.5 text-center">
                        
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
  <script>
    const imgInput = document.getElementById('imgInput')
    const thumbnail = document.getElementById('thumbnail')
    imgInput.addEventListener("change", function(event) {
        const file = event.target.files[0];
        if(file.size>580000){
          imgInput.files = new DataTransfer().files
          return alert("Max 0.5 MB")
        }else if(!['image/jpg','image/jpeg','image/png'].includes(file.type)){
          imgInput.files = new DataTransfer().files
          return alert("Jenis file tidak didukung")
        }
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const thumbnail = document.getElementById("thumbnail");
                thumbnail.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });
  </script>
</body>
</html>
