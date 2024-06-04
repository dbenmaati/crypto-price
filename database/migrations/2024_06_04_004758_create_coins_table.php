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
            $table->string('name',100);
            $table->string('symbol',100);
            $table->string('logo',100);
            $table->text('description');

            $table->string('website',100);
            $table->string('whitepaper',100);

            $table->string('twitter',100);
            $table->string('telegram',100);
            $table->string('discord',100);
            $table->string('explored',100);


            $table->timestamps();
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
