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
        Schema::create('vi_tri_shippers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_shipper');
            $table->geography('vi_do');
            $table->geography('kinh_do');
            $table->integer('toc_do');
            $table->geography('huong_di_chuyen');
            $table->dateTime('thoi_gian_ghi');
            $table->integer('trang_thai')->default(0)->comment("0: Đang giao, 1: Đang chờ đơn");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vi_tri_shippers');
    }
};
