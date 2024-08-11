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
        <form id="formKendaraan" action="/post" method="POST">
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

    <script>
        document.addEventListener('DOMContentLoaded', function () {
    const cardWrapper = document.querySelector('.card-wrapper');

    // Event listeners for land and air transport icons
    cardWrapper.querySelectorAll('#car-icon').forEach(carIcon => {
        carIcon.addEventListener('click', function () {
            showLandCards(cardWrapper);
        });
    });

    cardWrapper.querySelectorAll('#plane-icon').forEach(planeIcon => {
        planeIcon.addEventListener('click', function () {
            showAirCards(cardWrapper);
        });
    });

    // Initialize sliders for the card
    const sliderEngine = cardWrapper.querySelector('#steps-engine');
    const sliderEngineValue = cardWrapper.querySelector('#slider-engine-value');
    const labelsEngine = ["50","100", "125", "150", "200", "250", "400", "600", "800", "900", "1000", "1200", "1500", "1600", "1800", "2000", "2200", "2400", "2500", "2800", "3000", ">3000"];
    if (sliderEngine) {
        sliderEngine.addEventListener('input', () => {
            sliderEngineValue.textContent = labelsEngine[sliderEngine.value];
        });
        sliderEngineValue.textContent = labelsEngine[sliderEngine.value];
    }

    const sliderDistance = document.getElementById('steps-distance');
    const sliderDistanceValue = document.getElementById('slider-distance-value');
    const labelsDistance = [0, 5, 10, 15, 20, 25, 30, 35, 40, 45, 50, 55, 60, 65, 70, 75, 80, 85, 90, 95, 100, 105, 110, 115, 120, 125, 130, 135, 140, 145, 150, 155, 160, 165, 170, 175, 180, 185, 190, 195, 200];

    if (sliderDistance) {
        sliderDistance.addEventListener('input', () => {
            sliderDistanceValue.textContent = labelsDistance[sliderDistance.value];
        });
        sliderDistanceValue.textContent = labelsDistance[sliderDistance.value];
    }

    const sliderPlaneDistance = cardWrapper.querySelector('#steps-plane-distance');
    const sliderPlaneDistanceValue = cardWrapper.querySelector('#slider-plane-distance-value');
    const labelsPlaneDistance = [0, 100, 200, 300, 400, 500, 600, 700, 800, 900, 1000, 1500, 2000, 2500, 3000, 3500, 4000, 4500, 5000, 5500, 6000, 6500, 7000, 7500, 8000, 8500, 9000, 9500, 10000, 10500, 11000];
    if (sliderPlaneDistance) {
        sliderPlaneDistance.addEventListener('input', () => {
            sliderPlaneDistanceValue.textContent = labelsPlaneDistance[sliderPlaneDistance.value];
        });
        sliderPlaneDistanceValue.textContent = labelsPlaneDistance[sliderPlaneDistance.value];
    }
});

function showLandCards(cardWrapper) {
    cardWrapper.querySelector('.cards-container-land').classList.remove('hidden');
    cardWrapper.querySelector('.cards-container-air').classList.add('hidden');
    cardWrapper.querySelector('#car-icon').classList.add('active');
    cardWrapper.querySelector('#plane-icon').classList.remove('active');
    cardWrapper.querySelector('#progress-bar').style.width = '50%'; // Change width to 50%
    const planeImage = document.getElementById('plane-image');
    planeImage.setAttribute('src', 'assets/plane.svg');
}

function showAirCards(cardWrapper) {
    cardWrapper.querySelector('.cards-container-land').classList.add('hidden');
    cardWrapper.querySelector('.cards-container-air').classList.remove('hidden');
    cardWrapper.querySelector('#car-icon').classList.remove('active');
    cardWrapper.querySelector('#plane-icon').classList.add('active');
    cardWrapper.querySelector('#progress-bar').style.width = '100%';
    const planeImage = document.getElementById('plane-image');
    planeImage.setAttribute('src', 'assets/plane-green.svg');
}

// fuel-type option
function updateFuelOption() {
    const selectedTransport = document.querySelector('input[name=land-transport]:checked').value;
    const fuelOption = {
        car:['fuel-gasoline', 'fuel-diesel', 'fuel-ev', 'fuel-hybrid'],
        motor:['fuel-gasoline', 'fuel-ev'],
        bus:['fuel-diesel', 'fuel-ev'],
        train:['fuel-diesel', 'fuel-ev']
    };

    document.querySelectorAll('.icon-container-fuel-type .icon-label').forEach(label => label.classList.add('hidden'));

    if (fuelOption[selectedTransport]) {
        fuelOption[selectedTransport].forEach(id => document.getElementById(id).classList.remove('hidden'));
    }
}


document.querySelectorAll('input[name="land-transport"], input[name="fuel-type"]').forEach(input => {
    input.addEventListener('change', getSelectedValues);
});

document.getElementById('steps-engine').addEventListener('input', getSelectedValues);
document.getElementById('steps-distance').addEventListener('input', getSelectedValues);


//postscript & pop-up
const textarea = document.getElementById("autoResizeTextarea");
const postPopup = document.getElementById("postPopup");
const closePostButton = document.getElementById("closePostButton");
const imgInput = document.getElementById("imgInput");

textarea.addEventListener("input", function() {
    this.style.height = "auto";
    this.style.height = this.scrollHeight + "px";
});
window.addEventListener("load", function() {
    textarea.style.height = "auto";
    textarea.style.height = textarea.scrollHeight + "px";
});
closePostButton.addEventListener("click", function() {
    postPopup.classList.add("hidden");
    textarea.value = "";
    imgInput.files = new DataTransfer().files;
    thumbnail.src = "";
    thumbnail.parentElement.classList.add("hidden");
});

document.getElementById('formKendaraan').addEventListener('submit',function(e){
    e.preventDefault();
    document.getElementById('kendaraan').classList.remove('hidden');
    document.getElementById('formKendaraan').reset()
    closePostButton.click()
})

function openPost() {
    postPopup.classList.remove("hidden");
    textarea.focus();
};
imgInput.addEventListener("change", function(event) {
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


// calculation
function getSelectedValues() {
    const landTransport = document.querySelector('input[name="land-transport"]:checked');
    const fuelType = document.querySelector('input[name="fuel-type"]:checked');
    const labelsDistance = [0, 5, 10, 15, 20, 25, 30, 35, 40, 45, 50, 55, 60, 65, 70, 75, 80, 85, 90, 95, 100, 105, 110, 115, 120, 125, 130, 135, 140, 145, 150, 155, 160, 165, 170, 175, 180, 185, 190, 195, 200];
    const sliderDistance = document.getElementById('steps-distance');
    const sliderDistanceValue = document.getElementById('slider-distance-value');
    const labelsEngine = ["50", "100", "125", "150", "200", "250", "400", "600", "800", "900", "1000", "1200", "1500", "1600", "1800", "2000", "2200", "2400", "2500", "2800", "3000", ">3000"];
    const sliderEngine = document.getElementById('steps-engine');
    const sliderEngineValue = document.getElementById('slider-engine-value');

    const GasolineEmissions = [130, 140, 150, 160, 170, 180, 190, 200, 210, 220, 230, 330];
    const DieselEmissions = [100, 110, 120, 130, 140, 150, 160, 170, 180, 190, 200];
    const motorEmissions = [65, 65, 65, 65, 87.5, 87.5, 125, 125, 175, 175, 175, 225, 225, 225, 275];

    function distanceSlider() {
        if (sliderDistance) {
            sliderDistance.addEventListener('input', () => {
                sliderDistanceValue.textContent = labelsDistance[parseInt(sliderDistance.value)];
            });
            sliderDistanceValue.textContent = labelsDistance[parseInt(sliderDistance.value)];
        }

        return sliderDistanceValue.textContent;
    }

    if (!landTransport) {
        console.error("No land transport selected");
        return;
    }

    if (landTransport.value === 'car') {
        if (fuelType && (fuelType.value === 'gasoline' || fuelType.value === 'diesel')) {

            const cek = parseInt(distanceSlider());

            if (sliderEngine) {
                sliderEngine.addEventListener('input', () => {
                    const engineIndex = parseInt(sliderEngine.value);
                    sliderEngineValue.textContent = labelsEngine[engineIndex];

                    // Determine the emission array based on fuel type
                    let emissionsArray;
                    if (fuelType.value === 'gasoline') {
                        emissionsArray = GasolineEmissions;
                    } else if (fuelType.value === 'diesel') {
                        emissionsArray = DieselEmissions;
                    }

                    // Calculate emissions if the appropriate array is found
                    if (emissionsArray && engineIndex >= 10) {
                        emisiMesin = emissionsArray[engineIndex - 10] * cek;
                    } else {
                        emisiMesin = NaN;
                    }

                    // Update the console log
                    console.log("ini jarak: " + cek + "\n" + "ini cc mesin: " + sliderEngineValue.textContent + "\n" + "emisi: " + emisiMesin);
                });

                // Initialize the emissions value
                const initialEngineIndex = parseInt(sliderEngine.value);
                const initialEmissionsArray = fuelType.value === 'gasoline' ? GasolineEmissions : DieselEmissions;
                if (initialEmissionsArray && initialEngineIndex >= 10) {
                    emisiMesin = initialEmissionsArray[initialEngineIndex - 10] * parseInt(sliderDistanceValue.textContent);
                } else {
                    emisiMesin = NaN;
                }

                const iseng = sliderDistanceValue.textContent;
                console.log("ini jarak: " + iseng + "\n" + "ini cc mesin: " + sliderEngineValue.textContent + "\n" + "emisi: " + emisiMesin);
            }
        } else if (fuelType && (fuelType.value === 'ev')) {
            const jarak = parseInt(distanceSlider());
            emisiMesin = jarak * 50;
            console.log("ini jarak: " + distanceSlider() + "\n" + "emisi: " + emisiMesin);
        } else {
            const jarak = parseInt(distanceSlider());
            emisiMesin = jarak * 100;
            console.log("ini jarak: " + distanceSlider() + "\n" + "emisi: " + emisiMesin);
        }
    } else if (landTransport.value === 'bus') {
        if (fuelType && (fuelType.value === 'diesel')) {
            const jarak = parseInt(distanceSlider());
            emisiMesin = jarak * 16;
            console.log("ini jarak: " + distanceSlider() + "\n" + "emisi: " + emisiMesin);

        } else {
            const jarak = parseInt(distanceSlider());
            emisiMesin = jarak * 15;
            console.log("ini jarak: " + distanceSlider() + "\n" + "emisi: " + emisiMesin);
        }
    } else if (landTransport.value === 'train') {
        if (fuelType && (fuelType.value === 'diesel')) {
            const jarak = parseInt(distanceSlider());
            emisiMesin = jarak * 1.44;
            console.log("ini jarak: " + distanceSlider() + "\n" + "emisi: " + emisiMesin);

        } else {
            const jarak = parseInt(distanceSlider());
            emisiMesin = jarak * 1.78;
            console.log("ini jarak: " + distanceSlider() + "\n" + "emisi: " + emisiMesin);
        }
    } else if (landTransport.value === 'motor') {
        if (fuelType && (fuelType.value === 'gasoline')) {
            const cek = parseInt(distanceSlider());
            if (sliderEngine) {
                sliderEngine.addEventListener('input', () => {
                    const engineIndex = parseInt(sliderEngine.value);
                    sliderEngineValue.textContent = labelsEngine[engineIndex];

                    // Calculate emissions if the appropriate array is found
                    if (motorEmissions && engineIndex <= 15) {
                        emisiMesin = motorEmissions[engineIndex] * cek;
                    } else {
                        emisiMesin = NaN;
                    }

                    // Update the console log
                    console.log("ini jarak: " + cek + "\n" + "ini cc mesin: " + sliderEngineValue.textContent + "\n" + "emisi: " + emisiMesin);
                });

                // Initialize the emissions value
                const initialEngineIndex = parseInt(sliderEngine.value);
                if (motorEmissions && initialEngineIndex <= 13) {
                    emisiMesin = motorEmissions[initialEngineIndex] * parseInt(sliderDistanceValue.textContent);
                } else {
                    emisiMesin = motorEmissions[14] * parseInt(sliderDistanceValue.textContent);
                }

                const iseng = sliderDistanceValue.textContent;
                console.log("ini jarak: " + iseng + "\n" + "ini cc mesin: " + sliderEngineValue.textContent + "\n" + "emisi: " + emisiMesin);
            }
        } else {
            const jarak = parseInt(distanceSlider());
            emisiMesin = jarak * 140;
            console.log("ini jarak: " + distanceSlider() + "\n" + "emisi: " + emisiMesin);
        }
    }
}


    </script>

@endsection

{{-- @push('scripts')
<script src="{{ asset('js/calculator.js') }}"></script>
@endpush --}}