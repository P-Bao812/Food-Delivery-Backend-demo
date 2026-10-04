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
        Schema::create('tin_nhanais', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_phien');
            $table->enum('vai_tro', ['user', 'assistant']);
            $table->text('noi_dung');
            $table->unsignedInteger('so_token_dung')->default(0);
            $table->unsignedBigInteger('id_mon_an_goi_y')->nullable();
            $table->unsignedBigInteger('id_coupon_goi_y')->nullable();
            $table->dateTime('ngay_tao')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tin_nhanais');
    }
};
