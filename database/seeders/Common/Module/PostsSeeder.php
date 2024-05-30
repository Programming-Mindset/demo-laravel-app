<?php

namespace Database\Seeders\Common\Module;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('folder2')
            ->insert([
                'id' => rand()
            ]);
    }
}
