<div>
    {{-- Success is as dangerous as failure. --}}
    <div class="mt-6 barra rounded-lg p-2.5 ">
        <div class="flex justify-between ">
            <h2 class="text-lg  block mb-2">
                {{ $ejercicio->titulo }}
            </h2>

        </div>
        <div class="grid ml-2 mb-2 mr-2">
            <p class="whitespace-pre-line  sm:text-sm rounded-lg p-2.5 codigo2" style="max-width: fit-content">
                {{ $ejercicio->descripcion }}</p>
            <h3 class="mt-2">Respuestas</h3>
            @foreach ($respuestas as $res)
                <div class="flex justify-between mt-2  rounded-lg codigo2 ">
                    <div class="block" style="width: 100%">
                        <div class="flex justify-between" style="width: 100%">

                            <ul class="flex pl-2 pt-2">
                                @for ($i = 0.5; $i < $res->avg_rating; $i++)
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
                                <p class="">{{$res->avg_rating > 0 ? round($res->avg_rating, 1 ) : ""}} <span
                                        class="text-sm">({{ $res->num_rating }} votos) </span></p>
                            </ul>
                            @if (!empty(Auth::user()))
                        <div class="m-4 mb-1 rounded-lg flex">
                            @for ($i = 1; $i < 6; $i++)
                            <button wire:click="rate({{$res->id}},{{$i}})">
                                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" class="w-5 rating" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                    <path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path>
                                </svg>
                            </button>


                            @endfor
                        </div>
                        @endif
                        </div>
                        <p class="whitespace-pre-line sm:text-sm rounded-lg p-2.5 " style="max-width: 100%;
                    word-break: break-word;">{{ $res->respuesta }}</p>
                    </div>

                </div>
            @endforeach

        </div>
        {{ $respuestas->links() }}
    </div>
</div>
