<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PrioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('priorities')->insert([     
            "name"=>"Alta",
            "order"=>"Primero"
        ]);

        DB::table('priorities')->insert([     
            "name"=>"Media",
            "order"=>"Segundo"
        ]);

        DB::table('priorities')->insert([     
            "name"=>"Baja",
            "order"=>"Tercero"
        ]);
    }
}
