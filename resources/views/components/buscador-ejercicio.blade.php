
    <!-- An unexamined life is not worth living. - Socrates -->
    <form action="{{$ruta}}" method="get" class="rounded-lg bg-gray-300 p-2 ">
        <input type="text" name="busqueda" id="busqueda" placeholder="Busca..." class="bg-gray-200 border border-gray-800 text-gray-900 rounded-lg hover:bg-gray-100">
        <select name="lenguaje" id="lenguaje" class="hover:bg-gray-100">
            <option value=""></option>
            @foreach ($lenguajes as $lenguaje)
            <option value="{{$lenguaje->id}}">{{$lenguaje->lenguaje}}</option>

            @endforeach
        </select>
        <select name="dificultad" id="dificultad" class="hover:bg-gray-100">
            <option value=""></option>
            <option value="facil">facil</option>
            <option value="normal">normal</option>
            <option value="dificil">dificil</option>
            <option value="extremo">extremo</option>

        <input type="submit" value="buscar" class="border bg-gray-100 rounded-lg ml-2 p-1 hover:bg-gray-500 hover:text-white">
    </form>

