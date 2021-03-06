<div class="md:flex" style="width: 100%">
    <form action="{{route('ver-preguntas')}}" method="get" class="flex md:mr-4 flex-col" >
        <!--barra busqueda-->
        <input type="text" wire:model="busca" name="busqueda" id="busquedarara" placeholder="Busca..." class="buscador"
        style="">

        <!--Orden-->
        <label for="orden" ><h2> Ordenar Por:</h2></label>
        <select wire:model="orden" name="orden" id="orden" class="m-2 custom-select" onclick="reajusteBusca()">
            <option value="created_at">Recientes</option>
            <option value="avg_rating">Rating</option>
            <option value="titulo">Titulo</option>
            <option value="num_rating">Numero Ratings</option>
        </select>
        <select wire:model="sentido" name="sentido" id="sentido" class="m-2 custom-select" onclick="reajusteBusca()">
            <option value="asc">Ascendiente</option>
            <option value="desc">Descendiente</option>

        </select>
    </form>


    <div class="mt-2" style="width: 100%">
        <div class="barra p-2">
            <h2>Preguntas</h2>
        </div>
        <div class="barraroja" style="transform: translate(4px, -90%)"></div>
        @foreach ($preguntas as $pregunta)


            <a href="{{route('mostrar-pregunta', $pregunta->id)}}" class="flex p-2 codigo mt-4 selecAnim" style="width: 100%">
            <div  style="width: 100%">
                <div class="flex justify-between">
                    <div class="mi-flex">

                        <h3 class="text-lg">
                            {{$pregunta->titulo}}
                        </h3>
                        <div class="flex">
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
                    </div>


                </div>
                <hr class="bg-white">
                    <p class="whitespace-pre-wrap max-h-24 truncate">{{$pregunta->descripcion}}</p>
                </div>
            </a>


        @endforeach
            <!--pagination-->
            <div class="mt-4 text-white"  style="color: white">
                {{$preguntas->links('vendor.pagination.tailwind')}}
            </div>

    </div>
</div>


