<x-app-layout>
    <div class="p-4">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div style="width:35vw" class="flex flex-col">
        <div class="barra p-2 mb-4">
            <h2>Tus Ejercicios</h2>
            <div class="barraroja" style="width: 35vw"></div>
        </div>
        <form action="{{route('dashboard')}}" method="get" class="mb-2">
            <!--La busqueda por alguna razon lo hace de todos los usuarios-->
            <input type="text" name="busqueda" id="busqueda" placeholder="Busca..." class="buscador"
            style="width:35vw; z-index: -1;
            position: relative;">

            <button type="submit" class=""
            style="transform: translate(-18px,-4px);
            position: absolute;
            left: 50vw;
            z-index:-1;
            ">
                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                width="50" height="50"
                viewBox="0 0 50 50"
                style=" fill:white; transform:scale(0.5)"><path d="M 21 4 C 11.082241 4 3 12.082241 3 22 C 3 31.917759 11.082241 40 21 40 C 24.62177 40 27.99231 38.91393 30.820312 37.0625 L 43.378906 49.621094 L 47.621094 45.378906 L 35.224609 32.982422 C 37.581469 29.938384 39 26.13473 39 22 C 39 12.082241 30.917759 4 21 4 z M 21 8 C 28.756241 8 35 14.243759 35 22 C 35 29.756241 28.756241 36 21 36 C 13.243759 36 7 29.756241 7 22 C 7 14.243759 13.243759 8 21 8 z"></path></svg>
            </button>

        </form>
    <div class="">
        @php
            $leng = [];
        foreach ($ejercicios as $key => $ejer) {
            if(in_array($ejer->id, array_keys($leng))){
                $leng[$ejer->id][] = $ejer->lenguaje;
            }
            else {
                $leng[$ejer->id] = [$ejer->lenguaje];
            }
        }
        $vistos = [];
        @endphp
        @foreach ($ejercicios as $ejercicio)
            @if (!in_array($ejercicio->id, $vistos ))
            @php
                $vistos[] = $ejercicio->id;
            @endphp
            <a href="{{route('mostrar-ejer', $ejercicio->id)}}" >
            <div class="p-2 mb-4 codigo">
                <div class="flex justify-between">
                    <h3 class="text-lg flex">{{$ejercicio->titulo}}
                        <span class="text-sm text-white ml-2 mb-2  p-1">{{$ejercicio->dificultad}}</span>
                        <ul class="flex justify-center ml-2">
                        @for ($i = 0.5; $i < $ejercicio->avgrating; $i++)
                            <li>
                              <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" class="w-4 text-yellow-500 mr-1" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                <path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path>
                              </svg>
                            </li>
                        @endfor
                        </ul>
                        {{$ejercicio->avgrating}}
                        </h3>
                            <div class="flex ">
                        @foreach ($leng[$ejercicio->id] as $l)
                            <p class="p-1 ml-1 ">{{$l}}</p>
                        @endforeach
                            </div>
                </div>
                <hr class="bg-white border-0 h-px">
                    <p class="whitespace-pre-line max-h-14 truncate">{{$ejercicio->descripcion}}</p>
                </div>
            </a>
            </a>
            @endif

        @endforeach
    </div>
    {{$ejercicios->links()}}
</div>
</div>
</x-app-layout>