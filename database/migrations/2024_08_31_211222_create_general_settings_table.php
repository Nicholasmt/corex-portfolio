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
        Schema::create('general_settings', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('profession');
            $table->longText('bio');
            $table->string('primary_color');
            $table->string('secondary_color');
            $table->string('background_image')->nullable();
            $table->string('passport')->nullable();
            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();
            $table->string('font_name')->nullable();
            $table->string('font_url')->nullable();
            $table->string('font_family')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('general_settings');
    }
};
