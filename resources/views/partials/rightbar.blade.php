<aside id="default-sidebar" class="absolute top-24 right-4 z-40 w-96 rounded-lg" aria-label="Sidebar">
    <div class="p-4 flex flex-row mb-3 rounded-lg bg-white">
        <img src="{{ auth()->user()->avatar==null?asset('assets/default_avatar.png'):auth()->user()->avatar }}" alt="" class="w-16 rounded-full">
        <div class="p-1 ms-3 w-2/3">
            <h1 class="text-lg font-bold text-black">{{ substr(auth()->user()->name, 0, 21) }}</h1>
            <h2 class="text=sm text-gray-300">{{ auth()->user()->username }}</h2>
        </div>
        <div class="flex items-center float-end">
            <a href="/logout" class="text-bold text-mainGreen py-1 px-2 rounded-lg hover:bg-red-600 hover:text-white">Logout</a>
        </div>
    </div>
    <div class="h-full rounded-lg pb-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
       <div class="px-4 pt-4">
        @if ($active == 'articles')
                <a class="float-end text-md font-bold text-gray-400" href="">See all</a>
                <h1 class="text-lg font-bold text-gray-300">Trending now</h1>

                @for ($i = 0; $i < 5; $i++)
                    <div class="h-full py-4 rounded-lg overflow-y-auto bg-gray-50 dark:bg-gray-800">
                        <div class="flex">
                            <div class="flex flex-col mr-2">
                                <div class="flex flex-row gap-1">
                                    <img src="{{ $articles[$i]->source_image }}" class="rounded-full w-4 mb-2"
                                        alt="">
                                    <a href="" class="text-mainGreen text-xs font-bold">{{ $articles[$i]->source }}</a>
                                    <span class="text-xs text-gray-300 font-bold">1 minutes ago</span>
                                </div>
                                <a href="{{ $articles[$i]->link }}" class="text-sm font-semibold mb-2">{{ $articles[$i]->title }}</a>
                            </div>
                            <div class="h-24 w-24 rounded-lg flex justify-center align-center">

                            </div>
                            <img src="{{ $articles[$i]->image }}" alt="Image"
                                class="object-cover h-24 w-24 rounded-lg">
                        </div>
                    </div>
                @endfor
                @else
                <a class="float-end text-md font-bold text-gray-400" href="">See all</a>
                <h1 class="text-lg font-bold text-gray-300">Connect with other users</h1>
        @foreach (auth()->user()->recomendations() as $recom)           
        
        <div class="mt-4 flex flex-row mb-1 rounded-lg">
            <img src="{{ $recom->avatar==null?asset('assets/default_avatar.png'):$recom->avatar }}" alt="" class="w-12 rounded-full">
            <div class="ms-3 w-2/3">
                <h1 class="text-md font-bold text-black">
                  {{ substr($recom->name,0,25) }}
               </h1>
                <h2 class="text-xs text-gray-300">Suggested for you</h2>
               </div>
               <div class="flex items-center float-end">
                  <form action="/follow" method="post">
                     @csrf
                     <input type="number" name="user" class="hidden" value="{{ $recom->id }}">
                     <input type="submit" value="Follow" class="text-bold text-mainGreen py-1 px-2 rounded-lg hover:bg-mainGreen hover:text-white"></input>
                  </form>
               </div>
            </div>
         @endforeach
         
      </div>
      @endif
   </div>
   </aside>
