<a class="float-end text-md font-bold text-gray-400" href=""></a>
<h1 class="text-lg font-bold text-gray-300">Terhubung dengan pengguna lainnya</h1>
@foreach (auth()->user()->recomendations() as $recom)
    <x-user :data='$recom'></x-user>
@endforeach
