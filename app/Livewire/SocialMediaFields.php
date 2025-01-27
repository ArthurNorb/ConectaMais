<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SocialMediaFields extends Component
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
        return view('livewire.social-media-fields');
    }
}
