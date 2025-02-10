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
        Schema::create('pessoas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 45);
            $table->string('sobrenome', 100)->nullable();
            $table->string('apelido', 45)->nullable();
            $table->string('email', 100)->nullable()->unique();
            $table->tinyText('avatar')->nullable();
            $table->date('birthday')->nullable();
            $table->string('celular', 15);
            $table->string('fixo', 15)->nullable();

            $table->unsignedInteger('enderecos_id')->nullable();
            $table->foreign('enderecos_id')->references('id')->on('enderecos');

            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')->references('id')->on('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pessoas');
    }
};
