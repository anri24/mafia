<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\PlayerNameRequest;
use App\Models\Player;
use App\Models\Table;
use App\Services\PlayerService;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    protected PlayerService $service;

    public function index()
    {
        $tables = Table::all();
        return view('main.index', compact('tables'));
    }

    public function addPlayerPhone(Table $table)
    {
        return view('main.add_player_phone', compact(['table']));
    }

    public function addPlayerName(Player $player)
    {
        return view('main.add_player_name', compact('player'));
    }

    public function storePhone(Request $request, Table $table)
    {
        return $this->service->storePhone($request, $table);
    }

    public function StoreName(PlayerNameRequest $request, Player $player)
    {
        $player->update([
            'name' => $request->name,
        ]);
        return redirect()->route('show.role', $player->id);
    }
}
