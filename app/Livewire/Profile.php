<?php

namespace App\Livewire;

use Livewire\Component;

class Profile extends Component
{
    public function change_email()
    {
       dd('hi');
    }

    public function render()
    {
        return view('livewire.profile');
    }
}
