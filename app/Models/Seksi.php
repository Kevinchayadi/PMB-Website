<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Seksi extends Model
{
    use HasFactory, Sluggable, SoftDeletes;

    protected $primaryKey = 'id_seksi';
    protected $fillable = ['nama_seksi'];

    public function transactionHeaders(): BelongsToMany
    {
        return $this->belongsToMany(TransactionHeader::class, 'relation_transaction_seksis', 'id_transaction', 'id_seksi');
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
