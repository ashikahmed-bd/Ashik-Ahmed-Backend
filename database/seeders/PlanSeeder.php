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
                'name' => 'Starter Plan',
                'description' => 'Perfect for small businesses or individuals.',
                'min_price' => '200',
                'max_price' => '500',
            ],

            [
                'name' => 'Growth Plan',
                'description' => 'Best for startups and growing businesses.',
                'min_price' => '500',
                'max_price' => '1000',
            ],

            [
                'name' => 'Professional Plan',
                'description' => 'Advanced solutions for established businesses.',
                'min_price' => '2000',
                'max_price' => '5000',
            ],
        ]);
    }
}
