<?php

namespace App\Livewire\Pages\Admin\User;

use Livewire\{Component, WithPagination};
use App\Models\User;

class Index extends Component
{
    use WithPagination;

    public $filters = [
        'search' => null,
        'status' => null,
    ];

    public $components = [
        'edit_user_slider' => false,
        'delete_user_modal' => false,
    ];

    public function updatedFilters()
    {
        $this->resetPage();
    }

    public function edit($uuid) 
    {
        $user = User::where('uuid', $uuid);
        
        if ($user->count() == 1) {
            $this->dispatch('edit-user', user: $user->first());
            $this->components['edit_user_slider'] = true;
        }
    }

    public function delete($uuid) 
    {
        $user = User::where('uuid', $uuid);
        
        if ($user->count() == 1) {
            $this->dispatch('delete-user', user: $user->first());
            $this->components['delete_user_modal'] = true;
        }
    }

    public function render()
    {
        return view('livewire.pages.admin.user.index')->with([
            'data' => User::search($this->filters)->paginate(10)
        ]);
    }
}
