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
        Schema::create('matchs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('home_team_id')->references('id')->on('teams')->nullable()->constrained()->cascadeOnDelete();
            $table->integer('home_team_result')->default(0);
            $table->integer('home_team_tries')->default(0);
            $table->foreignId('away_team_id')->references('id')->on('teams')->nullable()->constrained()->cascadeOnDelete();
            $table->integer('away_team_result')->default(0);
            $table->integer('away_team_tries')->default(0);
            $table->foreignId('league_id')->references('id')->on('leagues')->nullable()->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matchs');
    }
};
