<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Estas en el ejercicio
            <span class="font-bold underline">{{$ejercicio->titulo}}</span>
             de
            <span class="font-bold underline">{{$ejercicio->user->name}}</span>
        </h2>
    </x-slot>
    <div class="m-8 bg-gray-100 border border-gray-200 rounded-lg p-2.5 ">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{$ejercicio->titulo}}
            </h2>
            <form action="{{route('rate-ejer', $ejercicio)}}" method="post" class="p-2">
            @csrf
                <select name="rating" id="" class=" h-10">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                <input type="submit" value="Rate">
            </form>
        </div>
        <div class="flex ml-2 mb-2 ">
            <p class="whitespace-pre-line max-w-md bg-gray-200 border border-gray-300 text-gray-900 sm:text-sm rounded-lg w-full p-2.5 "
            >{{$ejercicio->descripcion}}</p>
            <form action="{{route('guardar-solucion', $ejercicio)}}" method="POST" class="w-full ml-4 mr-2">
                @csrf
                <textarea name="code" id="code" cols="50" rows="10" style="resize:none" class="h-80 whitespace-pre-line bg-gray-200 border border-gray-300 text-gray-900 sm:text-sm rounded-lg w-full p-2.5"
                placeholder="codigo aqui...">{{$respuesta}}</textarea>
                <input type="submit" value="Subir" class="bg-gray-200 border border-gray-300 text-gray-900 rounded-lg hover:bg-green-300 p-1 mt-2">
            </form>
        </div>
        <div class="flex justify-between" >
            <a href="{{route('ver-soluciones', $ejercicio)}}" class="hover:text-blue-400">Soluciones</a>

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
