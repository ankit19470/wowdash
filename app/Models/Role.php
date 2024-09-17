<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    use HasFactory;
    // public function modules()
    // {
    //     return $this->belongsToMany(Module::class);
    // }
    // The relationship is already defined in Spatie\Permission\Models\Role
}

