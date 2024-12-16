<?php

namespace Database\Seeders;

use App\Enums\CategoryType;
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
                'id' => Str::uuid(),
                'name' => 'Off Page SEO',
                'slug' => Str::slug('Off Page SEO'),
                'type' => CategoryType::Post->value,
            ],

            [
                'id' => Str::uuid(),
                'name' => 'On Page SEO',
                'slug' => Str::slug('On Page SEO'),
                'type' => CategoryType::Post->value,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Social Media Marketing',
                'slug' => Str::slug('Social Media Marketing'),
                'type' => CategoryType::Post->value,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'search engine optimization (seo)',
                'slug' => Str::slug('search engine optimization (seo)'),
                'type' => CategoryType::Post->value,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'graphic design',
                'slug' => Str::slug('graphic design'),
                'type' => CategoryType::PROJECT->value,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Web Development',
                'slug' => Str::slug('Web Development'),
                'type' => CategoryType::PROJECT->value,
            ],

            [
                'id' => Str::uuid(),
                'name' => 'Web Design',
                'slug' => Str::slug('Web Design'),
                'type' => CategoryType::PROJECT->value,
            ],

            [
                'id' => Str::uuid(),
                'name' => 'UI/UX Design',
                'slug' => Str::slug('UI/UX Design'),
                'type' => CategoryType::PROJECT->value,
            ],
        ]);
    }
}
