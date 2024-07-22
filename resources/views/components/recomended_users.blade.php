<a class="float-end text-md font-bold text-gray-400" href="">See all</a>
<h1 class="text-lg font-bold text-gray-300">Connect with other users</h1>
@foreach (auth()->user()->recomendations() as $recom)
    <div class="mt-4 flex flex-row mb-1 rounded-lg">
        <img src="{{ $recom->avatar == null ? asset('assets/default_avatar.png') : $recom->avatar }}" alt=""
            class="w-12 rounded-full">
        <div class="ms-3 w-2/3">
            <h1 class="text-md font-bold text-black">
                {{ substr($recom->name, 0, 25) }}
            </h1>
            <h2 class="text-xs text-gray-300">Suggested for you</h2>
        </div>
        <div class="flex items-center float-end">
            <form action="/follow" method="post">
                @csrf
                <input type="number" name="user" class="hidden" value="{{ $recom->id }}">
                <input type="submit" value="Follow"
                    class="text-bold text-mainGreen py-1 px-2 rounded-lg hover:bg-mainGreen hover:text-white"></input>
            </form>
        </div>
    </div>
@endforeach
