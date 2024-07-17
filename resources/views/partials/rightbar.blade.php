<aside id="default-sidebar" class="absolute top-24 right-4 z-40 w-96 rounded-lg" aria-label="Sidebar">
    <div class="h-full px-3 py-4 rounded-lg overflow-y-auto bg-gray-50 dark:bg-gray-800">
       @if ($active=='articles')
         @for ($i = 0; $i < 5; $i++)
             
<a href="#" class="flex flex-col items-center bg-white md:flex-row md:max-w-xl">
   <div class="flex flex-col justify-between leading-normal pr-1">
      <h5 class="mb-2 text-md font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology acquisitions 2021</h5>
      <p class="mb-3 text-sm font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
   </div>
   <img class="ml-2 object-cover w-full rounded-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg" src="https://picsum.photos/100/100" alt="">
</a>

         @endfor
           
       @endif
    </div>
  </aside>