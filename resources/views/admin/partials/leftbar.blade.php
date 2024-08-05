<aside id="default-sidebar" class=" fixed top-16 bg-white-1 left-0 z-40 w-56 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
   <div class="h-full px-3 py-4 overflow-y-auto bg-white">
      <ul class="space-y-2 font-medium {{ $active=="login"?"hidden":"" }}">
         <li>
            <a href="/" class=" {{ $active=='home'?'bg-mainGreen':' ' }} flex hover:bg-dua items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="{{ $active=='home'?'black':'#8C8A8A' }}" xmlns="http://www.w3.org/2000/svg">
                 <path d="M14.5 23.25C14.1685 23.25 13.8505 23.1183 13.6161 22.8839C13.3817 22.6495 13.25 22.3315 13.25 22V12C13.25 11.6685 13.3817 11.3505 13.6161 11.1161C13.8505 10.8817 14.1685 10.75 14.5 10.75H22C22.3315 10.75 22.6495 10.8817 22.8839 11.1161C23.1183 11.3505 23.25 11.6685 23.25 12V22C23.25 22.3315 23.1183 22.6495 22.8839 22.8839C22.6495 23.1183 22.3315 23.25 22 23.25H14.5ZM2 13.25C1.66848 13.25 1.35054 13.1183 1.11612 12.8839C0.881696 12.6495 0.75 12.3315 0.75 12V2C0.75 1.66848 0.881696 1.35054 1.11612 1.11612C1.35054 0.881696 1.66848 0.75 2 0.75H9.5C9.83152 0.75 10.1495 0.881696 10.3839 1.11612C10.6183 1.35054 10.75 1.66848 10.75 2V12C10.75 12.3315 10.6183 12.6495 10.3839 12.8839C10.1495 13.1183 9.83152 13.25 9.5 13.25H2ZM8.25 10.75V3.25H3.25V10.75H8.25ZM2 23.25C1.66848 23.25 1.35054 23.1183 1.11612 22.8839C0.881696 22.6495 0.75 22.3315 0.75 22V17C0.75 16.6685 0.881696 16.3505 1.11612 16.1161C1.35054 15.8817 1.66848 15.75 2 15.75H9.5C9.83152 15.75 10.1495 15.8817 10.3839 16.1161C10.6183 16.3505 10.75 16.6685 10.75 17V22C10.75 22.3315 10.6183 22.6495 10.3839 22.8839C10.1495 23.1183 9.83152 23.25 9.5 23.25H2ZM3.25 20.75H8.25V18.25H3.25V20.75ZM15.75 20.75H20.75V13.25H15.75V20.75ZM13.25 2C13.25 1.66848 13.3817 1.35054 13.6161 1.11612C13.8505 0.881696 14.1685 0.75 14.5 0.75H22C22.3315 0.75 22.6495 0.881696 22.8839 1.11612C23.1183 1.35054 23.25 1.66848 23.25 2V7C23.25 7.33152 23.1183 7.64946 22.8839 7.88388C22.6495 8.1183 22.3315 8.25 22 8.25H14.5C14.1685 8.25 13.8505 8.1183 13.6161 7.88388C13.3817 7.64946 13.25 7.33152 13.25 7V2ZM15.75 3.25V5.75H20.75V3.25H15.75Z"/>
                 </svg>
                 
               <span class="flex-1 ms-3 whitespace-nowrap">Home</span>
            </a>
         </li>
         <li>
            <a href="/admin/articles" class=" {{ $active=='articles'?'bg-mainGreen':' ' }} flex hover:bg-dua items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
              <svg width="30" height="30" viewBox="0 0 30 30" fill="{{ $active=='articles'?'black':'#8C8A8A' }}" xmlns="http://www.w3.org/2000/svg">
                 <path d="M15 23.7499C13.2898 22.7625 11.3498 22.2427 9.375 22.2427C7.40021 22.2427 5.46022 22.7625 3.75 23.7499V7.49989C5.46022 6.5125 7.40021 5.99268 9.375 5.99268C11.3498 5.99268 13.2898 6.5125 15 7.49989M15 23.7499C16.7102 22.7625 18.6502 22.2427 20.625 22.2427C22.5998 22.2427 24.5398 22.7625 26.25 23.7499V7.49989C24.5398 6.5125 22.5998 5.99268 20.625 5.99268C18.6502 5.99268 16.7102 6.5125 15 7.49989M15 23.7499V7.49989"/>
                 </svg>
                 
               <span class="flex-1 ms-3 whitespace-nowrap">Artikel</span>
            </a>
         </li>
         <li>
            <a href="/report" class=" {{ $active=='report'?'bg-mainGreen':' ' }} flex hover:bg-dua items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
              <svg width="27" height="27" viewBox="0 0 27 27" fill="{{ $active=='report'?'black':'#8C8A8A' }}" xmlns="http://www.w3.org/2000/svg">
                 <path fill-rule="evenodd" clip-rule="evenodd" d="M9.56688 10.8706C8.75082 11.6867 8.20554 12.7341 8.005 13.8706L7.37125 17.4556C7.31867 17.7526 7.33853 18.058 7.42914 18.3457C7.51975 18.6334 7.67843 18.895 7.89172 19.1083C8.10501 19.3216 8.36661 19.4803 8.65432 19.5709C8.94203 19.6615 9.24735 19.6813 9.54438 19.6287L13.1294 18.995C14.2659 18.7945 15.3133 18.2492 16.1294 17.4331L21.8856 11.6769L25.6356 7.92688C25.9478 7.6121 26.1236 7.1871 26.125 6.74375C26.125 5.18726 25.5067 3.69452 24.4061 2.59392C23.3055 1.49331 21.8127 0.875 20.2563 0.875C19.812 0.876378 19.3862 1.0529 19.0712 1.36625L15.3212 5.11625L9.56688 10.8706ZM16.9469 7.46938L11.5544 12.86C11.1467 13.2682 10.8744 13.7918 10.7744 14.36L10.375 16.625L12.64 16.2256L12.7469 16.2069C13.2747 16.0922 13.7584 15.8279 14.14 15.4456L19.5306 10.0531C19.4357 9.40161 19.1329 8.79816 18.6674 8.33261C18.2018 7.86705 17.5984 7.56429 16.9469 7.46938ZM21.7431 7.8425C21.1778 6.72734 20.2722 5.82108 19.1575 5.255L20.695 3.7175C21.3477 3.81187 21.9524 4.11485 22.4188 4.58121C22.8851 5.04756 23.1881 5.65226 23.2825 6.305L21.7431 7.8425ZM13 3.21875C13 2.84579 12.8518 2.4881 12.5881 2.22438C12.3244 1.96066 11.9667 1.8125 11.5938 1.8125H6.4375C4.94566 1.8125 3.51492 2.40513 2.46002 3.46002C1.40513 4.51492 0.8125 5.94566 0.8125 7.4375V20.5625C0.8125 22.0543 1.40513 23.4851 2.46002 24.54C3.51492 25.5949 4.94566 26.1875 6.4375 26.1875H19.5625C21.0543 26.1875 22.4851 25.5949 23.54 24.54C24.5949 23.4851 25.1875 22.0543 25.1875 20.5625V15.4062C25.1875 15.0333 25.0393 14.6756 24.7756 14.4119C24.5119 14.1482 24.1542 14 23.7812 14C23.4083 14 23.0506 14.1482 22.7869 14.4119C22.5232 14.6756 22.375 15.0333 22.375 15.4062V20.5625C22.375 21.3084 22.0787 22.0238 21.5512 22.5512C21.0238 23.0787 20.3084 23.375 19.5625 23.375H6.4375C5.69158 23.375 4.97621 23.0787 4.44876 22.5512C3.92132 22.0238 3.625 21.3084 3.625 20.5625V7.4375C3.625 6.69158 3.92132 5.97621 4.44876 5.44876C4.97621 4.92132 5.69158 4.625 6.4375 4.625H11.5938C11.9667 4.625 12.3244 4.47684 12.5881 4.21312C12.8518 3.9494 13 3.59171 13 3.21875Z"/>
                 </svg>
                 
                 
               <span class="flex-1 ms-3 whitespace-nowrap">Laporan</span>
            </a>
         </li>
         <li>
            <a href="/management" class=" {{ $active=='management'?'bg-mainGreen':' ' }} flex hover:bg-dua items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
              <svg width="30" height="30" viewBox="0 0 30 30" fill="{{ $active=='management'?'black':'#8C8A8A' }}" xmlns="http://www.w3.org/2000/svg">
                 <path d="M8.7941 4.375C7.6691 4.375 6.75785 5.21875 6.62285 6.28375C6.70523 6.26178 6.79008 6.25044 6.87535 6.25H23.1253C23.2128 6.25 23.2966 6.26125 23.3766 6.28375C23.3088 5.75615 23.0511 5.27132 22.6517 4.92C22.2523 4.56867 21.7385 4.37492 21.2066 4.375H8.7941ZM8.56285 24.7875C8.5875 25.0174 8.69622 25.23 8.8681 25.3846C9.03999 25.5392 9.26292 25.6248 9.4941 25.625H20.5028C20.7342 25.6251 20.9575 25.5396 21.1296 25.385C21.3018 25.2304 21.4107 25.0176 21.4353 24.7875L23.2378 8.12C23.2005 8.12377 23.1629 8.12586 23.1253 8.12625H6.87535C6.83735 8.1259 6.7994 8.12381 6.7616 8.12L8.56285 24.7875ZM4.7541 7C4.69266 6.43282 4.75137 5.85906 4.9264 5.31607C5.10144 4.77309 5.38888 4.27306 5.77 3.84854C6.15112 3.42403 6.61738 3.08454 7.13842 2.85219C7.65946 2.61984 8.2236 2.49984 8.7941 2.5H21.2066C21.777 2.50002 22.341 2.62015 22.8619 2.85258C23.3828 3.085 23.8489 3.42451 24.2299 3.84901C24.6108 4.27351 24.8982 4.77347 25.0731 5.31637C25.2481 5.85927 25.3068 6.43292 25.2453 7L23.3003 24.9887C23.226 25.6785 22.8994 26.3165 22.3833 26.78C21.8671 27.2436 21.1978 27.5 20.5041 27.5H9.49535C8.80179 27.5 8.13268 27.2438 7.61656 26.7805C7.10043 26.3172 6.77369 25.6795 6.6991 24.99L4.7541 7ZM14.7403 13.0125C14.7689 12.97 14.8075 12.9351 14.8528 12.911C14.898 12.8869 14.9485 12.8743 14.9997 12.8743C15.051 12.8743 15.1014 12.8869 15.1467 12.911C15.1919 12.9351 15.2305 12.97 15.2591 13.0125L16.0966 14.2625C16.2362 14.4661 16.4506 14.6064 16.693 14.653C16.9355 14.6995 17.1865 14.6485 17.3917 14.5111C17.5968 14.3736 17.7394 14.1608 17.7885 13.9188C17.8376 13.6769 17.7893 13.4253 17.6541 13.2188L16.8178 11.9688C16.6179 11.6699 16.3475 11.425 16.0303 11.2556C15.7132 11.0862 15.3592 10.9976 14.9997 10.9976C14.6402 10.9976 14.2862 11.0862 13.9691 11.2556C13.652 11.425 13.3815 11.6699 13.1816 11.9688L12.3453 13.2188C12.2769 13.3211 12.2293 13.4359 12.2052 13.5567C12.1811 13.6774 12.1811 13.8017 12.205 13.9225C12.229 14.0433 12.2765 14.1582 12.3449 14.2606C12.4133 14.363 12.5011 14.4509 12.6035 14.5194C12.7058 14.5878 12.8206 14.6354 12.9414 14.6595C13.0622 14.6836 13.1865 14.6837 13.3072 14.6597C13.428 14.6357 13.5429 14.5882 13.6453 14.5198C13.7477 14.4515 13.8356 14.3636 13.9041 14.2613L14.7403 13.0125ZM12.0453 15.75C12.2582 15.878 12.4115 16.0851 12.4717 16.3261C12.532 16.567 12.4942 16.8219 12.3666 17.035L11.9116 17.7937C11.8548 17.8885 11.8242 17.9966 11.8228 18.1071C11.8214 18.2176 11.8493 18.3264 11.9037 18.4226C11.958 18.5188 12.0369 18.5988 12.1323 18.6546C12.2277 18.7103 12.3361 18.7398 12.4466 18.74H13.4378C13.6865 18.74 13.9249 18.8388 14.1008 19.0146C14.2766 19.1904 14.3753 19.4289 14.3753 19.6775C14.3753 19.9261 14.2766 20.1646 14.1008 20.3404C13.9249 20.5162 13.6865 20.615 13.4378 20.615H12.4466C10.5041 20.615 9.30409 18.495 10.3028 16.8288L10.7591 16.07C10.8871 15.8568 11.0945 15.7032 11.3357 15.643C11.5769 15.5828 11.8322 15.6208 12.0453 15.7487M17.6366 17.0337C17.5692 16.9281 17.5236 16.81 17.5026 16.6865C17.4816 16.5629 17.4856 16.4364 17.5143 16.3144C17.5431 16.1924 17.596 16.0775 17.6699 15.9763C17.7438 15.8751 17.8373 15.7897 17.9448 15.7253C18.0523 15.6609 18.1716 15.6186 18.2957 15.6011C18.4198 15.5836 18.5461 15.5911 18.6672 15.6232C18.7884 15.6553 18.9018 15.7114 19.0009 15.7882C19.1 15.8649 19.1827 15.9608 19.2441 16.07L19.6991 16.8288C20.6978 18.495 19.4978 20.6137 17.5553 20.6137H16.5628C16.3142 20.6137 16.0757 20.515 15.8999 20.3392C15.7241 20.1633 15.6253 19.9249 15.6253 19.6763C15.6253 19.4276 15.7241 19.1892 15.8999 19.0133C16.0757 18.8375 16.3142 18.7388 16.5628 18.7388H17.5553C17.6659 18.7388 17.7745 18.7095 17.8701 18.6538C17.9656 18.5981 18.0447 18.5181 18.0992 18.4219C18.1538 18.3257 18.1818 18.2167 18.1804 18.1062C18.1791 17.9956 18.1484 17.8874 18.0916 17.7925L17.6366 17.0337Z"/>
                 </svg>
                 
               <span class="flex-1 ms-3 whitespace-nowrap">Sampah</span>
            </a>
         </li>
         <li>
           <a href="/admin/users" class=" {{ $active=='profile'?'bg-mainGreen':'' }} flex hover:bg-dua items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
              
              <svg width="27" height="30" viewBox="0 0 27 30" fill="{{ $active=='profile'?'black':'#8C8A8A' }}" xmlns="http://www.w3.org/2000/svg">
                 <g clip-path="url(#clip0_557_3506)">
                 <path d="M17.8125 7.5C17.8125 6.2568 17.3186 5.06451 16.4396 4.18544C15.5605 3.30636 14.3682 2.8125 13.125 2.8125C11.8818 2.8125 10.6895 3.30636 9.81044 4.18544C8.93136 5.06451 8.4375 6.2568 8.4375 7.5C8.4375 8.7432 8.93136 9.93549 9.81044 10.8146C10.6895 11.6936 11.8818 12.1875 13.125 12.1875C14.3682 12.1875 15.5605 11.6936 16.4396 10.8146C17.3186 9.93549 17.8125 8.7432 17.8125 7.5ZM5.625 7.5C5.625 5.51088 6.41518 3.60322 7.8217 2.1967C9.22822 0.790176 11.1359 0 13.125 0C15.1141 0 17.0218 0.790176 18.4283 2.1967C19.8348 3.60322 20.625 5.51088 20.625 7.5C20.625 9.48912 19.8348 11.3968 18.4283 12.8033C17.0218 14.2098 15.1141 15 13.125 15C11.1359 15 9.22822 14.2098 7.8217 12.8033C6.41518 11.3968 5.625 9.48912 5.625 7.5ZM2.88867 27.1875H23.3613C22.8398 23.4785 19.6523 20.625 15.8027 20.625H10.4473C6.59766 20.625 3.41016 23.4785 2.88867 27.1875ZM0 28.2598C0 22.4883 4.67578 17.8125 10.4473 17.8125H15.8027C21.5742 17.8125 26.25 22.4883 26.25 28.2598C26.25 29.2207 25.4707 30 24.5098 30H1.74023C0.779297 30 0 29.2207 0 28.2598Z"/>
                 </g>
                 <defs>
                 <clipPath id="clip0_557_3506">
                 <rect width="26.25" height="30" fill="white"/>
                 </clipPath>
                 </defs>
                 </svg>
                 
               <span class="flex-1 ms-3 whitespace-nowrap">Pengguna</span>
            </a>
         </li>
      </ul>       
      <div class="w-64 fixed bottom-20 p-3">
       <p class="text-xs text-gray-300">About | Help | Terms and service<br>| Privacy | Contact</p>
       <p class="mt-3 text-xs text-gray-500">@2024 GAIAECHO FROM OTJUL</p>
      </div>

   </div>
 </aside>