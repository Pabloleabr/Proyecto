<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>
    <div class="flex flex-col">
        <h2>Ratings recibidos</h2>
        <div class="flex">
            <div class="mr-2" style="width:95%">
                <div class="flex rounded-lg codigo2 h-4 mt-1" style="width:100%"></div>
                <div id="pointsBar" class="flex rounded-lg bg-yellow-500 h-4" style="width:50%; transform:translateY(-1rem)"></div>
            </div>
            <span id="points" class="text-lg text-yellow-500">{{$points}}</span>
        </div>
        <div class="flex justify-between">
            <div id=current></div>
            <div id=next></div>
        </div>
        <livewire:dashboard>
    </div>


</x-app-layout>
