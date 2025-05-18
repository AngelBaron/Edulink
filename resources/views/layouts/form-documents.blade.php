

<div class="min-h-3.5 flex flex-col sm:justify-center  items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">

<form method="POST" action="{{ route('SubirDocumentos') }}" enctype="multipart/form-data">
    @csrf
    <label for="curp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Subir CURP</label>
    <input type="file" name="curp" id="curp" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">

    <label for="acta" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Subir Acta de Nacimiento</label>
    <input type="file" name="acta" id="acta" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">

    <label for="ine" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Subir INE</label>
    <input type="file" name="ine" id="ine" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
    
    <button type="submit" class="mt-4 px-4 py-2 bg-blue-700 text-white rounded hover:bg-blue-800 dark:bg-blue-600 dark:hover:bg-blue-700">
        Guardar documento
    </button>
</form>

</div>