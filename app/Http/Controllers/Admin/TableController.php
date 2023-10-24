<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Table;
use Illuminate\Http\Request;

class TableController extends Controller
{
    public $randKey;
    public $randValue;

    public array $roleArray;
    public function add()
    {
        return view('admin.add_table');
    }

    public function store(Request $request)
    {
        Table::query()->create([
            'name' => $request->name
        ]);
        return redirect()->route('admin.main');
    }

    public function startTable(Table $table)
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
