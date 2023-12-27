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
    
    public function users() 
    {
        return User::where(function ($users) {
            $users->when($this->filters['search'], function ($query, $search) {
                $query->where('email', 'like', '%' . $search . '%');
                $query->orWhere('family_name', 'like', '%' . $search . '%');
                $query->orWhere('given_name', 'like', '%' . $search . '%');
                $query->orWhere('middle_name', 'like', '%' . $search . '%');
            });
        })
        ->where(function ($users) {
            $users->when($this->filters['status'], function ($query, $status) {
                $query->where('status', $status == 'active' ? true : false);
            });
        });
    }

    public function render()
    {
        return view('livewire.pages.admin.user.index')->extends('layouts.admin.app')->with([
            'data' => $this->users()->paginate(10)
        ]);
    }
}
