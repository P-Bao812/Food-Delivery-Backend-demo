<?php

namespace Database\Seeders;

use App\Models\NhaHang;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Thứ tự quan trọng: NguoiDung phải được seed trước vì các model khác phụ thuộc vào nó
        $this->call([
            NguoiDungSeeder::class,          // 1. Tạo người dùng (admin, nhà hàng, khách hàng, shipper)
            NhaHangSeeder::class,             // 2. Tạo nhà hàng
            KhuVucGiaoHangSeeder::class,      // 3. Tạo khu vực giao hàng
            DanhMucMonAnSeeder::class,        // 4. Tạo danh mục món ăn
            MonAnSeeder::class,               // 5. Tạo món ăn
            KhachHangSeeder::class,           // 6. Tạo khách hàng
            DiaChiKhachHangSeeder::class,     // 7. Tạo địa chỉ khách hàng
            ShipperSeeder::class,             // 8. Tạo shipper
            KhuyenMaiSeeder::class,           // 9. Tạo khuyến mãi
            MaGiamGiaSeeder::class,           // 10. Tạo mã giảm giá
            DonHangSeeder::class,             // 11. Tạo đơn hàng
            ChiTietDonHangSeeder::class,      // 12. Tạo chi tiết đơn hàng
            ThanhToanSeeder::class,           // 13. Tạo thanh toán
            BinhLuanSeeder::class,            // 14. Tạo bình luận
            DanhGiaSeeder::class,             // 15. Tạo đánh giá
            TheoDoiDonHangSeeder::class,      // 16. Tạo theo dõi đơn hàng
        ]);
    }
}
