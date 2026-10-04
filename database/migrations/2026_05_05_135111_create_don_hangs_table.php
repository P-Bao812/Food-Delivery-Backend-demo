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
        Schema::create('don_hangs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_khach_hang');
            $table->unsignedBigInteger('id_nha_hang');
            $table->unsignedBigInteger('id_shipper')->nullable();
            $table->unsignedBigInteger('id_dia_chi');
            $table->unsignedBigInteger('id_khu_vuc_giao_hang')->nullable();
            $table->unsignedBigInteger('id_coupon')->nullable();
            $table->tinyInteger('trang_thai')->default(0)
                ->comment('0: tạo, 1: xác nhận, 2: đang giao, 3: hoàn thành, 4: hủy');
            $table->integer('tong_tien_hang')->default(0);
            $table->bigInteger('phi_giao_hang')->default(0);
            $table->bigInteger('tien_giam_gia')->default(0);
            $table->integer('tong_thanh_toan')->default(0);
            $table->text('ghi_chu')->nullable();
            $table->dateTime('thoi_gian_du_kien_giao')->nullable();
            $table->dateTime('thoi_gian_dat')->useCurrent();
            $table->dateTime('thoi_gian_xac_nhan')->nullable();
            $table->dateTime('thoi_gian_giao_hang')->nullable();
            $table->tinyInteger('phuong_thuc_thanh_toan')
                ->comment('0: COD, 1: ví, 2: chuyển khoản');
            $table->string('ma_hoa_don', 50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('don_hangs');
    }
};
