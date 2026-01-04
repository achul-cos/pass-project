<?php

namespace App\Livewire\Modals;

use Flux\Flux;
use Livewire\Attributes\On;
use Livewire\Component;

class ModalGagal extends Component
{
    public ?string $title = null;
    public ?string $message = null; 

    #[On('modal-gagal')]
    public function openModal(string $message, string $title): void
    {
        $this->title = $title;
        $this->message = $message;

        Flux::modal('modal-gagal')->show();
    }

    public function render()
    {
        return view('livewire.modals.modal-gagal');
    }
}
