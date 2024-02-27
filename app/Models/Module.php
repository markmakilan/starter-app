<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};
use Spatie\Permission\Models\Permission;
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
        'status'
    ];

    public function permissions() {
        return $this->hasMany(Permission::class);
    }

    public function status() {
        return $this->status == true ? 'active' : 'inactive';
    }
}
