<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('name') ;
            $table->string('email')->unique();
            $table->bigInteger('teacher_id')->unique()->default(rand(1000000000,9999999999));
            $table->string('address');
            $table->date('birth');
            $table->string('role')->default('teacher');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->default(0);
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
        Schema::dropIfExists('teachers');
    }
}
