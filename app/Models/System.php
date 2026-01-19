<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

class System extends Model
{
    use HasUlids;

    protected $fillable = ['name', 'slug', 'image'];

    public function modules()
    {
        return $this->hasMany(Module::class);
    }
}

