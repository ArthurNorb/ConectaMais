<?php

namespace App\Livewire;

use Livewire\Component;

class RedeSocial extends Component
{
    public $socialMedias = [
        ['nome' => '', 'link' => ''],
    ];

    public function addSocialMedia()
    {
        $this->socialMedias[] = ['nome' => '', 'link' => ''];
    }

    public function render()
    {
        return view('livewire.rede-social');
    }
}
