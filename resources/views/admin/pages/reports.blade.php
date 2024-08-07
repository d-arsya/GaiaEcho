@php
    use Carbon\Carbon;
@endphp
@extends('admin.layouts.main')
@section('container')
    <div class="grid grid-cols-1 md:grid-cols-4 gap-3">
        @foreach ($reports as $report)
            <div class="p-4 w-full bg-white rounded-lg mt-4">
                <div class="flex flex-row justify-between items-center">
                    <div class="flex flex-row gap-3">
                        <a href="/reports/{{$report->user->username}}/{{$report->id}}">
                            <h1 class="text-md font-bold">{{ $report->user->name }}</h1>
                            <h1 class="text-sm"><span>@</span>{{ $report->user->username }}</h1>
                        </a>
                    </div>
                </div>
                <input class="my-3 w-full focus:outline-none bg-white" value="{{ $report->title }}" disabled ="text"
                    name="title" id="">
            
                
                <div class="w-full my-3 bg-gray-400 h-px"></div>
                <h1 class="my-3 font-bold text-xl">Status</h1>
                <div class="flex w-full flex-row">
                    <table class="w-full">
                        <tbody class="text-start">
                            <tr>
                                <td class="ps-5">{{ Carbon::parse($report->created_at)->isoFormat('DD/MM/YYYY') }}</td>
                                <td class="ps-10">Dikirim</td>
                            </tr>
                            <tr>
                                <td class="ps-5">
                                    {{ $report->accepted ? Carbon::parse($report->accepted)->isoFormat('DD MMMM YYYY') : 'Menunggu' }}
                                </td>
                                <td class="ps-10"><a href="/admin/reports/accept/{{$report->id}}" class="hover:text-mainGreen">Terima</a></td>
                            </tr>
                            <tr>
                                <td class="ps-5">
                                    {{ $report->processed ? Carbon::parse($report->processed)->isoFormat('DD MMMM YYYY') : 'Menunggu' }}
                                </td>
                                <td class="ps-10"><a href="/admin/reports/process/{{$report->id}}" class="hover:text-mainGreen">Proses</a></td>
                                
                            </tr>
                            <tr>
                                <td class="ps-5">
                                    {{ $report->finished ? Carbon::parse($report->finished)->isoFormat('DD MMMM YYYY') : 'Menunggu' }}
                                </td>
                                <td class="ps-10"><a href="/admin/reports/finish/{{$report->id}}" class="hover:text-mainGreen">Selesai</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            @endforeach
        </div>
@endsection
