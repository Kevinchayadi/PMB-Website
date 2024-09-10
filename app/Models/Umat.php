<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Cviebrock\EloquentSluggable\Sluggable;

class Umat extends Model
{
    use HasFactory, Sluggable;

    protected $primaryKey = 'id_umat';
    protected $fillable = ['nama_umat', 'wilayah', 'lingkungan', 'nomohp_umat', 'alamat', 'status', 'pekerjaan'];

    public function transactionDetails(): HasMany
    {
        return $this->hasMany(TransactionDetail::class, 'id_umat');
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
