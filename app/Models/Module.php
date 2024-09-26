<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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



public function permissions()
{
    return $this->hasMany(Permission::class);
}
}

