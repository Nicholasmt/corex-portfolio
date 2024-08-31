<?php

use App\Models\Service;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Service::class)->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('title');
            $table->string('organization');
            $table->string('city');
            $table->string('location');
            $table->longText('description');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->boolean('present')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('experiences');
    }
};
