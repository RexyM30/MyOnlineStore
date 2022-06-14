<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MS_ALAMAT extends Model
{
    use HasFactory;

    protected $connection = 'pgsql';
    protected $table = 'MS_ALAMAT';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'alamat',
        'status',
        'created_at',
        'updated_at'
    ];
}
