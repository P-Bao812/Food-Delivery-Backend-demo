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
        Schema::create('ma_giam_gias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_nha_hang');
            $table->string('ma_code');
            $table->string('mo_ta', 100);
            $table->tinyInteger('loai_giam_gia')->comment('0: tiền, 1: %');;
            $table->integer('gia_tri_giam');
            $table->integer('gia_tri_don_toi_thieu');
            $table->integer('giam_toi_da');
            $table->integer('gioi_han_su_dung');
            $table->integer('gioi_han_moi_nguoi');
            $table->dateTime('ngay_bat_dau');
            $table->dateTime('ngay_ket_thuc');
            $table->integer('trang_thai')->default(0)->comment('0:Còn hiệu lực, 1: Hết hiệu lực');
            $table->integer('da_du_dung')->comment('0:Chưa sử dụng, 1: Đã sử dụng');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ma_giam_gias');
    }
};
