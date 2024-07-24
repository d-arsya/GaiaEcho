<div class="mb-4 p-4 w-full bg-white rounded-lg">
    <div class="flex flex-row h-10 justify-between items-center">
        <span class="flex flex-row">
            <img src="{{ $post->user->avatar == null ? asset('assets/default_avatar.png') : Storage::url($post->user->avatar) }}"
                class="w-10 rounded-full mr-3" alt="">
            <span>
                <a href="/profile/{{ $post->user->username }}" class="font-bold">{{ $post->user->name }}</a>
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
            <p class="inline">{{ $post->comments->count() }} komentar</p>
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
                            </svg>{{ $post->likes->count() }} suka</p>
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
                            </svg>{{ $post->likes->count() }} suka</p>
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
                            </svg>{{ $post->likes->count() }} suka</p>
                    </button>
                </form>
        </span>
        @endauth

    </div>
</div>