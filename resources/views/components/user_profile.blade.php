@auth
            <div class="w-16 h-16 rounded-full flex justify-center items-center overflow-hidden">
                <img src="{{ auth()->user()->avatar == null ? asset('assets/default_avatar.png') : Storage::url(auth()->user()->avatar) }}"
                                alt="" class="w-full h-full">
                </div> 
            <a href="/profile/{{ auth()->user()->username }}" class="p-1 ms-3 w-2/3">
                <h1 class="text-lg font-bold text-black">{{ substr(auth()->user()->name, 0, 21) }}</h1>
                <h2 class="text=sm text-gray-300">{{ auth()->user()->username }}</h2>
            </a>
            <div class="flex items-center float-end">
                <a href="/logout"
                    class="text-bold text-mainGreen py-1 px-2 rounded-lg hover:bg-red-600 hover:text-white">Keluar</a>
            </div>
        @else
            <a href="/login" class="w-full py-3 text-center text-lg font-bold text-white rounded-lg bg-mainGreen">Masuk</a>
        @endauth