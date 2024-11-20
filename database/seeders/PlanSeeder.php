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
                'id' => '83562c5c-cf19-42d5-9034-169a23aa5661',
                'name' => 'Starter Plan',
                'description' => 'Perfect for small businesses or individuals.',
                'min_price' => '200',
                'max_price' => '500',
            ],

            [
                'id' => '84c7aecc-b4e9-4ae2-8711-e4ea6192eeb4',
                'name' => 'Growth Plan',
                'description' => 'Best for startups and growing businesses.',
                'min_price' => '500',
                'max_price' => '1000',
            ],

            [
                'id' => '6efb1f78-8c07-457f-814f-bfb473ba4a1e',
                'name' => 'Professional Plan',
                'description' => 'Advanced solutions for established businesses.',
                'min_price' => '2000',
                'max_price' => '5000',
            ],
        ]);
    }
}
