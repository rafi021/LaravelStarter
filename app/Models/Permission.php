<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    protected $fillable = [
        'module_id',
        'permission_name',
        'permission_slug',
    ];

    public function module()
    {
        return $this->belongsTo(Module::class)->withDefault();
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class)->withPivot('role_id');
    }
}
