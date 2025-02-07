<?php

namespace App\Livewire;

use Livewire\Component;

class RedeSocial extends Component
{
    public $socialMedias = [
        ['nome' => '', 'link' => ''],
    ];

    public function updateSocialMedia($index, $campo, $valor)
    {
        $this->socialMedias[$index] = ['nome' => '', 'link' => ''];
    }

    public function addSocialMedia()
    {
        $this->socialMedias[] = ['nome' => '', 'link' => ''];
        // dd($this->socialMedias);
    }

    public function render()
    {
        return view('livewire.rede-social');
    }
}
