<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddArsipIdToPeminjamanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::table('peminjaman', function (Blueprint $table) {
        if (!Schema::hasColumn('peminjaman', 'arsip_id')) {
            $table->unsignedBigInteger('arsip_id')->after('jabatan');
        }

        // Menetapkan nama constraint foreign key secara eksplisit
        $table->foreign('arsip_id', 'fk_peminjaman_arsip_id') // Tambahkan nama constraint di sini
              ->references('id')
              ->on('arsips')
              ->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('peminjaman', function (Blueprint $table) {
            $table->dropForeign(['arsip_id']);
            $table->dropColumn('arsip_id');
        });
    }
}


