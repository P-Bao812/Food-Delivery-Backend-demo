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
        Schema::create('khu_vuc_giao_hangs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_nha_hang');
            $table->string('ten_khu_vuc');
            $table->bigInteger('phi_giao_hang')->default(0);
            $table->integer('khoang_cach_toi_da_km');
            $table->integer('thoi_gian_du_kien_phut');
            $table->integer('trang_thai')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('khu_vuc_giao_hangs');
    }
};
