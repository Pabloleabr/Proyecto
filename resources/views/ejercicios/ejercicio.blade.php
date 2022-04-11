<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Estas en el ejercicio
            <span class="font-bold underline">{{$ejercicio->titulo}}</span>
             de
            <span class="font-bold underline">{{$ejercicio->user->name}}</span>
        </h2>
    </x-slot>


    <div class="m-8 p-2.5 barra rounded-md">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl leading-tight underline">
                {{$ejercicio->titulo}} <span class="text-xs">by {{$ejercicio->user->name}}</span>
            </h2>
            @if (!empty(Auth::user()))
            <form action="{{route('rate-ejer', $ejercicio)}}" method="post" class="p-2">
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
        <div class="flex ml-2 mb-2 ">
            <div class="border border-white border-collapse rounded-sm max-w-md w-full  ">
                <p class="whitespace-pre-line max-w-md rounded-sm sm:text-sm  w-full p-2.5  h-full codigo opacity-80"
                >{{$ejercicio->descripcion}}</p>

            </div>
            <form action="{{route('guardar-solucion', $ejercicio)}}" method="POST" class="w-full ml-4 mr-2">
                @csrf
                <textarea name="code" id="code" cols="50" rows="10" style="resize:none; border: none" class="codigo2 rounded-sm h-80 whitespace-pre-line  sm:text-sm  w-full p-2.5"
                placeholder="codigo aqui...">{{$respuesta}}</textarea>
                <div class="flex">
                    @if (!empty(Auth::user()))
                    <input type="submit" value="Subir" class="boton p-1 mt-2 mr-4">
                    @else
                    <p>logueate para subir tu respuesta</p>
                    @endif
                    <a href="{{route('ver-soluciones', $ejercicio)}}" class=" boton p-1 mt-2">Soluciones</a>
                </div>
            </form>

        </div>
        <div class="flex justify-between" >

{{--Ponerlo en una página que sea solo para mis ejercicios
                 @if (App\Http\Controllers\UserController::logueado())
                @if (Illuminate\Support\Facades\DB::table('users')->where('email', session('usuario'))->first()->id === $ejercicio->user_id)
                    <form action="/delete/ejer/{{$ejercicio->id}}" method="post">
                    @csrf
                    @method('DELETE')
                        <input type="submit" value="Borrar" class="bg-gray-300 hover:bg-red-500 p-2 rounded-lg" onclick="return confirm('Seguro que quieres borrarlo?')">
                    </form>
                @endif
            @endif --}}
        </div>

    </div>

</x-app-layout>


