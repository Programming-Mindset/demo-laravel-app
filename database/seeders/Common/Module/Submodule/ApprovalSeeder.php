<?php

namespace Database\Seeders\Common\Module\Submodule;

use App\Models\User;
use Illuminate\Database\Seeder;

class ApprovalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(5)->create();
    }
}
