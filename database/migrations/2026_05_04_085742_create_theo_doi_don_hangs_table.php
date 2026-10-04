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
        Schema::create('theo_doi_don_hangs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_don_hang');
            $table->unsignedBigInteger('id_shipper');
            $table->integer('trang_thai')->default(0)->comment("0: Đang giao, 1: Đã giao");
            $table->geography('vi_do');
            $table->geography('kinh_do');
            $table->string('ghi_chu')->nullable();
            $table->dateTime('thoi_diem');
            $table->integer('khoan_cach_den_khach');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('theo_doi_don_hangs');
    }
};
