<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Estas en el ejercicio
            <span class="font-bold underline">{{$ejercicio->titulo}}</span>
             de
            <span class="font-bold underline">{{$ejercicio->user->name}}</span>
        </h2>
    </x-slot>

    @include('ejercicios.ejercicio-c')
</x-app-layout>


