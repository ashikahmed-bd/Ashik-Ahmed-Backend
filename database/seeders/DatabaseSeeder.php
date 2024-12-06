<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Enums\UserType;
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
            'id' => '187497c6-b1c0-4d1b-a3e6-0e9cca00e8a8',
            'name' => 'Ashik Ahmed',
            'email' => 'info@ashikahmed.net',
            'password' => bcrypt('12345678'),
            'role' => UserType::ADMIN,
        ]);

//        $this->call([
//            PlanSeeder::class,
//            FeatureSeeder::class,
//        ]);
    }
}
