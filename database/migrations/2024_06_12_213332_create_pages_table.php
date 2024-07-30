<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('page_name', 255);
            $table->string('meta_title', 255);
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->longText('content')->nullable();
            $table->boolean('header_menu_show')->default(false);
            $table->boolean('footer_menu_show')->default(true);
            $table->string('slug', 255)->unique();
            $table->timestamps();
        });

        // Insert initial pages
        DB::table('pages')->insert([
            [
                'page_name' => 'Coins',
                'meta_title' => 'Coins',
                'meta_description' => 'Stay updated with accurate information on popular cryptocurrencies and their market trends.',
                'meta_keywords' => 'crypto, coins, bitcoin, eth, bsc',
                'content' => 'NULL',
                'header_menu_show' => true,
                'footer_menu_show' => true,
                'slug' => '/',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'page_name' => 'Exchanges',
                'meta_title' => 'Exchanges',
                'meta_description' => 'Discover a curated listing of top cryptocurrency exchanges on our platform',
                'meta_keywords' => 'crypto, exchanges, bitcoin, eth, bsc',
                'content' => 'This is the About Us page content.',
                'header_menu_show' => true,
                'footer_menu_show' => true,
                'slug' => '/exchanges',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'page_name' => 'Blog',
                'meta_title' => 'Blog',
                'meta_description' => 'Discover all news about crypto and blockchain',
                'meta_keywords' => 'crypto, exchanges, bitcoin, eth, bsc',
                'content' => 'This is the blog page',
                'header_menu_show' => true,
                'footer_menu_show' => true,
                'slug' => '/blog',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'page_name' => 'About Us',
                'meta_title' => 'About Us',
                'meta_description' => 'Learn more about us.',
                'meta_keywords' => 'about, company, information',
                'content' => 'This is the About Us page content.',
                'header_menu_show' => false,
                'footer_menu_show' => true,
                'slug' => '/pages/about-us',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'page_name' => 'Terms of Service',
                'meta_title' => 'Terms of Service',
                'meta_description' => 'Read our terms of service.',
                'meta_keywords' => 'terms, service, tos',
                'content' => 'This is the Terms of Service page content.',
                'header_menu_show' => false,
                'footer_menu_show' => true,
                'slug' => '/pages/terms-of-service',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'page_name' => 'Privacy Policy',
                'meta_title' => 'Privacy Policy',
                'meta_description' => 'Read our privacy policy.',
                'meta_keywords' => 'privacy, policy, data',
                'content' => 'This is the Privacy Policy page content.',
                'header_menu_show' => false,
                'footer_menu_show' => true,
                'slug' => '/pages/privacy-policy',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'page_name' => 'Contact Us',
                'meta_title' => 'Contact Us',
                'meta_description' => 'Get in touch with us.',
                'meta_keywords' => 'contact, reach out, support',
                'content' => 'This is the Contact Us page content.',
                'header_menu_show' => false,
                'footer_menu_show' => true,
                'slug' => '/pages/contact-us',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
