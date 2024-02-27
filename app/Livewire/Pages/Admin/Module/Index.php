<?php

namespace App\Livewire\Pages\Admin\Module;

use Livewire\{Component, WithPagination};
use App\Models\Module;

class Index extends Component
{
    use WithPagination;

    public $filters = [
        'search' => null,
        'status' => null,
    ];

    public $components = [
        'edit_module_slider' => false,
        'delete_module_modal' => false,
    ];

    public function updatedFilters()
    {
        $this->resetPage();
    }

    public function edit($uuid) 
    {
        $module = Module::where('uuid', $uuid);
        
        if ($module->count() == 1) {
            $this->dispatch('edit-module', module: $module->with('permissions')->first());
            $this->components['edit_module_slider'] = true;
        }
    }

    public function delete($uuid) 
    {
        $module = Module::where('uuid', $uuid);
        
        if ($module->count() == 1) {
            $this->dispatch('delete-module', module: $module->first());
            $this->components['delete_module_modal'] = true;
        }
    }

    public function render()
    {
        return view('livewire.pages.admin.module.index')->with([
            'data' => Module::search($this->filters)->paginate(10)
        ]);
    }
}
