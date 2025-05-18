<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="relative overflow-x-auto">

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
                    @foreach ($calificaciones as $calificacion)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">


                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $calificacion->alumno->nombre_hijo }} {{ $calificacion->alumno->apaterno_hijo }}
                                {{ $calificacion->alumno->amaterno_hijo }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $calificacion->parcial1 }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $calificacion->parcial2 }}

                            </td>
                            <td class="px-6 py-4">
                                {{ $calificacion->parcial3 }}

                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ __(($calificacion->parcial1 + $calificacion->parcial2 + $calificacion->parcial3) / 3) }}
                            </td>


                        </tr>
                    @endforeach


                </tbody>
            </table>

        </div>

    </div>


</x-app-layout>
