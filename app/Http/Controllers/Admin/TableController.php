<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TableRequest;
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
    protected $service;

    public function __construct(TableService $service)
    {
        $this->service = $service;
    }
    public function add()
    {
        return view('admin.add_table');
    }

    public function store(TableRequest $request)
    {
        Table::create($request->validated());
        return redirect()->route('admin.main');
    }

    public function index(Table $table)
    {
        return $this->service->playerRoles($table);
    }

    public function start(Table $table)
    {
        $table->update(['status' => 1]);
        return redirect()->back();
    }

    public function startAgain(Table $table): RedirectResponse
    {
        return $this->service->startAgain($table);
    }

    public function playerFall(Player $player)
    {
       return $this->service->playerFall($player);
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
