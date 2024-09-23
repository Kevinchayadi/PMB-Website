<?php

namespace App\Models;

use App\Models\TransactionDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionHeader extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'id_transaction';
    protected $fillable = ['id_romo', 'id_seksi','id_doa','jadwal_acara', 'status'];

    public function romo(): BelongsTo
    {
        return $this->belongsTo(Romo::class, 'id_romo');
    }

    public function seksis(): BelongsToMany
    {
        return $this->belongsToMany( Seksi::class,'relation_transaction_seksis','id_transaction', 'id_seksi');
    }

    public function transactionDetails(): HasMany
    {
        return $this->HasMany(TransactionDetail::class, 'id_transaction', 'id_umat');
    }

    public function doa(): BelongsTo{
        return $this->belongsTo(Doa::class, 'id_doa');
    }
}
