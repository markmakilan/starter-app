<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserService
{
    public function store($data)
    {
        try {
            $result = DB::transaction(function () use ($data) {
                return ['user' => User::create($data)];
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

    public function delete($id)
    {
        try {
            $result = DB::transaction(function () use ($id) {
                $user = User::find($id);

                return ['user' => $user ? $user->delete() : false];
            });

            return ['status' => 200, 'data' => $result];
        } catch (\Exception $e) {
            return ['status' => 500, 'error' => $e->getMessage()];
        }
    }
}
