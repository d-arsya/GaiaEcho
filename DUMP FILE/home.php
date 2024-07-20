<!doctype html>
<html>

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-200">
   <!-- <<<<<<======== HEADER START ========>>>>>> -->
   <nav class="fixed top-0 z-50 bg-white w-full border-gray-200">
      <div class="w-full flex flex-wrap items-center justify-center mx-auto p-4">
         <div class="flex md:order-2">
            <div class="relative hidden md:block">
               <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                  <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                  </svg>
                  <span class="sr-only">Search icon</span>
               </div>
               <input type="text" id="search-navbar" class="block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Search...">
            </div>
         </div>
      </div>
   </nav>
   <!-- <<<<<<======== HEADER END ========>>>>>> -->
   <!-- <<<<<<======== LEFTSIDE START ========>>>>>> -->
   <aside id="default-sidebar" class="fixed top-16 bg-white left-0 z-40 w-56 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
      <div class="h-full px-3 py-4 overflow-y-auto bg-white dark:bg-gray-800">
         <ul class="space-y-2 font-medium">
            <li>
               <a href="/" class="bg-green-400 flex hover:bg-slate-300 items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                  <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                     <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z" />
                  </svg>
                  <span class="flex-1 ms-3 whitespace-nowrap">Home</span>
               </a>
            </li>
            <li>
               <a href="/articles" class="flex hover:bg-slate-300 items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                  <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                     <path d="m17.418 3.623-.018-.008a6.713 6.713 0 0 0-2.4-.569V2h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2H9.89A6.977 6.977 0 0 1 12 8v5h-2V8A5 5 0 1 0 0 8v6a1 1 0 0 0 1 1h8v4a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-4h6a1 1 0 0 0 1-1V8a5 5 0 0 0-2.582-4.377ZM6 12H4a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Z" />
                  </svg>
                  <span class="flex-1 ms-3 whitespace-nowrap">Article</span>
               </a>
            </li>
            <li>
               <a href="/reports" class="flex hover:bg-slate-300 items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                  <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                     <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                  </svg>
                  <span class="flex-1 ms-3 whitespace-nowrap">Report</span>
               </a>
            </li>
            <li>
               <a href="/calculator" class="flex hover:bg-slate-300 items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                  <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                     <path d="M17 5.923A1 1 0 0 0 16 5h-3V4a4 4 0 1 0-8 0v1H2a1 1 0 0 0-1 .923L.086 17.846A2 2 0 0 0 2.08 20h13.84a2 2 0 0 0 1.994-2.153L17 5.923ZM7 9a1 1 0 0 1-2 0V7h2v2Zm0-5a2 2 0 1 1 4 0v1H7V4Zm6 5a1 1 0 1 1-2 0V7h2v2Z" />
                  </svg>
                  <span class="flex-1 ms-3 whitespace-nowrap">Calculator</span>
               </a>
            </li>
            <li>
               <a href="/management" class="flex hover:bg-slate-300 items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                  <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3" />
                  </svg>
                  <span class="flex-1 ms-3 whitespace-nowrap">Management</span>
               </a>
            </li>
            <li>
               <a href="/profile" class="flex hover:bg-slate-300 items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                  <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                     <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.96 2.96 0 0 0 .13 5H5Z" />
                     <path d="M6.737 11.061a2.961 2.961 0 0 1 .81-1.515l6.117-6.116A4.839 4.839 0 0 1 16 2.141V2a1.97 1.97 0 0 0-1.933-2H7v5a2 2 0 0 1-2 2H0v11a1.969 1.969 0 0 0 1.933 2h12.134A1.97 1.97 0 0 0 16 18v-3.093l-1.546 1.546c-.413.413-.94.695-1.513.81l-3.4.679a2.947 2.947 0 0 1-1.85-.227 2.96 2.96 0 0 1-1.635-3.257l.681-3.397Z" />
                     <path d="M8.961 16a.93.93 0 0 0 .189-.019l3.4-.679a.961.961 0 0 0 .49-.263l6.118-6.117a2.884 2.884 0 0 0-4.079-4.078l-6.117 6.117a.96.96 0 0 0-.263.491l-.679 3.4A.961.961 0 0 0 8.961 16Zm7.477-9.8a.958.958 0 0 1 .68-.281.961.961 0 0 1 .682 1.644l-.315.315-1.36-1.36.313-.318Zm-5.911 5.911 4.236-4.236 1.359 1.359-4.236 4.237-1.7.339.341-1.699Z" />
                  </svg>
                  <span class="flex-1 ms-3 whitespace-nowrap">Profile</span>
               </a>
            </li>
         </ul>
         <div class="w-64 fixed bottom-20 p-3">
            <p class="text-sm text-gray-300">About | Help | Terms and service | Privacy | Contact</p>
            <p class="mt-3 text-sm text-gray-500">@2024 GAIAECHO FROM OTJUL</p>
         </div>

      </div>
   </aside>
   <!-- <<<<<<======== LEFTSIDE END ========>>>>>> -->
   <!-- <<<<<<======== MAIN CONTENT START ========>>>>>> -->
   <div class="ml-56 mr-96 mt-16 p-4 pr-8 pt-8">
      <div class="flex flex-col space-y-4">
         <div class="p-4 w-full bg-white rounded-lg">
            <h1 class="font-bold text-lg">Post something</h1>
            <div class="my-3 w-full h-px bg-black"></div>
            <div class="flex flex-row items-center">
               <img src="https:/picsum.photos/100/100" class="w-10 rounded-full" alt="">
               <div class="relative ml-4 w-full inline">
                     <svg class="absolute right-4 top-3 w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                     </svg>
                  <input type="text" id="search-navbar" class="w-full block p-2 ps-5 pe-10 text-md text-gray-900 rounded-full bg-gray-100" placeholder="What's on your mind?">
               </div>

            </div>
         </div>
         <?php for($i=0;$i<10;$i++):?>
         <div class="p-4 w-full bg-white rounded-lg">
            <div class="flex flex-row h-10 justify-between items-center">
               <span class="flex flex-row">
                  <img src="https://picsum.photos/100/100" class="w-10 rounded-full mr-3" alt="">
                  <span>
                     <h1 class="font-bold">John Dee</h1>
                     <h1 class="text-xs font-thin text-grey-200">10 Minuser ago</h1>
                  </span>
               </span>
               <span class="">
               <svg width="21" height="27" class="w-5" viewBox="0 0 21 27" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M10.894 21.3309L10.5001 21.162L10.1062 21.3309L1.29175 25.1085V3.29167C1.29175 2.78333 1.49368 2.29582 1.85313 1.93638C2.21257 1.57693 2.70008 1.375 3.20841 1.375H17.7917C18.3001 1.375 18.7876 1.57693 19.147 1.93638C19.5065 2.29582 19.7084 2.78334 19.7084 3.29167V25.1085L10.894 21.3309Z" stroke="#8C8A8A" stroke-width="2"/>
</svg>
               </span>
            </div>
            <p class="mt-3 text-justify">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Natus corporis, voluptas beatae harum aperiam molestiae id temporibus dicta delectus. Quidem laborum sit aut dolorem excepturi cupiditate fugiat repudiandae dignissimos. Ea, quasi? Delectus perferendis, eos in doloremque error at molestiae laudantium repellat nisi, explicabo tempore! Dolorem a veritatis voluptas voluptate consequatur dicta minima quia neque soluta minus fugit architecto incidunt libero est quisquam, aperiam dolorum atque! Illo quod tempora cumque assumenda corporis dolorem! Est cupiditate aperiam molestiae ea expedita, recusandae molestias similique iste eaque amet ipsam facilis minus totam placeat iure excepturi, provident modi voluptatum aut ipsa necessitatibus! Consequatur, porro numquam.</p>
            <div class="mt-5 w-full h-96 overflow-y-hidden flex items-center rounded-lg justify-center">
               <img src="https://picsum.photos/500/300" class="w-full" alt="">
            </div>
            <div class="mt-5 flex flex-column items-center">
            <span class="mr-5">
               <img src="comment.svg" class="w-6 inline" alt="">
               <p class="inline">100 comments</p>
            </span>
            <span class="mr-5">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-6 inline" viewBox="0 0 16 16">
  <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15"/>
</svg>



               <p class="inline">100 likes</p>
            </span>
            </div>
         </div>
         <?php endfor;?>
      </div>
   </div>
   <!-- <<<<<<======== MAIN CONTENT END ========>>>>>> -->
   <!-- <<<<<<======== RIGHTSIDE START ========>>>>>> -->


   <aside id="default-sidebar" class="absolute top-24 right-4 z-40 w-96 rounded-lg" aria-label="Sidebar">
      <div class="h-full px-3 py-4 rounded-lg overflow-y-auto bg-gray-50 dark:bg-gray-800">
            <div class="mt-2 flex">
               <div class="flex flex-col mr-2">
                  <div class="flex flex-row gap-1">
                     <img src="https://picsum.photos/100/100" class="rounded-full w-4 mb-2" alt="">
                        <a href="" class="text-green-400 text-xs font-bold">CNN Indonesia</a>
                        <span class="text-xs text-gray-300 font-bold">1 minutes ago</span>
                  </div>
                  <a href="" class="text-sm font-semibold mb-2">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Doloremque, explicabo!</a>
               </div>
                  <img src="https://picsum.photos/100/100" alt="Image" class="object-cover w-24 rounded-lg">
            </div>
      </div>
   </aside>
   <!-- <<<<<<======== RIGHTSIDE END ========>>>>>> -->

</body>

</html>