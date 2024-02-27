<?php

namespace App\Livewire\Pages\Admin\Module\Sliders;

use Livewire\Component;
use App\Services\ModuleService;
use App\Models\Option;

class Create extends Component
{
    public $slider;
    public $module = [];
    public $permissions = [];
    public $categories = [];

    public function rules()
    {
        return [
            'module.display_name' => ['required'],
            'module.description' => ['nullable']
        ];
    }

    public function validationAttributes()
    {
        return [
            'module.display_name' => 'name',
            'module.description' => 'description',
        ];
    }

    public function mount()
    {
        $this->module = [
            'display_name' => null,
            'description' => null
        ];

        $this->categories = $this->options()->get();

        $this->addPermission();
    }

    public function updatedPermissions($value, $key)
    {
        $keys = explode('.', $key);

        if ($keys[1] == 'permission_category_id') {
            $this->permissions[$key[0]]['items'] = [['name' => null]];
        }
    }

    public function addPermission()
    {
        $this->permissions[] = [
            'permission_category_id' => null,
            'items' => [['name' => null]]
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

    public function options() 
    {
        return Option::where(function ($query) {
            $query->where('status', true);
            $query->where('category', 'permission_category');
        });  
    }

    public function save(ModuleService $service)
    {
        $this->validate();

        $response = $service->store($this->module, $this->permissions);

        if ($response['status'] === 200) {
            $this->redirect('/admin/module'); 
        }
    }
    
    public function render()
    {
        return view('livewire.pages.admin.module.sliders.create');
    }
}
