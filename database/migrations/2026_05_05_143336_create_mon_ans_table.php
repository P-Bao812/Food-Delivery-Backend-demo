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
        Schema::create('mon_ans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_nha_hang');
            $table->unsignedBigInteger('id_danh_muc');
            $table->string('ten_mon_an');
            $table->text('mo_ta')->nullable();
            $table->string('hinh_anh')->nullable();
            $table->integer('gia_ban');
            $table->integer('gia_goc')->nullable();
            $table->integer('thoi_gian_chuan_bi_phut')->nullable();
            $table->integer('trang_thai')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mon_ans');
    }
};
