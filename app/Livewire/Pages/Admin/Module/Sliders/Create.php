<?php

namespace App\Livewire\Pages\Admin\Module\Sliders;

use Livewire\Component;
use App\Services\ModuleService;

class Create extends Component
{
    public $slider;
    public $module = [];

    public function rules()
    {
        return [
            'module.display_name' => ['required', 'alpha']
        ];
    }

    public function validationAttributes()
    {
        return [
            'module.display_name' => 'name',
        ];
    }

    public function mount()
    {
        $this->module = [
            'name' => null,
            'display_name' => null
        ];
    }

    public function updatedModuleDisplayName($value)
    {
        $this->module['name'] = str_replace(' ', '_', strtolower($value));
    }

    public function save(ModuleService $service)
    {
        $this->validate();
        
        $response = $service->store($this->module);

        if ($response['status'] === 200) {
            $this->redirect('/admin/module'); 
        }
    }
    
    public function render()
    {
        return view('livewire.pages.admin.module.sliders.create');
    }
}
