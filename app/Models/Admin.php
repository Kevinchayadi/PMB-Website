<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends Authenticatable
{
    use HasFactory, Sluggable, SoftDeletes;

    protected $primaryKey = 'id_admin';
    protected $fillable = ['username', 'password', 'id_role'];

    public function transactionDetails(): HasMany
    {
        return $this->hasMany(TransactionDetail::class, 'id_admin');
    }

    public function roles(): BelongsTo
    {
        return $this->belongsTo(Role::class, 'id_role','id_role');
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
