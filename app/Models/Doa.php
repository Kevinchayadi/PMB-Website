<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doa extends Model
{
    use HasFactory, Sluggable, SoftDeletes;

    protected $fillable = ['nama_doa', 'deskripsi_doa', 'ayat_renungan', 'deskripsi_renungan', 'ayat_tambahan'];

    public function transactionHeaders(): HasMany
    {
        return $this->hasMany(TransactionHeader::class, 'id_admin');
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
