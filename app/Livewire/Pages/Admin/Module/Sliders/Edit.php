<?php

namespace App\Livewire\Pages\Admin\Module\Sliders;

use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Validation\Rule;
use App\Services\ModuleService;

class Edit extends Component
{
    public $slider;
    public $module;
    public $permissions = [];
    public $categories = [];

    public function rules()
    {
        return [
            'module.id' => ['required', 'exists:modules,id'],
            'module.display_name' => ['required'],
            'module.description' => ['nullable'],
            'module.status' => ['boolean'],
        ];
    }

    public function validationAttributes()
    {
        return [
            'module.display_name' => 'name',
            'module.description' => 'description',
            'module.status' => 'status',
        ];
    }

    public function mount()
    {
        $this->categories = [
            'basic' => 'Basic',
            'field' => 'Fields',
            'tab' => 'Tabs',
            'other' => 'Other',
        ];
    }

    #[On('edit-module')]
    public function module($module)
    {
        $this->permissions = [];

        foreach ($module['permissions'] as $key => $permission) {

            if (isset($this->permissions[$permission['category']]) === false) {
                $this->permissions[$permission['category']] = ['category' => $permission['category'], 'items' => []];
            }

            $this->permissions[$permission['category']]['items'][$permission['id']] = [
                'name' => $permission['display_name']
            ];
        }

        $this->module = $module;
    }

    public function updatedPermissions($value, $key)
    {
        $keys = explode('.', $key);

        if ($keys[1] == 'category') {
            $this->permissions[$key[0]]['items'][] = ['id' => null, 'name' => null];
        }
    }

    public function addPermission()
    {
        $this->permissions[] = [
            'category' => null,
            'items' => []
        ];
    }

    public function removePermission($key)
    {
        unset($this->permissions[$key]);
    }

    public function addItem($key)
    {
        $this->permissions[$key]['items'][] = ['name' => null];
    }

    public function removeItem($permission_key, $key)
    {
        unset($this->permissions[$permission_key]['items'][$key]);
    }
    
    public function update(ModuleService $service)
    {
        dd($this);
        
        $this->validate();
        
        $response = $service->update($this->module);

        if ($response['status'] === 200) {
            $this->redirect('/admin/module'); 
        }
    }
    public function render()
    {
        return view('livewire.pages.admin.module.sliders.edit');
    }
}
