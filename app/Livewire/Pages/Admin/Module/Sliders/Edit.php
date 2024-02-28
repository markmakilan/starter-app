<?php

namespace App\Livewire\Pages\Admin\Module\Sliders;

use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Validation\Rule;
use App\Services\ModuleService;
use App\Models\Option;

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
        $this->categories = $this->options()->get();;
    }

    #[On('edit-module')]
    public function module($module)
    {
        $permissions = [];

        foreach ($module['permissions'] as $key => $permission) {

            if (isset($permissions[$permission['permission_category_id']]) === false) {
                $permission_category = $this->options()->where('id', $permission['permission_category_id'])->first();
                
                $permissions[$permission_category->id] = [
                    'permission_category_id' => $permission_category->id,
                    'permission_category_name' => $permission_category->name,
                    'status' => true
                ];
            }

            $permissions[$permission['permission_category_id']]['items'][$permission['id']] = [
                'permission_id' => $permission['id'],
                'name' => $permission['display_name'],
                'status' => $permission['status'] == 1 ? true : false
            ];
        }

        $this->module = $module;
        $this->permissions = $permission;
    }

    public function updatedPermissions($value, $key)
    {
        $keys = explode('.', $key);

        if ($keys[1] == 'permission_category_id') {
            $this->permissions[$key[0]]['items'][] = ['name' => null];
        }
    }

    public function addPermission()
    {
        $this->permissions[] = [
            'permission_category_id' => null,
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

    public function options() 
    {
        return Option::where(function ($query) {
            $query->where('status', true);
            $query->where('category', 'permission_category');
        });  
    }
    
    public function update(ModuleService $service)
    {   
        $this->validate();
        
        $response = $service->update($this->module, $this->permissions);

        if ($response['status'] === 200) {
            $this->redirect('/admin/module'); 
        }
    }
    public function render()
    {
        return view('livewire.pages.admin.module.sliders.edit');
    }
}
