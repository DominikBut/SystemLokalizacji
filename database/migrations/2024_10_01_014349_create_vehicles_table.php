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
            $table->integer('sim_id')->unsigned();
            $table->foreignIdFor(User::class);
            $table->string('phone');
            $table->string('name');
            $table->mediumText('description')->nullable();
            $table->boolean('status')->default(true);
            $table->json('base_area')->nullable();
            $table->boolean('subscribe')->default(false);
            $table->boolean('notified')->default(false);
            $table->integer('current_route')->default(0);
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
