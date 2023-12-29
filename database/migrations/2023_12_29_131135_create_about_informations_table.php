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
        Schema::create('about_informations', function (Blueprint $table) {
            $table->id();
            $table->string('register_amount');
            $table->string('member_amount');
            $table->string('tour_collaboration_amount');
            $table->string('guest_amount');
            $table->string('url');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_informations');
    }
};
