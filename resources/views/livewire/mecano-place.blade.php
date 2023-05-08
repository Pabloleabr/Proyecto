<div class="sm:m-8 p-2.5 " >
    <h2 class="underline">Ranking:</h2>
    @foreach ($tests as $test)
        <div class="barra p-2 rounded-md mb-2.5">
            <p><span class="text-yellow-400">#{{isset($_GET['page']) ? ($_GET['page']-1)*10 + ($loop->index + 1) : $loop->index + 1}}
            </span> User:<span class=" font-semibold text-red-600">{{$test->user->name}}</span>
            Palabras/min: <span class="text-green-400">{{round($test->correctas/5)}}</span>
            | Pulsaciones: <span class="text-green-400">{{$test->correctas}}/{{$test->pulsaciones}}</span>
            | Precisión: <span class="text-green-400">{{round(($test->correctas/$test->pulsaciones)*100, 2)}}%</span></p>
        </div>
    @endforeach
    <!--pagination-->
    <div class="mt-4 text-white" style="color: white">
        {{ $tests->links('vendor.pagination.tailwind') }}
    </div>
</div>
