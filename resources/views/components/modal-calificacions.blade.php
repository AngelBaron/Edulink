<div id="authentication-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full  max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Calificaciones de <span id="nombremateria"></span>
                </h3>
                <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="authentication-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Cerrar ventana</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5">

                
<div class="relative overflow-x-auto">
    
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                
                <th scope="col" class="px-6 py-3">
                    1er Parcial
                </th>
                <th scope="col" class="px-6 py-3">
                    2do Parcial
                </th>
                <th scope="col" class="px-6 py-3">
                    3er Parcial
                </th>
                <th scope="col" class="px-6 py-3">
                    Promedio
                </th>
            </tr>
        </thead>
        <tbody>
            
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">

                
                    
                    <td class="px-6 py-4">
                        <x-text-input disabled id="parcial1" :value="''" />
                    </td>
                    
                    <td class="px-6 py-4">
                        <x-text-input disabled id="parcial2" :value="''" />
                    </td>
                    <td class="px-6 py-4">
                        <x-text-input disabled id="parcial3" :value="''" />
                    </td>
                    <td class="px-6 py-4">
                        <x-text-input disabled id="promedio" :value="''" />
                    </td>
                

            </tr>
           


        </tbody>
    </table>
</div>

                
            </div>
        </div>
    </div>
</div> 