<?php

namespace App\Livewire;

use App\Models\RedeSocial as ModelsRedeSocial;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class RedeSocial extends Component
{
    public $redes = [];
    public $contatoId;

    public function mount()
    {
        $this->redes = $this->getRedes();
    }

    public function render()
    {
        return view('livewire.rede-social');
    }

    public function getRedes()
    {
        if ($this->contatoId) {
            return ModelsRedeSocial::where('redes_sociais.pessoa_id', $this->contatoId)
                ->get()
                ->toArray();
        }
        return [];
    }

    public function addRede()
    {
        $this->redes[] = ['nome' => '', 'link' => ''];
    }

    public function removeRede($index)
    {
        if (isset($this->redes[$index])) {
            array_splice($this->redes, $index, 1);
        }
    }
}
