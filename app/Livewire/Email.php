<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Email as EmailModel; // Assuming Email is your Eloquent model
use RealRashid\SweetAlert\Facades\Alert;


class Email extends Component
{
    public $email;

    public function render()
    {
        return view('livewire.email');
    }

    public function saveEmail()
    {
        $this->validate([
            'email' => 'required|email|unique:emails,email', // Adjust validation rules as needed
        ]);

        // Use the create method on the EmailModel
        EmailModel::create([
            'email' => $this->email,
        ]);

        $this->alert('success', 'Email Added', 'Your Email Added Successfully To Our Newsletter');


        // Clear the input field after saving
        $this->reset(['email']);
    }


    
}
