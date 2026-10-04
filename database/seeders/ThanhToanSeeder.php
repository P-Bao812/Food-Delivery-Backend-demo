<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ThanhToanSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('thanh_toans')->delete();
        $now = Carbon::now();

        DB::table('thanh_toans')->insert([
            [
                'id'                    => 1,
                'id_don_hang'           => 1,
                'phuong_thuc'           => 0,
                'so_tien'               => 115000,
                'trang_thai'            => 1,
                'thoi_gian_thanh_toan'  => $now,
                'created_at'            => $now,
                'updated_at'            => $now,
            ],
            [
                'id'                    => 2,
                'id_don_hang'           => 2,
                'phuong_thuc'           => 1,
                'so_tien'               => 92000,
                'trang_thai'            => 1,
                'thoi_gian_thanh_toan'  => $now,
                'created_at'            => $now,
                'updated_at'            => $now,
            ],
        ]);
    }
}
