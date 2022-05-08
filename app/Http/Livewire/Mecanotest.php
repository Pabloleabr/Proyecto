<?php

namespace App\Http\Livewire;

use App\Models\Mecanotest as ModelsMecanotest;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Mecanotest extends Component
{

    public function render()
    {
        $user = Auth::user();
        if($user == null){
            return redirect(route('inicio'));
        }

        return view('livewire.mecanotest',[
            'tests' => ModelsMecanotest::where('user_id', $user->id)
            ->orderBy('pulsaciones', 'desc')
            ->orderBy('correctas', 'desc')
            ->get()
        ]);
    }

}
