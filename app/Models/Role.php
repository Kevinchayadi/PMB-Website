<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use HasFactory, Sluggable, SoftDeletes;

    protected $fillable = ['nama_role'];

    public function admins(): HasMany
    {
        return $this->hasMany(Role::class, 'id_admin');
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama_admin',
            ],
        ];
    }
}
