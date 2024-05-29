<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relocation', function (Blueprint $table) {
            $table->id();
            $table->timestamp('tanggal_pengajuan')->nullable();
            $table->timestamp('tanggal_selesai')->nullable();
            $table->string('lokasi_awal');
            $table->string('lokasi_akhir');
            $table->integer('jumlah');
            $table->unsignedBigInteger('inventory_id');
            $table->foreign('inventory_id')->references('id')->on('inventories')->onDelete('cascade')->onUpdate('cascade');
            $table->text('file_relokasi_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('relocation');
    }
}
