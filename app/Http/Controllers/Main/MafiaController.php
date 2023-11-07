<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Player;
use App\Models\Vote;

class MafiaController extends Controller
{
    public function start(Player $player)
    {
        return view('main.start',compact('player'));
    }

    public function storeVote(Player $fromPlayer,Player $toPlayer)
    {
        Vote::create([
            'from' => $fromPlayer->id,
            'to' => $toPlayer->id,
        ]);
        return redirect()->back();
    }


}
