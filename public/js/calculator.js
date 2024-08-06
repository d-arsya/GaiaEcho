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
    const labelsEngine = ["50","100", "125", "150", "200", "250", "400", "600", "800", "900", "1000", "1200", "1500", "1600", "1800", "2000", "2200", "2400", "2500", "2800", "3000", ">3000"];
    const sliderEngine = document.getElementById('steps-engine');
    const sliderEngineValue = document.getElementById('slider-engine-value');

    const GasolineEmissions = [130, 140, 150, 160, 170, 180, 190, 200, 210, 220, 230, 330];
    const DieselEmissions = [100, 110, 120, 130, 140, 150, 160, 170, 180, 190, 200];
    const motorEmissions = [65, 87.5, 125, 175, 225,275]

    function distanceSlider() {
        if (sliderDistance) {
            sliderDistance.addEventListener('input', () => {
                sliderDistanceValue.textContent = labelsDistance[parseInt(sliderDistance.value)];
            });
            sliderDistanceValue.textContent = labelsDistance[parseInt(sliderDistance.value)];
        }

        return sliderDistanceValue.textContent;
    }

    if (landTransport.value==='car') {
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
        } else if (fuelType && (fuelType.value === 'ev' )) {
            const jarak = parseInt(distanceSlider());
            emisiMesin = jarak*50;
            console.log("ini jarak: " + distanceSlider() + "\n" + "emisi: " + emisiMesin);
        } else{
            const jarak = parseInt(distanceSlider());
            emisiMesin = jarak*100;
            console.log("ini jarak: " + distanceSlider() + "\n" + "emisi: " + emisiMesin);
        }
    } else if (landTransport.value==='bus') {
        if(fuelType && (fuelType.value === 'diesel' )){
            const jarak = parseInt(distanceSlider());
            emisiMesin = jarak*16;
            console.log("ini jarak: " + distanceSlider() + "\n" + "emisi: " + emisiMesin);

        } else{
            const jarak = parseInt(distanceSlider());
            emisiMesin = jarak*15;
            console.log("ini jarak: " + distanceSlider() + "\n" + "emisi: " + emisiMesin);

        }
    } else if (landTransport.value==='train') {
        if(fuelType && (fuelType.value === 'diesel' )){
            const jarak = parseInt(distanceSlider());
            emisiMesin = jarak*1.44;
            console.log("ini jarak: " + distanceSlider() + "\n" + "emisi: " + emisiMesin);

        } else{
            const jarak = parseInt(distanceSlider());
            emisiMesin = jarak*1.78;
            console.log("ini jarak: " + distanceSlider() + "\n" + "emisi: " + emisiMesin);
        }
    } else{
        if (fuelType && (fuelType.value === 'gasoline')) {

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
            }}
    }};


