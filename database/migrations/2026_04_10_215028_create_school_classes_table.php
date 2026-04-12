<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('school_classes', function (Blueprint $table) {
            $table->id();
            $table->string('class_name'); // اسم الفصل: Grade 1, Grade 2
            $table->string('section');    // الشعبة: A, B, C
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('school_classes');
    }
};
