<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\PlayerNameRequest;
use App\Models\Player;
use App\Models\Table;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function index()
    {
        $tables = Table::all();
        return view('main.index',compact('tables'));
    }

    public function addPlayerPhone(Table $table)
    {
        return view('main.add_player_phone',compact(['table']));
    }

    public function addPlayerName(Player $player)
    {
        return view('main.add_player_name',compact('player'));
    }

    public function storePhone(Request $request,Table $table)
    {
        $member = $table->players()->where('phone',$request->phone);
//        dd($member);
        if ($member->exists()){
            $player = $member->first();
            if ($player->name == null){
                return redirect()->route('add.player.name',$player->id);
            }else{
                return redirect()->route('show.role',$player->id);
            }
        }else{
            $player = Player::query()->create([
                'table_id' => $table->id,
                'phone' => $request->phone,
            ]);

            return redirect()->route('add.player.name',$player->id);
        }
    }

    public function StoreName(PlayerNameRequest $request,Player $player)
    {
        $player->update([
            'name' => $request->name,
        ]);
        return redirect()->route('show.role',$player->id);
    }
}
