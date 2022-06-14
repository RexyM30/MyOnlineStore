<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DT_SEQUENCE extends Model
{
    use HasFactory;

    protected $connection = 'pgsql';
    protected $table = 'DT_SEQUENCE';
    protected $primaryKey = 'id';

    protected $fillable = [
        'Type',
        'Month',
        'Year',
        'NextSequence',
        'created_at',
        'updated_at'
    ];
}
