@extends('layouts.main')
@section('container')
<div class="relative w-full h-64 overflow-hidden rounded-lg shadow-lg">
    <img src="{{ $articles[0]->image }}" alt="Background Image" class="absolute inset-0 w-full h-full object-cover">
    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center">
       <div class="text-left text-white pl-10">
          <img src="{{ $articles[0]->source_image }}" class="rounded-full w-6 mb-2 inline" alt="">
          <a href="{{ parse_url($articles[0]->link)['scheme'].'://'.parse_url($articles[0]->link)['host'] }}" class="text-mainGreen text-md font-bold">{{ $articles[0]->source }}</a>
          <span class="text-md text-gray-300 font-semibold">{{ $articles[0]->created_at->diffForHumans() }}</span>
          <h1 class="text-3xl font-bold">{{ $articles[0]->title }}</h1>
          <a href="{{ $articles[0]->link }}">
             
             <div class="mt-3 font-bold text-2xl bg-slate-200 rounded-full w-fit px-5 py-1 text-black">
                Baca artikel</div>
          </a>
       </div>
      </div>
 </div>
 <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-3">
    @foreach ($articles->skip(1) as $article)
    <div class="w-auto bg-white mt-4 rounded-lg shadow">
       <div class=" rounded-t-lg flex items-center justify-center w-full h-1/2 overflow-hidden">
         @if (str_contains($article->link,"youtube.com"))
         <iframe src="{{ str_replace('watch?v=','embed/',$article->link) }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" class="h-full w-full" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>             
         @else
         <img class="w-full h-full" src="{{ $article->image }}" alt="" />
         @endif
      </div>
       <div class="pb-5 pt-3 px-5">
          <img src="{{ $article->source_image }}" class="rounded-full w-6 mb-2 inline" alt="">
          <a href="{{ parse_url($article->link)['scheme'].'://'.parse_url($article->link)['host'] }}" class="text-mainGreen text-md font-bold">{{ $article->source }}</a>
          <span class="text-md text-gray-300 font-semibold">{{ $article->created_at->diffForHumans() }}</span>
          <a href="#">
             <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900 dark:text-white">{{ $article->title }}</h5>
          </a>
          <p class="mb-3 font-normal text-sm text-gray-700 dark:text-gray-400">{{ $article->text }} <a target="_blank" href="{{ $article->link }}" class="text-mainGreen">baca</a></p>
       </div>
    </div>        
    @endforeach      
        


   </div>
   {{ $articles->links() }}
@endsection