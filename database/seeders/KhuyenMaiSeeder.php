<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KhuyenMaiSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('khuyen_mais')->delete();
        $now = Carbon::now();

        DB::table('khuyen_mais')->insert([
            [
                'id'                => 1,
                'id_nha_hang'       =>1,
                'ten_khuyen_mai'    => 'Giảm 20% đơn hàng đầu tiên',
                'mo_ta'             => 'Khách hàng mới giảm 20%',
                'kieu_giam'         => 1,
                'so_tien_giam'      => 20,
                'dieu_kien_toi_thieu' => 100000,
                'ngay_bat_dau'      => $now->copy()->subDays(3),
                'ngay_ket_thuc'     => $now->copy()->subDays(15),
                'trang_thai'        => 1,
                'created_at'        => $now,
                'updated_at'        => $now,
            ],
            [
                'id'                => 2,
                'id_nha_hang'       => 2,
                'ten_khuyen_mai'    => 'Giảm 30.000đ cho đơn hàng',
                'mo_ta'             => 'Giảm cố định 30.000đ',
                'kieu_giam'         => 0,
                'so_tien_giam'      => 30000,
                'dieu_kien_toi_thieu' => 200000,
                'ngay_bat_dau'      => $now->copy()->subDays(3),
                'ngay_ket_thuc'     => $now->copy()->subDays(15),
                'trang_thai'        => 1,
                'created_at'        => $now,
                'updated_at'        => $now,
            ],
        ]);
    }
}
