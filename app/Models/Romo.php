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

class Romo extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Sluggable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama_romo',
        'ttl_romo', 
        'nomorhp_romo',
    ];
    
    public function transactionHeaders(): HasMany
    {
        return $this->hasMany(TransactionHeader::class, 'id_romo');
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama_romo'
            ]
        ];
    }
}