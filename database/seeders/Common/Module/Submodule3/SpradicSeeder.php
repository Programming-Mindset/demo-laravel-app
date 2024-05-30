<?php

namespace Database\Seeders\Common\Module\Submodule3;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpradicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('folder3')
            ->insert([
                'id' => 1
            ]);
    }
}
