<?php

namespace App\Http\Controllers;

use App\Models\Ejercicio;
use App\Models\Lenguaje;
use App\Models\Respuesta;
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

    public function ejercicios()
    {
        return view('ejercicios.ejercicios');
    }

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
    public function mis_ejer()
    {

        $usuario = Auth::user();
        $ejers = $this->getEjercicios();
        $ejers->where('e.user_id', $usuario->id);
        $paginado = $ejers->paginate(4);
        $lenguajes = Lenguaje::all();

        return view('dashboard', [
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


    private function getEjercicio($titulo, $user_id){
        return DB::table('ejercicios')
        ->where('titulo',$titulo)
        ->where('user_id', $user_id)
        ->get();
    }

    private function getEjercicios(){
        //arreglar por que no funciona del todo bien
        $ejer = DB::table('ejercicios', 'e')
        ->join('ejercicio_lenguaje AS el', 'e.id', '=', 'el.ejercicio_id')
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
