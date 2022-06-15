<?php

use Dev\Application\Utility\UserTypes;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone')->unique()->nullable();
            $table->timestamp('phone_verified_at')->nullable();
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('gender', array('male', 'female'))->nullable();
            $table->string('birthdate')->nullable();
            $table->string('image')->nullable();
            $table->string('logo')->nullable();
            $table->string('cover')->nullable();
            $table->string('medical_speciality_id')->nullable();
            $table->unsignedBigInteger('doctor_id')->nullable();
            $table->enum('type', UserTypes::genderTypesArr())->default(UserTypes::user);
            $table->string('lang')->default('ar');
            $table->string('api_token')->nullable();
            $table->double('lat')->nullable();
            $table->double('long')->nullable();
            $table->boolean('is_active')->default(false);
            $table->boolean('is_blocked')->default(false);
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
        Schema::dropIfExists('users');
    }
}
