<?php

namespace App\Livewire\Pages\Admin\Module\Sliders;

use Livewire\Component;

class Create extends Component
{
    public $slider;
    
    public function render()
    {
        return view('livewire.pages.admin.module.sliders.create');
    }
}
