<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('plans')->insert([
            [
                'id' => '9d6c216d-7143-488b-a2f3-113c0d461323',
                'name' => 'Starter Plan',
                'description' => 'Perfect for small businesses or individuals.',
                'min_price' => '200',
                'max_price' => '500',
            ],

            [
                'id' => '9d6c216d-90d8-4d32-9008-3771c9cae764',
                'name' => 'Growth Plan',
                'description' => 'Best for startups and growing businesses.',
                'min_price' => '500',
                'max_price' => '1000',
            ],

            [
                'id' => '9d6c216d-8de1-42a1-8ca0-832eb9cb47f7',
                'name' => 'Professional Plan',
                'description' => 'Advanced solutions for established businesses.',
                'min_price' => '2000',
                'max_price' => '5000',
            ],
        ]);
    }
}
