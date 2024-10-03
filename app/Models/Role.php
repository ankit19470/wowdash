<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Role as SpatieRole;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
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
    // public function modules()
    // {
    //     return $this->belongsToMany(Module::class, 'module_role', 'role_id', 'module_id');
    // }
    // public function modules(): BelongsToMany
    // {
    //     return $this->belongsToMany(Module::class, 'role_module', 'role_id', 'module_id');
    // }

    public function modules(): BelongsToMany
{
    return $this->belongsToMany(Module::class, 'role_module', 'role_id', 'module_id')->select('modules.id', 'modules.module'); // Specify fields here
}
    // Existing permissions method
    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class, 'role_has_permissions', 'role_id', 'permission_id');
    }
}

