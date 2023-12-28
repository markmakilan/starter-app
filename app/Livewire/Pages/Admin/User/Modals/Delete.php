<?php

namespace App\Livewire\Pages\Admin\User\Modals;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Services\UserService;

class Delete extends Component
{
    public $modal;
    public $user;

    #[On('delete-user')]
    public function user($user)
    {
        $this->user = $user;
    }
    
    public function delete(UserService $service)
    {
        $response = $service->delete($this->user['id']);

        if ($response['status'] === 200) {
            $this->redirect('/admin/user'); 
        }
    }

    public function render()
    {
        return view('livewire.pages.admin.user.modals.delete');
    }
}
