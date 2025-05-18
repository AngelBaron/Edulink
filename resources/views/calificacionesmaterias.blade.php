<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Registrar Calificaciones') }}
        </h2>
    </x-slot>

    <div class="grid grid-cols-2 md:grid-cols-3 gap-4 justify-self-center pt-6 ml-4 mr-4">
    @foreach ($materias as $materia)
    <x-card-button ruta="{{route('CalificacionesPorMateria',$materia->id)}}" titulo='{{$materia->name}}'>
        Presiona para editar las calificaciones
    </x-card-button>
    @endforeach

    </div>

    <div class="flex  justify-center pt-6">
        <!-- Previous Button -->
        <a href="{{route('MiClase')}}" class="flex items-center justify-center px-4 h-10 me-3 text-base font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
          <svg class="w-3.5 h-3.5 me-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4"/>
          </svg>
          {{__('Regresar')}}
        </a>
      </div>



</x-app-layout>
