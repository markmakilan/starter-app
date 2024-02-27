<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};
use App\Traits\{Uuid, ActivityLog};

class Option extends Model
{
    use HasFactory, SoftDeletes, Uuid, ActivityLog;

    protected $fillable = [
        'uuid',
        'category',
        'name',
        'status'
    ];
}
