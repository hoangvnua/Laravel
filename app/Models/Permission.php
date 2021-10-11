<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Permission extends Model
{
    use HasFactory;
    public function roles()
    {

        return $this->belongsToMany(Role::class, 'roles_permissions');
    }

    public function users()
    {

        return $this->belongsToMany(User::class, 'users_permissions');
    }

    public function setNameAttribute($name)
    {
        $this->attributes['name'] = $name;
        $this->attributes['slug'] = Str::slug($name);
    }
}
