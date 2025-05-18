<div class="min-h-3.5 flex flex-col sm:justify-center  items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">


    <div
        class="w-full sm:max-w-md xl:max-w-6xl mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
        <form method="POST" action="{{ route('RegistroMaestro') }}">
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
                <x-input-label for="role" :value="__('Role')" />
                <select id="role" name="role" class="block mt-1 w-full" disabled>
                    <option value="Maestro" selected>Maestro</option>
                </select>
                <x-input-error :messages="$errors->get('role')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                    href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button class="ms-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>



    </div>
</div>
