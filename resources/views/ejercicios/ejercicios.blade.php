<x-app-layout>
    <div class="p-4">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Ejercicios
        </h2>
    </x-slot>
    @include('ejercicios.ejercicios-component')

    </div>
</x-app-layout>
