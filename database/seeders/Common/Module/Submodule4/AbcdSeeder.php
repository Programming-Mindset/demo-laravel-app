<?php

namespace Database\Seeders\Common\Module\Submodule4;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AbcdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('folder2')
            ->insert([
                'id' => rand(1,100)
            ]);
    }
}
