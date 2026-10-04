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
        Schema::create('chi_tiet_don_hangs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_don_hang');
            $table->unsignedBigInteger('id_mon_an');
            $table->string('ten_mon_an_luu_tru');
            $table->integer('gia_luu_tru');
            $table->integer('so_luong');
            $table->text('ghi_chu')->nullable();
            $table->integer('thanh_tien');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chi_tiet_don_hangs');
    }
};
