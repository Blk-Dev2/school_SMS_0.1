<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            
            $table->dropColumn(['email', 'age']); 
            
            $table->date('date_of_birth')->nullable();
            $table->string('address')->nullable();
            $table->string('parent_phone')->nullable();
        });
    }

    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->string('email')->unique();
            $table->integer('age');
            $table->dropColumn(['date_of_birth', 'address', 'parent_phone']);
        });
    }
};
