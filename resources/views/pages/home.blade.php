@extends('layouts.main')
@section('container')
    <div class="flex flex-col space-y-4">
        @auth
        <div class="p-4 bg-white w-full rounded-lg">
            <h1 class="font-bold text-lg">Post something</h1>
            <div class="my-3 w-full h-px bg-black"></div>
            <div class="flex flex-row items-center">
                <img src="{{ auth()->user()->avatar == null ? asset('assets/default_avatar.png') : auth()->user()->avatar }}"
                    class="w-10 rounded-full" alt="">
                <div class="relative ml-4 w-full inline">
                    <img src="{{ asset('assets/photos.svg') }}" class="absolute right-4 top-3 w-4 h-4 text-gray-500"
                        alt="">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                    <input type="text" onclick="openPost()"
                        class="w-full block p-2 ps-5 pe-10 text-md text-gray-900 rounded-full bg-gray-100"
                        placeholder="What's on your mind?">
                    </input>

                </div>
            </div>
        </div>
            
        @endauth
        @foreach ($posts as $post)
            <div class="mb-4 p-4 w-full bg-white rounded-lg">
                <div class="flex flex-row h-10 justify-between items-center">
                    <span class="flex flex-row">
                        <img src="{{ $post->user->avatar == null ? asset('assets/default_avatar.png') : $post->user->avatar }}"
                            class="w-10 rounded-full mr-3" alt="">
                        <span>
                            <h1 class="font-bold">{{ $post->user->name }}</h1>
                            <h1 class="text-xs font-thin text-grey-200">{{ $post->created_at->diffForHumans() }}</h1>
                        </span>
                    </span>
                    @auth
                    <span class="">
                        @if ($post->bookmarked(auth()->user()->id))
                            <form action="/unbookmark" method="post">
                                @csrf
                                <input type="number" name="post" class="hidden" value="{{ $post->id }}">
                                <button type="submit" value="Follow" class=""><svg width="21" height="27"
                                        class="w-5" viewBox="0 0 21 27" fill="gray"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M10.894 21.3309L10.5001 21.162L10.1062 21.3309L1.29175 25.1085V3.29167C1.29175 2.78333 1.49368 2.29582 1.85313 1.93638C2.21257 1.57693 2.70008 1.375 3.20841 1.375H17.7917C18.3001 1.375 18.7876 1.57693 19.147 1.93638C19.5065 2.29582 19.7084 2.78334 19.7084 3.29167V25.1085L10.894 21.3309Z"
                                            stroke="#8C8A8A" stroke-width="2" />
                                    </svg></button>
                            </form>
                        @else
                            <form action="/bookmark" method="post">
                                @csrf
                                <input type="number" name="post" class="hidden" value="{{ $post->id }}">
                                <button type="submit" value="Follow" class=""><svg width="21" height="27"
                                        class="w-5" viewBox="0 0 21 27" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M10.894 21.3309L10.5001 21.162L10.1062 21.3309L1.29175 25.1085V3.29167C1.29175 2.78333 1.49368 2.29582 1.85313 1.93638C2.21257 1.57693 2.70008 1.375 3.20841 1.375H17.7917C18.3001 1.375 18.7876 1.57693 19.147 1.93638C19.5065 2.29582 19.7084 2.78334 19.7084 3.29167V25.1085L10.894 21.3309Z"
                                            stroke="#8C8A8A" stroke-width="2" />
                                    </svg></button>
                            </form>
                        @endif

                    </span>  
                    @else 
                    <form action="/bookmark" method="post">
                        @csrf
                        <input type="number" name="post" class="hidden" value="{{ $post->id }}">
                        <button type="submit" value="Follow" class=""><svg width="21" height="27"
                                class="w-5" viewBox="0 0 21 27" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M10.894 21.3309L10.5001 21.162L10.1062 21.3309L1.29175 25.1085V3.29167C1.29175 2.78333 1.49368 2.29582 1.85313 1.93638C2.21257 1.57693 2.70008 1.375 3.20841 1.375H17.7917C18.3001 1.375 18.7876 1.57693 19.147 1.93638C19.5065 2.29582 19.7084 2.78334 19.7084 3.29167V25.1085L10.894 21.3309Z"
                                    stroke="#8C8A8A" stroke-width="2" />
                            </svg></button>
                    </form>               
                    @endauth
                </div>
                <p class="mt-3 text-justify">{{ $post->text }}</p>
                @if ($post->image != null)
                    <div class="mt-5 w-full h-96 overflow-y-hidden flex items-center rounded-lg justify-center">
                        <img src="{{ asset($post->image) }}" class="w-full" alt="">
                    </div>
                @endif
                <div class="mt-5 flex flex-column">
                    <span class="mr-5">
                        <img src="{{ asset('assets/comment.svg') }}" class="w-6 inline" alt="">
                        <p class="inline">{{ $post->comments->count() }} comments</p>
                    </span>
                    @auth
                        
                    <span class="mr-5">
                        @if ($post->liked(auth()->user()->id))
                            <form action="/unlike" method="post">
                                @csrf
                                <input type="number" name="post" class="hidden" value="{{ $post->id }}">
                                <button type="submit" value="Follow" class="">
                                    <p class="inline"><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                            class="w-6 inline mr-2" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314" />
                                        </svg>{{ $post->likes->count() }} likes</p>
                                </button>
                            </form>
                        @else
                            <form action="/like" method="post">
                                @csrf
                                <input type="number" name="post" class="hidden" value="{{ $post->id }}">
                                <button type="submit" value="Follow" class="">
                                    <p class="inline"><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                            class="w-6 inline mr-2" viewBox="0 0 16 16">
                                            <path
                                                d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15" />
                                        </svg>{{ $post->likes->count() }} likes</p>
                                </button>
                            </form>
                        @endif
                    </span>
                    @else
                    <span class="mr-5">
                            <form action="/like" method="post">
                                @csrf
                                <input type="number" name="post" class="hidden" value="{{ $post->id }}">
                                <button type="submit" value="Follow" class="">
                                    <p class="inline"><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                            class="w-6 inline mr-2" viewBox="0 0 16 16">
                                            <path
                                                d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15" />
                                        </svg>{{ $post->likes->count() }} likes</p>
                                </button>
                            </form>
                    </span>
                    @endauth

                </div>
            </div>
        @endforeach
    </div>
@endsection
@auth
<div id="postPopup" class="hidden z-50 bg-gray-900 bg-opacity-75 inset-0 fixed flex items-center justify-center">
    <div class="p-3 w-5/12 bg-white rounded-lg shadow shadow-lg">
        <div class="flex justify-between">
            <img id="closePostButton" src="{{ asset('assets/back.svg') }}" class="w-6" alt="">
            <span class="text-mainGreen">
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
                rows="1" type="text" name="text" placeholder="What's on your mind" id=""></textarea>
            </div>
            <div class="hidden mt-3 w-full max-h-96 rounded-lg overflow-hidden flex justify-center items-center">
                <img id="thumbnail" src="" class="w-full" alt="">
            </div>
            <div class="mt-3 h-px bg-gray-300 w-full"></div>
            <div class="mt-3 flex flex-row justify-between">
                <label for="imgInput">
                    <img src="{{ asset('assets/photos.svg') }}" class="w-5" alt="">
            </label>
            <input type="file" name="image" id="imgInput" class="hidden">
            <input type="submit" value="Post"
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
