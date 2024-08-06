<div class="mt-4 flex flex-row mb-1 rounded-lg">
    <img src="{{ $user->avatar == null ? asset('assets/default_avatar.png') : Storage::url($user->avatar) }}" alt=""
        class="w-12 rounded-full">
    <div class="ms-3 w-2/3">
        <a href="/profile/{{ $user->username }}" class="text-md font-bold text-black">
            {{ substr($user->name, 0, 25) }}
        </a>
        @if (!$user->followed_by()&&$user->username!=auth()->user()->username)
        <h2 class="text-xs text-gray-300">Disarankan untuk anda</h2>            
        @else
        <h2 class="text-xs text-gray-300">Terhubung</h2>            
        @endif
    </div>
    <div class="flex items-center float-end">
        @if ($user->username!=auth()->user()->username)
            
        @if ($user->followed_by())
        <form action="/unfollow" method="post">
            @csrf
            <input type="number" name="user" class="hidden" value="{{ $user->id }}">
            <input type="submit" value="Batal Ikuti"
                class="text-bold text-mainGreen py-1 px-2 rounded-lg hover:bg-mainGreen hover:text-white"></input>
        </form>
        @else
        <form action="/follow" method="post">
            @csrf
            <input type="number" name="user" class="hidden" value="{{ $user->id }}">
            <input type="submit" value="Ikuti"
                class="text-bold text-mainGreen py-1 px-2 rounded-lg hover:bg-mainGreen hover:text-white"></input>
        </form>
        @endif
        @endif
    </div>
</div>