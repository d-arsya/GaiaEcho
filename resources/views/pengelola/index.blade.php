@vite(['resources/css/app.css', 'resources/js/app.js'])
@extends('pengelola.layouts.main')
@section('container')
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <div class="bg-white p-5 rounded-md flex justify-between">
            <div>
                <h1 class="font-semibold text-gray-600">Total Pengunjung</h1>
                <h1 class="font-bold text-2xl">{{ $recyclers->count() }}</h1>
            </div>
            <div class="bg-mainGreen rounded-2xl h-min p-3"><img src="{{ asset('assets/trash.svg') }}" alt="">
            </div>
        </div>
        <div class="bg-white p-5 rounded-md flex justify-between">
            <div>
                <h1 class="font-semibold text-gray-600">Pengunjung Bulanan</h1>
                <h1 class="font-bold text-2xl">{{ $recyclers->whereBetween('created_at', ['2024-08-01', '2024-09-01'])->count() }}</h1>
            </div>
            <div class="bg-mainGreen rounded-2xl h-min p-3"><img src="{{ asset('assets/trash.svg') }}" alt="">
            </div>
        </div>
        <div class="bg-white p-5 rounded-md flex justify-between">
            <div>
                <h1 class="font-semibold text-gray-600">Total Berat Sampah</h1>
                <h1 class="font-bold text-2xl">{{ $recyclers->sum('weight') }} Kg</h1>
            </div>
            <div class="bg-mainGreen rounded-2xl h-min p-3"><img src="{{ asset('assets/trash.svg') }}" alt="">
            </div>
        </div>
        <div class="bg-white p-5 rounded-md flex justify-between">
            <div>
                <h1 class="font-semibold text-gray-600">Berat Sampah Bulanan</h1>
                <h1 class="font-bold text-2xl">{{ $recyclers->whereBetween('created_at', ['2024-08-01', '2024-09-01'])->sum('weight') }} Kg</h1>
            </div>
            <div class="bg-mainGreen rounded-2xl h-min p-3"><img src="{{ asset('assets/trash.svg') }}" alt="">
            </div>
        </div>
    </div>
    <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">
        @for ($i = 0; $i < 2; $i++)
        @endfor
        <div class="bg-white p-3 rounded-md">
            <canvas id="visitors"></canvas>
        </div>
        <div class="bg-white p-3 rounded-md">
            <canvas id="waste"></canvas>
        </div>
    </div>
    <div class="p-5 mt-4 bg-white rounded-md">
        <form action="/pengelola" method="POST">
            @csrf
        <div class="w-full">
            <input name="username" class="bg-gray-200 w-full md:w-2/3 p-2 rounded-md focus:outline-none" placeholder="Username" type="text" name="" id="">
            <input name="weight" class="bg-gray-200 mt-3 md:mt-0 md:w-min w-full p-2 rounded-md focus:outline-none" type="number" placeholder="Berat" name="" id="">
            <input type="submit" class="py-2 px-4 bg-mainGreen rounded-md md:ml-4 mt-3 md:mt-0 text-white font-semibold" value="Submit">
        </div>
    </form>
        <h1 class="text-2xl text-gray-600 font-bold my-3">Riwayat Pengunjung</h1>
        <table class="w-full">
            <thead>
                <tr>
                    <th class="text-start">Nama</th>
                    <th class="text-start hidden md:table-cell">Username</th>
                    <th class="text-start">Berat</th>
                    <th class="text-start hidden md:table-cell">Poin</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($recys as $rec)
                    <tr>
                        <td class="pt-3"><img class="w-8 rounded-full h-8 inline mr-3"
                                src="{{ $rec->user()->avatar == '' ? asset('assets/default_avatar.png') : Storage::url($rec->user()->avatar) }}"
                                alt="">{{ $rec->user()->name }}</td>
                        <td class="hidden md:table-cell"><span>@</span>{{ $rec->user()->username }}</td>
                        <td>{{ $rec->weight }}</td>
                        <td class="hidden md:table-cell">{{ $rec->weight * 10 }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$recys->links()}}
    </div>
@endsection
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@php
// Dapatkan bulan saat ini
$now = now();
$currentMonth = $now->month;
$currentYear = $now->year;

// Buat array untuk menyimpan jumlah pengunjung dan berat sampah per bulan
$visitorsData = [];
$wasteData = [];

// Loop untuk 6 bulan terakhir
for ($i = 0; $i < 6; $i++) {
    $startDate = $now->copy()->subMonths($i)->startOfMonth()->toDateString();
    $endDate = $now->copy()->subMonths($i)->endOfMonth()->toDateString();
    $visitorsData[] = $recyclers->whereBetween('created_at', [$startDate, $endDate])->count();
    $wasteData[] = $recyclers->whereBetween('created_at', [$startDate, $endDate])->sum('weight');
}

// Balikkan array untuk urutan yang benar
$visitorsData = array_reverse($visitorsData);
$wasteData = array_reverse($wasteData);
@endphp
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const bulan = ['Januari','Februari','Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus','September','Oktober','November','Desember'];
    let now = new Date().getMonth();
    let labels = bulan.slice(now - 5, now + 1);

    var ctx = document.getElementById('visitors').getContext('2d');
    var myBarChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Jumlah',
                data: @json($visitorsData),
                backgroundColor: '#55D917',
                borderColor: '#55D917',
                borderWidth: 1
            }]
        },
        options: {
            plugins: {
                title: {
                    display: true,
                    text: "Pengunjung",
                    align: 'start',
                    font: {
                        size: '20px',
                        weight: 'bold'
                    }
                }
            },
            responsive: true,
            scales: {
                y: {
                    ticks: {
                        stepSize: 5 // Mengatur jarak antara ticks
                    },
                    beginAtZero: true, // Memulai sumbu y dari 0
                }
            }
        }
    });
        var ct = document.getElementById('waste').getContext('2d');
        var myBaChart = new Chart(ct, {
            type: 'line',
            data: {
                labels: ['Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus'],
                datasets: [{
                    label: 'Jumlah',
                    data: @json($wasteData), // Ganti dengan data yang sesuai
                    backgroundColor: '#55D917',
                    borderColor: '#55D917',
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    title: {
                        display: true,
                        text: "Berat Sampah",
                        align: 'start',
                        font: {
                            size: '20px',
                            weight: 'bold'
                        }
                    }
                },
                responsive: true,
                scales: {
                    y: {
                        ticks: {
                            stepSize: 40 // Mengatur jarak antara ticks
                        },
                        beginAtZero: true, // Memulai sumbu y dari 0
                    }
                }
            }
        });
    });
</script>
