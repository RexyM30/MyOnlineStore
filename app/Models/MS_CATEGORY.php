<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MS_CATEGORY extends Model
{
    use HasFactory;

    protected $connection = 'pgsql';
    protected $table = 'MS_CATEGORY';
    protected $primaryKey = 'ID';

    protected $fillable = [
        'kode_kategori',
        'nama_kategori',
        'status',
        'foto',
        'created_at',
        'updated_at'
    ];
}
