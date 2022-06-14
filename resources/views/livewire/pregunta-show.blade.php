<div>
    <div class="mt-6 barra rounded-lg p-2.5 ">
        <div class="flex justify-between ">
            <div class="flex">
                <h2 class="text-lg  block mb-2">
                    {{$pregunta->titulo}}
                </h2>
                <ul class="flex justify-center ms:ml-2">
                    @for ($i = 0.5; $i < $pregunta->avg_rating; $i++)
                    <li>
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" class="w-4 text-yellow-500 mr-1" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path>
                        </svg>
                    </li>
                    @endfor
                </ul>
                {{$pregunta->avg_rating > 0 ? round($pregunta->avg_rating, 1 ) : ""}}
            </div>
            @if (!empty(Auth::user()))
            <div class="flex">

                @for ($i = 1; $i < 6; $i++)
                <button wire:click="ratePregunta({{$pregunta->id}},{{$i}})">
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" class="w-5 rating" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                        1<path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path>
                    </svg>
                </button>


                @endfor
            </div>
            @endif

        </div>
        <div class="grid ml-2 mb-2 mr-2">
            <p class="whitespace-pre-wrap  sm:text-sm rounded-lg w-full p-2.5 codigo2" style="max-width: 100%;
            word-break: break-word;"
            >{{$pregunta->descripcion}}</p>

            <!--Respuestas de todos-->
            <h3 class="mt-2">Respuestas</h3>
            @foreach ($respuestas as $res)
            <div class="flex justify-between mt-2  rounded-lg codigo2 ">
                <div class="block" style="width: 100%">
                    <div class="flex justify-between" style="width: 100%">
                        <ul class="flex pl-2 pt-2">
                            @for ($i = 0.5; $i < $res->avg_rating; $i++)
                            <li>
                                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" class="w-4 text-yellow-500 mr-1" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                    <path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path>
                                </svg>
                            </li>
                            @endfor
                            <p class="">{{round($res->avg_rating, 1)}}</p>
                            <span class="text-xs ml-1 mt-2">({{$res->num_rating}} votos)</span>
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
                    <p class="p-2 whitespace-pre-wrap  sm:text-sm" style="max-width: 100%;
                    word-break: break-word;"
                    >{{$res->respuesta}}</p>
                </div>

            </div>

            @endforeach

            <!--pagination-->
        <div class="mt-4 text-white"  style="color: white">
            {{$respuestas->links('vendor.pagination.tailwind')}}
        </div>

         <!--Tus respuestas-->
         @if (!empty(Auth::user()))
            @if (count($tus_respuestas) != 0)
                <h3 class="mt-2">Tus Respuestas</h3>
                @foreach ($tus_respuestas as $res)
                <div class="flex justify-between mt-2  rounded-lg codigo2 ">
                    <div class="block">
                        <ul class="flex pl-2 pt-2">
                            @for ($i = 0.5; $i < $res->avg_rating; $i++)
                            <li>
                                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" class="w-4 text-yellow-500 mr-1" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                    <path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path>
                                </svg>
                            </li>
                            @endfor
                            <p class="">{{round($res->avg_rating, 1)}}</p>
                            <span class="text-xs ml-1 mt-2">({{$res->num_rating}} votos)</span>
                        </ul>
                        <p class="p-2 pt-1 whitespace-pre-wrap sm:text-sm" style="max-width: 100%;
                        word-break: break-word;"
                        >{{$res->respuesta}}</p>
                    </div>

                        <i class="fa fa-times p-4 hover:cursor-pointer" style="color:rgb(187, 0, 0)" aria-hidden="true" wire:click="borrar({{$res->id}})"></i>


                </div>
                @endforeach
            @endif
         @endif

        </div>
         <!--Crear una respuesta-->
         @if (!empty(Auth::user()))
         <div class="m-2">
             <label for="mi_respuesta" class="text-lg font-semibold ">
                 Escribe una respuesta:</label>
                 <textarea wire:model="mi_respuesta" name="mi_respuesta" id="mi_respuesta" cols="30" rows="10" style="resize: none"
                 class="text-white block w-full p-2.5 codigo rounded-lg whitespace-pre"
                required>{{old('mi_respuesta', '')}}</textarea>
            </div>
            <button class=" boton m-2" wire:click="create" onclick="window.scrollTo( {top:80, behavior:'smooth'})">
                Subir Respuesta</button>
                @endif
            </div>
        </div>

