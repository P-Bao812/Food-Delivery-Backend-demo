<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KhachHangSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('khach_hangs')->delete();
        $now = Carbon::now();

        DB::table('khach_hangs')->insert([
            [
                'id'                    => 1,
                'id_nguoi_dung'         => 6,
                'ngay_sinh'             => '1995-05-10',
                'diem_tich_luy'         => 100,
                'id_dia_chi_mac_dinh'   => null,
                'ngay_tao'              => $now,
                'created_at'            => $now,
                'updated_at'            => $now,
            ],
            [
                'id'                    => 2,
                'id_nguoi_dung'         => 7,
                'ngay_sinh'             => '1998-12-15',
                'diem_tich_luy'         => 250,
                'id_dia_chi_mac_dinh'   => null,
                'ngay_tao'              => $now,
                'created_at'            => $now,
                'updated_at'            => $now,
            ],
            [
                'id'                    => 3,
                'id_nguoi_dung'         => 8,
                'ngay_sinh'             => '2000-03-20',
                'diem_tich_luy'         => 50,
                'id_dia_chi_mac_dinh'   => null,
                'ngay_tao'              => $now,
                'created_at'            => $now,
                'updated_at'            => $now,
            ],
        ]);
    }
}
