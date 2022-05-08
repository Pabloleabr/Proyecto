<div class="sm:m-8 p-2.5 " >
    <h2 class="underline">Tu top 5:</h2>
    @foreach ($tests as $test)
        <div class="barra p-2 rounded-md mb-2.5">
            <p>Pulsaciones: {{$test->pulsaciones}} | Correctas: {{$test->correctas}} | Puntería: {{round(($test->correctas/$test->pulsaciones)*100, 2)}}%</p>
        </div>
    @endforeach
</div>
