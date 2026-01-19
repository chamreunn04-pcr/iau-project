<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    use HasUlids;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'name',
        'guard_name',
        'description',
        'color',
        'active',
    ];
}
