<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('reviews')->insert([
            [
                'name' => 'Alfie Moore',
                'title' => 'CEO',
                'company' => '',
                'feedback' => 'Always delivers exceptional, bug-free code with incredible attention to detail. His proactive communication and quick responsiveness made working with him a breeze. Highly recommend him for any software development needs!',
                'source' => 'linkedin',
                'photo' => '',
            ],
            [
                'name' => 'Patrick C. Baxter',
                'title' => 'CEO',
                'company' => 'Solution Answers',
                'feedback' => 'This chap is truly talented, amendments are dealt with in a professional speedy manner, his design input really works well, nothing is to much trouble for him, looking forward to contniued collaborations.',
                'source' => 'linkedin',
                'photo' => '',
            ],
            [
                'name' => 'Margaret J. McLane',
                'title' => 'CEO',
                'company' => 'Jambo',
                'feedback' => 'Excellent experience! Ashik Ahmed delivers GREAT work with top-notch documentation and professionalism. His patience and proactive communication and high level of cooperation made working together a breeze. Always available and super helpful—highly recommended! 👍 We\'ll be back again.',
                'source' => 'linkedin',
                'photo' => '',
            ],
            [
                'name' => 'Mohammad Murad',
                'title' => 'CEO',
                'company' => 'Pixerize Inc',
                'feedback' => 'Everything looks great so far, final and team are building a great application and I\'m excited to keep moving forward with our project.',
                'source' => 'linkedin',
                'photo' => '',
            ],
            [
                'name' => 'Bryan Hamilton',
                'title' => 'CEO',
                'company' => 'Code Sharks',
                'feedback' => 'First time working together, I received excellent work… We are working on an ongoing project and I anticipate a good working relationship going forward',
                'source' => 'linkedin',
                'photo' => '',
            ],

        ]);
    }
}
