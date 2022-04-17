<?php

namespace App\Http\Livewire;

use App\Models\Pregunta;
use Livewire\Component;
use Livewire\WithPagination;

class Preguntas extends Component
{
    use WithPagination;
    public $busca = "";
    public $orden = "created_at";
    public $sentido = "asc";

    public function render()
    {
        //hay que validar los campos de busqueda!!!

        return view('livewire.preguntas',[
            'preguntas' => Pregunta::withAvg('ratings as avg_rating','rating')
            ->withCount('ratings as num_rating')
            ->where('titulo', 'ilike', "%$this->busca%")
            ->orWhere('descripcion', 'ilike', "%$this->busca%")
            ->orderBy($this->orden, $this->sentido)
            ->paginate(5),
        ]);
    }

    public function buscar(){
        $this->resetPage();
    }
}
