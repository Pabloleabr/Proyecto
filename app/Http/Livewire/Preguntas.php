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

    /**
     * Rederiza la vista con la busqueda y orden solicitados
     *
     * @return void
     */
    public function render()
    {
        //hay que validar los campos de busqueda!!!

        return view('livewire.preguntas',[
            'preguntas' => Pregunta::withAvg('ratings as avg_rating','rating')
            ->withCount('ratings as num_rating')
            ->where('titulo', 'like', "%$this->busca%")
            ->orWhere('descripcion', 'like', "%$this->busca%")
            ->orderBy($this->orden, $this->sentido)
            ->paginate(5),
        ]);
    }

}
