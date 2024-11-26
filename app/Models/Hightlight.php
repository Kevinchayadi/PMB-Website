<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hightlight extends Model
{
    use HasFactory;
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
