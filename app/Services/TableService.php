<?php

namespace App\Services;

use App\Models\Player;
use App\Models\Table;
use Illuminate\Http\RedirectResponse;

class TableService
{

    public $randKey;
    public $randValue;

    public array $roleArray;
    public function playerRoles(Table $table)
    {
        $arr = [];

        foreach ($table->roleStatistic as $role){
            for ($i=0; $i < $role->count;$i++){
                array_push($arr,$role->role->id);
            }
        }
        if (!isset($arr[0])){
            return redirect()->route('admin.table.players',$table->id)->with('status','დასაყენებელია როლის სტატისტიკა');
        }
        $this->roleArray = $arr;


        foreach ($table->players as $player){
            $player->update([
                'role_id' => $this->getRandomValue($table),
            ]);
            unset($this->roleArray[$this->randKey]);
        }
//        $table->update([
//            'status' => 1,
//        ]);
        return redirect()->back();
    }


    public function getRandomValue(Table $table)
    {
        $rand = array_rand($this->roleArray);
        $this->randKey=$rand;
        $this->randValue=$this->roleArray[$this->randKey];

        return $this->randValue;
    }


    public function startAgain(Table $table): RedirectResponse
    {
        $table->update(['status' => 0]);
        $players = $table->players;
        foreach ($players as $player){
            $player->update(['role_id'=>null,'status'=>1,'fall'=>0]);
        }
        $candidates = $table->candidates;
        foreach ($candidates as $candidate){
            $candidate->delete();
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
