<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DanhGiaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('danh_gias')->delete();
        $now = Carbon::now();

        DB::table('danh_gias')->insert([
            [
                'id_don_hang'      => 1,
                'id_khach_hang'    => 1,
                'id_nha_hang'      => 1,
                'id_shipper'       => 1,
                'diem_do_an'       => 5,
                'diem_shipper'     => 5,
                'diem_ung_dung'    => 5,
                'nhan_xet_do_an'   => 'Phở rất ngon, nước dùng đậm đà!',
                'nhan_xet_shipper' => 'Shipper thân thiện, giao hàng rất nhanh.',
                'anh_danh_gia'     => 'review_pho_1.jpg',
                'trang_thai'       => 0,
                'created_at'       => $now,
                'updated_at'       => $now,
            ],
            [
                'id_don_hang'      => 4,
                'id_khach_hang'    => 3,
                'id_nha_hang'      => 1,
                'id_shipper'       => 1,
                'diem_do_an'       => 4,
                'diem_shipper'     => 5,
                'diem_ung_dung'    => 4,
                'nhan_xet_do_an'   => 'Đồ ăn ổn nhưng hơi ít hành so với yêu cầu.',
                'nhan_xet_shipper' => 'Giao hàng đúng giờ.',
                'anh_danh_gia'     => null,
                'trang_thai'       => 0,
                'created_at'       => $now->copy()->subDays(2),
                'updated_at'       => $now->copy()->subDays(2),
            ],
            [
                'id_don_hang'      => 5,
                'id_khach_hang'    => 1,
                'id_nha_hang'      => 4,
                'id_shipper'       => 2,
                'diem_do_an'       => 5,
                'diem_shipper'     => 4,
                'diem_ung_dung'    => 5,
                'nhan_xet_do_an'   => 'Mực nướng cực kỳ tươi, rất đáng tiền!',
                'nhan_xet_shipper' => 'Anh shipper nhiệt tình nhưng đi hơi lạc đường xíu.',
                'anh_danh_gia'     => 'seafood_review.png',
                'trang_thai'       => 0,
                'created_at'       => $now->copy()->subDays(1),
                'updated_at'       => $now->copy()->subDays(1),
            ],
            [
                'id_don_hang'      => 8,
                'id_khach_hang'    => 1,
                'id_nha_hang'      => 3,
                'id_shipper'       => 1,
                'diem_do_an'       => 3,
                'diem_shipper'     => 2,
                'diem_ung_dung'    => 3,
                'nhan_xet_do_an'   => 'Bánh mì hơi nguội khi đến nơi.',
                'nhan_xet_shipper' => 'Thái độ shipper không tốt, cọc cằn.',
                'anh_danh_gia'     => null,
                'trang_thai'       => 1, // Tạm ẩn vì nhận xét tiêu cực đang chờ xử lý
                'created_at'       => $now->copy()->subDays(3),
                'updated_at'       => $now->copy()->subDays(3),
            ],
            [
                'id_don_hang'      => 10,
                'id_khach_hang'    => 3,
                'id_nha_hang'      => 1,
                'id_shipper'       => 2,
                'diem_do_an'       => 5,
                'diem_shipper'     => 5,
                'diem_ung_dung'    => 5,
                'nhan_xet_do_an'   => 'Tuyệt vời, sẽ tiếp tục ủng hộ quán.',
                'nhan_xet_shipper' => 'Giao hàng chuyên nghiệp.',
                'anh_danh_gia'     => 'review_pho_2.jpg',
                'trang_thai'       => 0,
                'created_at'       => $now->copy()->subDays(5),
                'updated_at'       => $now->copy()->subDays(5),
            ],
        ]);
    }
}
