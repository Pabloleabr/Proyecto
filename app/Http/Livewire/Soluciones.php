<?php

namespace App\Http\Livewire;

use App\Models\Respuesta;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;


class Soluciones extends Component
{
    public $ejercicio;
    use WithPagination;

    public function render()
    {

        return view('livewire.soluciones',[
            'respuestas' => Respuesta::withAvg('ratings as avg_rating','rating')
            ->withCount('ratings as num_rating')
            ->where('ejercicio_id',$this->ejercicio->id)
            ->orderByRaw('num_rating desc NULLS LAST')
            ->orderBy('avg_rating', 'DESC')
            ->paginate(5)

        ]);
    }

    /**
     * Funcion para puntuar las respuestas
     *
     * @param [int] $id
     * @param [int] $rating
     * @return void
     */
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
