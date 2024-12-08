<?php

namespace Database\Seeders;

use App\Models\Plan;
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
                'name' => 'Dynamic website with CMS (up to 5 pages)',
                'plan_id' => 1,
            ],
            [
                'name' => 'Responsive design (mobile-friendly)',
                'plan_id' => 1,
            ],
            [
                'name' => 'User authentication & role management',
                'plan_id' => 1,
            ],
            [
                'name' => 'CMS (Laravel, WordPress, etc.) for easy updates',
                'plan_id' => 1,
            ],
            [
                'name' => 'Basic SEO optimization',
                'plan_id' => 1,
            ],
            [
                'name' => 'Social media integration',
                'plan_id' => 1,
            ],
            [
                'name' => 'SEO optimization and Google Analytics setup',
                'plan_id' => 1,
            ],


            [
                'name' => 'Dynamic website with CMS (up to 15 pages)',
                'plan_id' => 2,
            ],
            [
                'name' => 'Responsive design (mobile-friendly)',
                'plan_id' => 2,
            ],
            [
                'name' => 'User authentication & role management',
                'plan_id' => 2,
            ],
            [
                'name' => 'CMS (Laravel & Vue JS, WordPress, etc.) for easy updates',
                'plan_id' => 2,
            ],
            [
                'name' => 'E-commerce features (basic)',
                'plan_id' => 2,
            ],
            [
                'name' => 'API integration (e.g., payment gateways like Stripe/bKash)',
                'plan_id' => 2,
            ],
            [
                'name' => 'SEO optimization and Google Analytics setup',
                'plan_id' => 2,
            ],


            [
                'name' => 'Custom web applications',
                'plan_id' => 3,
            ],
            [
                'name' => 'Advanced database design',
                'plan_id' => 3,
            ],
            [
                'name' => 'CMS (Laravel, Vue JS & Nuxt JS, Tailwind CSS, etc.) for easy updates',
                'plan_id' => 3,
            ],
            [
                'name' => 'PWA (Progressive Web Apps)',
                'plan_id' => 3,
            ],
            [
                'name' => 'API integration (e.g., payment gateways like Stripe/bKash)',
                'plan_id' => 3,
            ],
            [
                'name' => 'SEO Schema Markup',
                'plan_id' => 3,
            ],
            [
                'name' => 'SEO optimization and Google Analytics setup',
                'plan_id' => 3,
            ],
            [
                'name' => 'Performance optimization',
                'plan_id' => 3,
            ],
        ]);
    }
}
