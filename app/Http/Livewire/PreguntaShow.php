<?php

namespace App\Http\Livewire;

use App\Models\Respuesta;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class PreguntaShow extends Component
{
    use WithPagination;
    public $busca = "";
    public $pregunta;
    public $mi_respuesta = "";

    /**
     * Hace la consulta inicial y las busquedas necesarias para las preguntas
     *
     * @return void
     */
    public function render()
    {
        $tus_respuestas = [];
        $user = Auth::user();
        if($user != null){
            $tus_respuestas = Respuesta::withAvg('ratings as avg_rating','rating')
            ->where('pregunta_id',$this->pregunta->id)
            ->where('user_id', $user->id)
            ->get();
        };
        return view('livewire.pregunta-show',[
            'respuestas' => Respuesta::withAvg('ratings as avg_rating','rating')
            ->withCount('ratings as num_rating')
            ->where('pregunta_id',$this->pregunta->id)
            ->orderByRaw('num_rating desc NULLS LAST')
            ->orderBy('avg_rating', 'DESC')
            ->paginate(5),
            'tus_respuestas' => $tus_respuestas

        ]);
    }

    /**
     * crea una respuesta cuando se intro un string no vacio
     *
     * @return void
     */
    public function create(){
        if(gettype($this->mi_respuesta) == "string"){
            if(trim($this->mi_respuesta) != "" ){
                $user = Auth::user();

                Respuesta::create([
                    'respuesta' => $this->mi_respuesta,
                    'pregunta_id' => $this->pregunta->id,
                    'ejercicio_id' => null,
                    'user_id' => $user->id,
                    'created_at' => now()
                ]);
            }
        }
    }
    /**
     * borra la respuesta con todos sus ratings
     *
     * @param [int] $id
     * @return void
     */
    public function borrar($id){
        $res = Respuesta::where('id', $id);
        foreach($res->get()[0]->ratings as $rating){
            $rating->delete();
        }
        $res->delete();
    }

    public function rate($id, $rating){
        $usuario = Auth::user();

        //Para usar upsert hacia falta el DB creo y por eso se hizo asi
        if(gettype($rating) == "integer"){
            if($rating < 6 && $rating > 0){

                DB::table('rating_respuestas')->upsert([
                    'respuesta_id' => $id,
                    'user_id' => $usuario->id,
                    'rating' => $rating,
                ],['respuesta_id', 'user_id'], ['rating']);
            }
        }
    }
}
