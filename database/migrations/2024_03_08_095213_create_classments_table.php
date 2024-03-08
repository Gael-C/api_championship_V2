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
        Schema::create('classments', function (Blueprint $table) {
            $table->id();
            $table->integer('victoires')->default(0);
            $table->integer('défaites')->default(0);
            $table->integer('nuls')->default(0);
            $table->integer('pour')->default(0);
            $table->integer('contre')->default(0);
            $table->integer('goal_average')->default(0);
            $table->integer('bonus')->default(0);
            $table->integer('points')->default(0);
            $table->integer('classement')->default(0);
            $table->foreignId('team_id')->references('id')->on('teams');
            $table->foreignId('league_id')->references('id')->on('leagues');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classments');
    }
};
