<?php

namespace Database\Seeders;

use App\Models\Area;
use App\Models\Gender;
use App\Models\Location;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        Gender::factory(3)->create();
        Area::factory(6)->create();
        Location::factory(8)->create();
    }
}
