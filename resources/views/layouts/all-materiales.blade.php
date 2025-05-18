<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
    <div class="mb-4">
        <label for="nombreMaterial" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Buscar</label>
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
            </div>
            <input type="search" id="nombreMaterial"
                class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Buscar material" required />
            <button onclick="ConsultarMaterialesMaestro()"
                class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Buscar</button>
        </div>

    </div>

    <div class="grid grid-cols-2 md:grid-cols-3 gap-5 justify-self-center pt-6" id="materiales">

        @foreach ($materials as $material)
            <x-card-button ruta="{{ route('verArchivo', $material->ubicacion) }}" titulo="{{ $material->file_name }}">
                <p>Presiona para verlo</p>
                <p class="text-sm text-gray-500">Subido el: {{ $material->created_at->format('d/m/Y') }}</p>

                <button class="bg-blue-600 text-white text-xs px-2 py-1 rounded opacity-80 hover:opacity-100 mt-2 mb-2"
                    onclick="event.stopPropagation();event.preventDefault();  setEditModalData('{{ $material->id }}','{{ $material->file_name }}')"
                    data-modal-target="authentication-modal" data-modal-toggle="authentication-modal">Cambiar
                    nombre</button>


                <form action="{{ route('materiales.eliminar', $material->id) }}" method="POST" class="">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        onclick="return confirm('¿Estás seguro de que deseas eliminar este material?')"
                        class="bg-red-600 text-white text-xs px-2 py-1 rounded opacity-80 hover:opacity-100">
                        Eliminar
                    </button>
                </form>
            </x-card-button>
        @endforeach


    </div>

    <x-editarMaterial>

    </x-editarMaterial>


    <div id="authentication-modal2" tabindex="-1" aria-hidden="true"
    class="hidden fixed top-0 right-0 left-0 z-50 flex justify-center items-center w-full h-full bg-black bg-opacity-50">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Editar Materia</h3>
                <button type="button" onclick="cerrarModal()"
                    class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Cerrar ventana</span>
                </button>
            </div>

            <!-- Modal body -->
            <div class="p-4 md:p-5">
                <form class="space-y-4" action="{{ route('editarmaterial') }}" method="POST">
                    @csrf
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre actual</label>
                        <input type="text" id="na2"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="Nombre Actual" required disabled />
                    </div>
                    <div>
                        <label for="name2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nuevo nombre</label>
                        <input type="text" name="name" id="name2" placeholder="Nuevo nombre"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            required />
                    </div>

                    <input type="hidden" name="id" id="id2" value="" />

                    <button type="submit"
                        class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Editar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
