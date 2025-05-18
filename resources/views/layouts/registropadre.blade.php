<div class="min-h-3.5 flex flex-col sm:justify-center  items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">


    <div
        class="w-full sm:max-w-md xl:max-w-6xl mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
        <form method="POST" action="{{ route('RegistrarPadre') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                    required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="apaterno" :value="__('Apellido Paterno')" />
                <x-text-input id="apaterno" class="block mt-1 w-full" type="text" name="apaterno" :value="old('apaterno')"
                    required autofocus autocomplete="apaterno" />
                <x-input-error :messages="$errors->get('apaterno')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="amaterno" :value="__('Apellido Materno')" />
                <x-text-input id="amaterno" class="block mt-1 w-full" type="text" name="amaterno" :value="old('amaterno')"
                    required autofocus autocomplete="amaterno" />
                <x-input-error :messages="$errors->get('amaterno')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>


            

            <div class="mt-4">
                <x-input-label for="nombre_hijo" :value="__('Nombre del hijo')" />
                <x-text-input id="nombre_hijo" class="block mt-1 w-full" type="text" name="nombre_hijo"
                    :value="old('nombre_hijo')" required autofocus autocomplete="nombre_hijo" />
                <x-input-error :messages="$errors->get('nombre_hijo')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="apaterno_hijo" :value="__('Apellido del hijo')" />
                <x-text-input id="apaterno_hijo" class="block mt-1 w-full" type="text" name="apaterno_hijo"
                    :value="old('apaterno_hijo')" required autofocus autocomplete="apaterno_hijo" />
                <x-input-error :messages="$errors->get('apaterno_hijo')" class="mt-2" />
            </div>


            <div class="mt-4">
                <x-input-label for="amaterno_hijo" :value="__('Apellido del hijo')" />
                <x-text-input id="amaterno_hijo" class="block mt-1 w-full" type="text" name="amaterno_hijo"
                    :value="old('amaterno_hijo')" required autofocus autocomplete="amaterno_hijo" />
                <x-input-error :messages="$errors->get('amaterno_hijo')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="role" :value="__('Role')" />
                <select id="role" name="role" class="block mt-1 w-full" disabled>
                    <option value="Alumno" selected>Alumno</option>
                </select>
                <x-input-error :messages="$errors->get('role')" class="mt-2" />
            </div>


            <div class="flex items-center justify-end mt-4">
                

                <x-primary-button class="ms-4">
                    {{ __('Registrar') }}
                </x-primary-button>
            </div>
        </form>



    </div>
</div>
