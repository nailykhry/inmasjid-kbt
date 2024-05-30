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
        Schema::create('lost_founds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->enum('category', ['Hilang', 'Ditemukan'])->default('Hilang');
            $table->string('item_name');
            $table->text('description');
            $table->string('location');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('pic_name');
            $table->string('pic_phone');
            //pic using relation
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lostfounds');
    }
};
