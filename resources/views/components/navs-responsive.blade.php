@if (Auth::user()->role == 'Admin')
    <x-responsive-nav-link :href="route('clases')" :active="request()->routeIs('clases')">
        {{ __('Clases') }}
    </x-responsive-nav-link>

    <x-responsive-nav-link :href="route('RegistroMaestro')" :active="request()->routeIs('RegistroMaestro')">
        {{ __('Registrar Maestro') }}
    </x-responsive-nav-link>
@endif

@if (Auth::user()->role == 'Maestro')
    <x-responsive-nav-link :href="route('MiClase')" :active="request()->routeIs('MiClase')">
        {{ __('Mi Clase') }}
    </x-responsive-nav-link>

    <x-responsive-nav-link :href="route('RegistrarPadre')" :active="request()->routeIs('RegistrarPadre')">
        {{ __('Registrar Padre') }}
    </x-responsive-nav-link>

    <x-responsive-nav-link :href="route('Canal')" :active="request()->routeIs('Canal')">
        {{ __('Mi canal') }}
    </x-responsive-nav-link>
@endif


@if (Auth::user()->role == 'Alumno')
    <x-responsive-nav-link :href="route('Calificaciones')" :active="request()->routeIs('Calificaciones')">
        {{ __('Calificaciones') }}
    </x-responsive-nav-link>

    <x-responsive-nav-link :href="route('Avisos')" :active="request()->routeIs('Avisos')">
        {{ __('Avisos') }}
    </x-responsive-nav-link>

    <x-responsive-nav-link :href="route('SubirDocumentos')" :active="request()->routeIs('SubirDocumentos')">
        {{ __('Subir Documentos') }}
    </x-responsive-nav-link>
@endif
