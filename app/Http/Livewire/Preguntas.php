<?php

namespace App\Http\Livewire;

use App\Models\Pregunta;
use Livewire\Component;
use Livewire\WithPagination;

class Preguntas extends Component
{
    use WithPagination;
    public $busca = "";

    public function render()
    {
        return view('livewire.preguntas',[
            'preguntas' => Pregunta::withAvg('ratings as avg_rating','rating')
            ->where('titulo', 'ilike', "%$this->busca%")
            ->orWhere('descripcion', 'ilike', "%$this->busca%")
            ->paginate(5),
        ]);
    }

    public function buscar(){
        $this->resetPage();
    }
}
