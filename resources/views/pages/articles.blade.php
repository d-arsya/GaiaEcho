@extends('layouts.main')
@section('container')
<div class="relative w-full h-64 overflow-hidden rounded-lg shadow-lg">
    <img src="https://picsum.photos/400/300" alt="Background Image" class="absolute inset-0 w-full h-full object-cover">
    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <div class="text-center text-white p-4">
            <h1 class="text-2xl font-bold">Judul Kartu</h1>
            <p class="mt-2">Ini adalah teks yang ada di dalam kartu. Anda bisa mengganti teks ini sesuai kebutuhan.</p>
        </div>
    </div>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    @for ($i = 0; $i < 10; $i++)        
    <div class="w-auto bg-white-1 mt-4 rounded-lg shadow">
        <a href="#">
            <img class="rounded-t-lg" src="https://picsum.photos/600/300" alt="" />
        </a>
        <div class="p-5">
            <a href="#">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology acquisitions 2021</h5>
            </a>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
            <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Read more
                 <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </a>
        </div>
    </div>
    @endfor    



</div>
@endsection