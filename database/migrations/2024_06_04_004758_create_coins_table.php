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
            $table->string('slug',100);
            $table->integer('rank'); 
            $table->string('name',100);
            $table->string('symbol',100);
            $table->string('logo',100);
            $table->text('description')->nullable();

            $table->string('website',100)->nullable();
            $table->string('whitepaper',100)->nullable();

            $table->string('twitter',100)->nullable();
            $table->string('telegram',100)->nullable();
            $table->string('discord',100)->nullable();
            $table->string('explorer',100)->nullable();

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
