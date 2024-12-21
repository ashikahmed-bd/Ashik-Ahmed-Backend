<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'id' => Str::uuid(),
                'title' => 'Digital Agency Solutions',
                'slug' => Str::slug('Digital Agency Solutions | Empower Your Business Online'),
                'overview' => 'Our digital agency specializes in providing end-to-end solutions for businesses seeking a robust online presence. Whether you need a stunning website, impactful digital marketing strategies, or advanced SEO to rank higher, we deliver customized services to meet your unique goals. With a focus on creativity, technology, and measurable results, we empower your brand to succeed in today\'s competitive digital landscape.',
                'image' => 'projects/agency.jpg',
            ],
        ]);
    }
}
