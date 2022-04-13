<div>
    <form action="{{route('ver-preguntas')}}" method="get" class="flex flex-col mr-4" style="width:15vw">
        <!--barra busqueda-->
        <input type="text" wire:model="busca" name="busqueda" id="busqueda" placeholder="Busca..." class="buscador"
        style="position: absolute; left:18vw; top:70px; width:80vw">

        <button wire:click="buscar" value="Buscar" class="boton m-2" >Buscar</button>
    </form>


<div class="mt-2">
    <div class="barra p-2"><h2>Preguntas</h2><div class="barraroja"></div></div>
    @foreach ($preguntas as $pregunta)


        <a href="{{route('mostrar-pregunta', $pregunta->id)}}" class="flex p-2 codigo mt-4" style="width: 65vw">
        <div style="width: 65vw" >
            <div class="flex justify-between">
                <h3 class="text-lg flex">{{$pregunta->titulo}}

                    <ul class="flex justify-center ml-2">
                    @for ($i = 0.5; $i < $pregunta->avg_rating; $i++)
                        <li>
                          <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" class="w-4 text-yellow-500 mr-1" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path>
                          </svg>
                        </li>
                    @endfor
                    </ul>
                    {{round($pregunta->avg_rating, 3)}}
                    </h3>

            </div>
            <hr class="bg-white">
                <p class="whitespace-pre-line max-h-24 truncate">{{$pregunta->descripcion}}</p>
            </div>
        </a>


    @endforeach
    <div  class="mt-4" style="color: white">
        {{$preguntas->links()}}
    </div>
</div>
</div>
<script src="" defer></script>
</div>