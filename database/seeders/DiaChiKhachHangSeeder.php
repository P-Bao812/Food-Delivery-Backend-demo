<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiaChiKhachHangSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('dia_chi_khach_hangs')->delete();
        $now = Carbon::now();

        DB::table('dia_chi_khach_hangs')->insert([
            [
                'id'                => 1,
                'id_khach_hang'     => 1,
                'ten_dia_chi'       => 'Nhà riêng',
                'dia_chi'           => '100 Nguyễn Huệ, Quận 1, TPHCM',
                'vi_do'             => '10.7750',
                'kinh_do'           => '106.6980',
                'so_dien_thoai'     => '0912345678',
                'created_at'        => $now,
                'updated_at'        => $now,
            ],
            [
                'id'                => 2,
                'id_khach_hang'     => 1,
                'ten_dia_chi'       => 'Nơi làm việc',
                'dia_chi'           => '500 Trần Hưng Đạo, Quận 5, TPHCM',
                'vi_do'             => '10.7600',
                'kinh_do'           => '106.6700',
                'so_dien_thoai'     => '0912345678',
                'created_at'        => $now,
                'updated_at'        => $now,
            ],
            [
                'id'                => 3,
                'id_khach_hang'     => 2,
                'ten_dia_chi'       => 'Nhà riêng',
                'dia_chi'           => '200 Lê Lợi, Quận 1, TPHCM',
                'vi_do'             => '10.7730',
                'kinh_do'           => '106.7010',
                'so_dien_thoai'     => '0987654321',
                'created_at'        => $now,
                'updated_at'        => $now,
            ],
        ]);
    }
}
