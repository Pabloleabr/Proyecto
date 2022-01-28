<?php

namespace App\Http\Controllers;

use App\Models\Ejercicio;
use App\Models\Lenguaje;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EjercicioController extends Controller
{
    public function create()
    {
        return view('ejercicios.create',[
            'lenguajes' => Lenguaje::all(),
        ]);
    }

    public function store()
    {

        $validado = request()->validate([
            'titulo' => 'required|string',
            'descripcion' => 'required|string',
            'resultados' => 'required|string',
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

        $ejer = Ejercicio::create([
            'titulo' => $validado['titulo'],
            'descripcion' => $validado['descripcion'],
            'resultado' => $validado['resultados'],
            'dificultad' => $validado['dificultad'],
            'user_id' => $user->id,
        ]);

        //inserto en la tabla de la relacion ejer_lenguajes sus relaciones
        foreach ($validado['lenguajes'] as $lenguaje) {
            DB::table('ejercicios_lenguajes')->insert([
                'ejercicio_id' => $ejer->id,
                'lenguaje_id' => $lenguaje,
            ]);
        }

        return redirect("ejercicio/$ejer->id");
    }

    public function show($id)
    {
        $ejer = DB::table('ejercicios')->where('id', $id)->get();

        if(empty($ejer)){
            return redirect('/')->with('error', 'ese ejercicio no existe');
        }

        return view('ejercicios.ejercicio', [
            'ejercicio' => $ejer[0],
        ]);

    }

    public function ejercicios()
    {
        $ejer = $this->getEjercicios();
        $paginado = $ejer->paginate(10);
        $lenguajes = DB::table('lenguajes')->get();

        return view('ejercicios.ejercicios', [
            'ejercicios' => $paginado,
            'lenguajes' => $lenguajes,
        ]);
    }

    public function delete_ejer($id)
    {
        //hace falta hacer un on delete cascade, esperar a ver elocuent a ver si es mas facil
        //DB::table('ejercicios')->delete($id);
        return redirect('/mis_ejer');
    }
    public function mis_ejer()
    {

        $usuario = DB::table('users')->where('email', session('usuario'))->first();
        $ejers = $this->getEjercicios();
        $ejers->where('e.user_id', $usuario->id);
        $paginado = $ejers->paginate(10);
        $lenguajes = DB::table('lenguajes')->get();

        return view('ejercicios.ejercicios', [
            'ejercicios' => $paginado,
            'lenguajes' => $lenguajes,
        ]);
    }

    /**
     * rate
     * Comprobara que el usuario esta logueado y si lo esta le dejara guardar el rating del ejer solo
     * si el usuario lo ha solucionado y solo habra un rating por usuario el cual se puede sobre
     * escribir
     * @param  int $id
     * @return void
     */
    public function rate($id)
    {

        $usuario = DB::table('users')->where('email', session('usuario'))->first();
        $validado = request()->validate([
            'rating' => 'integer|required|in:1,2,3,4,5'
        ]);

        $solucionado = DB::table('respuestas')
        ->where('user_id', $usuario->id)
        ->where('ejer_id', $id);

        if (!$solucionado->exists()) {
            return redirect()->back()->with('error', 'termina el ejercicio antes, y entrega una solucion');
        }

        DB::table('rating_ejer')->upsert([
            'ejer_id' => $id,
            'user_id' => $usuario->id,
            'rating' => $validado['rating'],
        ],['ejer_id', 'user_id'], ['rating']);

        return redirect()->back()->with('success', 'Ejercicio evaluado');
    }

    public function rate_respuesta($id){

        $usuario = DB::table('users')->where('email', session('usuario'))->first();
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

    public function store_solucion($id)
    {

        $usuario = DB::table('users')->where('email', session('usuario'))->first();
        $validado = request()->validate([
            'code' => 'string|required',
        ]);

        DB::table('respuestas')->upsert([
            'ejer_id' => $id,
            'user_id' => $usuario->id,
            'respuesta' => $validado['code'],
        ],['ejer_id', 'user_id'], ['respuesta']);

        return redirect()->back()->with('success', 'solucion guardada');
    }

    /**
     * show_soluciones
     * delvolvera todas las sociones del ejercicio con ese id ordenadas por rating y cantidad de ratings
     * ademas de la informacion del ejercicio.
     * @param  int $id
     * @return void
     */
    public function show_soluciones($id)
    {
        $ejer = DB::table('ejercicios')
        ->where('id', $id)
        ->first();

        $respuestas = DB::table('respuestas', 'r')
        ->where('ejer_id', $id)
        ->leftJoin('rating_respuestas', 'r.id', '=', 'respuesta_id')
        ->select('r.respuesta', 'r.id', DB::raw('round(avg(rating), 1) AS avgrating'), DB::raw('count(rating) AS numrating'))
        ->groupBy('r.id', 'r.respuesta')
        ->orderByRaw('numrating desc NULLS LAST')->orderBy('avgrating', 'desc')
        ->paginate(10);
        return view('ejercicios.soluciones', [
            'ejercicio' => $ejer,
            'respuestas' => $respuestas
        ]);
    }


    private function getEjercicio($titulo, $user_id){
        return DB::table('ejercicios')
        ->where('titulo',$titulo)
        ->where('user_id', $user_id)
        ->get();
    }

    private function getEjercicios(){
        $ejer = DB::table('ejercicios', 'e')
        ->join('ejercicios_lenguajes AS el', 'e.id', '=', 'el.ejercicio_id')
        ->join('lenguajes AS l', 'el.lenguaje_id', '=', 'l.id')
        ->leftJoin('rating_ejercicios AS r', 'e.id', '=', 'r.ejercicio_id')
        ->select('e.id AS id', 'titulo' ,'descripcion', 'lenguaje',
        'dificultad', DB::raw('ROUND(AVG(rating), 1) AS avgrating'), DB::raw('count(rating) as numrating'))
        ->groupBy('e.id','titulo','descripcion', 'lenguaje', 'dificultad');

        if(($var = request()->query('lenguaje')) != null){
            $ejer->where('l.id', $var);
        }

        if(($var = request()->query('dificultad')) != null){
            $ejer->where('dificultad', $var);
        }

        if(($var = request()->query('busqueda')) != null){
            $ejer->where('titulo', 'ilike', "%$var%")
            ->orWhere('descripcion', 'ilike', "%$var%");
        }
        $ejer->orderByRaw('numrating desc NULLS LAST')->orderBy('avgrating', 'desc');
        return $ejer;
    }
}
