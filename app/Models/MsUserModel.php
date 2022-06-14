<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MsUserModel extends Model
{
    use HasFactory;

    protected $connection = 'pgsql';
    protected $table = 'MS_User';
    protected $primaryKey = 'ID';

    protected $fillable = [
        'namadepan',
        'namatengah',
        'namabelakang',
        'email',
        'password',
        'created_at',
        'updated_at',
        'StatusAktif'
    ];
}
