<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MS_PRODUCT extends Model
{
    use HasFactory;

    protected $connection = 'pgsql';
    protected $table = 'MS_PRODUCT';
    protected $primaryKey = 'ID';

    protected $fillable = [
        'kategori_id',
        'kode_produk',
        'nama_produk',
        'deskripsi_produk',
        'foto',
        'qty',
        'harga',
        'status',
        'created_at',
        'updated_at'
    ];
}
