<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Table;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $tables = Table::all();
        return view('admin.index',compact('tables'));
    }

    public function tablePlayers(Table $table)
    {
        $players = $table->players()->get();
        $candidates = $table->candidates;
        return view('admin.table_players',compact(['players','table','candidates']));
    }
}
