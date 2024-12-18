<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // 10,000 ইউজার তৈরি করুন
        User::factory()->count(10000)->create();
    }
}
