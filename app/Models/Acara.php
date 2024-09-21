<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Acara extends Model
{
    use HasFactory, Sluggable, SoftDeletes;

    protected $primaryKey = 'id_acara';
    protected $fillable = ['nama_acara','deskripsi_acara'];

    public function transactionDetails(): HasMany
    {
        return $this->hasMany(TransactionDetail::class, 'id_acara');
    }

    public function Dokumentasi(): HasMany
    {
        return $this->hasMany(TransactionDetail::class, 'id_acara');
    }
    

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama_acara'
            ]
        ];
    }
}
