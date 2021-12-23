<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name') ;
            $table->string('email')->unique()->nullable();
            $table->date('birth');
            $table->bigInteger('student_id')->unique()->default(rand(1,9999999999));
            $table->string('class');
            $table->string('address');
            $table->string('role')->default('student');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->default(0);
            $table->rememberToken();
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
        Schema::dropIfExists('students');
    }
}
