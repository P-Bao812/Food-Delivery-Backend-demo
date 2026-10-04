<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaGiamGiaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('ma_giam_gias')->delete();
        $now = Carbon::now();

        DB::table('ma_giam_gias')->insert([
            [
                'id'                    => 1,
                'id_nha_hang'           => 4, // Mã toàn hệ thống
                'ma_code'               => 'HELLOSUMMER',
                'mo_ta'                 => 'Giảm 20% cho đơn hàng đầu tiên trong mùa hè',
                'loai_giam_gia'         => 1, // 1: Phần trăm, 0: Số tiền cố định
                'gia_tri_giam'          => 20,
                'gia_tri_don_toi_thieu' => 50000,
                'giam_toi_da'           => 30000,
                'gioi_han_su_dung'      => 100,
                'gioi_han_moi_nguoi'    => 1,
                'ngay_bat_dau'          => $now,
                'ngay_ket_thuc'          => $now->copy()->addDays(15),
                'trang_thai'            => 1,
                'da_du_dung'            => 0,
                'created_at'            => $now,
                'updated_at'            => $now,
            ],
            [
                'id'                    => 2,
                'id_nha_hang'           => 1, // Mã riêng của nhà hàng id 1
                'ma_code'               => 'PHOHANOI10K',
                'mo_ta'                 => 'Giảm trực tiếp 10k cho mỗi bát phở',
                'loai_giam_gia'         => 0,
                'gia_tri_giam'          => 10000,
                'gia_tri_don_toi_thieu' => 40000,
                'giam_toi_da'           => 10000,
                'gioi_han_su_dung'      => 50,
                'gioi_han_moi_nguoi'    => 2,
                'ngay_bat_dau'          => $now,
                'ngay_ket_thuc'          => $now->copy()->addDays(15),
                'trang_thai'            => 1,
                'da_du_dung'            => 5,
                'created_at'            => $now,
                'updated_at'            => $now,
            ],
            [
                'id'                    => 3,
                'id_nha_hang'           => 2,
                'ma_code'               => 'COMTAMFREE',
                'mo_ta'                 => 'Giảm giá cực sốc 50% tri ân khách hàng',
                'loai_giam_gia'         => 1,
                'gia_tri_giam'          => 50,
                'gia_tri_don_toi_thieu' => 100000,
                'giam_toi_da'           => 50000,
                'gioi_han_su_dung'      => 10,
                'gioi_han_moi_nguoi'    => 1,
                'ngay_bat_dau'          => $now->copy()->subDays(1),
                'ngay_ket_thuc'          => $now->copy()->addDays(15),
                'trang_thai'            => 1,
                'da_du_dung'            => 10, // Giả sử đã dùng hết
                'created_at'            => $now,
                'updated_at'            => $now,
            ],
            [
                'id'                    => 4,
                'id_nha_hang'           => 4,
                'ma_code'               => 'SEAFOODPARTY',
                'mo_ta'                 => 'Giảm 100k cho hóa đơn hải sản trên 1 triệu',
                'loai_giam_gia'         => 0,
                'gia_tri_giam'          => 100000,
                'gia_tri_don_toi_thieu' => 1000000,
                'giam_toi_da'           => 100000,
                'gioi_han_su_dung'      => 200,
                'gioi_han_moi_nguoi'    => 5,
                'ngay_bat_dau'          => $now->copy()->addDays(5), // Mã sắp diễn ra
                'ngay_ket_thuc'          => $now->copy()->addDays(15),
                'trang_thai'            => 1,
                'da_du_dung'            => 0,
                'created_at'            => $now,
                'updated_at'            => $now,
            ],
            [
                'id'                    => 5,
                'id_nha_hang'           => 2,
                'ma_code'               => 'DISCOUNT99',
                'mo_ta'                 => 'Mã đã bị khóa hoặc hết hạn',
                'loai_giam_gia'         => 1,
                'gia_tri_giam'          => 99,
                'gia_tri_don_toi_thieu' => 0,
                'giam_toi_da'           => 500000,
                'gioi_han_su_dung'      => 1,
                'gioi_han_moi_nguoi'    => 1,
                'ngay_bat_dau'          => $now->copy()->subMonths(1),
                'ngay_ket_thuc'          => $now->copy()->addDays(15),
                'trang_thai'            => 0, // 0: Khóa/Hết hạn
                'da_du_dung'            => 1,
                'created_at'            => $now,
                'updated_at'            => $now,
            ],
        ]);
    }
}
