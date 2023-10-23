<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\RoleStatistic;
use App\Models\Table;
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
        Role::query()->create([
            'name' => $request->name,
        ]);
        return redirect()->route('roles');
    }

    public function roleStatistic(Table $table)
    {
        $roles = Role::all();
        return view('admin.role_statistic',compact(['table','roles']));
    }

    public function roleStatisticStore(Request $request,Table $table)
    {
        $roles = Role::all();
        foreach ($roles as $role){
            $roleId = Role::query()->where('name',str_replace('_role','',$request->{$role->name.'_role'}))->first();
            if ($request->{$role->name.'_count'} != null){
            RoleStatistic::query()->create([
                'table_id' => $table->id,
                'role_id' =>$roleId->id,
                'count' => $request->{$role->name.'_count'}
            ]);
            }
        }
        return redirect()->route('admin.table.players',$table->id);
    }
}
