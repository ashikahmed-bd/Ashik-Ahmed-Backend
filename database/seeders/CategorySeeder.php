<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'name' => 'Web Design',
                'slug' => Str::slug('Web Design'),
                'sort_order' => 0,
            ],
            [
                'name' => 'Digital Marketing',
                'slug' => Str::slug('Digital Marketing'),
                'sort_order' => 1,
            ],
            [
                'name' => 'UI/UX Design',
                'slug' => Str::slug('UI/UX Design'),
                'sort_order' => 2,
            ],
            [
                'name' => 'search engine optimization',
                'slug' => Str::slug('search engine optimization'),
                'sort_order' => 3,
            ],
            [
                'name' => 'Reviews',
                'slug' => Str::slug('Reviews'),
                'sort_order' => 4,
            ],
        ]);
    }
}
