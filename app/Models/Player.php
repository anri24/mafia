<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    protected $table = 'players';

    protected $fillable = ['table_id','role_id','name'];


    public function role()
    {
        return $this->belongsTo(Role::class,'role_id','id');
    }
}
