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
        Schema::create('nha_hangs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_nguoi_dung');
            $table->string('ten_nha_hang');
            $table->string('mo_ta')->nullable();
            $table->string('dia_chi');
            $table->string('vi_do')->nullable();
            $table->string('kinh_do')->nullable();
            $table->string('so_dien_thoai');
            $table->time('gio_mo_cua')->nullable();
            $table->time('gio_dong_cua')->nullable();
            $table->float('diem_danh_gia_tb')->default(0);
            $table->boolean('dang_mo_cua')->default(true);
            $table->integer('ty_le_hoan_hang')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nha_hangs');
    }
};
