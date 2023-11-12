<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Player;
use App\Models\Role;
use App\Models\Table;
use App\Services\TableService;
use Illuminate\Http\Request;

class TableController extends Controller
{
    public function add()
    {
        return view('admin.add_table');
    }

    public function store(Request $request)
    {
        Table::query()->create(['name' => $request->name,'fall'=>$request->fall]);
        return redirect()->route('admin.main');
    }

    public function index(Table $table,TableService $service)
    {
        return $service->playerRoles($table);
    }

    public function start(Table $table)
    {
        $table->update(['status' => 1]);
        return redirect()->back();
    }

    public function startAgain(Table $table)
    {
        $table->update(['status' => 0]);
        $players = $table->players;
        foreach ($players as $player){
            $player->update(['role_id'=>null,'status'=>1,'fall'=>0]);
        }
        return redirect()->back();
    }

    public function playerFall(Player $player)
    {
        $player->update(['fall' => $player->fall + 1]);
        if ($player->fall == $player->table()->first()->fall){
            $player->update(['status'=>0]);
        }
        return redirect()->back();
    }

}
