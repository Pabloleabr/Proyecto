<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Haz tu Pregunta
        </h2>
    </x-slot>
    <div class="font-semibold text-xl text-white barra p-2 m-6" style="width: 77.8vw;">
        <h2 >
            Haz tu Pregunta
        </h2>
        <div class="barraroja" style="width: 77.8vw;"></div>
    </div>
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
                class="text-white block w-full p-2.5 codigo"
                required>{{old('descripcion', '')}}</textarea>
        </div>

        <button type="submit"
            class=" boton ">
            Subir Pregunta</button>
    </form>

</x-app-layout>
