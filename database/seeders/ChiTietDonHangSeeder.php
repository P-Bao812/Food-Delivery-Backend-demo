<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChiTietDonHangSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('chi_tiet_don_hangs')->delete();
        $now = Carbon::now();

        DB::table('chi_tiet_don_hangs')->insert([
            [
                'id_don_hang'         => 1,
                'id_mon_an'           => 1,
                'ten_mon_an_luu_tru'  => 'Phở Bò',
                'gia_luu_tru'         => 50000,
                'so_luong'            => 2,
                'ghi_chu'             => 'Ít bánh, nhiều hành',
                'thanh_tien'          => 100000,
                'created_at'          => $now,
                'updated_at'          => $now,
            ],

            // Chi tiết cho đơn hàng ID: 2 (Quán Cơm Tấm)
            [
                'id_don_hang'         => 2,
                'id_mon_an'           => 4,
                'ten_mon_an_luu_tru'  => 'Cơm Tấm Sườn',
                'gia_luu_tru'         => 40000,
                'so_luong'            => 2,
                'ghi_chu'             => 'Thêm nước mắm ngọt',
                'thanh_tien'          => 80000,
                'created_at'          => $now,
                'updated_at'          => $now,
            ],

            // Chi tiết cho đơn hàng ID: 3 (Quán Bánh Mì)
            [
                'id_don_hang'         => 3,
                'id_mon_an'           => 5,
                'ten_mon_an_luu_tru'  => 'Bánh Mì Thịt',
                'gia_luu_tru'         => 20000,
                'so_luong'            => 3,
                'ghi_chu'             => 'Không ăn ớt',
                'thanh_tien'          => 60000,
                'created_at'          => $now,
                'updated_at'          => $now,
            ],

            // Chi tiết cho đơn hàng ID: 4 (Quán Phở - Đơn cũ)
            [
                'id_don_hang'         => 4,
                'id_mon_an'           => 2,
                'ten_mon_an_luu_tru'  => 'Phở Gà',
                'gia_luu_tru'         => 45000,
                'so_luong'            => 2,
                'ghi_chu'             => 'Lấy thêm quẩy',
                'thanh_tien'          => 90000,
                'created_at'          => $now->copy()->subDays(2),
                'updated_at'          => $now->copy()->subDays(2),
            ],
            [
                'id_don_hang'         => 4,
                'id_mon_an'           => 1,
                'ten_mon_an_luu_tru'  => 'Phở Bò',
                'gia_luu_tru'         => 50000,
                'so_luong'            => 1,
                'ghi_chu'             => null,
                'thanh_tien'          => 50000,
                'created_at'          => $now->copy()->subDays(2),
                'updated_at'          => $now->copy()->subDays(2),
            ],

            // Chi tiết cho đơn hàng ID: 6 (Quán Phở - Đang giao)
            [
                'id_don_hang'         => 6,
                'id_mon_an'           => 3,
                'ten_mon_an_luu_tru'  => 'Bún Bò',
                'gia_luu_tru'         => 55000,
                'so_luong'            => 1,
                'ghi_chu'             => 'Cay nhiều',
                'thanh_tien'          => 55000,
                'created_at'          => $now,
                'updated_at'          => $now,
            ],

            // Chi tiết cho đơn hàng ID: 9 (Hải sản)
            [
                'id_don_hang'         => 9,
                'id_mon_an'           => 6,
                'ten_mon_an_luu_tru'  => 'Mực Nướng',
                'gia_luu_tru'         => 150000,
                'so_luong'            => 1,
                'ghi_chu'             => 'Nướng kỹ',
                'thanh_tien'          => 150000,
                'created_at'          => $now,
                'updated_at'          => $now,
            ],
            [
                'id_don_hang'         => 9,
                'id_mon_an'           => 13,
                'ten_mon_an_luu_tru'  => 'Bánh Mì Gà',
                'gia_luu_tru'         => 25000,
                'so_luong'            => 2,
                'ghi_chu'             => 'Mua kèm ăn với mực',
                'thanh_tien'          => 50000,
                'created_at'          => $now,
                'updated_at'          => $now,
            ],
        ]);
    }
}
