<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Module extends Model
{
    use HasUuids;

    protected $fillable = ['system_id', 'name', 'slug'];

    public function system()
    {
        return $this->belongsTo(System::class);
    }

    public function permissions()
    {
        return $this->hasMany(Permission::class);
    }
}

