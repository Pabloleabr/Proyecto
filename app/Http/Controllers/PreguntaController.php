<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePreguntaRequest;
use App\Http\Requests\UpdatePreguntaRequest;
use App\Models\Pregunta;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PreguntaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('preguntas.preguntas');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('preguntas.create');
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
            'titulo' => 'required|string',
            'descripcion' => 'required|string',
        ]);

        //cojo el usuario actual
        $user = Auth::user();

        //volver si a existe una pregunta con el mismo id usario y titulo por que son unique
        if(empty( $this->getPregunta($validado['titulo'], $user->id))){
            return redirect()->back()->with('error', 'Ya has creado una Pregunta con ese titulo');
        }

        $pregunta = Pregunta::create([
            'titulo' => $validado['titulo'],
            'descripcion' => $validado['descripcion'],
            'user_id' => $user->id,
        ]);

        return redirect(route("mostrar-pregunta", $pregunta));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function show(Pregunta $pregunta)
    {
        return view('preguntas.pregunta',[
            'pregunta' => $pregunta,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function edit(Pregunta $pregunta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePreguntaRequest  $request
     * @param  \App\Models\Pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePreguntaRequest $request, Pregunta $pregunta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pregunta $pregunta)
    {
        //
    }

    private function getPregunta($titulo, $user_id){
        return Pregunta::where('titulo',$titulo)
        ->where('user_id', $user_id)
        ->get();
    }
}
