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
    const labelsEngine = ["1000", "1200", "1500", "1600", "1800", "2000", "2200", "2400", "2500", "2800", "3000", ">3000"];
    if (sliderEngine) {
        sliderEngine.addEventListener('input', () => {
            sliderEngineValue.textContent = labelsEngine[sliderEngine.value];
        });
        sliderEngineValue.textContent = labelsEngine[sliderEngine.value];
    }

    const sliderDistance = cardWrapper.querySelector('#steps-distance');
    const sliderDistanceValue = cardWrapper.querySelector('#slider-distance-value');
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
