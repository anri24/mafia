<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Player;
use App\Models\Role;
use App\Models\RoleStatistic;
use App\Models\Table;
use App\Services\RoleService;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    public function index()
    {
        $roles = Role::all();
        return view('admin.roles',compact('roles'));
    }
    public function add()
    {
        return view('admin.add_roles');
    }

    public function store(Request $request)
    {
        Role::query()->create(['name' => $request->name]);
        return redirect()->route('roles');
    }

    public function showRoleStatistic(Table $table)
    {
        $roles = Role::all();
        $rolesStatistic = $table->roleStatistic;
        return view('admin.role_statistic',compact(['table','roles','rolesStatistic']));
    }

    public function storeRoleStatistic(Request $request,Table $table,RoleService $service)
    {
        return $service->storeRoleStatistic($request,$table);
    }

    public function killPlayer(Player $player)
    {
        $player->update(['status' => 0]);

        $candidates = $player->table()->first()->candidates;
        foreach ($candidates as $candidate){
            $candidate->delete();
        }
        return redirect()->route('admin.table.players',$player->table()->first()->id);
    }
}
