<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['id_transaction', 'id_acara', 'id_umat', 'id_admin'];

    public function transactionHeader(): BelongsTo
    {
        return $this->belongsTo(TransactionHeader::class,  'id_seksi');
    }

    public function acara(): BelongsTo
    {
        return $this->belongsTo(Acara::class, 'id_acara');
    }

    public function umat(): BelongsToMany
    {
        return $this->belongsToMany(Umat::class,  'relation_transaction_umats','id_transaction', 'id_umat');
    }

    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'id_admin');
    }
}
