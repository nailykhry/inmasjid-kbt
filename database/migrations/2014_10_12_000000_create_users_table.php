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
            $table->string('username');
            $table->string('name');
            $table->string('email')->unique();
            $table->enum('role', ['admin', 'user']);
            $table->string('phone');
            $table->string('password');
            $table->enum('divisi', ['Teknik', 'Operasional', 'Teknologi Informasi'])->nullable()->default(null);
            $table->enum('cabang', ['Terminal Nilam', 'Terminal Jamrud', 'Pelindo Subreg Jawa'])->nullable()->default(null);
            $table->enum('status', ['aktif', 'nonaktif']);
            $table->timestamp('email_verified_at')->nullable();
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
