<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Clase de ') . $maestro->user->name . ' ' . $maestro->user->apaterno . ' ' . $maestro->user->amaterno }}
        </h2>
    </x-slot>

    <div class="grid grid-cols-1 md:grid-cols-1 gap-4 justify-self-center pt-6 ml-4 mr-4">
        <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">CANAL DE AVISOS</h1>
        <x-card-button ruta="{{route('verAvisos', $maestro->id)}}" titulo="Avisos">
        </x-card-button>
    </div>

    <h1 class="font-semibold text-center mt-10 text-xl text-gray-800 dark:text-gray-200 leading-tight">MATERIAS</h1>
    <div class="grid grid-cols-2 md:grid-cols-3 gap-4 justify-self-center pt-6 ml-4 mr-4">
        @foreach ($maestro->materia as $materia)
            <x-card-button ruta="{{route('verMateriaMaestro', $materia->id)}}" titulo="{{$materia->name}}">
            </x-card-button>
            
        @endforeach
        
    </div>

</x-app-layout>