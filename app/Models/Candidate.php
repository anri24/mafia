<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    protected $table = 'candidates';

    protected $fillable = ['table_id','user_id'];


    public function members()
    {
        return $this->belongsTo(Player::class,'user_id','id');
    }

    public function table()
    {
        return $this->belongsTo(Table::class,'table_id','id');
    }
}
