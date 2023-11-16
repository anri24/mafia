<?php

namespace App\Services;

use App\Models\Player;
use App\Models\Table;
use Illuminate\Http\Request;

class PlayerService
{
    public function storePhone(Request $request, Table $table)
    {
        $member = $table->players()->where('phone', $request->phone);
        if ($member->exists()) {
            $player = $member->first();
            if ($player->name == null) {
                return redirect()->route('add.player.name', $player->id);
            } else {
                return redirect()->route('show.role', $player->id);
            }
        } else {
//            if ($table->players()->count() >= $table->players_quantity){
//                return redirect()->route('');
//            }
            $player = Player::query()->create([
                'table_id' => $table->id,
                'phone' => $request->phone,
            ]);

            return redirect()->route('add.player.name', $player->id);
        }
    }
}
