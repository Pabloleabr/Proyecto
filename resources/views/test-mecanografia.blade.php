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
            <div id="quote" class="mb-2"></div>
            <form action="#" method="POST" class="w-full mt-4 sm:mt-0  mr-2">
                @csrf
                <textarea name="mecanografia" id="mecanografia" cols="50" rows="10" style="resize:none; border: none"
                    class="codigo2 rounded-sm h-40 whitespace-pre-line  w-full p-2.5"></textarea>
                <div class="flex justify-between">
                    @if (!empty(Auth::user()))
                    @else
                    <p class="m-2">logueate para guardar tus resultados</p>
                    @endif

                    <div class="flex">
                        <div id="timer">60</div>
                        <div>s</div>
                    </div>


                </div>
            </form>
            <dialog id="resultados" class="codigo rounded" style="width: 40vw;  border:1px solid whitesmoke;">
                <div class="flex flex-col p-2" >
                    <p>Pulsaciones: (<span class="correcto" id="bien"></span>|<span class="incorrecto" id="mal"></span>)
                        <span id="total"></span></p>
                    <p>Aciertos: <span id="aciertos"></span>%</p>

                        <form action="{{ route('store-mecanotest') }}" method="post" id="form">
                            @csrf
                        @if (!empty(Auth::user()))
                            <input type="hidden" name="pulsaciones" id="pulsaciones" style="display: none">
                            <input type="hidden" name="correctas" id="correctas" style="display: none">

                            <input type="submit" value="Guardar" id="guardar" class="boton p-1 mt-2 mr-4 hover:bg-green-600 ">

                        @endif
                            <button class="boton p-1 mt-2 mr-4" id="cerrar">Cerrar</button>
                        </form>

                </div>
            </dialog>


        </div>



    </div>
    <div class="sm:flex">
        @if (!empty(Auth::user()))
        @livewire('mecanotest')
        @endif
        <div class="sm:m-8 p-2.5 ">
            <h2 class="underline">Tus ultimos 5:</h2>
            <div id="lastresults">

            </div>
        </div>
    </div>
    <div class="flex">
        @if (!empty(Auth::user()))
            @livewire('mecano-place')
        @endif
    </div>
    <script src="{{ asset('js/mecanografy.js') }}"></script>

</x-app-layout>
