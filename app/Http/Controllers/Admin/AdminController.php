<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Table;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $tables = Table::query()->orderBy('id','DESC')->get();
        return view('admin.index',compact('tables'));
    }

    public function tablePlayers(Table $table)
    {
        $players = $table->players()->get();
        return view('admin.table_players',compact(['players','table']));
    }


}
