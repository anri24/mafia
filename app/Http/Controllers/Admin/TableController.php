<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Table;
use App\Services\TableService;
use Illuminate\Http\Request;

class TableController extends Controller
{
    public function add()
    {
        return view('admin.add_table');
    }

    public function store(Request $request)
    {
        Table::query()->create(['name' => $request->name]);
        return redirect()->route('admin.main');
    }

    public function index(Table $table,TableService $service)
    {
        return $service->playerRoles($table);
    }

    public function start(Table $table)
    {
        $table->update(['status' => 1]);
        return redirect()->back();
    }
}
