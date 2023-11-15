<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Player;
use App\Models\Role;
use App\Models\Table;
use App\Services\PlayerService;
use App\Services\TableService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TableController extends Controller
{
    protected TableService $service;

    public function __constructor(TableService $service)
    {
        $this->service = $service;
    }
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

    public function startAgain(Table $table,TableService $service): RedirectResponse
    {
//        return $this->service->startAgain($table);
        return $service->startAgain($table);
    }

    public function playerFall(Player $player)
    {
        $this->service->playerFall($player);
    }

    public function addCandidate(Player $player)
    {
        Candidate::create(['table_id'=>$player->table()->first()->id,'user_id'=>$player->id]);
        return redirect()->back();
    }



    public function candidates(Table $table)
    {
        $candidates = $table->candidates()->with('members')->get();
        return view('admin.candidates',compact(['candidates','table']));
    }

}
