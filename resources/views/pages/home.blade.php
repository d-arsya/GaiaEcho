@extends('layouts.main')
@section('container')
    <div class="flex flex-col space-y-4">
        @auth
        <div class="p-4 bg-white w-full rounded-lg">
            <h1 class="font-bold text-lg">Kabarkan</h1>
            <div class="my-3 w-full h-px bg-black"></div>
            <div class="flex flex-row items-center">
                <div class="flex justify-center items-center overflow-hidden w-10 h-10 rounded-full">
                    <img src="{{ auth()->user()->avatar == null ? asset('assets/default_avatar.png') : auth()->user()->avatar }}"
                        class="w-full h-full" alt="">
                </div>
                <div class="relative ml-4 w-full inline">
                    <img src="{{ asset('assets/photos.svg') }}" class="absolute right-4 top-3 w-4 h-4 text-gray-500"
                        alt="">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                    <input type="text" onclick="openPost()"
                        class="w-full block p-2 ps-5 pe-10 text-md text-gray-900 rounded-full bg-gray-100"
                        placeholder="Apa yang sedang terjadi?">
                    </input>

                </div>
            </div>
        </div>

        @endauth
        @foreach ($posts as $post)
            <x-post :post='$post'></x-post>
        @endforeach
        {{ $posts->links() }}
    </div>
@endsection
@auth
<div id="postPopup" class="hidden z-50 bg-gray-900 bg-opacity-75 inset-0 fixed flex items-center justify-center">
    <div class="p-3 w-11/12 md:w-5/12 bg-white rounded-lg shadow shadow-lg">
        <div class="flex justify-between">
            <img id="closePostButton" src="{{ asset('assets/back.svg') }}" class="w-6" alt="">
            <span onclick="draft()" class="text-mainGreen cursor-pointer hover:underline">
                <img src="{{ asset('assets/pencil.svg') }}" class="w-5 inline" alt="">
                Draft
            </span>
        </div>
        <div class="mt-3 flex flex-row items-center">
            <div class="w-10 h-10 flex justify-center items-center overflow-hidden rounded-full">
                <img src="{{ auth()->user()->avatar == null ? asset('assets/default_avatar.png') : auth()->user()->avatar }}" class="w-full h-full">
            </div>
            <div class="ml-3">
                <h1 class="font-bold text-md">{{ auth()->user()->name }}</h1>
                <h1 class="font-thin text-gray-500 text-sm"><span>@</span>{{ auth()->user()->username }}</h1>
            </div>
        </div>
        <form action="/post" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mt-3 w-full">
                <textarea autofocus class="bg-white p-3 w-full h-auto focus:outline-none focus:ring-none" id="autoResizeTextarea"
                rows="1" type="text" name="text" placeholder="Apa yang sedang terjadi?" id=""></textarea>
            </div>
            <div class="hidden mt-3 w-full max-h-72 rounded-lg overflow-hidden flex justify-center items-center">
                <img id="thumbnail" src="" class="w-full" alt="">
            </div>
            <div class="mt-3 h-px bg-gray-300 w-full"></div>
            <div class="mt-3 flex flex-row justify-between">
                <label for="imgInput">
                    <img src="{{ asset('assets/photos.svg') }}" class="w-5" alt="">
            </label>
            <input type="file" name="image" id="imgInput" class="hidden">
            <input type="submit" value="Posting"
            class="hover:bg-mainGreen hover:text-white px-4 text-mainGreen py-px rounded-full outline outline-1 outline-mainGreen">
        </div>
    </form>
    </div>
</div>

@endauth
<script>
    const textarea = document.getElementById("autoResizeTextarea");
    const postPopup = document.getElementById("postPopup");
    const closePostButton = document.getElementById("closePostButton");
    const imgInput = document.getElementById("imgInput");

    textarea.addEventListener("input", function() {
        this.style.height = "auto";
        this.style.height = this.scrollHeight + "px";
    });
    window.addEventListener("load", function() {
        textarea.style.height = "auto";
        textarea.style.height = textarea.scrollHeight + "px";
    });
    closePostButton.addEventListener("click", function() {
        postPopup.classList.add("hidden");
        textarea.value = "";
        imgInput.files = new DataTransfer().files;
        thumbnail.src = "";
        thumbnail.parentElement.classList.add("hidden");
    });

    function openPost() {
        postPopup.classList.remove("hidden");
        textarea.focus();
    };
    imgInput.addEventListener("change", function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const thumbnail = document.getElementById("thumbnail");
                thumbnail.src = e.target.result;
                thumbnail.parentElement.classList.remove("hidden");
            };
            reader.readAsDataURL(file);
        }
    });
</script>
