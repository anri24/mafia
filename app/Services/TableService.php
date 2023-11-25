<?php

namespace App\Services;

use App\Models\Player;
use App\Models\Role;
use App\Models\Table;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TableService
{
    public $randKey;
    public $randValue;

    public array $roleArray;

    public function playerRoles(Table $table)
    {
        $arr = [];
        $playerWithRoles = $table->players()->whereNotNull('role_id')->get();
        $playerWithoutRoles = $table->players()->whereNull('role_id')->get();

        foreach ($table->roleStatistic as $role) {
            for ($i = 0; $i < $role->count; $i++) {
                if (!in_array($role->role->name, $arr) && $playerWithRoles->where('role_id', $role->id)->count() != $role->count) {
                    array_push($arr, $role->role->name);
                }
            }
        }

        if ($playerWithoutRoles->count() == 1 && count($arr) == 1) {
            $roleData = Role::where('name', $arr[0])->first();
            $playerWithoutRoles->first()->update([
                'role_id' => $roleData->id,
            ]);
        }

        if (!isset($arr[0]) && !$playerWithRoles) {
            return redirect()->route('admin.table.players', $table->id)->with('status', 'დასაყენებელია როლის სტატისტიკა');
        }
        $this->roleArray = $arr;
        return $this->roleArray;
    }

    public function setRole(Request $request, Player $player)
    {
        $role = Role::where('name', $request->role)->first();
        $player->update([
            'role_id' => $role->id,
        ]);
        return redirect()->back();
    }

    public function getRandomValue(Table $table)
    {
        $rand = array_rand($this->roleArray);
        $this->randKey = $rand;
        $this->randValue = $this->roleArray[$this->randKey];

        return $this->randValue;
    }

    public function startAgain(Table $table): RedirectResponse
    {
        $table->update(['status' => 0]);
        $players = $table->players;
        foreach ($players as $player) {
            $player->update(['role_id' => null, 'status' => 1, 'fall' => 0]);
        }
        $candidates = $table->candidates;
        foreach ($candidates as $candidate) {
            $candidate->delete();
        }
        return redirect()->back();
    }

    public function playerFall(Player $player)
    {
        $player->update(['fall' => $player->fall + 1]);
        if ($player->fall == $player->table()->first()->fall) {
            $player->update(['status' => 0]);
        }
        return redirect()->back();
    }
}
