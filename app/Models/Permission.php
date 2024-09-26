<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    // Add the fillable property
    // protected $fillable = ['name'];
protected $fillable = ['name', 'guard_name', 'module_id'];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
    public function permissions()
{
    return $this->belongsToMany(Permission::class);
}
// Permission.php
// public function module()
// {
//     return $this->belongsTo(Module::class);
// }

// public function modules()
// {
//     return $this->belongsToMany(Module::class, 'module_permission');
// }
public function module()
{
    return $this->belongsTo(Module::class);
}

}

