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
        Schema::create('notas', function (Blueprint $table) {
            $table->string('KodeNota', 255)->unique()->primary();
            $table->string('KodeTenan')->references('KodeTenan')->on('tenans'); // Menghapus 'KodeTenan' pada constraing, agar menggunakan tipe data yang sesuai.
            $table->string('KodeKasir')->constrained('kasirs', 'KodeKasir');
            $table->date('TglNota');
            $table->time('JamNota');
            $table->decimal('JumlahBelanja', 10, 2);
            $table->decimal('Diskon', 5, 2)->default(0);
            $table->decimal('Total', 10, 2);
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
        Schema::dropIfExists('notas');
    }
};
