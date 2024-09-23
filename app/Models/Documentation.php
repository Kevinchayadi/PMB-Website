<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Documentation extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "documentations";


    protected $fillable = [
        'nama_dokumentasi',
        'id_acara'
    ];


    public function acara(): BelongsTo{
        return $this->belongsTo(Acara::class, 'id_acara');
    }

}
