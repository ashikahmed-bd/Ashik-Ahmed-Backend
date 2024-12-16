<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posts')->insert([
            [
                'id' => Str::uuid(),
                'title' => 'Top 5 Best Hosting Companies for Your Website in 2024',
                'slug' => Str::slug('Top 5 Best Hosting Companies for Your Website in 2024'),
                'meta_title' => 'Top 5 Best Hosting Companies for Your Website in 2024',
                'meta_description' => 'Discover the top 5 best hosting companies for your website in 2024. Get reliable, fast, and affordable web hosting solutions for your business or blog.',
                'meta_keywords' => 'best hosting companies, top hosting providers 2024, web hosting comparison, affordable hosting, reliable hosting services',
                'excerpt' => 'When creating a website, choosing the right hosting provider is one of the most crucial decisions. A good hosting company ensures your website is fast, secure, and always online.',
                'description' => 'When creating a website, choosing the right hosting provider is one of the most crucial decisions. A good hosting company ensures your website is fast, secure, and always online. To help you make an informed decision, here’s a list of the Top 5 Best Hosting Companies in 2024, known for their reliability, performance, and customer support.',
                'image' => 'posts/1.png',
                'published_at' => now(),
                'category_id' => Category::query()->first()->id,
                'user_id' => User::query()->first()->id,
            ],

            [
                'id' => Str::uuid(),
                'title' => 'Top 10 Ecommerce WordPress Themes for 2024',
                'slug' => Str::slug('Top 10 Ecommerce WordPress Themes for 2024'),
                'meta_title' => 'Top 10 Ecommerce WordPress Themes for 2024',
                'meta_description' => 'Discover the top 10 ecommerce WordPress themes for 2024. Build a stunning online store with fast, responsive, and feature-rich themes designed to boost sales.',
                'meta_keywords' => 'ecommerce WordPress themes, best WordPress themes for online store, top ecommerce themes, WordPress shop themes, responsive ecommerce themes',
                'excerpt' => 'Whether you\'re launching a new online store or revamping an existing one, choosing the right WordPress theme is essential for creating a visually appealing and high-performing website.',
                'description' => 'Whether you\'re launching a new online store or revamping an existing one, choosing the right WordPress theme is essential for creating a visually appealing and high-performing website. To help you make an informed decision, here’s a list of the Top 10 Ecommerce WordPress Themes that stand out in 2024 for their design, speed, and features.',
                'image' => 'posts/2.png',
                'published_at' => now(),
                'category_id' => Category::query()->first()->id,
                'user_id' => User::query()->first()->id,
            ],

            [
                'id' => Str::uuid(),
                'title' => 'Top 10 Ecommerce Laravel Scripts for 2024',
                'slug' => Str::slug('Top 10 Ecommerce Laravel Scripts for 2024'),
                'meta_title' => 'Top 10 Ecommerce Laravel Scripts for 2024',
                'meta_description' => 'Explore the top 10 ecommerce Laravel scripts for 2024 to build scalable and feature-rich online stores. Discover scripts with advanced features like multi-vendor support, payment integrations, and more.',
                'meta_keywords' => 'Laravel ecommerce scripts, best ecommerce scripts for Laravel, top Laravel ecommerce platforms, Laravel multi-vendor scripts, ecommerce PHP scripts',
                'excerpt' => 'Laravel has become one of the most popular frameworks for building robust and scalable web applications. Its elegant syntax, extensive libraries, and active community make it ideal for ecommerce projects.',
                'description' => 'Laravel has become one of the most popular frameworks for building robust and scalable web applications. Its elegant syntax, extensive libraries, and active community make it ideal for ecommerce projects. If you\'re planning to launch an online store, these Top 10 Ecommerce Laravel Scripts will help you achieve your goal efficiently.',
                'image' => 'posts/3.png',
                'published_at' => now(),
                'category_id' => Category::query()->first()->id,
                'user_id' => User::query()->first()->id,
            ],

        ]);
    }
}
