<nav class="fixed top-0 z-50 bg-white w-full">
  <div class="flex bg-red justify-between py-4 px-8">
    <a href="/pengelola">
      <img src="{{ asset('assets/logo_horizontal.png') }}" class="w-48" alt="">
    </a>
    <div class="flex justify-between gap-3">
      <div class="text-sm font-bold">
        {{auth()->user()->waste()->name}}
        <br>
        <a href="/logout" class="font-medium text-gray-600">
          Logout
        </a>
      </div>
      <div class="w-10 h-10 flex justify-center items-center rounded-full bg-gray-200 overflow-hidden">
       <img class="w-full" src="{{ asset('assets/default_avatar.png') }}" class="w-6" alt="">
      </div>
    </div>
  </div>
</nav>