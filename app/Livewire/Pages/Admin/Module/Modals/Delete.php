<?php

namespace App\Livewire\Pages\Admin\Module\Modals;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Services\ModuleService;

class Delete extends Component
{
    public $modal;
    public $module;

    #[On('delete-module')]
    public function module($module)
    {
        $this->module = $module;
    }
    
    public function delete(ModuleService $service)
    {
        $response = $service->delete($this->module['id']);

        if ($response['status'] === 200) {
            $this->redirect('/admin/module'); 
        }
    }
    public function render()
    {
        return view('livewire.pages.admin.module.modals.delete');
    }
}
