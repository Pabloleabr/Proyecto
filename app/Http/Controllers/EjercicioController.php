<?php

namespace App\Http\Controllers;

use App\Models\Ejercicio;
use App\Models\Lenguaje;
use App\Models\Respuesta;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * Controlador de ejercicios
 * hay una mezcla de eloquent, livewire , querbuilder especialmente en este controlodor
 * devido a que este controlador se empezo antes de saber de eloquent, se ha actualizado lo necesario
 * y si hace falta se actualizara lo demas
 */
class EjercicioController extends Controller
{
    /**
     * create
     * Returns create view
     *
     * @return void
     */
    public function create()
    {
        return view('ejercicios.create',[
            'lenguajes' => Lenguaje::all(),
        ]);
    }

    /**
     * store
     * Stores the created exercise
     *
     * @return void
     */
    public function store()
    {

        $validado = request()->validate([
            'titulo' => 'required|string',
            'descripcion' => 'required|string',
            'dificultad' => 'required|string',
            'lenguajes' => 'required|array'
        ]);
        $dificultad = ['facil', 'normal', 'dificil', 'extremo'];

        if(empty($validado['lenguajes'])){
            return redirect()->back()->with('error', 'no has seleccionado uno o mas lenguajes');
        }

        if(!in_array($validado['dificultad'], $dificultad)){
            return redirect()->back()->with('error', 'dificultad no valida');
        }
        //cojo el usuario actual
        $user = Auth::user();

        //volver si a existe un ejercicio con el mismo id usario y titulo por que son unique
        if(empty( $this->getEjercicio($validado['titulo'], $user->id))){
            return redirect()->back()->with('error', 'Ya has creado un ejercicio con ese titulo');
        }

        $ejercicio = Ejercicio::create([
            'titulo' => $validado['titulo'],
            'descripcion' => $validado['descripcion'],
            'dificultad' => $validado['dificultad'],
            'user_id' => $user->id,
        ]);

        //inserto en la tabla de la relacion ejer_lenguajes sus relaciones
        foreach ($validado['lenguajes'] as $lenguaje) {
            DB::table('ejercicio_lenguaje')->insert([
                'ejercicio_id' => $ejercicio->id,
                'lenguaje_id' => $lenguaje,
            ]);
        }

        return redirect(route("mostrar-ejer", $ejercicio))->with('success', 'Ejericico creado correctamente');
    }

    /**
     * show
     * Shows the selected exercise
     *
     * @param Ejercicio $ejercicio
     * @return void
     */
    public function show(Ejercicio $ejercicio)
    {
        $respuesta1 = '';
        if(!empty(Auth::user())){
            $userId = Auth::user()->id;
            foreach ($ejercicio->respuestas as $respuesta){
                if($respuesta->user_id == $userId){
                    $respuesta1 = $respuesta->respuesta;
                }
            }
        }
        return view('ejercicios.ejercicio', [
            'ejercicio' => $ejercicio,
            'respuesta' => $respuesta1
        ]);

    }

    /**
     * ejercicios(index)
     * Returns main view to be used with livewire
     * @return void
     */
    public function ejercicios()
    {
        return view('ejercicios.ejercicios');
    }

    /**
     * delete_ejer
     * Deletes the exercise with all its relations
     *
     * @param Ejercicio $ejercicio
     * @return void
     */
    public function delete_ejer(Ejercicio $ejercicio)
    {
        //borro todas sus relaciones

        foreach($ejercicio->ratings as $rating){
            $rating->delete();
        }
        foreach($ejercicio->lenguajes as $lenguaje){
            $lenguaje->pivot->delete();//borrar pivotes no lenguajes
        }
        foreach($ejercicio->respuestas as $res){
            foreach($res->ratings as $rating){
                $rating->delete();
            }
            $res->delete();
        }
        $ejercicio->delete();
        return redirect('/dashboard')->with('success', 'Ejercicio Borrado');
    }

    /**
     * mis_ejer
     * returns the exercise view so it can be manipulated with livewire
     *
     * @return void
     */
    public function mis_ejer()
    {
        $usuario = Auth::user();
        $points = 0;
        $respuestas = Respuesta::where('user_id', $usuario->id)->get();

        foreach($respuestas as $res){
            $points += $res->ratings->sum('rating');
        }

        return view('dashboard',['points' => $points]);
    }

    /**
     * rate
     * Comprobara que el usuario esta logueado y si lo esta le dejara guardar el rating del ejer solo
     * si el usuario lo ha solucionado y solo habra un rating por usuario el cual se puede sobre
     * escribir
     * @param  int $id
     * @return void
     */
    public function rate(Ejercicio $ejercicio)
    {
        $usuario = Auth::user();
        $validado = request()->validate([
            'rating' => 'integer|required|in:1,2,3,4,5'
        ]);

        DB::table('rating_ejercicios')->upsert([
            'ejercicio_id' => $ejercicio->id,
            'user_id' => $usuario->id,
            'rating' => $validado['rating'],
        ],['ejercicio_id', 'user_id'], ['rating']);

        return redirect()->back()->with('success', 'Ejercicio evaluado');
    }

    /**
     * rate_respuesta
     * Stores the rating given to the exercise
     *
     * @param [type] $id
     * @return void
     */
    public function rate_respuesta($id){

        $usuario = Auth::user();
        $validado = request()->validate([
            'rating' => 'integer|required|in:1,2,3,4,5'
        ]);

        DB::table('rating_respuestas')->upsert([
            'respuesta_id' => $id,
            'user_id' => $usuario->id,
            'rating' => $validado['rating'],
        ],['respuesta_id', 'user_id'], ['rating']);

        return redirect()->back()->with('success', 'respuesta evaluada');
    }
    /**
     * store_solution
     * Validaetes and stores the sent solution
     * @param Ejercicio $ejercicio
     * @return void
     */
    public function store_solucion(Ejercicio $ejercicio)
    {

        $usuario = Auth::user();
        $validado = request()->validate([
            'code' => 'string|required',
        ]);

        Respuesta::updateOrCreate([
            'ejercicio_id' => $ejercicio->id,
            'pregunta_id' => null,
            'user_id' => $usuario->id,
        ],['respuesta' => $validado['code']]);

        return redirect(route('mostrar-ejer', $ejercicio))->with('success', 'solucion guardada');
    }

    /**
     * show_soluciones
     * delvolvera todas las sociones del ejercicio con ese id ordenadas por rating y cantidad de ratings
     * ademas de la informacion del ejercicio.
     * @param  int $id
     * @return void
     */
    public function show_soluciones(Ejercicio $ejercicio)
    {
        $respuestas = DB::table('respuestas', 'r')
        ->where('ejercicio_id', $ejercicio->id)
        ->leftJoin('rating_respuestas', 'r.id', '=', 'respuesta_id')
        ->select('r.respuesta', 'r.id', DB::raw('round(avg(rating), 1) AS avgrating'), DB::raw('count(rating) AS numrating'))
        ->groupBy('r.id', 'r.respuesta')
        ->orderByRaw('numrating desc NULLS LAST')->orderBy('avgrating', 'desc')
        ->paginate(10);
        return view('ejercicios.soluciones', [
            'ejercicio' => $ejercicio,
            'respuestas' => $respuestas
        ]);
    }

    /**
     * Busca el ejercicio con use titulo e id
     *
     * @param [string] $titulo
     * @param [int] $user_id
     * @return Collection
     */
    private function getEjercicio($titulo, $user_id){
        return DB::table('ejercicios')
        ->where('titulo',$titulo)
        ->where('user_id', $user_id)
        ->get();
    }


}
