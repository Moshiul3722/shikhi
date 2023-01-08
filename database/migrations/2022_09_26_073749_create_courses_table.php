<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->longText('youLearn')->nullable();
            $table->longText('description')->nullable();
            $table->longText('requirements')->nullable();
            $table->longText('audience')->nullable();
            $table->string('thumbnail')->nullable();
            $table->enum('level', ['beginner', 'intermediate', 'expert'])->default('beginner');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->foreignId('category_id');
            $table->foreignId('teacher_id');
            $table->timestamps();
        });

        Schema::create('courses_users', function (Blueprint $table) {
            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('student_id');
            $table->timestamps();
        });

        // courses users wishlists
        Schema::create('courses_users_wishlists', function (Blueprint $table) {
            // $table->id();
            $table->foreignId('student_id');
            $table->foreignId('course_id');
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
        Schema::dropIfExists('courses');
        Schema::dropIfExists('courses_users');
        Schema::dropIfExists('courses_users_wishlists');
    }
};
