<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Estas en las soluciones del ejercicio
            <span class="font-bold underline">{{$ejercicio->titulo}}</span>
             de
            <span class="font-bold underline">{{$ejercicio->user->name}}</span>
        </h2>
    </x-slot>
    <div class="m-8 bg-gray-100 border border-gray-200 rounded-lg p-2.5 ">
        <div class="flex justify-between ">
            <h2 class="text-lg text-gray-900 block mb-2 dark:text-gray-300">
                {{$ejercicio->titulo}}
            </h2>

        </div>
        <div class="grid ml-2 mb-2 ">
            <p class="whitespace-pre-line bg-gray-200 border border-gray-300 text-gray-900 sm:text-sm rounded-lg w-full p-2.5 "
            >{{$ejercicio->descripcion}}</p>
            <h3 class="mt-2">Respuestas</h3>
            @foreach ($respuestas as $res)
            <div class="flex justify-between mt-2 bg-gray-200 border border-gray-300 rounded-lg  ">
                <div class="block">
                    <ul class="flex pl-2 pt-2">
                        @for ($i = 0.5; $i < $res->avgrating; $i++)
                        <li>
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" class="w-4 text-yellow-500 mr-1" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                <path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path>
                            </svg>
                        </li>
                        @endfor
                        <p class="">{{$res->avgrating}}</p>
                    </ul>
                    <p class="p-2 whitespace-pre-line text-gray-900 sm:text-sm "
                    >{{$res->respuesta}}</p>
                </div>
                @if (!empty(Auth::user()))
                <form action="/respuesta/rate/{{$res->id}}" method="post" class="m-4 rounded-lg">
                    @csrf
                        <select name="rating" id="" class="rounded-lg">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        <input class="bg-slate-300 rounded-lg p-2 hover:bg-gray-600 hover:text-white" type="submit" value="Rate">
                    </form>

                @endif
            </div>

            @endforeach

        </div>
        {{$respuestas->links()}}
    </div>

</x-app-layout>
