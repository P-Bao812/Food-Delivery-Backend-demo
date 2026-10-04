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
        Schema::create('khuyen_mais', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_nha_hang');
            $table->string('ten_khuyen_mai', 100);
            $table->string('mo_ta', 100);
            $table->integer('kieu_giam')->default(0)->comment('');
            $table->integer('so_tien_giam');
            $table->integer('dieu_kien_toi_thieu');
            $table->dateTime('ngay_bat_dau');
            $table->dateTime('ngay_ket_thuc');
            $table->tinyInteger('trang_thai')->default(0)->comment('0:Đang hoạt động, 1:Hết hạn');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('khuyen_mais');
    }
};
