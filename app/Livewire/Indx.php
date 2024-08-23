<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class Indx extends Component
{
    use Interactions;

    public function render()
    {
        return view('livewire.indx');
    }
}
