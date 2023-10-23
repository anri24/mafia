<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleStatistic extends Model
{
    use HasFactory;


    protected $table = 'role_statistics';

    protected $fillable = [
        'table_id',
        'role_id',
        'count',
    ];
}
