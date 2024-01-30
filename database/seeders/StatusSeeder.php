<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('statuses')->insert([     
            "name"=>"Nueva"
        ]);

        DB::table('statuses')->insert([     
            "name"=>"Aceptada"
        ]);

        DB::table('statuses')->insert([     
            "name"=>"Confirmada"
        ]);

        DB::table('statuses')->insert([     
            "name"=>"Resuelta"
        ]);

        DB::table('statuses')->insert([     
            "name"=>"Cerrada"
        ]);
    }
}
