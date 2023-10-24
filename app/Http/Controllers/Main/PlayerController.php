<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
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

    public function addPlayer(Table $table)
    {
        return view('main.add_player',compact(['table']));
    }

    public function store(Request $request,Table $table)
    {
        $player = Player::query()->create([
            'table_id' => $table->id,
            'name' => $request->name,
        ]);
        return redirect()->route('show.role',$player->id);
    }
}
