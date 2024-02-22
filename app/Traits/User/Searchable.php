<?php

namespace App\Traits\User;

use App\Models\User;

trait Searchable 
{
    public static function search($filters) {
        return User::where(function ($users) use ($filters) {
            $users->when($filters['search'], function ($query, $search) {
                $query->where('email', 'like', '%' . $search . '%');
                $query->orWhere('family_name', 'like', '%' . $search . '%');
                $query->orWhere('given_name', 'like', '%' . $search . '%');
                $query->orWhere('middle_name', 'like', '%' . $search . '%');
            });
        })
        ->where(function ($users) use ($filters) {
            $users->when($filters['status'], function ($query, $status) {
                $query->where('status', $status == 'active' ? true : false);
            });
        });
    }
}