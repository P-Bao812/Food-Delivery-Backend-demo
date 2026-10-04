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
        Schema::create('shippers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_nguoi_dung')->unique();
            $table->string('bien_so_xe', 20);
            $table->string('loai_xe', 100);
            $table->string('so_cccd', 20)->unique();
            $table->boolean('san_sang_nhan_don')->default(false);
            $table->decimal('diem_danh_gia_tb', 3, 2)->default(0.00);
            $table->enum('trang_thai', ['cho_duyet', 'hoat_dong', 'bi_khoa'])->default('cho_duyet');
            $table->dateTime('ngay_tao')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shippers');
    }
};
