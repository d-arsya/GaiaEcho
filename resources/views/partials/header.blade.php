<nav class="fixed top-0 z-10 bg-white w-full">
   <div class="flex bg-red justify-between py-4 px-8">
    <img src="{{ asset('assets/logo_horizontal.png') }}" class="w-48" alt="">
     <div class="relative w-2/5 items-center hidden md:flex">
       <input type="text" id="search-navbar" class="block w-full p-2 ps-5 pe-10 text-sm text-gray-900 rounded-full bg-gray-200 focus:ring-blue-500 focus:border-blue-500" placeholder="Cari...">
       <div class="absolute inset-y-0 end-0 flex items-center pe-5">
         <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
           <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
         </svg>
       </div>
     </div>
     <div class="w-10 h-10 flex justify-center items-center rounded-full bg-gray-200">
      <img src="{{ asset('assets/lonceng.svg') }}" class="w-6" alt="">
     </div>
   </div>
 </nav>