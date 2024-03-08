<?php

use App\Models\Matchs;
use App\Models\MatchWeek;
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
        Schema::create('matchweek_match', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Matchs::class);
            $table->foreignIdFor(MatchWeek::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matchweek_match');

    }
};
