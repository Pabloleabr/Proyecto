<?php

namespace App\Http\Livewire;

use App\Models\Mecanotest;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class MecanoPlace extends Component
{
    use WithPagination;

    public function render()
    {
        $user = Auth::user();
        if($user == null){
            return redirect(route('inicio'));
        }

        return view('livewire.mecano-place',[
                    'tests' => MecanoTest::orderBy('correctas', 'DESC')
                    ->paginate(10)]);
    }
}
