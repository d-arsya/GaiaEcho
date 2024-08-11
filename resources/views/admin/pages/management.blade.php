@extends('admin.layouts.main')
@section('container')
<div class="p-2 rounded-md w-min my-3 cursor-pointer bg-mainGreen text-white" onclick="openPost()">Tambah</div>
<div class="w-full grid grid-cols-4 gap-4">
    @foreach ($wastes as $waste)
    <div class="bg-white rounded-md p-3">
        <h1>{{$waste->name}}</h1>
    </div>
    @endforeach
</div>
@endsection
<div id="postPopup" class="hidden z-50 bg-gray-900 bg-opacity-75 inset-0 fixed flex items-center justify-center">
    <div class="p-3 w-11/12 md:w-5/12 bg-white rounded-lg shadow shadow-lg">
        <div class="flex justify-between">
            <img id="closePostButton" src="{{ asset('assets/back.svg') }}" class="w-6" alt="">
            <span onclick="draft()" class="text-mainGreen cursor-pointer hover:underline">
                <img src="{{ asset('assets/pencil.svg') }}" class="w-5 inline" alt="">
                Draft
            </span>
        </div>
        <form action="/wastes" method="POST">
            @csrf
            <div class="mt-3 w-full">
                <input type="text" autofocus class="bg-gray-300 p-2 rounded-md w-full h-auto focus:outline-none focus:ring-none"
                 name="text" placeholder="Email Pengelola">
            </div>
            <div class="mt-3 w-full">
                <input type="text" autofocus class="bg-gray-300 p-2 rounded-md w-full h-auto focus:outline-none focus:ring-none"
                 name="text" placeholder="Nama Tempat">
            </div>
            <div class="mt-3 w-full">
                <input type="text" autofocus class="bg-gray-300 p-2 rounded-md w-full h-auto focus:outline-none focus:ring-none"
                 name="text" placeholder="Link maps">
            </div>
            <div class="mt-3 w-full">
                <input type="text" autofocus class="bg-gray-300 p-2 rounded-md w-full h-auto focus:outline-none focus:ring-none"
                 name="text" placeholder="Latidtude">
            </div>
            <div class="mt-3 w-full">
                <input type="text" autofocus class="bg-gray-300 p-2 rounded-md w-full h-auto focus:outline-none focus:ring-none"
                 name="text" placeholder="Longitude">
            </div>
            <div class="hidden mt-3 w-full max-h-72 rounded-lg overflow-hidden flex justify-center items-center">
                <img id="thumbnail" src="" class="w-full" alt="">
            </div>
            <input type="submit" value="Tambah"
            class="mt-3 hover:bg-mainGreen hover:text-white px-4 text-mainGreen py-px rounded-full outline outline-1 outline-mainGreen">
        </div>
    </form>
    </div>
</div>

<script>
    const postPopup = document.getElementById("postPopup");
    const closePostButton = document.getElementById("closePostButton");

    window.addEventListener("load", function() {
        textarea.style.height = "auto";
        textarea.style.height = textarea.scrollHeight + "px";
    });
    closePostButton.addEventListener("click", function() {
        postPopup.classList.add("hidden");
    });
    
    function draft() {
        postPopup.classList.add("hidden");
    };
    function openPost() {
        postPopup.classList.remove("hidden");
    };
</script>

