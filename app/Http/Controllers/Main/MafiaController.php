<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Player;
use App\Models\Table;
use App\Models\Vote;

class MafiaController extends Controller
{
    public function start(Player $player)
    {
        return view('main.start',compact('player'));
    }

    public function storeVote(Table $table,Player $fromPlayer,Player $toPlayer)
    {
        Vote::create([
            'table_id' => $table->id,
            'from' => $fromPlayer->id,
            'to' => $toPlayer->id,
        ]);
        $votes = $table->votes;

        return redirect()->back();
    }


}
