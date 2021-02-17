<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        if (User::query()->count()) {
            User::query()->truncate();
        }
        \App\Models\User::factory()->create();
    }
}
