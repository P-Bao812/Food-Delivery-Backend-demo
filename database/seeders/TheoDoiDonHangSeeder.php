<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TheoDoiDonHangSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('theo_doi_don_hangs')->delete();
        $now = Carbon::now();

        DB::table('theo_doi_don_hangs')->insert([
            [
                'id_don_hang'           => 6,
                'id_shipper'            => 1,
                'trang_thai'            => 0, // Đang giao
                'vi_do'                 => DB::raw("ST_GeomFromText('POINT(10.762622 106.660172)')"),
                'kinh_do'               => DB::raw("ST_GeomFromText('POINT(10.762622 106.660172)')"),
                'ghi_chu'               => 'Shipper vừa lấy hàng tại nhà hàng',
                'thoi_diem'             => $now->copy()->subMinutes(10),
                'khoan_cach_den_khach'  => 3500, // mét
                'created_at'            => $now,
                'updated_at'            => $now,
            ],
            [
                'id_don_hang'           => 6,
                'id_shipper'            => 1,
                'trang_thai'            => 0,
                'vi_do'                 => DB::raw("ST_GeomFromText('POINT(10.772622 106.670172)')"),
                'kinh_do'               => DB::raw("ST_GeomFromText('POINT(10.772622 106.670172)')"),
                'ghi_chu'               => 'Đang di chuyển trên đường chính',
                'thoi_diem'             => $now->copy()->subMinutes(5),
                'khoan_cach_den_khach'  => 1200,
                'created_at'            => $now,
                'updated_at'            => $now,
            ],
            [
                'id_don_hang'           => 6,
                'id_shipper'            => 1,
                'trang_thai'            => 0,
                'vi_do'                 => DB::raw("ST_GeomFromText('POINT(10.782622 106.680172)')"),
                'kinh_do'               => DB::raw("ST_GeomFromText('POINT(10.782622 106.680172)')"),
                'ghi_chu'               => 'Gần đến điểm giao hàng',
                'thoi_diem'             => $now,
                'khoan_cach_den_khach'  => 200,
                'created_at'            => $now,
                'updated_at'            => $now,
            ],

            // Lộ trình cho Đơn hàng ID 1 (Đã giao xong)
            [
                'id_don_hang'           => 1,
                'id_shipper'            => 1,
                'trang_thai'            => 1, // Đã giao
                'vi_do'                 => DB::raw("ST_GeomFromText('POINT(10.823091 106.629664)')"),
                'kinh_do'               => DB::raw("ST_GeomFromText('POINT(10.823091 106.629664)')"),
                'ghi_chu'               => 'Đã bàn giao đồ ăn cho khách',
                'thoi_diem'             => $now->copy()->subHours(1),
                'khoan_cach_den_khach'  => 0,
                'created_at'            => $now,
                'updated_at'            => $now,
            ],

            // Lộ trình cho Đơn hàng ID 7 (Vừa xác nhận, chuẩn bị đi lấy hàng)
            [
                'id_don_hang'           => 7,
                'id_shipper'            => 2,
                'trang_thai'            => 0,
                'vi_do'                 => DB::raw("ST_GeomFromText('POINT(10.758333 106.666667)')"),
                'kinh_do'               => DB::raw("ST_GeomFromText('POINT(10.758333 106.666667)')"),
                'ghi_chu'               => 'Đang di chuyển đến nhà hàng lấy hàng',
                'thoi_diem'             => $now,
                'khoan_cach_den_khach'  => 5000,
                'created_at'            => $now,
                'updated_at'            => $now,
            ],
        ]);
    }
}
