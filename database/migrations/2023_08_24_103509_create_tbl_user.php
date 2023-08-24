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
        Schema::create('tbl_user', function (Blueprint $table) {
            $table->id('id_user');
            $table->string('username', 50)->nullable();
            $table->string('password')->nullable();
            $table->string('nama_user')->nullable();
            $table->string('level', 50)->default('mahasiswa'); # admin/mahasiswa
            $table->string('alamat_ktp', 255)->nullable();
            $table->string('alamat_domisili', 255)->nullable();
            $table->bigInteger('id_provinsi')->length(255)->nullable();
            $table->string('provinsi', 100)->nullable();
            $table->bigInteger('id_kabupaten')->length(255)->nullable();
            $table->string('kabupaten', 100)->nullable();
            $table->bigInteger('id_kecamatan')->length(255)->nullable();
            $table->string('kecamatan', 100)->nullable();
            $table->string('nohp', 15)->nullable();
            $table->string('notelp', 15)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('kewarganegaraan', 100)->nullable(); // 1 2 3
            $table->string('kewarganegaraan_negara', 100)->nullable(); // 1 2 3
            $table->string('tgl_lahir', 20)->nullable();
            $table->string('tempat_lahir', 100)->nullable();
            $table->bigInteger('id_provinsi_lahir')->length(255)->nullable();
            $table->string('provinsi_lahir', 100)->nullable();
            $table->bigInteger('id_kotkab_lahir')->length(255)->nullable();
            $table->string('kotkab_lahir', 100)->nullable();
            $table->string('negara', 100)->nullable();
            $table->string('jk', 1)->nullable(); // 1 lk 2 wt
            $table->string('menikah', 1)->nullable(); // 1 m 2 janda 0 tidak
            $table->string('agama', 20)->nullable();
            $table->string('file_img', 255)->nullable();
            $table->string('file_video', 255)->nullable();
            $table->string('status_user', 10)->default('nonaktif'); # nonaktif/aktif

            $table->string('user_create')->nullable();
            $table->string('user_update')->nullable();
            $table->uuid('uid');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
