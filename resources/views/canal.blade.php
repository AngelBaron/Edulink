<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Canal de avisos') }}
        </h2>
    </x-slot>

    @include('layouts.form-canal')

    @include('layouts.all-avisos')



</x-app-layout>
