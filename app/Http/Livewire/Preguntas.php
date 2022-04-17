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
            ->withCount('ratings as num_rating')
            ->where('titulo', 'ilike', "%$this->busca%")
            ->orWhere('descripcion', 'ilike', "%$this->busca%")
            ->orderByRaw('num_rating desc NULLS LAST')
            ->orderBy('avg_rating', 'DESC')
            ->paginate(5),
        ]);
    }

    public function buscar(){
        $this->resetPage();
    }
}
