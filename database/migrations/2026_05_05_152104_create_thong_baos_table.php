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
        Schema::create('thong_baos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_nguoi_dung');
            $table->string('loai', 100);
            $table->string('tieu_de', 255);
            $table->text('noi_dung');
            $table->string('loai_tham_chieu', 100)->nullable();
            $table->unsignedBigInteger('id_tham_chieu')->nullable();
            $table->boolean('da_doc')->default(false);
            $table->dateTime('ngay_tao')->useCurrent();
            $table->string('fcm_token', 500)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('thong_baos');
    }
};
