<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Table;
use Illuminate\Http\Request;

class TableController extends Controller
{
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

//        $arr = [];
//
//        $roles = Role::all();
//        foreach ($roles as $role){
//            for ($i=0; $i < $role->roleCount[0]->count;$i++){
//            array_push($arr,$role->id);
//            }
//        }
//        $rand = array_rand($arr);
        foreach ($table->players as $player){
            $randomValue = $this->getRandomValue();
            $player->update([
                'role_id' => $randomValue,
            ]);
        }


        $table->update([
            'status' => 1,
        ]);
        return redirect()->back();
    }

    public function getRandomValue()
    {
        $arr = [];

        $roles = Role::all();
        foreach ($roles as $role){
            for ($i=0; $i < $role->roleCount[0]->count;$i++){
                array_push($arr,$role->id);
            }
        }
        $rand = array_rand($arr);
        $randomValue = $arr[$rand];
        unset($arr[$rand]);
        return $randomValue;
    }
}
