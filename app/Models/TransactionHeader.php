<?php

namespace App\Models;

use App\Models\TransactionDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionHeader extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'id_transaction';
    protected $fillable = ['id_romo', 'id_seksi', 'status'];

    public function romo(): BelongsTo
    {
        return $this->belongsTo(Romo::class, 'id_romo');
    }

    public function seksi(): BelongsTo
    {
        return $this->belongsTo(Seksi::class, 'id_seksi');
    }

    public function transactionDetails(): HasMany
    {
        return $this->hasMany(TransactionDetail::class, 'id_transaction');
    }
}
