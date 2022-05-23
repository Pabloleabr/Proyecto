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

    /**
     * Rederiza la vista con la busqueda y orden de los ejercicios solicitados
     *
     * @return void
     */
    public function render()
    {
        //hay que validar los campos de busqueda!!!

        return view('livewire.ejercicios',[
            'ejercicios' => Ejercicio::withAvg('ratings as avg_rating','rating')
            ->withCount('ratings as num_rating')
            ->where('dificultad', 'ilike',"%$this->dificultad%")
            ->whereHas('lenguajes', function (Builder $query){
                $query->where('lenguajes.id', 'ilike', "%$this->lenguaje%");
            })
            ->where('titulo', 'ilike', "%$this->busca%")
            ->orderByRaw("$this->orden $this->sentido NULLS LAST")//para los ratings por si no hay votos
            ->paginate(5),
            'lenguajes' => Lenguaje::all()
        ]);
    }
}
