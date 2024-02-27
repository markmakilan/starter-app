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

    public function rules()
    {
        return [
            'module.id' => ['required', 'exists:modules,id'],
            'module.display_name' => ['required'],
            'module.status' => ['boolean'],
        ];
    }

    public function validationAttributes()
    {
        return [
            'module.display_name' => 'name',
            'module.status' => 'status',
        ];
    }

    public function updatedModuleDisplayName($value)
    {
        $this->module['name'] = str_replace(' ', '_', strtolower($value));
    }

    #[On('edit-module')]
    public function module($module)
    {
        $this->module = $module;
    }
    
    public function update(ModuleService $service)
    {
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
