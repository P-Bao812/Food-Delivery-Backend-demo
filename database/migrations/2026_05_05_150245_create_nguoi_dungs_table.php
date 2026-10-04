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
        Schema::create('nguoi_dungs', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('so_dien_thoai', 20)->nullable()->unique();
            $table->string('ho_ten', 150);
            $table->string('anh_dai_dien', 500)->nullable();
            $table->integer('vai_tro')->default(0)->comment('0:khach hang, 1:shipper, 2:quan tri vien')->nullable();
            $table->boolean('trang_thai')->default(0)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nguoi_dungs');
    }
};
