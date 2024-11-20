<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use function Symfony\Component\Translation\t;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'id' => Str::uuid(),
            'name' => 'Ashik Ahmed',
            'email' => 'info@ashikahmed.net',
            'password' => bcrypt('12345678'),
        ]);

        $this->call([
            PlanSeeder::class,
            FeatureSeeder::class,
        ]);

    }
}
