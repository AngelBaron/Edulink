<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mis calificaciones') }}
        </h2>




    </x-slot>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-5 justify-self-center pt-6">
        @foreach ($materias as $materia)
            @php
                $calificacion = $materia->calificacions->where('alumno_id', $alumno->id)->first();
            @endphp
                <x-card-calificaciones nombre="{{ $materia->name }}" parcial1="{{ $calificacion->parcial1 }}"
                    parcial2="{{ $calificacion->parcial2 }}" parcial3="{{ $calificacion->parcial3 }}">
                    <x-slot name="slot">{{ $materia->name }}</x-slot>
                </x-card-calificaciones>
            
        @endforeach

    </div>

    <x-modal-calificacions>

    </x-modal-calificacions>

</x-app-layout>
