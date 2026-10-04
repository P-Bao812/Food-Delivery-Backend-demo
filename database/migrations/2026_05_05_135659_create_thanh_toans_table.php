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
        Schema::create('thanh_toans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_don_hang');
            $table->string('phuong_thuc');
            $table->bigInteger('so_tien');
            $table->string('ma_giao_dich')->nullable();
            $table->tinyInteger('trang_thai')->default(0)
                ->comment('0: chưa thanh toán, 1: đã thanh toán, 2: thất bại');
            $table->dateTime('thoi_gian_thanh_toan')->nullable();
            $table->text('phan_hoi_cong')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('thanh_toans');
    }
};
