<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionHeader extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'id_transaction';
    protected $fillable = [
        'judul',
        'id_romo', 
        'id_seksi', 
        'id_doa', 
        'jadwal_transaction', 
        'status'
    ];

    /**
     * Relasi ke model Romo
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function romo(): BelongsTo
    {
        return $this->belongsTo(Romo::class, 'id_romo');
    }

    /**
     * Relasi many-to-many ke model Seksi
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function seksis(): BelongsToMany
    {
        return $this->belongsToMany(Seksi::class, 'relation_transaction_seksis', 'id_transaction', 'id_seksi');
    }

    /**
     * Relasi ke model TransactionDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactionDetails(): HasOne
    {
        return $this->hasOne(TransactionDetail::class, 'id_transaction');
    }

    /**
     * Relasi ke model Doa
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function doa(): BelongsTo
    {
        return $this->belongsTo(Doa::class, 'id_doa');
    }
}

