<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShipperSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('shippers')->delete();
        $now = Carbon::now();

        DB::table('shippers')->insert([
            [
                'id'                    => 1,
                'id_nguoi_dung'         => 9,
                'bien_so_xe'            => '29A-12345',
                'loai_xe'               => 'Xe máy',
                'so_cccd'               => '123456789012',
                'san_sang_nhan_don'     => true,
                'diem_danh_gia_tb'      => 4.8,
                'trang_thai'            => 'hoat_dong',
                'ngay_tao'              => $now,
                'created_at'            => $now,
                'updated_at'            => $now,
            ],
            [
                'id'                    => 2,
                'id_nguoi_dung'         => 10,
                'bien_so_xe'            => '29A-54321',
                'loai_xe'               => 'Xe máy',
                'so_cccd'               => '987654321098',
                'san_sang_nhan_don'     => true,
                'diem_danh_gia_tb'      => 4.5,
                'trang_thai'            => 'hoat_dong',
                'ngay_tao'              => $now,
                'created_at'            => $now,
                'updated_at'            => $now,
            ],
        ]);
    }
}
