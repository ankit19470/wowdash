<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;
class Module extends Model
{
    use HasFactory;
    protected $fillable = [
        'module', // Add other attributes as needed
        // 'another_attribute',
        // 'yet_another_attribute',
    ];

// public function permissions()
// {
//     return $this->hasMany(Permission::class);
// }
// public function permissions()
// {
//     return $this->belongsToMany(Permission::class, 'module_permission');
// }

// Permission.php
// public function permissions()
// {
//     return $this->belongsToMany(Permission::class, 'module_permission'); // Use the pivot table name
// }
// public function permissions()
// {
//     return $this->hasMany(Permission::class);
// }
public function permissions(): HasMany
{
    return $this->hasMany(Permission::class);
}
// public function permissions()
// {
//     return $this->belongsToMany(Permission::class, 'module_permission', 'module_id', 'permission_id');
// }

// public function permissions()
// {
//     return $this->hasMany(Permission::class, 'module_permission');
// }
// public function permissions()
// {
//     return $this->hasMany(Permission::class);
// }
}

