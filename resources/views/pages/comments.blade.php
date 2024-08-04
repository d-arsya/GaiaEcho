@extends('layouts.main')
@section('container')
    <x-post :post='$post'></x-post>
    <div class="bg-white -mt-5 p-4 rounded-b-lg">
        <div class="w-full h-px bg-slate-700 mb-3"></div>
        <div class="h-96 overflow-scroll overflow-x-hidden">
            @foreach ($comments as $comment)
                    <div class="flex flex-row gap-3 mt-3 items-start">
                        <div><img class="w-8" src="{{ Storage::url($comment->user->avatar) }}" alt=""></div>
                        <div class="items-start">
                            <a href="/profile/{{ $comment->user->username }}" class="font-bold inline">{{ $comment->user->name }}</a>
                            <a href="/profile/{{ $comment->user->username }}" class="inline text-gray-300 font-medium text-sm">@ {{ $comment->user->username }}</a>
                            <h1 class="font-thin">{{ $comment->text }}</h1>
                            <h1 class="text-xs font-semibold text-gray-300">{{ $comment->created_at->diffForHumans() }}</h1>
                        </div>
                    </div>
            @endforeach
        </div>
        <div class="pt-3">
            <div class="w-full h-px bg-gray-300"></div>
            <form action="/post/comments/{{ $post->id }}" method="POST">
            <div class="flex flex-row items-center">
                    @csrf
                    <input type="text" name="text" class="w-full focus:outline-none py-2" placeholder="Tanggapan anda">
                    <input class="h-min text-xs text-mainGreen rounded-full px-2 outline outline-mainGreen hover:bg-mainGreen hover:text-white" type="submit" value="Post">
                    
                </div>
            </form>
        </div>
    </div>
@endsection
