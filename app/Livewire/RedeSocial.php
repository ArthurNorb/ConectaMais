<?php

namespace App\Livewire;

use App\Models\RedeSocial as ModelsRedeSocial;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class RedeSocial extends Component
{
    public $redes = [];
    public $contatoId;
    public $keyIdentifier; 

    public function mount($contatoId)
    {
        $this->contatoId = $contatoId;
        $this->keyIdentifier = 'rede-social-' . $contatoId;
        $this->redes = $this->getRedes();
    }

    public function render()
    {
        return view('livewire.rede-social');
    }

    public function getRedes()
    {
        if ($this->contatoId) {
            return ModelsRedeSocial::where('redes_sociais.pessoas_id', $this->contatoId)
                ->get()
                ->toArray();
        }
        return [];
    }

    public function addRede()
    {
        $this->redes[] = [
            'id' => null,
            'nome' => '',
            'link' => ''
        ];
    }

    public function removeRede($index)
    {
        if ($this->redes[$index]['id'] != null) {
            ModelsRedeSocial::find($this->redes[$index]['id'])->delete();
            array_splice($this->redes, $index, 1);
        }else {
            array_splice($this->redes, $index, 1);
        }
    }
}
