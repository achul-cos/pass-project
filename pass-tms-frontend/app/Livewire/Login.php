<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Login - PASS Ticket Management System')]

class Login extends Component
{
    
    public function render()
    {
        return view('livewire.login');
    }
}
