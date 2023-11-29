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
        Schema::create('barangs', function (Blueprint $table) {
            $table->string('KodeBarang', 255)->unique()->primary(); // Tambahkan primary() di sini
            $table->string('NamaBarang');
            $table->string('Satuan', 18);
            $table->decimal('HargaSatuan', 10, 2);
            $table->integer('Stok');
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
        Schema::dropIfExists('barangs');
    }
};
