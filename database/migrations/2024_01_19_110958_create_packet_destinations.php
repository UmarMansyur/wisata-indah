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
        Schema::create('packet_destinations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('is_madura')->default(false);
            $table->longText('description')->nullable()->default(null);
            $table->string('cover_image')->nullable()->default(null);
            $table->integer('min_person');
            $table->double('price');
            $table->float('duration');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packet_destinations');
    }
};
