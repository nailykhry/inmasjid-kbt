<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_statuses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('request_id');
            $table->enum('status', ['diajukan', 'disetujui', 'ditolak', 'dikirim', 'diterima']);
            $table->timestamps();

            $table->foreign('request_id')->references('id')->on('requests')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('request_statuses');
    }
}
