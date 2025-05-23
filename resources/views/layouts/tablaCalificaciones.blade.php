@if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif


<div class="mb-4">
        <label for="nombreAlumno" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Buscar</label>
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
            </div>
            <input type="search" id="nombreAlumno"
                class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Buscar por nombre y apellido" required />
            <button onclick="ConsultarCalificaciones({{ $materia->id }})"
                class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Buscar</button>
        </div>

    </div>


<div class="relative overflow-x-auto">
    <form action="{{ route('CalificacionesPorMateria', $materia->id) }}" method="POST" class="w-full">
        @csrf
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nombre del estudiante
                    </th>
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
                @foreach ($materia->calificacions as $calificacion)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">

                    
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $calificacion->alumno->nombre_hijo }} {{ $calificacion->alumno->apaterno_hijo }} {{ $calificacion->alumno->amaterno_hijo }}
                        </th>
                        <td class="px-6 py-4">
                            <x-text-input value="{{ $calificacion->parcial1 }}"
                                name="calificacions[{{ $calificacion->alumno->id }}][parcial1]"> </x-text-input>
                        </td>
                        <td class="px-6 py-4">
                            <x-text-input value="{{ $calificacion->parcial2 }}"
                                name="calificacions[{{ $calificacion->alumno->id }}][parcial2]"> </x-text-input>
                        </td>
                        <td class="px-6 py-4">
                            <x-text-input value="{{ $calificacion->parcial3 }}"
                                name="calificacions[{{ $calificacion->alumno->id }}][parcial3]"> </x-text-input>
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ __(($calificacion->parcial1 + $calificacion->parcial2 + $calificacion->parcial3) / 3) }}
                        </td>
                    

                </tr>
                @endforeach


            </tbody>
        </table>
        <div class="flex justify-center mt-4">
            <x-primary-button type="submit" class="ml-3">
                {{ __('Guardar') }}
            </x-primary-button>
    </form>
</div>
