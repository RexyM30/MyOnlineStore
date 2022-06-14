<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MS_CART extends Model
{
    use HasFactory;

    protected $connection = 'pgsql';
    protected $table = 'MS_CART';
    protected $primaryKey = 'id';

    protected $fillable = [
        'produk_id',
        'user_id',
        'status',
        'created_at',
        'updated_at'
    ];
}
