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
        Schema::create('thu_nhap_nha_hangs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_nha_hang');
            $table->unsignedBigInteger('id_don_hang');
            $table->integer('doanh_thu_gop');
            $table->integer('phi_hoa_hong');
            $table->integer('thu_nhap_rong');
            $table->tinyInteger('trang_thai');
            $table->dateTime('ngay_thanh_toan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('thu_nhap_nha_hangs');
    }
};
