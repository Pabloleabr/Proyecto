<?php

namespace App\Http\Livewire;

use App\Models\Respuesta;
use Livewire\Component;
use Livewire\WithPagination;

class PreguntaShow extends Component
{
    use WithPagination;
    public $busca = "";
    public $pregunta;

    public function render()
    {
        return view('livewire.pregunta-show',[
            'respuestas' => Respuesta::withAvg('ratings as avg_rating','rating')
            ->where('pregunta_id',$this->pregunta->id)
            ->paginate(5),

        ]);
    }

    public function buscar(){
        $this->resetPage();
    }
}
