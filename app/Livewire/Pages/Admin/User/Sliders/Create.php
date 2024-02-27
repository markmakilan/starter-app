<?php

namespace App\Livewire\Pages\Admin\User\Sliders;

use Livewire\Component;
use App\Services\UserService;

class Create extends Component
{
    public $slider;
    public $user = [
        'given_name' => null,
        'middle_name' => null,
        'family_name' => null,
        'email' => null,
        'password' => null
    ];

    public function rules()
    {
        return [
            'user.given_name' => ['required'],
            'user.middle_name' => ['nullable'],
            'user.family_name' => ['required'],
            'user.email' => ['required', 'email', 'unique:users,email'],
            'user.password' => ['required', 'min:8', 'max:50'],
        ];
    }

    public function validationAttributes()
    {
        return [
            'user.given_name' => 'first name',
            'user.middle_name' => 'middle name',
            'user.family_name' => 'last name',
            'user.email' => 'email',
            'user.password' => 'password',
        ];
    }

    public function save(UserService $service)
    {
        $this->validate();
        
        $response = $service->store($this->user);

        if ($response['status'] === 200) {
            $this->redirect('/admin/user'); 
        }
    }

    public function render()
    {
        return view('livewire.pages.admin.user.sliders.create');
    }
}
