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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('vin')->index();
            $table->string('modelyear',4)->index();
            $table->string('manufactoryear',4)->index();
            $table->string('factory',10)->index();
            $table->string('body',10)->index();
            $table->string('serial', 64)->index();

            $table->string('color',10)->index()->nullable();
            $table->string('trim',10)->index()->nullable();
            $table->string('dso',10)->index()->nullable();
            $table->string('axle',10)->index()->nullable();
            $table->string('engine',10)->index()->nullable();
            $table->string('trans',10)->index()->nullable();
            $table->string('date',10)->index()->nullable();
            
            $table->integer('user_id')->nullable();

            $table->softDeletes();
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
