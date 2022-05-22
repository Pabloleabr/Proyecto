<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Estas en el ejercicio
            <span class="font-bold underline">{{$ejercicio->titulo}}</span>
             de
            <span class="font-bold underline">{{$ejercicio->user->name}}</span>
        </h2>
    </x-slot>


    <div class="sm:m-8 p-2.5 barra rounded-md" style="width:auto">
        <div class="flex justify-between">
            <h2 class="font-semibold text-2xl leading-tight underline mb-2">
                {{$ejercicio->titulo}} <span class="text-xs">by {{$ejercicio->user->name}}</span>
            </h2>
            @if (!empty(Auth::user()))
            <form action="{{route('rate-ejer', $ejercicio)}}" method="post" class="p-2 flex">
            @csrf
                <select name="rating" id="" class="rounded-lg h-10 barra border border-white focus:outline-none">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                <input class="boton" style="padding: 7px" type="submit" value="Rate">
            </form>
            @endif
        </div>
        <div class="sm:flex ml-2 mb-2 ">
            <div class="border border-white border-collapse rounded-sm max-w-md w-full  ">
                <p class="whitespace-pre-line max-w-md rounded-sm sm:text-sm  w-full p-2.5  h-full codigo "
                >{{$ejercicio->descripcion}}</p>

            </div>
            <form action="{{route('guardar-solucion', $ejercicio)}}" method="POST" class="w-full mt-4 sm:mt-0 sm:ml-4 mr-2">
                @csrf
                <textarea name="code" id="code" cols="50" rows="10" style="resize:none; border: none" class="codigo2 rounded-sm h-80 whitespace-pre-line  sm:text-sm  w-full p-2.5"
                placeholder="código aquí...">{{$respuesta}}</textarea>
                <div class="flex">
                    @if (!empty(Auth::user()))
                    <input type="submit" value="Subir" class="boton p-1 mt-2 mr-4 hover:bg-green-600 ">
                    @else
                    <p class="m-2">logueate para subir tu respuesta</p>
                    @endif
                    <a href="{{route('ver-soluciones', $ejercicio)}}" class=" boton p-1 mt-2">Soluciones</a>

                </div>
            </form>


        </div>
        <!--Borrar-->
        @if (!empty(Auth::user()) && Auth::user()->id === $ejercicio->user_id)
            <form action="/delete/ejer/{{$ejercicio->id}}" method="post" class="">
            @csrf
            @method('DELETE')
                <input type="submit" value="Borrar" class="boton hover:bg-red-500 m-2" onclick="return confirm('Seguro que quieres borrarlo?')">
            </form>
        @endif


    </div>

</x-app-layout>


