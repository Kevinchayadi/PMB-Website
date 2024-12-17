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
    protected $primaryKey = 'id_doa';
    protected $fillable = ['nama_doa', 'deskripsi_doa', 'ayat_renungan', 'isi_renungan', 'ayat_tambahan', 'path'];

    public function transactionHeaders(): HasMany
    {
        return $this->hasMany(TransactionHeader::class, 'id_doa');
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
