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
        Schema::create('coupon_khach_hangs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_khach_hang');
            $table->unsignedBigInteger('id_coupon');
            $table->integer('so_lan_da_dung');
            $table->string('lan_cuoi_su_dung');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupon_khach_hangs');
    }
};
