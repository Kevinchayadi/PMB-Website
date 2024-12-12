<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Umat extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Sluggable, SoftDeletes;
    protected $primaryKey = 'id_umat';
    protected $fillable = ['nama_umat','nama_baptis', 'email_umat', 'password', 'wilayah', 'lingkungan', 'nomohp_umat', 'alamat', 'status', 'pekerjaan'];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function transactionDetails(): HasMany
    {
        return $this->HasMany(TransactionDetail::class, 'relation_transaction_umats', 'id_transaction', 'id_umat');
    }

    public function requests(): HasMany
    {
        return $this->HasMany(Request::class, 'id_umat');
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama_umat',
            ],
        ];
    }
}
