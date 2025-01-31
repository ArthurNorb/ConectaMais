<?php

namespace App\Livewire;

use Livewire\Component;

class EditarContato extends Component
{
    public $contato;
    public $showEditComponent = false;

    protected $listeners = ['showEditComponent'];

    public function showEditComponent()
    {
        $this->showEditComponent = true;
    }

    public function render()
    {
        return view('livewire.editar-contato', [
            'contato' => $this->contato,
            'showEditComponent' => $this->showEditComponent
        ]);
    }
}


