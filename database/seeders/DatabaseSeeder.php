<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        User::query()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('wamyvani123'),
        ]);
        Role::create(['name'=>'მოქალაქე']);
        Role::create(['name'=>'ექიმი']);
        Role::create(['name'=>'დეტექტივი']);
        Role::create(['name'=>'მაფიოზი']);
        Role::create(['name'=>'დონი']);
        Role::create(['name'=>'სერიული მკვლელი']);
    }
}
