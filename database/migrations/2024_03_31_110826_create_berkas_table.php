<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBerkasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('berkas', function (Blueprint $table) {
            $table->id();
            $table->string('nik_bm')->nullable();
            $table->string('tgl_masuk')->nullable();
            $table->string('tgl_akhir')->nullable();
            $table->string('nama_bm')->nullable();
            $table->integer('izin_id')->nullable();
            $table->string('nama_usaha')->nullable();
            $table->text('alamat_usaha')->nullable();
            $table->string('telpon')->nullable();
            $table->enum('survey', ['tidak_survey', 'survey'])->default('survey');
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
        Schema::dropIfExists('berkas');
    }
}
