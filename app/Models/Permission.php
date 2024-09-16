<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    // Add the fillable property
    protected $fillable = ['name'];
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
    public function permissions()
{
    return $this->belongsToMany(Permission::class);
}
}
