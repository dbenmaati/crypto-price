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
        Schema::create('coins', function (Blueprint $table) {
            $table->id();
            $table->string('slug',255);
            $table->integer('rank'); 
            $table->string('name',255);
            $table->string('symbol',255);
            $table->string('logo',255);
            $table->text('description')->nullable();

            $table->string('website',255)->nullable();
            $table->string('whitepaper',255)->nullable();

            $table->string('twitter',255)->nullable();
            $table->string('telegram',255)->nullable();
            $table->string('discord',255)->nullable();
            $table->string('explorer',255)->nullable();

            $table->boolean('confirmed')->default(true);

            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coins');
    }
};
