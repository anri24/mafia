<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kra8\Snowflake\HasShortflakePrimary;

class Player extends Model
{
    use HasFactory,HasShortflakePrimary;

    protected $table = 'players';

    protected $fillable = ['table_id','role_id','phone','name','status','fall'];

    public function table()
    {
        return $this->belongsTo(Table::class,'table_id','id');
    }

    public function role()
    {
        return $this->belongsTo(Role::class,'role_id','id');
    }
}
