<?php

namespace App\Livewire\Layout\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Route;

class Sidebar extends Component
{
    public $current_route_name;
    public $menu = [];

    public function mount()
    {
        $this->current_route_name = Route::currentRouteName();
        $this->menu = [
            'system' => in_array($this->current_route_name, ['admin.module'])
        ];
    }

    public function render()
    {
        return view('livewire.layout.admin.sidebar');
    }
}
