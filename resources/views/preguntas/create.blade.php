<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Haz tu Pregunta
        </h2>
    </x-slot>
    <div class="font-semibold text-xl text-white barra p-2 m-6" style="width: auto">
        <h2 >
            Haz tu Pregunta
        </h2>
    </div>
    <div class="barraroja create" style="transform: translate(28px, -145%); margin-bottom:-55px;"></div>
    <form action="{{ route('store-pregunta') }}" method="POST" class="m-8">
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

        <button type="submit"
            class=" boton w-full sm:w-4/12">
            Subir Pregunta</button>
    </form>

</x-app-layout>
