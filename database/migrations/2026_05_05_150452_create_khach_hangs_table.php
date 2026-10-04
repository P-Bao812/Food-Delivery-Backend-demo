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
        Schema::create('khach_hangs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_nguoi_dung')->unique();
            $table->date('ngay_sinh')->nullable();
            $table->unsignedInteger('diem_tich_luy')->default(0);
            $table->unsignedBigInteger('id_dia_chi_mac_dinh')->nullable();
            $table->dateTime('ngay_tao')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('khach_hangs');
    }
};
