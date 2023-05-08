<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Estas
            <span class="font-bold underline">{{$pregunta->titulo}}</span>

        </h2>
    </x-slot>

    @livewire('pregunta-show', ['pregunta' => $pregunta])

</x-app-layout>
