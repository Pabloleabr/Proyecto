<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Estas en el ejercicio
            <span class="font-bold underline">Test Mecanografía</span>

        </h2>
    </x-slot>

    <div class="barra p-2 m-2 ml-0" style="">
        <h2>Test Mecanografía</h2>
    </div>
    <div class="barraroja" style=""></div>

    <div class="sm:m-8 p-2.5 barra rounded-md" style="width:auto">


        <div class="flex flex-col ml-2 mr-2 mb-2 ">
            <div id="quote" class="mb-2">prueba lajsldj awij asd jak</div>
            <form action="{{ route('guardar-solucion', 1) }}" method="POST" class="w-full mt-4 sm:mt-0  mr-2">
                @csrf
                <textarea name="mecanografia" id="mecanografia" cols="50" rows="10" style="resize:none; border: none"
                    class="codigo2 rounded-sm h-40 whitespace-pre-line  w-full p-2.5"></textarea>
                <div class="flex justify-between">
                    @if (!empty(Auth::user()))
                        <input type="submit" value="Subir" class="boton p-1 mt-2 mr-4 hover:bg-green-600 ">
                    @else
                        <p class="m-2">logueate para subir tu resultado</p>
                    @endif

                    <div class="flex">
                        <div id="timer">60</div>
                        <div>s</div>
                    </div>


                </div>
            </form>



        </div>



    </div>
    <script src="{{ asset('js/mecanografy.js') }}"></script>
</x-app-layout>
