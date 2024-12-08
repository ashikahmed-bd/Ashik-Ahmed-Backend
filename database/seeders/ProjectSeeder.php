<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('projects')->insert([
            [
                'title' => 'Digital Agency Solutions | Empower Your Business Online',
                'slug' => Str::slug('Digital Agency Solutions | Empower Your Business Online'),
                'meta_title' => 'Digital Agency Solutions | Empower Your Business Online',
                'meta_description' => 'Discover tailored digital agency solutions to elevate your brand\'s online presence. From website development to SEO and digital marketing, we provide all-in-one services to help your business thrive in the digital era.',
                'meta_keywords' => 'Digital agency, website development, SEO services, online marketing, branding solutions, social media management, web design, digital marketing services, business growth online, agency solutions.',
                'overview' => 'Our digital agency specializes in providing end-to-end solutions for businesses seeking a robust online presence. Whether you need a stunning website, impactful digital marketing strategies, or advanced SEO to rank higher, we deliver customized services to meet your unique goals. With a focus on creativity, technology, and measurable results, we empower your brand to succeed in today\'s competitive digital landscape.',
                'tags' => '',
                'description' => '',
                'image' => 'projects/agency.jpg',
                'link' => '',
            ],

            [
                'title' => 'Digital Solutions for E-Commerce | Build & Grow Your Online Store',
                'slug' => Str::slug('Digital Solutions for E-Commerce | Build & Grow Your Online Store'),
                'meta_title' => 'Digital Solutions for E-Commerce | Build & Grow Your Online Store',
                'meta_description' => 'Transform your e-commerce business with tailored digital solutions. From user-friendly store design to advanced marketing, SEO, and payment integrations, we help you create a seamless online shopping experience and drive growth.',
                'meta_keywords' => 'E-commerce solutions, online store development, digital marketing for e-commerce, SEO for e-commerce, payment gateway integration, e-commerce platform design, online business growth, digital agency for e-commerce, e-commerce strategy.',
                'overview' => 'Our agency provides comprehensive e-commerce solutions designed to take your online store to the next level. Whether you need a sleek website, powerful marketing strategies, or seamless payment and shipping integrations, we deliver end-to-end services tailored to your goals. Empower your brand with a user-centric shopping experience, enhanced visibility, and sustainable growth in the competitive e-commerce landscape',
                'tags' => '',
                'description' => '',
                'image' => 'projects/tohashop.jpg',
                'link' => '',
            ],

            [
                'title' => 'NGO Management System | Efficient Loan & DPS Management Software',
                'slug' => Str::slug('NGO Management System | Efficient Loan & DPS Management Software'),
                'meta_title' => 'NGO Management System | Efficient Loan & DPS Management Software',
                'meta_description' => 'Streamline your NGO operations with our comprehensive management system. Simplify loan tracking, DPS management, member accounts, and reporting with an all-in-one software solution designed for non-profits.',
                'meta_keywords' => 'NGO management system, loan management software, DPS management, NGO software solutions, non-profit operations, member management, financial tracking, NGO reporting tools, NGO technology solutions.',
                'overview' => 'Our NGO management system is designed to simplify and enhance non-profit operations. With powerful tools for loan management, DPS (Deposit Pension Scheme) tracking, member account management, and financial reporting, this all-in-one solution helps NGOs focus on their mission while ensuring transparency and efficiency. Ideal for organizations managing community loans, savings programs, and member services.',
                'tags' => '',
                'description' => '',
                'image' => 'projects/somity.jpg',
                'link' => '',
            ],

            [
                'title' => 'Newspaper Script | Magazine, Blog & Video News Platform',
                'slug' => Str::slug('Newspaper Script | Magazine, Blog & Video News Platform'),
                'meta_title' => 'Newspaper Script | Magazine, Blog & Video News Platform',
                'meta_description' => 'Launch a dynamic news platform with our newspaper script. Featuring magazine layouts, blog integration, and video support, it’s the perfect solution for creating engaging news websites with modern features.',
                'meta_keywords' => 'Newspaper script, news website solution, magazine blog script, video news platform, blog and magazine integration, online news portal, dynamic news website, content management system, video-enabled news website.',
                'overview' => 'Our newspaper script offers a comprehensive solution for creating feature-rich news platforms. Combining magazine-style layouts, robust blogging capabilities, and seamless video integration, this platform caters to diverse audiences. Whether you\'re launching a newspaper, a magazine, or a video-focused news site, our solution ensures a modern, responsive, and engaging experience.',
                'tags' => '',
                'description' => '',
                'image' => 'projects/newspaper.jpg',
                'link' => '',
            ],
        ]);
    }
}
