<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DT_TRANSACTIONDETAIL extends Model
{
    use HasFactory;

    protected $connection = 'pgsql';
    protected $table = 'DT_TRANSACTION';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'no_invoice',
        'status_transaction',
        'status_pembayaran',
        'status_pengiriman',
        'no_resi',
        'ekspedisi',
        'subtotal',
        'ongkir',
        'diskon',
        'total',
        'created_at',
        'updated_at'
    ];
}
