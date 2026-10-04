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
        Schema::create('binh_luans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_nguoi_dung');
            $table->unsignedBigInteger('id_doi_tuong');
            $table->unsignedBigInteger('id_binh_luan_cha');
            $table->tinyInteger('loai_doi_tuong')->comment('0: món ăn, 1: nhà hàng, 2: đơn hàng');
            $table->string('noi_dung', 200);
            $table->integer('so_luot_thich')->default(0);
            $table->integer('trang_thai')->default(0)->comment('0:Hiển thị, 1:Tạm ẩn');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('binh_luans');
    }
};
