<?php
use Carbon\Carbon;
?>
<a class="float-end text-md font-bold text-gray-400" href=""></a>
<h1 class="text-lg font-bold text-gray-300">Laporan anda</h1>
@foreach (auth()->user()->last_reports() as $report)
    <div class="mt-4 flex flex-row mb-1 rounded-lg justify-between">
        <div class="flex flex-row space-x-2">
            <img src="{{ asset('assets/task.svg') }}" alt=""
            class="w-8">
            <div>
                <a href="/report/{{ auth()->user()->username }}/{{ $report->id }}" class="text-md font-bold text-black">
                    {{ substr($report->title, 0, 30) }}
                </a>
                <h2 class="text-xs text-gray-300">{{ $report->date=Carbon::parse($report->date)->translatedFormat('d F Y') }}</h2>

            </div>
        </div>
        <img src="{{ asset('assets/option.svg') }}" onclick="openPost({{ $report }})" class="w-2 mr-5" alt="">
    </div>
@endforeach

<div id="postPopup" class="hidden z-50 bg-gray-900 bg-opacity-75 inset-0 fixed flex items-center justify-center overflow-y-scroll">
    <div class="p-3 w-5/12 bg-white rounded-lg shadow shadow-lg">
        <div class="flex flex-row justify-between">
            <img id="closePostButton" src="{{ asset('assets/back.svg') }}" class="w-6 inline" alt="">
            <h1 class="inline ml-3 font-bold text-md" id="reportTitle"></h1>
            <a href="" id="deleteReport" class="rounded-full py-1 px-1 text-red-500 hover:text-white outline outline-red-500 hover:bg-red-500 text-xs">Hapus Laporan</a>

        </div>
            <div class="mt-2 w-full">
                <h1 class="mr-5 text-xs inline" id="reportDate"><img src="{{ asset('assets/calendar.svg') }}" class="w-3 mr-1 inline" alt=""></h1>
                <a class="text-xs inline text-mainGreen" href="" id="reportLocation"><img src="{{ asset('assets/location.svg') }}" class="w-3 mr-1 inline" alt=""></a>
                <p class="mt-2 text-xs" id="reportText"></p>
            </div>
            <div class="hidden mt-3 w-32 max-h-96 rounded-lg overflow-hidden flex justify-center items-center">
                <img src="" id="reportImage" class="w-full" alt="">
            </div>
        </div>
    </div>
</div>
    
<script>
    const postPopup = document.getElementById("postPopup");
    const closePostButton = document.getElementById("closePostButton");
    const reportText = document.getElementById("reportText");

    closePostButton.addEventListener("click", function() {
        postPopup.classList.add("hidden");
        document.getElementById("reportImage").setAttribute('src',"")
        document.getElementById("reportImage").parentElement.classList.add('hidden')
        document.getElementById("reportLocation").innerHTML=`<img src="{{ asset('assets/location.svg') }}" class="w-3 mr-1 inline" alt="">`
        document.getElementById("reportLocation").setAttribute('href',"")
    });

    function openPost(data) {
        postPopup.classList.remove("hidden");
        reportText.innerHTML = data.text
        document.getElementById("reportTitle").innerHTML=data.title
        document.getElementById("deleteReport").setAttribute('href',`/report/delete/${data.id}`)
        document.getElementById("deleteReport").setAttribute('onclick',`return confirm('Yakin ingin membatalkan laporan ${data.title} ?')`)
        if(data.image!=""){
            document.getElementById("reportImage").setAttribute('src',data.image)
            document.getElementById("reportImage").parentElement.classList.remove('hidden')
        }
        // document.getElementById("reportLocation").childNodes[1].nodeValue=$data.location
        if(data.location.includes('maps.')){
        }else{
            document.getElementById("reportLocation").innerHTML=`<img src="{{ asset('assets/location.svg') }}" class="w-3 mr-1 inline" alt="">${data.location}`
            document.getElementById("reportLocation").setAttribute('href',`https://google.com/maps/search/${data.location}`)
        }
        document.getElementById("reportDate").innerHTML=`<img src="{{ asset('assets/calendar.svg') }}" class="w-3 mr-1 inline" alt="">${data.date}`
    };
</script>

