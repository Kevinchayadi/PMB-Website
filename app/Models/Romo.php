<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Romo extends Model
{
    use HasFactory, Sluggable, SoftDeletes;

    protected $primaryKey = 'id_romo';
    protected $fillable = ['nama_romo', 'al_romo', 'nomorhp_romo'];

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
