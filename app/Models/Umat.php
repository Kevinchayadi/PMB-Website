<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Umat extends  Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Sluggable ,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama_umat',
        'email_umat',
        'password', 
        'wilayah', 
        'lingkungan', 
        'nomohp_umat', 
        'alamat', 
        'status', 
        'pekerjaan'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function transactionDetails(): HasMany
    {
        return $this->hasMany(TransactionDetail::class, 'id_umat');
    }

    public function requests(): HasMany{
        return $this->hasMany(Request::class, 'id_umat');
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama_umat'
            ]
        ];
    }
}
