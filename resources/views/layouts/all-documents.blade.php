<div class="grid grid-cols-2 md:grid-cols-3 gap-5 justify-self-center pt-6">
    @php
        $validado = 0;
    @endphp
    @foreach ($documents as $document)
        <x-card-button ruta="{{ route('verDocument', $document->ubicacion) }}" titulo="{{ $document->file_name }}">
            <p>Estado :
                @if ($document->validado == 1)
                    <span class="text-green-500">Validado</span>
                @elseif ($document->validado == 0)
                    <span class="text-yellow-500">No validado</span>
                @elseif ($document->validado == 2)
                    <span class="text-red-500">Rechazado</span>
                    @php
                        $validado = 2;
                    @endphp
                @endif

            </p>

        </x-card-button>
    @endforeach

</div>


@if ($validado == 2)
    <div class="min-h-3.5 flex flex-col sm:justify-center  items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">Actualizar</h1>
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">Porfavor vuelve a subir los documentos</h1>
        <form method="POST" action="{{ route('ActualizarDocumentos') }}" enctype="multipart/form-data">
            @csrf
            <label for="curp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Subir
                CURP</label>
            <input type="file" name="curp" id="curp"
                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">

            <label for="acta" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Subir Acta de
                Nacimiento</label>
            <input type="file" name="acta" id="acta"
                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">

            <label for="ine" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Subir INE</label>
            <input type="file" name="ine" id="ine"
                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">

            <button type="submit"
                class="mt-4 px-4 py-2 bg-blue-700 text-white rounded hover:bg-blue-800 dark:bg-blue-600 dark:hover:bg-blue-700">
                Actualizar Documentos
            </button>
        </form>

    </div>
@endif
