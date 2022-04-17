<?php

namespace App\Http\Livewire;

use App\Models\Ejercicio;
use App\Models\Lenguaje;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class Ejercicios extends Component
{
    use WithPagination;
    public $busca = "";
    public $dificultad = "";
    public $lenguaje = "";
    public $orden = "created_at";
    public $sentido = "asc";

    public function render()
    {
        return view('livewire.ejercicios',[
            'ejercicios' => Ejercicio::withAvg('ratings as avg_rating','rating')
            ->withCount('ratings as num_rating')
            ->where('dificultad', 'ilike',"%$this->dificultad%")
            ->whereHas('lenguajes', function (Builder $query){
                $query->where('lenguajes.id', 'ilike', "%$this->lenguaje%");
            })
            ->where('titulo', 'ilike', "%$this->busca%")
            ->orderBy($this->orden, $this->sentido)
            ->paginate(5),
            'lenguajes' => Lenguaje::all()
        ]);
    }
    public function buscar(){
        $this->resetPage();
    }
}
