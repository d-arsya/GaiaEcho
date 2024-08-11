{{-- vehicle list --}}
<div id="kendaraan" class="hidden px-12 md:px-4 pt-4 ">
    <h2 class="font-bold mb-4">Daftar Kendaraan :</h2>
    <div id="emisi-wrapper" class="flex">
        <img src="{{asset('assets/car-green.svg')}}" alt="">
        <div class="detail-emision flex flex-col ml-3">
            <p class="font-bold">Land Cruiser</p>
            <p class="text-bold">Diesel</p>
        </div>
        <p class="text-mainGreen ml-3">2.4 ton CO2/Tahun</p>
    </div>

</div>
@push('scripts')
<script src="{{ asset('js/calculator.js') }}"></script>

@endpush