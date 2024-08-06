@extends('admin.layouts.main')
@section('container')
<div onclick="openPopup()" class="bg-mainGreen py-2 px-3 w-max rounded-md mb-3 text-white"><img src="{{asset('assets/bookPlus.svg')}}" class="inline mr-3">Tambah</div>
<div class="bg-white rounded-md">
    <table class="w-full">
        <thead class="bg-white">
            <th class="text-black py-3 text-2xl font-bold rounded-ss-md">Judul</th>
            <th class="text-black py-3 hidden md:table-cell text-2xl font-bold">Jenis</th>
            <th class="text-black py-3 hidden md:table-cell text-2xl font-bold rounded-se-md">Sumber</th>
        </thead>
        <tbody>
            @foreach ($articles as $article)
            <tr >
                <form action="/articles/delete" method="POST">
                @csrf
                <input type="number" name="id" class="hidden" value="{{$article->id}}">
                <input id="delete" type="submit" class="hidden">
                </form>
                <td class="md:py-0 py-3 px-3 flex flex-row"><label for="delete" href="/"><img src="{{asset('assets/bin.svg')}}" alt="" class=" inline mr-3"></label><a href="{{$article->link}}">{{$article->title}}</a></td>
                <td class="hidden md:table-cell px-3 py-2 text-center">{{str_contains($article->link,'youtube.com')?'Video':'Artikel'}}</td>
                <td class="hidden md:table-cell px-3 text-end">{{$article->source}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

<div id="postPopup" class="hidden z-50 bg-gray-900 bg-opacity-75 inset-0 fixed flex items-center justify-center">
    <div class="p-3 w-11/12 md:w-5/12 bg-white rounded-lg shadow shadow-lg">
        <div class="flex">
            <img id="closePostButton" src="{{ asset('assets/back.svg') }}" class="w-6" alt="">
        </div>
        <form action="/admin/articles" method="POST">
            @csrf
                <input type="text" autofocus class="bg-white p-3 w-full h-auto focus:outline-none focus:ring-none" type="text" name="title" placeholder="Judul">
                <input type="text" autofocus class="bg-white p-3 w-full h-auto focus:outline-none focus:ring-none" type="text" name="cite" placeholder="Kutipan">
                <input type="text" autofocus class="bg-white p-3 w-full h-auto focus:outline-none focus:ring-none" type="text" name="link" placeholder="Link">
                <input type="text" autofocus class="bg-white p-3 w-full h-auto focus:outline-none focus:ring-none" type="text" name="source" placeholder="Sumber">
                <input type="text" autofocus class="bg-white p-3 w-full h-auto focus:outline-none focus:ring-none" type="text" name="source_image" placeholder="Icon Sumber">
                <input type="text" autofocus class="bg-white p-3 w-full h-auto focus:outline-none focus:ring-none" type="text" name="image" placeholder="Link Gambar">
            <input type="submit" value="Posting"
            class="hover:bg-mainGreen hover:text-white px-4 text-mainGreen py-px rounded-full outline outline-1 outline-mainGreen">
        </div>
    </form>
    </div>
</div>
<script>
    const postPopup = document.getElementById("postPopup");
    const closePostButton = document.getElementById("closePostButton");
    
    closePostButton.addEventListener("click", function() {
        postPopup.classList.add("hidden");
        textarea.value = "";
        imgInput.files = new DataTransfer().files;
        thumbnail.src = "";
        thumbnail.parentElement.classList.add("hidden");
    });
    function openPopup() {
        postPopup.classList.remove("hidden");
        textarea.focus();
    };
</script>
