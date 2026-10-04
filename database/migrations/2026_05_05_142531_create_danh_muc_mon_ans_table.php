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
        Schema::create('danh_muc_mon_ans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_nha_hang');
            $table->string('ten_danh_muc');
            $table->string('hinh_anh')->nullable();
            $table->integer('trang_thai')->default(true);
            $table->timestamps();
        });
    }

    /** 
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('danh_muc_mon_ans');
    }
};
