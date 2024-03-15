
<x-app-layout>

    <div class="py-12">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 md:gap-6 xl:grid-cols-5 2xl:gap-7.5">
            <!-- Card Item Start -->
            <div
              class="rounded-lg border border-stroke bg-white py-6 px-7.5 shadow-default dark:border-strokedark dark:bg-boxdark">
              <div class="flex h-11.5 w-11.5 items-center rounded-full bg-meta-2 dark:bg-meta-4">
                <svg class="w-12 h-12 text-blue-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4H1m3 4H1m3 4H1m3 4H1m6.071.286a3.429 3.429 0 1 1 6.858 0M4 1h12a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1Zm9 6.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z"/>
                </svg>
              </div>

              <div class="mt-4 flex items-end justify-between px-2">
                <div>

                  <span class="text-lg font-medium">Total des enfants</span>
                </div>

                <span class="flex items-center gap-1 text-lg font-medium text-meta-3">
                    <h4 class="text-title-md font-bold text-black dark:text-white">
                        @if($enfants->count()==0)
                        <h3>0</h3>
                      @else
                        <h3>{{$enfants->count()}}</h3>
                      @endif
                      </h4>

                </span>
              </div>
            </div>
            <!-- Card Item End -->

            <!-- Card Item Start -->
            <div
              class="rounded-lg border border-stroke bg-white py-6 px-7.5 shadow-default dark:border-strokedark dark:bg-boxdark">
              <div class="flex px-1 h-11.5 w-11.5 items-center rounded-full bg-meta-2 dark:bg-meta-4">

                <svg class="w-12 h-12 text-green-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M19.728 10.686c-2.38 2.256-6.153 3.381-9.875 3.381-3.722 0-7.4-1.126-9.571-3.371L0 10.437V18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-7.6l-.272.286Z"/>
                    <path d="m.135 7.847 1.542 1.417c3.6 3.712 12.747 3.7 16.635.01L19.605 7.9A.98.98 0 0 1 20 7.652V6a2 2 0 0 0-2-2h-3V3a3 3 0 0 0-3-3H8a3 3 0 0 0-3 3v1H2a2 2 0 0 0-2 2v1.765c.047.024.092.051.135.082ZM10 10.25a1.25 1.25 0 1 1 0-2.5 1.25 1.25 0 0 1 0 2.5ZM7 3a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v1H7V3Z"/>
                </svg>
              </div>

              <div class="mt-4 flex items-end justify-between px-2">
                <div>

                  <span class="text-lg font-medium">Total des répétiteurs</span>
                </div>

                <span class="flex items-center gap-1 text-lg font-medium text-meta-3">
                    <h4 class="text-title-md font-bold text-black dark:text-white">
                        @if($repetiteur->count()==0)
                        <h3>0</h3>
                      @else
                        <h3>{{$repetiteur->count()}}</h3>
                      @endif
                      </h4>

                </span>
              </div>
            </div>
            <!-- Card Item End -->

            <!-- Card Item Start -->
            <div
              class="rounded-lg border border-stroke bg-white py-6 px-7.5 shadow-default dark:border-strokedark dark:bg-boxdark">
              <div class="flex h-11.5 w-11.5 items-center rounded-full bg-meta-2 dark:bg-meta-4">

                <svg class="w-12 h-12  text-yellow-400 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
                    <path d="M16 14V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v15a3 3 0 0 0 3 3h12a1 1 0 0 0 0-2h-1v-2a2 2 0 0 0 2-2ZM4 2h2v12H4V2Zm8 16H3a1 1 0 0 1 0-2h9v2Z"/>
                </svg>
              </div>

              <div class="mt-4 flex items-end justify-between px-2">
                <div>

                  <span class="text-lg font-medium">Total des demandes</span>
                </div>

                <span class="flex items-center gap-1 text-lg font-medium text-meta-3">
                    <h4 class="text-title-md font-bold text-black dark:text-white">
                        @if($demande->count()==0)
                        <h3>0</h3>
                      @else
                        <h3>{{$demande->count()}}</h3>
                      @endif
                      </h4>

                </span>
              </div>
            </div>
            <!-- Card Item End -->

            <!-- Card Item Start -->
            <div
              class="rounded-lg border border-stroke bg-white py-6 px-7.5 shadow-default dark:border-strokedark dark:bg-boxdark">
              <div class="flex px-1 h-11.5 w-11.5 items-center rounded-full bg-meta-2 dark:bg-meta-4">
                <svg class="flex-shrink-0 w-12 h-12 text-orange-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                <path
                    d="M17 5.923A1 1 0 0 0 16 5h-3V4a4 4 0 1 0-8 0v1H2a1 1 0 0 0-1 .923L.086 17.846A2 2 0 0 0 2.08 20h13.84a2 2 0 0 0 1.994-2.153L17 5.923ZM7 9a1 1 0 0 1-2 0V7h2v2Zm0-5a2 2 0 1 1 4 0v1H7V4Zm6 5a1 1 0 1 1-2 0V7h2v2Z" />
            </svg>
              </div>


              <div class="mt-4 flex items-end justify-between px-2">
                <div>

                  <span class="text-lg font-medium">Total des écoles</span>
                </div>

                <span class="flex items-center gap-1 text-lg font-medium text-meta-3">
                    <h4 class="text-title-md font-bold text-black dark:text-white">
                        @if($ecole->count()==0)
                        <h3>0</h3>
                      @else
                        <h3>{{$ecole->count()}}</h3>
                      @endif
                      </h4>

                </span>

              </div>

            </div>



  <!-- Card Item Start -->
            <div
              class="rounded-lg border border-stroke bg-white py-6 px-7.5 shadow-default dark:border-strokedark dark:bg-boxdark">
              <div class="flex px-1 h-11.5 w-11.5 items-center rounded-full bg-meta-2 dark:bg-meta-4">
                <svg class="flex-shrink-0 w-12 h-12 text-violet-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                <path
                    d="M17 5.923A1 1 0 0 0 16 5h-3V4a4 4 0 1 0-8 0v1H2a1 1 0 0 0-1 .923L.086 17.846A2 2 0 0 0 2.08 20h13.84a2 2 0 0 0 1.994-2.153L17 5.923ZM7 9a1 1 0 0 1-2 0V7h2v2Zm0-5a2 2 0 1 1 4 0v1H7V4Zm6 5a1 1 0 1 1-2 0V7h2v2Z" />
            </svg>
              </div>


              <div class="mt-4 flex items-end justify-between px-2">
                <div>

                  <span class="text-lg font-medium">Total des librairies</span>
                </div>

                <span class="flex items-center gap-1 text-lg font-medium text-meta-3">
                    <h4 class="text-title-md font-bold text-black dark:text-white">
                        @if($librairie->count()==0)
                        <h3>0</h3>
                      @else
                        <h3>{{$librairie->count()}}</h3>
                      @endif
                      </h4>

                </span>

              </div>

            </div>


            <!-- Card Item End -->
          </div>
      <div class="p-2 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
         <div class="grid grid-cols-3 gap-4 mb-4">
            <div class="flex items-center justify-center h-24 rounded bg-gray-50 dark:bg-gray-800">
               <p class="text-2xl text-gray-400 dark:text-gray-500">
                  <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                  </svg>
               </p>
            </div>
            <div class="flex items-center justify-center h-24 rounded bg-gray-50 dark:bg-gray-800">
               <p class="text-2xl text-gray-400 dark:text-gray-500">
                  <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                  </svg>
               </p>
            </div>
            <div class="flex items-center justify-center h-24 rounded bg-gray-50 dark:bg-gray-800">
               <p class="text-2xl text-gray-400 dark:text-gray-500">
                  <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                  </svg>
               </p>
            </div>
         </div>
         <div class="flex items-center justify-center h-48 mb-4 rounded bg-gray-50 dark:bg-gray-800">
            <p class="text-2xl text-gray-400 dark:text-gray-500">
               <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
               </svg>
            </p>
         </div>
         <div class="grid grid-cols-2 gap-4 mb-4">
            <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
               <p class="text-2xl text-gray-400 dark:text-gray-500">
                  <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                  </svg>
               </p>
            </div>
            <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
               <p class="text-2xl text-gray-400 dark:text-gray-500">
                  <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                  </svg>
               </p>
            </div>
         </div>

      </div>
   </div>
   </x-app-layout>
{{--  <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-welcome />
            </div>
        </div>
    </div>
</x-app-layout>  --}}
