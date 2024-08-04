@php
    use Carbon\Carbon;
@endphp
@extends('layouts.main')
@section('container')
    <div class="p-4 w-full bg-white rounded-lg">
        <div class="mt-5 flex flex-row justify-between items-center">
            <div class="flex flex-row gap-3">
                <div class="w-12 h-12 rounded-full flex justify-center items-center overflow-hidden">
                    <img src="{{ auth()->user()->avatar == null ? asset('assets/default_avatar.png') : Storage::url(auth()->user()->avatar) }}"
                        class="w-full h-full" alt="">
                </div>
                <div>
                    <h1 class="text-md font-bold">{{ auth()->user()->name }}</h1>
                    <h1 class="text-sm"><span>@</span>{{ auth()->user()->username }}</h1>
                </div>
            </div>
            <div>
                <h1 class="text-sm text-gray-400 text-end"><img src="{{ asset('assets/calendar.svg') }}" class="inline mr-2" alt="">{{ Carbon::parse($report->date)->isoFormat('dddd, DD MMMM YYYY') }}</h1>
                <span id="locLink" href="" class="flex flex-row items-center float-end">
                    <img src="{{ asset('assets/location.svg') }}" class="w-3 inline mr-2" alt="">
                    <span class="text-gray-400">{{ $report->location }}</span>
                </span>
            </div>
        </div>
        <input class="my-3 w-full focus:outline-none bg-white" value="{{ $report->title }}" disabled ="text" name="title"
            id="">
        <div class="w-full bg-black h-px"></div>
        <input type="text" value="{{ $report->text }}" disabled name="text" id="reportDetail"
            class="focus:outline-none w-full my-3 h-auto bg-white">
        <div class="w-full flex justify-center items-center overflow-hidden rounded-lg">
            @if ($report->image != '')
                <img src="{{ Storage::url($report->image) }}" class="h-full w-full" id="thumbnail" alt="">
            @endif
        </div>
        <div class="w-full my-3 bg-gray-400 h-px"></div>
        <h1 class="my-3 font-bold text-xl">Status</h1>
        <div class="flex w-full flex-row">
            <div>
                <img src="{{ asset('assets/process.svg') }}" alt="">
            </div>
            <table class="w-full">
                <tbody class="text-start">
                    <tr>
                        <td class="ps-5">{{ Carbon::parse($report->created_at)->isoFormat('DD MMMM YYYY') }}</td>
                        <td class="text-center">{{ Carbon::parse($report->created_at)->isoFormat('hh:mm') }}</td>
                        <td class="ps-10">Laporan Dikirim</td>
                    </tr>
                    <tr>
                        <td class="ps-5">{{ $report->accepted?Carbon::parse($report->accepted)->isoFormat('DD MMMM YYYY'):"Menunggu" }}</td>
                        <td class="text-center">{{ $report->accepted?Carbon::parse($report->accepted)->isoFormat('hh:mm'):"Menunggu" }}</td>
                        <td class="ps-10">Laporan Diterima</td>
                    </tr>
                    <tr>
                        <td class="ps-5">{{ $report->processed?Carbon::parse($report->processed)->isoFormat('DD MMMM YYYY'):"Menunggu" }}</td>
                        <td class="text-center">{{ $report->processed?Carbon::parse($report->processed)->isoFormat('hh:mm'):"Menunggu" }}</td>
                        <td class="ps-10">Laporan Diproses</td>
                    </tr>
                    <tr>
                        <td class="ps-5">{{ $report->finished?Carbon::parse($report->finished)->isoFormat('DD MMMM YYYY'):"Menunggu" }}</td>
                        <td class="text-center">{{ $report->finished?Carbon::parse($report->finished)->isoFormat('hh:mm'):"Menunggu" }}</td>
                        <td class="ps-10">Laporan Selesai</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection
