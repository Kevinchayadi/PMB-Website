<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends Authenticatable
{
    use HasFactory, Sluggable,SoftDeletes;

    protected $primaryKey = 'id_admin';
    protected $fillable = ['nama_admin', 'email', 'password'];

    public function transactionDetails(): HasMany
    {
        return $this->hasMany(TransactionDetail::class, 'id_admin');
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama_admin'
            ]
        ];
    }
}
