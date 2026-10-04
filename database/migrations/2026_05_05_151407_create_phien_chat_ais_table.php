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
        Schema::create('phien_chat_ais', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_nguoi_dung');
            $table->string('token_phien', 500)->unique();
            $table->string('chu_de', 255)->nullable();
            $table->dateTime('bat_dau_luc')->nullable();
            $table->dateTime('ket_thuc_luc')->nullable();
            $table->boolean('dang_hoat_dong')->default(true);
            $table->dateTime('ngay_tao')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phien_chat_ais');
    }
};
