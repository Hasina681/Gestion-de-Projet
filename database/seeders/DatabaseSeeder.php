<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\RolesAndPermissionsSeeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RolesAndPermissionsSeeder::class
        ]);
        DB::table('directions')->insert([
            'nom'=>'DSS',
            'description'=>'Direction de Surete et de la Securite'
        ]);
        DB::table('services')->insert([
            'nom'=>'Comptable',
            'description'=>'comptzble Be',
            'direction_id'=>'1'
        ]);
    }
}
