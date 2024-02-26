<?php

namespace App\Traits\Module;

use App\Models\Module;

trait Searchable 
{
    public static function search($filters) {
        return Module::where(function ($users) use ($filters) {
            $users->when($filters['search'], function ($query, $search) {
                $query->where('name', 'like', '%' . $search . '%');
            });
        })
        ->where(function ($users) use ($filters) {
            $users->when($filters['status'], function ($query, $status) {
                $query->where('status', $status == 'active' ? true : false);
            });
        });
    }
}