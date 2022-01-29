<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Crear Ejercicio
        </h2>
    </x-slot>

    <form action="{{ route('guardar-ejer') }}" method="POST" class="m-8">
        @csrf
        <div class="mb-6">
            <label for="titulo" class="text-m font-medium text-gray-900 block mb-2 dark:text-gray-300">
                Título</label>
            <input name="titulo" type="text" id="titulo" value="{{ old('titulo') }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                required>
        </div>
        <div class="mb-6">
            <label for="descripcion" class="text-m font-medium text-gray-900 block mb-2 dark:text-gray-300">
                Descrición</label>
            <textarea name="descripcion" id="descripcion" cols="30" rows="10" style="resize: none"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                required>{{old('descripcion', '')}}</textarea>
        </div>

        <div class="mb-6">
            <label for="dificultad" class="text-m font-medium text-gray-900 block mb-2 dark:text-gray-300">
                Dificultad</label>
            <select name="dificultad" type="text" id="dificultad"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                required>
                <option value="facil">facil</option>
                <option value="normal">normal</option>
                <option value="dificil">dificil</option>
                <option value="extremo">extremo</option>
            </select>

            <span class="mt-2 text-m font-medium text-gray-900 block mb-2 dark:text-gray-300">Lenguajes</span>
            <div id='lenguajesdiv'
                class="flex bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-full p-2.5 ">

                @foreach ($lenguajes as $lenguaje)
                    <input name='lenguajes[]' type="checkbox" value="{{ $lenguaje->id }}">
                    <span class="ml-1 mr-4">{{ $lenguaje->lenguaje }}</span>
                @endforeach

            </div>

        </div>

        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 rounded-lg text-m px-5 py-2.5 text-center ">
            crear</button>
    </form>

</x-app-layout>
