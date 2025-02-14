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
        Schema::create('redes_sociais', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 45);
            $table->string('link', 255);

            $table->unsignedInteger('pessoas_id');
            $table->foreign('pessoas_id')->references('id')->on('pessoas');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('redes_sociais');
    }
};