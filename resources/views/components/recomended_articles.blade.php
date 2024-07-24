<a class="float-end text-md font-bold text-gray-400" href=""></a>
                <h1 class="text-lg font-bold text-gray-300">Sedang ramai</h1>
                @foreach (App\Models\Article::latest()->take(5)->get() as $article)
                    <div class="h-full py-4 rounded-lg overflow-y-auto bg-gray-50 dark:bg-gray-800">
                        <div class="flex">
                            <div class="flex flex-col mr-2">
                                <div class="flex flex-row">
                                    <img src="{{ $article->source_image }}" class="rounded-full w-4 mb-2"
                                        alt="">
                                    <a href=""
                                        class="text-mainGreen text-xs font-bold mx-1">{{ $article->source }} </a>
                                    <span class="text-xs text-gray-300 font-semibold">{{ str_replace(" yang lalu","",$article->created_at->diffForHumans()) }}</span>
                                </div>
                                <a href="{{ $article->link }}"
                                    class="text-sm font-semibold mb-2">{{ $article->title }}</a>
                            </div>
                            <div class="h-24 w-24 rounded-lg flex justify-center align-center">

                            </div>
                            <img src="{{ $article->image }}" alt="Image"
                                class="object-cover h-24 w-24 rounded-lg">
                        </div>
                    </div>
                @endforeach