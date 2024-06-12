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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_title',255);
            $table->string('site_logo',255)->nullable();
            $table->string('site_favicon',255)->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_keywords',255)->nullable();
            $table->string('contact_email',255)->nullable();
           
            $table->string('facebook',255)->nullable();
            $table->string('instagram',255)->nullable();
            $table->string('twitter',255)->nullable();
            $table->string('linkedin',255)->nullable();
            $table->string('telegram',255)->nullable();
            $table->string('discord',255)->nullable();
            $table->string('reddit',255)->nullable();
            $table->string('medium',255)->nullable();
            $table->string('youtube',255)->nullable();
           
            $table->string('google_analytics',255)->nullable();
            $table->string('google_webmaster',255)->nullable();
            $table->string('bing_webmaster',255)->nullable();
            $table->string('cmc_api',255)->nullable();
            $table->boolean('maintenance_mode')->default(false);
            $table->text('footer')->nullable();
            $table->text('js_code')->nullable();
            $table->timestamps();
        });

        // Insert initial data
        DB::table('settings')->insert([
            'site_title' => 'My Website',
            'site_logo' => 'http://example.com/logo.png',
            'site_favicon' => 'http://example.com/favicon.ico',
            'meta_description' => 'This is a meta description for my website.',
            'meta_keywords' => 'keywords, my, website',
            'contact_email' => 'contact@example.com',
            'facebook' => '#',
            'instagram' => '#',
            'twitter' => '#',
            'linkedin' => '#',
            'telegram' => '#',
            'discord' => '#',
            'reddit' => '#',
            'medium' => '#',
            'youtube' => '#',
            'google_analytics' => 'NULL',
            'google_webmaster' => 'NULL',
            'bing_webmaster' => 'NULL',
            'cmc_api' => 'NULL',
            'maintenance_mode' => false,
            'footer' => '© 2024 My Website. All rights reserved.',
            'js_code' => 'NULL',
            'created_at' => now(),
            'updated_at' => now()
            ]);
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
