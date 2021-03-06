<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Crea tu ejercicio
        </h2>
    </x-slot>
    <div class="font-semibold text-xl text-white barra p-2 m-6" style="width: auto;">
        <h2 >
            Crea tu ejercicio
        </h2>
    </div>
    <div class="barraroja create"
    style="transform: translate(28px, -145%); margin-bottom:-55px;"></div>
    <form action="{{ route('guardar-ejer') }}" method="POST" class="m-8">
        @csrf
        <div class="mb-6">
            <label for="titulo" class="text-lg font-semibold ">
                Título:</label>
            <input name="titulo" type="text" id="titulo" value="{{ old('titulo') }}"
                class="text-white block w-full p-2.5 codigo"
                required>
        </div>
        <div class="mb-6">
            <label for="descripcion" class="text-lg font-semibold ">
                Descrición:</label>
            <textarea name="descripcion" id="descripcion" cols="30" rows="10" style="resize: none"
                class="text-white block w-full p-2.5 codigo whitespace-pre"
                required>{{old('descripcion', '')}}</textarea>
        </div>

        <div class="mb-6">
            <label for="dificultad" class="text-lg font-semibold ">
                Dificultad:</label>
            <select name="dificultad" type="text" id="dificultad"
                class="text-white block w-full p-2.5 codigo"
                required>
                <option value="facil">facil</option>
                <option value="normal">normal</option>
                <option value="dificil">dificil</option>
                <option value="extremo">extremo</option>
            </select>


        </div>
        <span class=" text-lg font-semibold">Lenguajes:</span>
        <div id='lenguajesdiv'
            class="flex text-white codigo w-full p-2.5  mb-4 flex-wrap">

            @foreach ($lenguajes as $lenguaje)
            <div class="flex">
                <input name='lenguajes[]' type="checkbox" value="{{ $lenguaje->id }}" class="mt-1">
                <span class="ml-2 mr-6">{{ $lenguaje->lenguaje }}</span>
            </div>
            @endforeach

        </div>

        <button type="submit"
            class=" boton w-full sm:w-4/12">
            Subir Ejercicio</button>
    </form>

</x-app-layout>
