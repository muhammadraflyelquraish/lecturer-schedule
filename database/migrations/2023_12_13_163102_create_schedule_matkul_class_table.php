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
        Schema::create('schedule_matkul_class', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('schedule_matkul_id');
            $table->unsignedBigInteger('class_id');
            $table->integer('sks');
            $table->string('hari');
            $table->string('jam');
            $table->string('ruangan');
            $table->timestamps();

            //Relation
            $table->foreign('schedule_matkul_id')->references('id')->on('schedule_matkul')->onDelete('cascade');
            $table->foreign('class_id')->references('id')->on('class')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedule_matkul_class');
    }
};
