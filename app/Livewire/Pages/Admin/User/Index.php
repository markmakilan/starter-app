<?php

namespace App\Livewire\Pages\Admin\User;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.pages.admin.user.index')->extends('layouts.admin.app');
    }
}
