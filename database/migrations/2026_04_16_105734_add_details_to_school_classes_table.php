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
        Schema::table('school_classes', function (Blueprint $table) {
            $table->string('name')->after('id')->nullable();
            $table->string('grade_level')->after('name')->nullable();
            $table->string('academic_year')->after('section')->nullable();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('school_classes', function (Blueprint $table) {
            //
        });
    }
};
