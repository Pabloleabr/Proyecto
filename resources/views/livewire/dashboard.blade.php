<div class="mi-flex p-4">
    <!--Tus Ejercicios-->
    <div  class="flex flex-col dashel">
        <div class="barra p-2 mb-4">
            <h2>Tus Ejercicios</h2>
        </div>
        <div class="barraroja" style="transform: translate(4px, -124%);"></div>
        <form action="{{ route('dashboard') }}" method="get" class="mb-2">
            <input type="text" name="busqueda" id="busqueda" placeholder="Busca..." class="is-active dashb buscador mt-1 mb-1"
                style="width:100%;  position: relative;" wire:model="busca">

            <button type="submit" class="" style="transform: translate(-18px,-2px);
            position: absolute;
            left: 51vw;
            z-index:0;
            ">

            </button>

        </form>
        <div class="">

            @foreach ($ejercicios as $ejercicio)
                <a href="{{ route('mostrar-ejer', $ejercicio->id) }}">
                    <div class="p-2 mb-4 codigo selecAnim">
                        <div class="flex justify-between">
                            <h3 class="text-lg flex">{{ $ejercicio->titulo }}
                                <span class="text-sm text-red-800 ml-2 mb-2  p-1">{{ $ejercicio->dificultad }}</span>
                                <ul class="flex justify-center ml-2">
                                    @for ($i = 0.5; $i < $ejercicio->avg_rating; $i++)
                                        <li>
                                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star"
                                                class="w-4 text-yellow-500 mr-1" role="img"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                <path fill="currentColor"
                                                    d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z">
                                                </path>
                                            </svg>
                                        </li>
                                    @endfor
                                </ul>
                                {{ $ejercicio->avg_rating > 0 ? round($ejercicio->avg_rating, 1) : '' }}
                            </h3>
                            <div class="flex flex-wrap">
                                @foreach ($ejercicio->lenguajes as $l)
                                    <p class="p-1 ml-1 ">{{ $l->lenguaje }}</p>
                                @endforeach
                            </div>
                        </div>
                        <hr class="bg-white border-0 h-px">
                        <p class="whitespace-pre-wrap max-h-14 truncate">{{ $ejercicio->descripcion }}</p>
                    </div>
                </a>
                </a>
            @endforeach
        </div>
        <!--pagination-->
        <div class="mt-4 text-white" style="color: white">
            {{ $ejercicios->links('vendor.pagination.tailwind') }}
        </div>

    </div>


    <!--Tus Preguntas-->
    <div style="" class="flex flex-col dashel sm:ml-12">
        <div class="barra p-2 mb-4">
            <h2>Tus Preguntas</h2>
        </div>
        <div class="barraroja" style="transform: translate(4px, -124%);"></div>
        <form action="{{ route('dashboard') }}" method="get" class="mb-2">

            <input type="text" name="busquedaPre" id="busquedaPre" placeholder="Busca..." class="is-active buscador dashb mt-1 mb-1"
                style="width:100%;  position: relative;" wire:model="buscaPre">

            <button type="submit" class="" style="transform: translate(-18px,-2px);
        position: absolute;
        right: 2vw;
        z-index:0;
        ">

            </button>

        </form>
        <div class="">

            @foreach ($preguntas as $pregunta)
                <a href="{{ route('mostrar-pregunta', $pregunta->id) }}">
                    <div class="p-2 mb-4 codigo selecAnim">
                        <div class="flex justify-between">
                            <h3 class="text-lg flex">{{ $pregunta->titulo }}
                                <ul class="flex justify-center ml-2">
                                    @for ($i = 0.5; $i < $pregunta->avg_rating; $i++)
                                        <li>
                                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star"
                                                class="w-4 text-yellow-500 mr-1" role="img"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                <path fill="currentColor"
                                                    d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z">
                                                </path>
                                            </svg>
                                        </li>
                                    @endfor
                                </ul>
                                {{ $pregunta->avg_rating > 0 ? round($pregunta->avg_rating, 1) : '' }}
                            </h3>

                        </div>
                        <hr class="bg-white border-0 h-px">
                        <p class="whitespace-pre-wrap max-h-14 truncate">{{ $pregunta->descripcion }}</p>
                    </div>
                </a>
                </a>
            @endforeach
        </div>
        <!--pagination-->
        <div class="mt-4 text-white" style="color: white">
            {{ $preguntas->links('vendor.pagination.tailwind') }}
        </div>

    </div>

</div>
