<?php

use App\Models\User;
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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->integer('simID')->unsigned();
            $table->foreignIdFor(User::class);
            $table->string('Telefon');
            $table->string('Nazwa');
            $table->mediumText('Opis')->nullable();
            $table->boolean('Status')->default(true); //czy wogole ma przyjmowac dane
            $table->boolean('Odbieranie')->default(false); // czy dane przychodza check na ostatnie kilka minut
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
