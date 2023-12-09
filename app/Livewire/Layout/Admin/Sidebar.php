<?php

namespace App\Livewire\Layout\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Route;

class Sidebar extends Component
{
    public $current_route_name;

    public function mount()
    {
        $this->current_route_name = Route::currentRouteName();
    }

    public function render()
    {
        return view('livewire.layout.admin.sidebar');
    }
}
