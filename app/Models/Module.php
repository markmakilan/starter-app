<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};
use App\Traits\{Uuid, ActivityLog};
use App\Traits\Module\Searchable;

class Module extends Model
{
    use HasFactory, SoftDeletes, Uuid, ActivityLog, Searchable;

    protected $fillable = [
        'uuid',
        'name',
        'display_name',
        'description',
        'status',
    ];

    public function status() {
        return $this->status == true ? 'active' : 'inactive';
    }
}
