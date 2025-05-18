


<div class="flex flex-col items-center justify-center py-8 space-y-6 bg-gray-100 dark:bg-gray-900">


    @foreach ($avisos as $aviso)
    <div class="w-full max-w-3xl bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700 p-6">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">{{__($aviso->titulo)}}</h2>
        <p class="text-gray-700 dark:text-gray-300 text-lg">{{__($aviso->cuerpo)}}</p>
    </div>
    @endforeach

    <!-- Aviso -->
    

    

</div>
