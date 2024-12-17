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

class Romo extends Model
{
    use HasApiTokens, HasFactory, Notifiable, Sluggable, SoftDeletes;
    protected $primaryKey = 'id_romo';
    protected $fillable = ['nama_romo', 'DOB_romo','tempat_lahir','jabatan','pengalaman','nomorhp_romo', 'path'];

    public function transactionHeaders(): HasMany
    {
        return $this->hasMany(TransactionHeader::class, 'id_romo');
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama_romo',
            ],
        ];
    }
}
