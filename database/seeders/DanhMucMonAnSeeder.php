<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DanhMucMonAnSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('danh_muc_mon_ans')->delete();
        $now = Carbon::now();

        DB::table('danh_muc_mon_ans')->insert([
            [
                'id'            => 1,
                'id_nha_hang'   => 1,
                'ten_danh_muc'  => 'Phở',
                'hinh_anh'      => null,
                'trang_thai'    => 1,
                'created_at'    => $now,
                'updated_at'    => $now,
            ],
            [
                'id'            => 2,
                'id_nha_hang'   => 1,
                'ten_danh_muc'  => 'Bún',
                'hinh_anh'      => null,
                'trang_thai'    => 1,
                'created_at'    => $now,
                'updated_at'    => $now,
            ],
            [
                'id'            => 3,
                'id_nha_hang'   => 2,
                'ten_danh_muc'  => 'Cơm',
                'hinh_anh'      => null,
                'trang_thai'    => 1,
                'created_at'    => $now,
                'updated_at'    => $now,
            ],
            [
                'id'            => 4,
                'id_nha_hang'   => 3,
                'ten_danh_muc'  => 'Bánh Mì',
                'hinh_anh'      => null,
                'trang_thai'    => 1,
                'created_at'    => $now,
                'updated_at'    => $now,
            ],
            [
                'id'            => 5,
                'id_nha_hang'   => 4,
                'ten_danh_muc'  => 'Hải Sản',
                'hinh_anh'      => null,
                'trang_thai'    => 1,
                'created_at'    => $now,
                'updated_at'    => $now,
            ],
        ]);
    }
}
