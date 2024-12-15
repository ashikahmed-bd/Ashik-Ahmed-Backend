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
            'name' => 'Ashik Ahmed',
            'title' => 'Full Stack Web Developer',
            'email' => 'info@ashikahmed.net',
            'password' => bcrypt('12345678'),
            'role' => (UserType::ADMIN)->value,
            'bio' => 'Full Stack Web Developer with expertise in designing and implementing robust web applications. Proficient in front-end technologies like HTML, CSS, and JavaScript (with frameworks like Vue, React or Angular) and back-end development using Laravel, Node.js, Python, or PHP. Skilled in database management (SQL and NoSQL), API integration, and cloud services (AWS, Azure). Experienced in agile workflows, debugging, and optimizing applications for performance and scalability.',
        ]);

        $this->call([
            PlanSeeder::class,
            FeatureSeeder::class,
            CategorySeeder::class,
            ProjectSeeder::class,
            PostSeeder::class,
            ReviewSeeder::class,
        ]);
    }
}
