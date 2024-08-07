@extends('layouts.main')
@section('container')

<div class="container mx-auto p-4">
    <div class="card-wrapper">
        <h1 class="text-left font-bold mb-4 text-2xl">Tambah Kendaraan</h1>
        <div class="w-full bg-gray-200 rounded-full h-3.5 dark:bg-gray-700 mt-5">
            <div id="progress-bar" class="bg-mainGreen h-3.5 rounded-full duration-300 transition-all" style="width: 100%"></div>
        </div>

        <div class="cards-container-land">
            <div id="container-land" class="container-transportation-type bg-white mt-5 py-2 shadow-md" style="border-radius: 15px;">
                <h2 class="p-3 font-semibold">Pilih moda transportasi</h2>
                <div class="icon-container-transportation-type w-full flex justify-around items-end mt-2">
                    <label class="icon-label">
                        <input type="radio" name="land-transport" value="car" onclick="updateFuelOption()">
                        <img src="{{ asset('assets/car.svg') }}" alt="Car Icon">
                        <p class="text-center">Mobil</p>
                    </label>
                    <label class="icon-label">
                        <input type="radio" name="land-transport" value="motor" onclick="updateFuelOption()">
                        <img src="{{ asset('assets/motor-green.svg') }}" alt="Motor Icon">
                        <p class="text-center">Motor</p>
                    </label>
                    <label class="icon-label">
                        <input type="radio" name="land-transport" value="bus">
                        <img src="{{ asset('assets/bus-green.svg') }}" alt="Bus Icon" onclick="updateFuelOption()">
                        <p class="text-center">Bus</p>
                    </label>
                    <label class="icon-label">
                        <input type="radio" name="land-transport" value="train" onclick="updateFuelOption()">
                        <img src="{{ asset('assets/train-green.svg') }}" alt="Train Icon" >
                        <p class="text-center">Kereta</p>
                    </label>
                </div>
            </div>

            <div class="container-fuel-type bg-white mt-5 py-2 rounded-lg shadow-md" style="border-radius: 15px;">
                <h2 class="p-3 font-semibold">Pilih jenis bahan bakar</h2>
                <div class="icon-container-fuel-type w-full flex justify-around items-end mt-2">
                    <label id="fuel-gasoline" class="icon-label">
                        <input type="radio" name="fuel-type" value="gasoline" >
                        <img src="assets/gasoline.svg" alt="Gasoline Icon">
                        <p class="text-center">Bensin</p>
                    </label>
                    <label id="fuel-diesel" class="icon-label">
                        <input type="radio" name="fuel-type" value="diesel">
                        <img src="assets/diesel.svg" alt="Diesel Icon">
                        <p class="text-center">Diesel</p>
                    </label>
                    <label id="fuel-ev" class="icon-label">
                        <input type="radio" name="fuel-type" value="ev">
                        <img src="assets/ev.svg" alt="EV Icon">
                        <p class="text-center">EV</p>
                    </label>
                    <label id="fuel-hybrid" class="icon-label">
                        <input type="radio" name="fuel-type" value="hybrid">
                        <img src="assets/hybrid.svg" alt="Hybrid Icon">
                        <p class="text-center">Hybrid</p>
                    </label>
                </div>
            </div>

            <div class="container-engine-size bg-white mt-5 p-4 shadow-md" style="border-radius: 15px;">
                <h1 class="text-xl text-center font-semibold mb-4">Kubikasi Mesin (CC)</h1>
                <div class="relative">
                    <div class="mt-4 text-center">
                        <span id="slider-engine-value" class="text-lg font-medium">0</span>
                        <span>CC</span>
                    </div>
                    <input id="steps-engine" type="range" min="0" max="21" value="0" step="1"
                        class="w-full h-3 bg-gray-200 rounded-lg range-lg appearance-none cursor-pointer dark:bg-gray-700">
                </div>
            </div>

            <div class="container-distance bg-white mt-5 p-4 shadow-md" style="border-radius: 15px;">
                <h1 class="text-xl text-center font-semibold mb-4">Jarak Tempuh (KM)</h1>
                <div class="relative">
                    <div class="mt-4 text-center">
                        <span id="slider-distance-value" class="text-lg font-medium">1000</span>
                        <span>KM</span>
                    </div>
                </div>
                <input id="steps-distance" type="range" min="0" max="40" value="0" step="1"
                    class="w-full h-3 bg-gray-200 rounded-lg range-lg appearance-none cursor-pointer dark:bg-gray-700">
            </div>
        </div>


    </div>

    <button onclick="openPost()" id="add-vehicle" class="mt-5 w-full bg-mainGreen p-2 flex flex-row justify-center rounded-full align-middle hover:shadow-lg hover:bg-green-2 hover:scale-105 transition duration-50">
        <img src="{{ asset('assets/plus.svg') }}" class="mr-2 w-5 h-5 mt-0.5" alt="add-icon">
        <p class="text-center text-white">Tambah kendaraan</p>
    </button>
</div>

{{-- pop-up --}}
<div id="postPopup" class="hidden z-50 bg-gray-900 bg-opacity-75 inset-0 fixed flex items-center justify-center">
    <div class="p-3 w-2/3 md:w-3/12 bg-white rounded-lg shadow shadow-lg">
        <div class="flex justify-start text-center align-middle">
            <img id="closePostButton" class="cursor-pointer" src="{{ asset('assets/back.svg') }}" class="w-6" alt="">
            <p class="font-bold text-center p-2 ml-12">Masukkan nama kendaraan</p>
        </div>
        <form action="/post" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mt-3 w-full">
                <input type="text" autofocus class="bg-white p-3 w-full h-auto focus:outline-none focus:ring-none" id="autoResizeTextarea"
                rows="1" type="text" name="text" placeholder="Apa yang sedang terjadi?" id="">
            </div>
            <div class="hidden mt-3 w-full max-h-72 rounded-lg overflow-hidden flex justify-center items-center">
                <img id="thumbnail" src="" class="w-full" alt="">
            </div>
            <div class="mt-3 h-px bg-gray-300 w-full"></div>
            <div class="mt-3 flex flex-row justify-end">
                <input type="submit" value="Post kendaraan" class="hover:bg-mainGreen hover:text-white px-4 text-mainGreen py-px rounded-full outline outline-1 outline-mainGreen">
            </div>
        </form>
    </div>
</div>





    {{-- style for slider --}}
    <style>
        :root {
            --mainGreen: #55D917;
        }

        /* Custom styles for the slider thumb */
        #steps-engine::-webkit-slider-thumb,
        #steps-distance::-webkit-slider-thumb,
        #steps-plane-distance::-webkit-slider-thumb {
            -webkit-appearance: none;
            width: 1.5rem;
            height: 1.5rem;
            background: var(--mainGreen);
            border-radius: 50%;
            cursor: pointer;
        }

        #steps-engine::-moz-range-thumb,
        #steps-distance::-moz-range-thumb,
        #steps-plane-distance::-moz-range-thumb {
            width: 1.5rem;
            height: 1.5rem;
            background: var(--mainGreen);
            border-radius: 50%;
            cursor: pointer;
        }

        #steps-engine::-ms-thumb,
        #steps-distance::-ms-thumb,
        #steps-plane-distance::-ms-thumb {
            width: 1.5rem;
            height: 1.5rem;
            background: var(--mainGreen);
            border-radius: 50%;
            cursor: pointer;
        }

        .transportation-icon-container {
            display: flex;
            justify-content: space-around;
            margin-bottom: 1rem;
        }

        .transportation-label {
            display: flex;
            flex-direction: column;
            align-items: center;
            cursor: pointer;
        }

        /* Hide the radio input but keep it functional */
        .transportation-label input[type="radio"] {
            position: absolute; /* Position off-screen */
            opacity: 0; /* Make it invisible */
        }

        .transportation-label img {
            width: 50px; /* Adjust width as needed */
            height: 50px; /* Adjust height as needed */
            border-radius: 50%;
        }

        .transportation-label input[type="radio"]:checked + img {
            border: 2px solid var(--mainGreen); /* Style for the selected icon */
        }

        .icon-label {
            display: flex;
            flex-direction: column;
            align-items: center;
            cursor: pointer;
        }

        /* Hide the radio input but keep it functional */
        .icon-label input[type="radio"] {
            position: absolute; /* Position off-screen */
            opacity: 0; /* Make it invisible */
        }

        .icon-label img {
            width: 50px; /* Adjust width as needed */
            height: 50px; /* Adjust height as needed */
        }

        .hidden {
            display: none;
        }
    </style>



@endsection

@push('scripts')
<script src="{{ asset('js/calculator.js') }}"></script>
@endpush
