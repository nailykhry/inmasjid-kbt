<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nama');
            $table->string('nama_pic');
            $table->string('telp_pic');
            $table->enum('status', ['tersedia', 'lelang', 'dihapus', 'relokasi']);
            $table->enum('kondisi', ['baru', 'bekas']);
            $table->string('lokasi');
            $table->text('deskripsi');
            $table->text('foto')->nullable();
            $table->integer('stok');
            $table->unsignedBigInteger('type_id');
            $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('pic_id');
            $table->foreign('pic_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventories');
    }
}
