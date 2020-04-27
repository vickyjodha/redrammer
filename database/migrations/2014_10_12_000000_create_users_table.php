<?php

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
            $table->string('email')->unique();
            $table->string('phone',10)->unique();
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('image')->nullable();
            $table->string('gender')->nullable();
            $table->string('bgimage')->nullable();
            $table->string('bio')->nullable();
            $table->boolean('vip')->default(false);
            $table->boolean('private')->default(false);
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
