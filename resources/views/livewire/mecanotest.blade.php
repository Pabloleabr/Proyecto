<div class="sm:m-8 p-2.5 " >
    <h2 class="underline">Tu top 5:</h2>
    @foreach ($tests as $test)
        <div class="barra p-2 rounded-md mb-2.5">
            <p>
            Pulsaciones: <span class="text-green-400">{{$test->pulsaciones}}</span>
            | Correctas:<span class="text-green-400"> {{$test->correctas}}</span>
            | Puntería: <span class="text-green-400">{{round(($test->correctas/$test->pulsaciones)*100, 2)}}%</span></p>  </div>
    @endforeach
</div>
