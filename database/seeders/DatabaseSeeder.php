<?php

namespace Database\Seeders;

use App\Models\Area;
use App\Models\Gender;
use App\Models\Location;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(AreaSeeder::class);
        $this->call(AttributesSeeder::class);
        $this->call(GendersSeeder::class);
        $this->call(LocationSeeder::class);
        $this->call(OptionSeeder::class);
        $this->call(PrioritySeeder::class);
        $this->call(RolSeeder::class);
        $this->call(StatusSeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(ComputerSeeder::class);
    }
}