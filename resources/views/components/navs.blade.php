@if (Auth::user()->role == 'Admin')
    <x-nav-link :href="route('clases')" :active="request()->routeIs('clases')">
        {{ __('Clases') }}
    </x-nav-link>

    <x-nav-link :href="route('RegistroMaestro')" :active="request()->routeIs('RegistroMaestro')">
        {{ __('Registrar Maestro') }}
    </x-nav-link>
@endif

@if (Auth::user()->role == 'Maestro')
    <x-nav-link :href="route('MiClase')" :active="request()->routeIs('MiClase')">
        {{ __('Mi Clase') }}
    </x-nav-link>

    <x-nav-link :href="route('RegistrarPadre')" :active="request()->routeIs('RegistrarPadre')">
        {{ __('Registrar Padre') }}
    </x-nav-link>

    <x-nav-link :href="route('Canal')" :active="request()->routeIs('Canal')">
        {{ __('Mi canal') }}
    </x-nav-link>
@endif


@if (Auth::user()->role == 'Alumno')
    <x-nav-link :href="route('Calificaciones')" :active="request()->routeIs('Calificaciones')">
        {{ __('Calificaciones') }}
    </x-nav-link>

    <x-nav-link :href="route('Avisos')" :active="request()->routeIs('Avisos')">
        {{ __('Avisos') }}
    </x-nav-link>

    <x-nav-link :href="route('SubirDocumentos')" :active="request()->routeIs('SubirDocumentos')">
        {{ __('Subir Documentos') }}
    </x-nav-link>

    <x-nav-link :href="route('verTodosMateriales')" :active="request()->routeIs('verTodosMateriales')">
        {{ __('Consultar Material de estudio') }}
    </x-nav-link>
@endif
