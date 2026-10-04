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
        Schema::create('danh_gias', function (Blueprint $table) {
            $table->id();
              $table->unsignedBigInteger('id_don_hang');
            $table->unsignedBigInteger('id_khach_hang');
            $table->unsignedBigInteger('id_nha_hang');
            $table->unsignedBigInteger('id_shipper');
            $table->integer('diem_do_an');
            $table->integer('diem_shipper');
            $table->integer('diem_ung_dung');
            $table->string('nhan_xet_do_an',150)    ->nullable();
            $table->string('nhan_xet_shipper',200)  ->nullable();
            $table->string('anh_danh_gia',255)  ->nullable();
            $table->integer('trang_thai')->default(0)->comment("0: Hiển thị, 1:Tạm ẩn");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('danh_gias');
    }
};
