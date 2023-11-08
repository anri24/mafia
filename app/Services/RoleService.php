<?php

namespace App\Services;

use App\Models\Role;
use App\Models\RoleStatistic;
use App\Models\Table;
use Illuminate\Http\Request;

class RoleService
{
    public function storeRoleStatistic(Request $request, Table $table)
    {
        $roles = Role::all();
        foreach ($roles as $role) {
            $role->name = str_replace(' ', '_', $role->name);

            if ($request->{$role->name . '_count'} == null) {
                $request->{$role->name . '_count'} = 0;
            }

            if (isset($table->roleStatistic) && $table->roleStatistic()->where('role_id', $role->id)->exists()) {
                $table->roleStatistic()->where('role_id', $role->id)->first()->update([
                    'count' => $request->{$role->name . '_count'}
                ]);
            } else {
                RoleStatistic::query()->create([
                    'table_id' => $table->id,
                    'role_id' => $role->id,
                    'count' => $request->{$role->name . '_count'}
                ]);
            }
        }

        return redirect()->route('admin.table.players', $table->id);
    }
}
