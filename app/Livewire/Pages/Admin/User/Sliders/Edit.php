<?php

namespace App\Livewire\Pages\Admin\User\Sliders;

use Livewire\Component;
use Livewire\Attributes\{Validate, On};
use Illuminate\Validation\Rule;
use App\Services\UserService;
use App\Models\User;

class Edit extends Component
{
    public $slider;
    public $user;

    public function rules()
    {
        return [
            'user.id' => ['required', 'exists:users,id'],
            'user.given_name' => ['required'],
            'user.middle_name' => ['nullable'],
            'user.family_name' => ['required'],
            'user.email' => ['required', 'email', Rule::unique('users', 'email')->ignore($this->user['id'])],
            'user.status' => ['boolean'],
        ];
    }

    public function validationAttributes()
    {
        return [
            'user.given_name' => 'first name',
            'user.middle' => 'middle name',
            'user.family_name' => 'last name',
            'user.email' => 'email',
            'user.status' => 'status',
        ];
    }

    #[On('edit-user')]
    public function user(User $user)
    {
        $this->user = $user->toArray();
    }
    

    public function save(UserService $service)
    {
        $this->validate();
        
        $response = $service->update($this->user);

        if ($response['status'] === 200) {
            $this->redirect('/admin/user', navigate: true); 
        }
    }

    public function render()
    {
        return view('livewire.pages.admin.user.sliders.edit');
    }
}
