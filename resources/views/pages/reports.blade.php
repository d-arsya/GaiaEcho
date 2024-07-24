@extends('layouts.main')
@section('container')
<div class="p-4 w-full bg-white rounded-lg">
    <h1 class="text-xl font-bold">Laporan</h1>
    <h1 class="text-md">Kirim laporan</h1>
    <div class="mt-5 flex flex-row justify-between items-center">
        <div class="flex flex-row gap-3">
            <div class="w-12 h-12 rounded-full flex justify-center items-center overflow-hidden">
                <img src="{{ auth()->user()->avatar==null?asset('assets/default_avatar.png'):Storage::url(auth()->user()->avatar) }}" class="w-full h-full" alt="">
            </div>
            <div>
                <h1 class="text-md font-bold">{{ auth()->user()->name }}</h1>
                <h1 class="text-sm"><span>@</span>{{ auth()->user()->username }}</h1>
            </div>
        </div>
        <div>
           <form action="/report" method="POST" enctype="multipart/form-data">
               @csrf
               <input required type="date" class="bg-white" name="date" id="">
            </div>
        </div>
        <a id="locLink" href="" class="hidden flex flex-row items-center mt-3">
            <img src="{{ asset('assets/location.svg') }}" class="w-3 inline" alt="">
            <span class="text-mainGreen">lokasi</span>
        </a>
        <input class="my-3 w-full focus:outline-none bg-white" placeholder="Tulis judul pengaduan" type="text" name="title" id="">
        <div class="w-full bg-black h-px"></div>
        <textarea required name="text" id="reportDetail" maxlength="3000" class="focus:outline-none w-full my-3 h-auto bg-white" placeholder="Tulis deskripsi pengaduan"></textarea>
        <div class="hidden w-1/4 h-32 flex justify-center items-center overflow-hidden rounded-lg">
            <img src="" class="h-full w-full" id="thumbnail" alt="">
        </div>
        <div class="w-full my-3 bg-gray-400 h-px"></div>
        <div class="flex flex-row justify-between items-center">
            <div class="flex flex-row space-x-2">
                <label for="imgInput">
                    <img src="{{ asset('assets/photos.svg') }}" class="w-6" alt="">

                </label>
          <img id="locationButton" src="{{ asset('assets/location.svg') }}" class="w-6" alt="">
          <input type="file" name="image" id="imgInput" class="hidden">
        </div>
        <div>
            <span id="reportChar" class="text-gray-400 text-xs font-thin mr-3">0 / 3000 Karakter</span>
            <input class="rounded-full py-1 px-2 bg-white border text-mainGreen border-mainGreen border-2 text-xs hover:bg-mainGreen hover:text-white" type="submit" value="Lapor">
            <input type="text" id="locForm" name="location" class="hidden">
        </form>
       </div>
    </div>
 </div>
 <div id="locationPopup" class="hidden z-50 bg-gray-900 bg-opacity-75 inset-0 fixed flex items-center justify-center">
    <div class="p-3 w-5/12 bg-white rounded-lg shadow shadow-lg">
        <div class="flex justify-between">
            <img id="closeLocation" src="{{ asset('assets/back.svg') }}" class="w-6" alt="">
            {{-- <span id="closeLocation" class="px-2 py-1 outline outline-px outline-mainGreen rounded-md text-xs hover:bg-mainGreen hover:text-white">Simpan</span> --}}
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
            <div class="mt-3 w-full">
                <input autofocus class="bg-white p-3 w-full h-auto focus:outline-none focus:ring-none"
                rows="1" type="text" name="text" placeholder="Dimana kejadiannya" id="locPop">
            </div>
            <div class="mt-3 h-px bg-gray-300 w-full"></div>
        </div>
    </div>
</div>
@endsection


<script>
    document.addEventListener('DOMContentLoaded',function(){
        const imgReport = document.getElementById("imgInput");
        const reportDetail = document.getElementById("reportDetail");
        const locationButton = document.getElementById("locationButton");
        const locationPopup = document.getElementById("locationPopup");
        const closeLocation = document.getElementById("closeLocation");
        const locPop = document.getElementById("locPop");
        reportDetail.addEventListener("input", function() {
        this.style.height = "auto";
        this.style.height = this.scrollHeight + "px";
    });
        reportDetail.addEventListener('keyup',function(e){
            document.getElementById("reportChar").innerHTML = `${e.target.value.length} / 3000 Karakter`
        })
        imgReport.addEventListener("change", function(event) {
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
        locationButton.addEventListener('click',function(){
            locationPopup.classList.remove('hidden')
        })
        closeLocation.addEventListener('click',function(){
            locationPopup.classList.add('hidden')
        })
        locPop.addEventListener('keyup',function(e){
            const link = document.getElementById("locLink")
            link.setAttribute('href',`https://google.com/maps/search/${e.target.value}`)
            link.classList.remove('hidden')
            document.getElementById("locForm").value=e.target.value
            if(e.target.value.includes('maps.')){
                link.setAttribute('href',e.target.value)
            }
        })
    })
</script>