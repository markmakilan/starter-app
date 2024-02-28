<?php

namespace App\Livewire\Pages\Admin\RolesPermission;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use App\Models\Module;

class Index extends Component
{
    public $current_role;

    public function mount()
    {
        $this->current_role = Role::where('status', true)->first()->toArray();
    }

    public function role(Role $role)
    {
        $this->current_role = $role->toArray();
    }

    public function render()
    {
        return view('livewire.pages.admin.roles-permission.index')->with([
            'roles' => Role::where('status', true)->get(),
            'modules' => Module::where('status', true)->with('permissions')->get(),
        ]);
    }
}
