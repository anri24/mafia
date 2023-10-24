<?php

namespace App\Services;

use App\Models\Role;
use App\Models\RoleStatistic;
use App\Models\Table;
use Illuminate\Http\Request;

class RoleService
{
    public function storeRoleStatistic(Request $request,Table $table)
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
