<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kra8\Snowflake\HasShortflakePrimary;

class Table extends Model
{
    use HasFactory,HasShortflakePrimary;

    protected $table = 'tables';

    protected $fillable = ['name','status','fall'];


    public function players()
    {
        return $this->hasMany(Player::class,'table_id','id');
    }

    public function roleStatistic()
    {
        return $this->hasMany(RoleStatistic::class,'table_id','id');
    }

    public function votes()
    {
        return $this->hasMany(Vote::class,'table_id','id');
    }
}
