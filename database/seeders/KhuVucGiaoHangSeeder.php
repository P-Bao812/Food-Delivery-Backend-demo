<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KhuVucGiaoHangSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('khu_vuc_giao_hangs')->delete();
        $now = Carbon::now();

        DB::table('khu_vuc_giao_hangs')->insert([
            [
                'id'                        => 1,
                'id_nha_hang'               => 1,
                'ten_khu_vuc'               => 'Quận 1',
                'phi_giao_hang'             => 15000,
                'khoang_cach_toi_da_km'     => 5,
                'thoi_gian_du_kien_phut'    => 20,
                'trang_thai'                => 1,
                'created_at'                => $now,
                'updated_at'                => $now,
            ],
            [
                'id'                        => 2,
                'id_nha_hang'               => 1,
                'ten_khu_vuc'               => 'Quận 3',
                'phi_giao_hang'             => 18000,
                'khoang_cach_toi_da_km'     => 7,
                'thoi_gian_du_kien_phut'    => 25,
                'trang_thai'                => 1,
                'created_at'                => $now,
                'updated_at'                => $now,
            ],
            [
                'id'                        => 3,
                'id_nha_hang'               => 2,
                'ten_khu_vuc'               => 'Quận 5',
                'phi_giao_hang'             => 12000,
                'khoang_cach_toi_da_km'     => 4,
                'thoi_gian_du_kien_phut'    => 15,
                'trang_thai'                => 1,
                'created_at'                => $now,
                'updated_at'                => $now,
            ],
            [
                'id'                        => 4,
                'id_nha_hang'               => 3,
                'ten_khu_vuc'               => 'Quận 1',
                'phi_giao_hang'             => 10000,
                'khoang_cach_toi_da_km'     => 3,
                'thoi_gian_du_kien_phut'    => 10,
                'trang_thai'                => 1,
                'created_at'                => $now,
                'updated_at'                => $now,
            ],
        ]);
    }
}
