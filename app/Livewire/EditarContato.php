<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Estado; 

class EditarContato extends Component
{
    public $contato;
    public function mount($contato)
    {
        $this->contato = $contato;
    }
    public function render()
    {
        $estados = Estado::all();
        return view('livewire.editar-contato', compact('estados'));
    }
}
