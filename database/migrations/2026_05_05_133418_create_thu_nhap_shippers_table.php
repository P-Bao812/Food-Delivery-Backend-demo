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
        Schema::create('thu_nhap_shippers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_shipper');
            $table->unsignedBigInteger('id_don_hang');
            $table->integer('phi_giao_hang');
            $table->integer('tien_tip');
            $table->integer('tien_thuong');
            $table->integer('tong_thu_nhap');
            $table->integer('trang_thai')->default(0)->comment('0: Chưa thanh toán, 1: Đã thanh toán');
            $table->dateTime('ngay_tao');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('thu_nhap_shippers');
    }
};
