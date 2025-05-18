<div class="min-h-3.5 flex flex-col sm:justify-center  items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">


    <div
        class="w-full sm:max-w-md xl:max-w-6xl mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
        <form method="POST" action="{{ route('AgregarAviso') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="titulo" :value="__('Titulo del aviso')" />
                <x-text-input id="titulo" class="block mt-1 w-full" type="text" name="titulo" :value="old('titulo')"
                    required autofocus autocomplete="titulo" />
                <x-input-error :messages="$errors->get('titulo')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="cuerpo" :value="__('Cuerpo del aviso')" />
                <x-text-input id="cuerpo" class="block mt-1 w-full" type="text" name="cuerpo" :value="old('cuerpo')"
                    required autofocus autocomplete="cuerpo" />
                <x-input-error :messages="$errors->get('cuerpo')" class="mt-2" />
            </div>

            

            <div class="flex items-center justify-center mt-4">
                

                <x-primary-button class="ms-4">
                    {{ __('Crear Aviso') }}
                </x-primary-button>
            </div>
        </form>



    </div>
</div>
