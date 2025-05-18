<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mi Clase') }}
        </h2>

        
    
    </x-slot>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-5 justify-self-center pt-6">

        <x-card-button ruta="{{ route('AgregarMaterias') }}" titulo="Registrar Materias">
            <x-svg-icons>
                <path d="M12 5l0 14"></path>
                <path d="M5 12l14 0"></path>
            </x-svg-icons>
        </x-card-button>

        <x-card-button ruta="{{ route('CalificacionesMaestro') }}" titulo="Registrar Calificaciones" >
            <x-svg-icons>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="24" height="24" stroke-width="2">
                    <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2"></path>
                    <path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z"></path>
                    <path d="M9 14h.01"></path>
                    <path d="M9 17h.01"></path>
                    <path d="M12 16l1 1l3 -3"></path>
                  </svg>
            </x-svg-icons>

                
        </x-card-button>

        <x-card-button ruta="{{ route('ConsultarDocumentos') }}" titulo="Consultar Documentos">
            <x-svg-icons>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="24" height="24" stroke-width="2">
                    <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                    <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2"></path>
                    <path d="M9 12l1.333 5l1.667 -4l1.667 4l1.333 -5"></path>
                  </svg>
            </x-svg-icons>
        
        </x-card-button>

        <x-card-button ruta="{{ route('AgregarMateriales') }}" titulo="Añadir Materiales">
            <x-svg-icons>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="24" height="24" stroke-width="2">
                    <path d="M5 4m0 1a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1v14a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1z"></path>
                    <path d="M9 4m0 1a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1v14a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1z"></path>
                    <path d="M5 8h4"></path>
                    <path d="M9 16h4"></path>
                    <path d="M13.803 4.56l2.184 -.53c.562 -.135 1.133 .19 1.282 .732l3.695 13.418a1.02 1.02 0 0 1 -.634 1.219l-.133 .041l-2.184 .53c-.562 .135 -1.133 -.19 -1.282 -.732l-3.695 -13.418a1.02 1.02 0 0 1 .634 -1.219l.133 -.041z"></path>
                    <path d="M14 9l4 -1"></path>
                    <path d="M16 16l3.923 -.98"></path>
                  </svg>
            </x-svg-icons>
        
        </x-card-button>

    </div>

</x-app-layout>
