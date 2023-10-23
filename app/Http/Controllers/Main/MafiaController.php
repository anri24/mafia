<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Player;

class MafiaController extends Controller
{
    public function showRole(Player $player)
    {
        return view('main.start',compact('player'));
    }
}
