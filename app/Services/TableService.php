<?php

namespace App\Services;

use App\Models\Table;

class TableService
{

    public $randKey;
    public $randValue;

    public array $roleArray;
    public function startGame(Table $table)
    {
        $arr = [];

        foreach ($table->roleStatistic as $role){
            for ($i=0; $i < $role->count;$i++){
                array_push($arr,$role->role->id);
            }
        }
        $this->roleArray = $arr;

        foreach ($table->players as $player){
            $player->update([
                'role_id' => $this->getRandomValue($table),
            ]);
            unset($this->roleArray[$this->randKey]);
        }
        $table->update([
            'status' => 1,
        ]);
        return redirect()->back();
    }

    public function getRandomValue(Table $table)
    {
        $rand = array_rand($this->roleArray);
        $this->randKey=$rand;
        $this->randValue=$this->roleArray[$this->randKey];

        return $this->randValue;
    }
}
