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
        <h1 class="mt-4 text-2xl font-bold text-center text-mainGreen"><img class="inline mr-3 w-10" src="{{ asset('assets/point.svg') }}" alt="">{{ $profile->point }} Poin</h1>
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
            <div onclick="openPopup()" class="bg-gray-300 text-center w-96 m-auto rounded-lg py-2 font-semibold text-lg">
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
                        if ($user->username == $profile->username) {
                            $user = auth()->user();
                        }
                    @endphp
                    <x-user :data='$user'></x-user>
                @endforeach

            </div>
        @elseif($view == 'followers')
            <div class="bg-white p-3 rounded-lg">
                @foreach ($profile->followers as $user)
                    @php
                        $user = $user->target()->get()->first();
                        if ($user->username == $profile->username) {
                            $user = auth()->user();
                        }
                    @endphp
                    <x-user :data='$user'></x-user>
                @endforeach

            </div>
        @endif

    </div>
@endsection
<div id="postPopup" class="hidden z-50 bg-gray-900 bg-opacity-75 inset-0 fixed flex items-center justify-center">
    <div class="w-5/12 bg-white rounded-lg shadow shadow-lg">
        <div class="flex p-2 gap-2 font-bold text-md">
            <img onclick="closePopup()" src="{{ asset('assets/back.svg') }}" class="w-6" alt="">
            Edit Profile
        </div>
        <div class="relative w-full">
            <div class="w-full h-24 flex justify-center items-center">
                <img src="https://picsum.photos/600/300" class="w-full h-full" alt="">
            </div>
            <label for="profilePhoto"
                class="cursor-pointer w-24 h-24 mt-[-2rem] m-auto flex justify-center items-center rounded-full overflow-hidden">
                <img id="thumbnail"
                    src="{{ $profile->avatar == '' ? asset('assets/default_avatar.png') : Storage::url($profile->avatar) }}"
                    class="border-white border-4 rounded-full w-full h-full" alt="">
            </label>

        </div>
        <div class="p-5">
            <form action="/profile/edit" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="" class="font-bold text-sm text-black">Nama</label>
                <input type="text" name="nama" value="{{ auth()->user()->name }}"
                    class="text-sm mb-5 w-full bg-gray-300 border border-px border-black focus:outline-none rounded-md py-1 px-3 mt-1"
                    id="">
                <label for="" class="font-bold text-sm text-black">Username</label>
                <input type="text" name="username" value="@ {{ auth()->user()->username }}"
                    class="text-sm mb-5 w-full bg-gray-300 border border-px border-black focus:outline-none rounded-md py-1 px-3 mt-1"
                    id="">
                <label for="" class="font-bold text-sm text-black">Email</label>
                <input type="file" name="image" id="profilePhoto" class="hidden">
                <input type="text" name="email" value="{{ auth()->user()->email }}"
                    class="text-sm w-full bg-gray-300 border border-px border-black focus:outline-none rounded-md py-1 px-3 mt-1"
                    id="">
                <input
                    class="border border-px border-mainGreen px-2 rounded-full text-sm text-mainGreen hover:bg-mainGreen hover:text-white font-medium mt-6 float-end mb-6"
                    type="submit" value="Ubah">
            </form>
        </div>
    </div>
</div>
<script>
    const profilePhoto = document.getElementById('profilePhoto')
    const postPopup = document.getElementById('postPopup')
    let befPhoto
    
    function openPopup() {
        befPhoto = thumbnail.src
        postPopup.classList.remove("hidden");
    };
    function closePopup() {
        postPopup.classList.add("hidden");
        profilePhoto.files = new DataTransfer().files;
        thumbnail.src = befPhoto;
    };
    profilePhoto.addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const thumbnail = document.getElementById("thumbnail");
                thumbnail.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    })
</script>
