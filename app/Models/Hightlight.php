<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hightlight extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'nama',
        'path',
        'id_admin'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama_admin',
            ],
        ];
    }
}
