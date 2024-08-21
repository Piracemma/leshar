<?php

namespace App\Livewire;

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
