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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            // $table->string('username')->unique();
            // $table->string('email')->unique();
            // $table->string('password');
            $table->string('first_name');
            $table->string('last_name');
            $table->enum('sex', ['male', 'female']);
            $table->string('contact');
            $table->date('birthdate');
            $table->timestamp('archived_at')->nullable();
            $table->timestamps();
        });

        Schema::create('logs', function (Blueprint $table) {
            $table->id();
            $table->string('action');
            $table->string('sys_table')->nullable();
            $table->integer('table_id');
            $table->string('changes')->nullable();
            $table->timestamps();
        });

        Schema::create('user_accesses', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->unsignedBigInteger('user_data')->nullable();
            $table->enum('user_type', ['user', 'admin']);
            $table->string('remember_token')->nullable();
            $table->foreign('user_data')->references('id')->on('employees')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
        Schema::dropIfExists('logs');
        Schema::dropIfExists('user_accesses');
    }
};
