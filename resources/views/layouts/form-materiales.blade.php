@if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

<div class="min-h-3.5 flex flex-col sm:justify-center  items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">

<form method="POST" action="{{ route('AgregarMateriales') }}" enctype="multipart/form-data">
    @csrf
    <label for="file" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Subir Material</label>
    <input type="file" name="file" id="file" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
    
    <button type="submit" class="mt-4 px-4 py-2 bg-blue-700 text-white rounded hover:bg-blue-800 dark:bg-blue-600 dark:hover:bg-blue-700">
        Guardar documento
    </button>
</form>

</div>