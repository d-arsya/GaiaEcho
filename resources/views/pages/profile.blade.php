@extends('layouts.main')
@section('container')
    <div class="w-full overflow-hidden rounded-lg bg-white">
        <div class="relative w-full">
            <div class="w-full h-72 flex justify-center items-center">
                <img src="https://picsum.photos/400/300" class="w-full h-full" alt="">
            </div>
            <div class="w-60 h-60 mt-[-8rem] m-auto flex justify-center items-center rounded-full overflow-hidden">
                <img src="{{ $profile->avatar == '' ? asset('assets/default_avatar.png') : Storage::url($profile->avatar) }}"
                    class="border-white border-8 rounded-full w-full h-full" alt="">
            </div>

        </div>
        <h1 class="mt-4 text-3xl font-bold text-center">{{ $profile->name }}</h1>
        <h1 class="mt-2 text-lg text-gray-400 text-center"><span>@</span>{{ $profile->username }}</h1>
        <div class="flex justify-evenly flex-row w-full px-48 my-3">
            <div class="flex flex-row gap-2">
                <h1 class="text-black font-semibold text-xl">{{ $profile->posts->count() }}</h1>
                <a href="/profile/{{ $profile->username }}" class="text-gray-400 text-lg font-semibold">Postingan</a>
            </div>
            <div class="flex flex-row gap-2">
                <h1 class="text-black font-semibold text-xl">{{ $profile->followers->count() }}</h1>
                <a href="/profile/{{ $profile->username }}/followers"
                    class="text-gray-400 text-lg font-semibold">Pengikut</a>
            </div>
            <div class="flex flex-row gap-2">
                <h1 class="text-black font-semibold text-xl">{{ $profile->followings->count() }}</h1>
                <a href="/profile/{{ $profile->username }}/followings"
                    class="text-gray-400 text-lg font-semibold">Mengikuti</a>
            </div>
        </div>
        @if ($profile->username == auth()->user()->username)
            <div class="bg-gray-300 text-center w-96 m-auto rounded-lg py-2 font-semibold text-lg">
                <img src="{{ asset('assets/settings.svg') }}" class="w-6 mr-4 inline" alt="">
                Edit profil
            </div>
        @else
            @if ($profile->followed_by())
                <form action="/unfollow" method="post">
                    @csrf
                    <input type="number" name="user" class="hidden" value="{{ $profile->id }}">
                    <input id="tblUnfollow" type="submit" value="Ikuti"
                        class="hidden text-bold text-mainGreen py-1 px-2 rounded-lg hover:bg-mainGreen hover:text-white"></input>
                </form>
                <label for="tblUnfollow">
                    <div class=" text-white bg-mainGreen text-center w-96 m-auto rounded-lg py-2 font-semibold text-lg">
                        <img src="{{ asset('assets/follow.svg') }}" class="w-6 mr-4 inline" alt="">
                        Batal ikuti
                    </div>
                </label>
            @else
                <form action="/follow" method="post">
                    @csrf
                    <input type="number" name="user" class="hidden" value="{{ $profile->id }}">
                    <input id="tblFollow" type="submit" value="Ikuti"
                        class="hidden text-bold text-mainGreen py-1 px-2 rounded-lg hover:bg-mainGreen hover:text-white"></input>
                </form>
                <label for="tblFollow">
                    <div class="bg-mainGreen text-white text-center w-96 m-auto rounded-lg py-2 font-semibold text-lg">
                        <img src="{{ asset('assets/follow.svg') }}" class="w-6 mr-4 inline" alt="">
                        Ikuti
                    </div>
                </label>
            @endif
        @endif
        <div class="flex flex-row w-full mt-5">
            <a href="/profile/{{ $profile->username }}" class="font-semibold w-1/2 text-center">
                Postingan
                <div class="{{ $view != 'posts' ? 'hidden' : '' }} w-full h-1 bg-mainGreen"></div>
            </a>
            <a href="/profile/{{ $profile->username }}/bookmarks" class="font-semibold w-1/2 text-center">
                Bookmarks
                <div class="{{ $view != 'bookmarks' ? 'hidden' : '' }} w-full h-1 bg-mainGreen"></div>
            </a>
        </div>
    </div>
    <div class="mt-5 w-full">
        @if ($view == 'posts')
            @foreach ($profile->posts->reverse() as $post)
                <x-post :post='$post'></x-post>
            @endforeach
        @elseif($view == 'bookmarks')
            @foreach ($profile->bookmarks->reverse() as $post)
                @php
                    $post = $post->post;
                @endphp
                <x-post :post='$post'></x-post>
            @endforeach
        @elseif($view == 'followings')
        <div class="bg-white py-3 px-12 rounded-lg grid grid-cols-2 gap-x-10">
            @foreach ($profile->followings as $user)
                @php
                    $user = $user->target()->get()->first();
                    if($user->username==$profile->username)$user=auth()->user();
                    @endphp
                <x-user :data='$user'></x-user>
                @endforeach
                
            </div>
            @elseif($view == 'followers')
        <div class="bg-white p-3 rounded-lg">
            @foreach ($profile->followers as $user)
                @php
                    $user = $user->target()->get()->first();
                if($user->username==$profile->username)$user=auth()->user();
                @endphp
                <x-user :data='$user'></x-user>
            @endforeach

        </div>
        @endif

    </div>
@endsection
