<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('features')->insert([
            [
                'id' => Str::uuid(),
                'name' => 'Dynamic website with CMS (up to 5 pages)',
                'plan_id' => '83562c5c-cf19-42d5-9034-169a23aa5661',
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Responsive design (mobile-friendly)',
                'plan_id' => '83562c5c-cf19-42d5-9034-169a23aa5661',
            ],
            [
                'id' => Str::uuid(),
                'name' => 'User authentication & role management',
                'plan_id' => '83562c5c-cf19-42d5-9034-169a23aa5661',
            ],
            [
                'id' => Str::uuid(),
                'name' => 'CMS (Laravel, WordPress, etc.) for easy updates',
                'plan_id' => '83562c5c-cf19-42d5-9034-169a23aa5661',
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Basic SEO optimization',
                'plan_id' => '83562c5c-cf19-42d5-9034-169a23aa5661',
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Social media integration',
                'plan_id' => '83562c5c-cf19-42d5-9034-169a23aa5661',
            ],
            [
                'id' => Str::uuid(),
                'name' => 'SEO optimization and Google Analytics setup',
                'plan_id' => '83562c5c-cf19-42d5-9034-169a23aa5661',
            ],


            [
                'id' => Str::uuid(),
                'name' => 'Dynamic website with CMS (up to 15 pages)',
                'plan_id' => '84c7aecc-b4e9-4ae2-8711-e4ea6192eeb4',
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Responsive design (mobile-friendly)',
                'plan_id' => '84c7aecc-b4e9-4ae2-8711-e4ea6192eeb4',
            ],
            [
                'id' => Str::uuid(),
                'name' => 'User authentication & role management',
                'plan_id' => '84c7aecc-b4e9-4ae2-8711-e4ea6192eeb4',
            ],
            [
                'id' => Str::uuid(),
                'name' => 'CMS (Laravel & Vue JS, WordPress, etc.) for easy updates',
                'plan_id' => '84c7aecc-b4e9-4ae2-8711-e4ea6192eeb4',
            ],
            [
                'id' => Str::uuid(),
                'name' => 'E-commerce features (basic)',
                'plan_id' => '84c7aecc-b4e9-4ae2-8711-e4ea6192eeb4',
            ],
            [
                'id' => Str::uuid(),
                'name' => 'API integration (e.g., payment gateways like Stripe/bKash)',
                'plan_id' => '84c7aecc-b4e9-4ae2-8711-e4ea6192eeb4',
            ],
            [
                'id' => Str::uuid(),
                'name' => 'SEO optimization and Google Analytics setup',
                'plan_id' => '84c7aecc-b4e9-4ae2-8711-e4ea6192eeb4',
            ],


            [
                'id' => Str::uuid(),
                'name' => 'Custom web applications',
                'plan_id' => '6efb1f78-8c07-457f-814f-bfb473ba4a1e',
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Advanced database design',
                'plan_id' => '6efb1f78-8c07-457f-814f-bfb473ba4a1e',
            ],
            [
                'id' => Str::uuid(),
                'name' => 'CMS (Laravel, Vue JS & Nuxt JS, Tailwind CSS, etc.) for easy updates',
                'plan_id' => '6efb1f78-8c07-457f-814f-bfb473ba4a1e',
            ],
            [
                'id' => Str::uuid(),
                'name' => 'PWA (Progressive Web Apps)',
                'plan_id' => '6efb1f78-8c07-457f-814f-bfb473ba4a1e',
            ],
            [
                'id' => Str::uuid(),
                'name' => 'API integration (e.g., payment gateways like Stripe/bKash)',
                'plan_id' => '6efb1f78-8c07-457f-814f-bfb473ba4a1e',
            ],
            [
                'id' => Str::uuid(),
                'name' => 'SEO Schema Markup',
                'plan_id' => '6efb1f78-8c07-457f-814f-bfb473ba4a1e',
            ],
            [
                'id' => Str::uuid(),
                'name' => 'SEO optimization and Google Analytics setup',
                'plan_id' => '6efb1f78-8c07-457f-814f-bfb473ba4a1e',
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Performance optimization',
                'plan_id' => '6efb1f78-8c07-457f-814f-bfb473ba4a1e',
            ],
        ]);
    }
}
