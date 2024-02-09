<?php

namespace App\Livewire\Layout\Admin;

use Livewire\Component;
use App\Livewire\Actions\Logout;

class Navbar extends Component
{
    public $name;

    public function mount()
    {
        $this->name = auth()->user()->fullName();
    }
    
    public function logout(Logout $logout) {
        $logout();
    
        $this->redirect('/', navigate: false);
    }

    public function render()
    {
        return view('livewire.layout.admin.navbar');
    }
}
