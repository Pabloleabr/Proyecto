<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Ejercicio;
use App\Models\Lenguaje;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Pregunta;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class Dashboard extends Component
{
    use WithPagination;
    public $busca = "";
    public $orden = "created_at";
    public $sentido = "asc";
    public $buscaPre = "";

    public function render()
    {
        $user =  Auth::user();
        return view('livewire.dashboard',[
            //Consulta ejericcios
            'ejercicios' => Ejercicio::withAvg('ratings as avg_rating','rating')
            ->withCount('ratings as num_rating')
            ->where('titulo', 'ilike', "%$this->busca%")
            ->where('user_id', $user->id)
            ->orderBy($this->orden, $this->sentido)
            ->paginate(4),

            //Consulta Preguntas
            'preguntas' => Pregunta::withAvg('ratings as avg_rating','rating')
            ->withCount('ratings as num_rating')
            ->where('titulo', 'ilike', "%$this->buscaPre%")
            ->where('user_id', $user->id)
            ->orderBy($this->orden, $this->sentido)
            ->paginate(5),
        ]);
    }
    public function buscar(){
        $this->resetPage();
    }
}
