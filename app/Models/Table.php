<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;

    protected $table = 'tables';

    protected $fillable = ['name','status'];


    public function players()
    {
        return $this->hasMany(Player::class,'table_id','id');
    }

    public function roleStatistic()
    {
        return $this->hasMany(RoleStatistic::class,'table_id','id');
    }
}
