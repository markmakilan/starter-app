<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserService
{
    public function store($user)
    {
        try {
            $result = DB::transaction(function () use ($user) {
                return ['user' => User::create($user)];
            });

            return ['status' => 200, 'data' => $result];
        } catch (\Exception $e) {
            return ['status' => 500, 'error' => $e->getMessage()];
        }
    }

    public function update($data)
    {
        try {
            $result = DB::transaction(function () use ($data) {
                $user = User::find($data['id']);
                
                return ['user' => $user ? $user->update($data) : false];
            });

            return ['status' => 200, 'data' => $result];
        } catch (\Exception $e) {
            return ['status' => 500, 'error' => $e->getMessage()];
        }
    }
}
