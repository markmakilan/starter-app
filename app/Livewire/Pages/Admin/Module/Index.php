<?php

namespace App\Livewire\Pages\Admin\Module;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.pages.admin.module.index')->extends('layouts.admin.app');
    }
}
