<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToPeminjamanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::table('peminjaman', function (Blueprint $table) {
        $table->string('status')->default('dipinjam'); // Tambahkan kolom status dengan nilai default 'dipinjam'
    });
}

public function down()
{
    Schema::table('peminjaman', function (Blueprint $table) {
        $table->dropColumn('status');
    });
}

}
