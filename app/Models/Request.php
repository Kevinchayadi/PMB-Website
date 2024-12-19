<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Request extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['nama_acara', 'id_umat', 'nama_terlibat_satu', 'nama_terlibat_dua', 'nama_romo', 'jadwal_acara', 'deskripsi_pengajuan', 'status'];

    public function umat(): BelongsTo
    {
        return $this->belongsTo(Umat::class, 'id_umat');
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama_seksi',
            ],
        ];
    }
}
