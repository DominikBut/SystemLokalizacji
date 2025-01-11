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
        Schema::create('coordinates', function (Blueprint $table) {
            $table->id();
            $table->integer('sim_id')->unsigned();
            $table->double('latitude');
            $table->double('longitude');
            $table->integer('strength')->unsigned();
            $table->integer('battery')->unsigned();
            $table->integer('route')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coordinates');
    }
};
