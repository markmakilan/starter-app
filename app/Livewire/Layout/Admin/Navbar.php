<?php

namespace App\Livewire\Layout\Admin;

use Livewire\Component;

class Navbar extends Component
{
    public $name;

    public function mount()
    {
        $this->name = auth()->user()->fullName();
    }

    public function render()
    {
        return view('livewire.layout.admin.navbar');
    }
}
