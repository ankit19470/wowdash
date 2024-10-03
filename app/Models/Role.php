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
//     public function modules()
// {
//     return $this->belongsToMany(Module::class); // Adjust the relationship type if different
// }
    // The relationship is already defined in Spatie\Permission\Models\Role
    public function modules()
    {
        return $this->belongsToMany(Module::class, 'module_role', 'role_id', 'module_id');
    }
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
}

