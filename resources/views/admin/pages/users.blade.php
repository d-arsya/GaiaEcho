@extends('admin.layouts.main')
@section('container')
<div class="bg-white p-3 rounded-md">
    <h1 class="text-center text-black font-bold text-3xl mt-3">Daftar Pengguna Aktif GaiaEcho</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 mt-12">
        
        @foreach ($users->sortByDesc('point') as $user)
        
        <div class="mt-4 flex flex-row mb-1 rounded-lg">
        <img src="{{ $user->avatar == null ? asset('assets/default_avatar.png') : Storage::url($user->avatar) }}" alt=""
        class="w-12 rounded-full">
        <div class="ms-3 w-2/3">
            <a href="/profile/{{ $user->username }}" class="text-md font-bold text-black">
                {{ substr($user->name, 0, 25) }}
            </a>
            <h2 class="text-xs text-gray-300">{{ $user->username }}</h2> 
        </div>
        <div class="flex items-center float-end">
            <form action="/user/delete/{{$user->username}}" method="post">
                @csrf
                <input type="number" name="id" class="hidden" value="{{ $user->id }}">
                <input type="submit" value="Hapus"
                class="text-bold text-red-400 py-1 px-2 rounded-lg hover:bg-red-300 hover:text-white"></input>
            </form>
        </div>
    </div>
    
    @endforeach
</div>
</div>
@endsection