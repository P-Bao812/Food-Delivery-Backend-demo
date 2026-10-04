<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NhaHangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('nha_hangs')->delete();
        $now = Carbon::now();
        DB::table('nha_hangs')->insert([
            [
                'id'                   => 1,
                'id_nguoi_dung'        => 2,
                'ten_nha_hang'         => 'Phở Hà Nội',
                'mo_ta'                => 'Phở truyền thống Hà Nội',
                'dia_chi'              => '123 Nguyễn Huệ, Quận 1, TPHCM',
                'vi_do'                => '10.7769',
                'kinh_do'              => '106.6966',
                'so_dien_thoai'        => '0912345678',
                'gio_mo_cua'           => '06:00:00',
                'gio_dong_cua'         => '22:00:00',
                'diem_danh_gia_tb'     => 4.5,
                'dang_mo_cua'          => true,
                'ty_le_hoan_hang'      => 2,
                'created_at'           => $now,
                'updated_at'           => $now,
            ],
            [
                'id'                   => 2,
                'id_nguoi_dung'        => 3,
                'ten_nha_hang'         => 'Cơm Tấm Sài Gòn',
                'mo_ta'                => 'Cơm tấm sườn nướng ngon',
                'dia_chi'              => '456 Trần Hưng Đạo, Quận 5, TPHCM',
                'vi_do'                => '10.7590',
                'kinh_do'              => '106.6650',
                'so_dien_thoai'        => '0987654321',
                'gio_mo_cua'           => '07:00:00',
                'gio_dong_cua'         => '21:00:00',
                'diem_danh_gia_tb'     => 4.3,
                'dang_mo_cua'          => true,
                'ty_le_hoan_hang'      => 1,
                'created_at'           => $now,
                'updated_at'           => $now,
            ],
            [
                'id'                   => 3,
                'id_nguoi_dung'        => 4,
                'ten_nha_hang'         => 'Bánh Mì Thanh Hương',
                'mo_ta'                => 'Bánh mì pa tê cáp cầu',
                'dia_chi'              => '789 Lê Lợi, Quận 1, TPHCM',
                'vi_do'                => '10.7720',
                'kinh_do'              => '106.7000',
                'so_dien_thoai'        => '0909876543',
                'gio_mo_cua'           => '05:30:00',
                'gio_dong_cua'         => '20:00:00',
                'diem_danh_gia_tb'     => 4.7,
                'dang_mo_cua'          => true,
                'ty_le_hoan_hang'      => 1,
                'created_at'           => $now,
                'updated_at'           => $now,
            ],
            [
                'id'                   => 4,
                'id_nguoi_dung'        => 5,
                'ten_nha_hang'         => 'Nhà Hàng Seafood A',
                'mo_ta'                => 'Hải sản tươi sống',
                'dia_chi'              => '321 Nguyễn Hữu Cảnh, Quận 2, TPHCM',
                'vi_do'                => '10.8000',
                'kinh_do'              => '106.7500',
                'so_dien_thoai'        => '0911223344',
                'gio_mo_cua'           => '11:00:00',
                'gio_dong_cua'         => '23:00:00',
                'diem_danh_gia_tb'     => 4.6,
                'dang_mo_cua'          => true,
                'ty_le_hoan_hang'      => 3,
                'created_at'           => $now,
                'updated_at'           => $now,
            ],
        ]);
    }
}
