<?php

namespace App\Http\Controllers;

use App\Models\Mecanotest as ModelsMecanotest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Mecanotest extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('test-mecanografia');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePreguntaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $validado = request()->validate([
            'pulsaciones' => 'required|integer',
            'correctas' => 'required|integer',
        ]);

        if($validado['pulsaciones'] == 0){
            return redirect(route("test-mecano"))->with('error','No puedes guardas test con 0 pulsaciones :/');
        }

        //cojo el usuario actual
        $user = Auth::user();


        $test = ModelsMecanotest::create([
            'pulsaciones' => $validado['pulsaciones'],
            'correctas' => $validado['correctas'],
            'user_id' => $user->id,
            'created_at' => now()
        ]);
        //borro su peor puntuacion si hay mas 5
        if(count($user->mecanotests) > 5){
            ModelsMecanotest::where('user_id', $user->id)
            ->orderBy('pulsaciones')
            ->orderBy('correctas')
            ->first()
            ->delete();
        }

        return redirect(route("test-mecano"));
    }
}
