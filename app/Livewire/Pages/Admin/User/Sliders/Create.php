<?php

namespace App\Livewire\Pages\Admin\User\Sliders;

use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Services\UserService;

class Create extends Component
{
    public $slider;
    public $user;

    #[Validate([
        'user.family_name' => ['required'],
        'user.given_name' => ['required'],
        'user.email' => ['required', 'email', 'unique:users,email'],
        'user.password' => ['required', 'min:8', 'max:50'],
    ], [
        'user.family_name' => 'last name',
        'user.given_name' => 'first name',
        'user.email' => 'email',
        'user.password' => 'password',
    ])]

    public function mount()
    {
        $this->user = [
            'family_name' => null,
            'given_name' => null,
            'email' => null,
            'password' => null
        ];
    }

    public function save(UserService $service)
    {
        $this->validate();
        
        $response = $service->store($this->user);

        if ($response['status'] === 200) {
            return redirect()->route('admin.user');
        }
    }

    public function render()
    {
        return view('livewire.pages.admin.user.sliders.create');
    }
}
