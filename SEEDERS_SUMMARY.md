# Danh sách Seeders Đã Tạo

## 📋 Tóm tắt

Tôi đã tạo **14 Seeder files** với dữ liệu mẫu cho hệ thống. Các seeder được tổ chức theo thứ tự phụ thuộc dữ liệu.

## 🗂️ Danh sách Seeders

### 1. **NguoiDungSeeder**

- **Tệp**: `database/seeders/NguoiDungSeeder.php`
- **Dữ liệu**: 10 người dùng
    - 1 Admin (admin@example.com)
    - 4 Quản lý nhà hàng (restaurant1-4@example.com)
    - 3 Khách hàng (customer1-3@example.com)
    - 2 Shipper (shipper1-2@example.com)
- **Mật khẩu mặc định**: `password`

### 2. **NhaHangSeeder** (Cập nhật)

- **Tệp**: `database/seeders/NhaHangSeeder.php`
- **Dữ liệu**: 4 nhà hàng
    - Phở Hà Nội
    - Cơm Tấm Sài Gòn
    - Bánh Mì Thanh Hương
    - Nhà Hàng Seafood A

### 3. **KhuVucGiaoHangSeeder**

- **Tệp**: `database/seeders/KhuVucGiaoHangSeeder.php`
- **Dữ liệu**: 4 khu vực giao hàng
    - Quận 1, Quận 3, Quận 5 (với phí và thời gian dự kiến)

### 4. **DanhMucMonAnSeeder**

- **Tệp**: `database/seeders/DanhMucMonAnSeeder.php`
- **Dữ liệu**: 5 danh mục
    - Phở, Bún, Cơm, Bánh Mì, Hải Sản

### 5. **MonAnSeeder**

- **Tệp**: `database/seeders/MonAnSeeder.php`
- **Dữ liệu**: 6 món ăn
    - Phở Bò, Phở Gà, Bún Bò, Cơm Tấm Sườn, Bánh Mì Thịt, Mực Nướng

### 6. **KhachHangSeeder**

- **Tệp**: `database/seeders/KhachHangSeeder.php`
- **Dữ liệu**: 3 khách hàng
    - Với ngày sinh, điểm tích lũy

### 7. **DiaChiKhachHangSeeder**

- **Tệp**: `database/seeders/DiaChiKhachHangSeeder.php`
- **Dữ liệu**: 3 địa chỉ (Nhà riêng, Nơi làm việc)
    - Với tọa độ GPS, số điện thoại

### 8. **ShipperSeeder**

- **Tệp**: `database/seeders/ShipperSeeder.php`
- **Dữ liệu**: 2 shipper
    - Với biển số xe, loại xe, số CCCD, đánh giá

### 9. **KhuyenMaiSeeder**

- **Tệp**: `database/seeders/KhuyenMaiSeeder.php`
- **Dữ liệu**: 2 khuyến mãi
    - Giảm 20%, Giảm cố định 30.000đ

### 10. **MaGiamGiaSeeder**

- **Tệp**: `database/seeders/MaGiamGiaSeeder.php`
- **Dữ liệu**: 2 mã giảm giá
    - WELCOME20, SUMMER30 (với ngày hết hạn)

### 11. **DonHangSeeder**

- **Tệp**: `database/seeders/DonHangSeeder.php`
- **Dữ liệu**: 3 đơn hàng
    - Trạng thái: Hoàn thành, Xác nhận, Tạo mới
    - Với tổng tiền, phí giao, thời gian dự kiến

### 12. **ChiTietDonHangSeeder**

- **Tệp**: `database/seeders/ChiTietDonHangSeeder.php`
- **Dữ liệu**: 3 chi tiết đơn hàng
    - Kết nối với 3 đơn hàng, với số lượng, giá

### 13. **ThanhToanSeeder**

- **Tệp**: `database/seeders/ThanhToanSeeder.php`
- **Dữ liệu**: 2 thanh toán
    - COD (0), Ví (1)

### 14. **BinhLuanSeeder**

- **Tệp**: `database/seeders/BinhLuanSeeder.php`
- **Dữ liệu**: 2 bình luận
    - Từ khách hàng về món ăn

### 15. **DanhGiaSeeder**

- **Tệp**: `database/seeders/DanhGiaSeeder.php`
- **Dữ liệu**: 2 đánh giá
    - Từ khách hàng về đơn hàng (5 sao, 4 sao)

### 16. **TheoDoiDonHangSeeder**

- **Tệp**: `database/seeders/TheoDoiDonHangSeeder.php`
- **Dữ liệu**: 2 theo dõi đơn hàng
    - Cập nhật trạng thái

## 📝 File DatabaseSeeder Đã Cập Nhật

File `database/seeders/DatabaseSeeder.php` đã được cập nhật để gọi tất cả 16 seeders theo thứ tự phụ thuộc:

```php
$this->call([
    NguoiDungSeeder::class,          // 1. Người dùng (bản ghi cơ sở)
    NhaHangSeeder::class,             // 2. Nhà hàng
    KhuVucGiaoHangSeeder::class,      // 3. Khu vực giao hàng
    DanhMucMonAnSeeder::class,        // 4. Danh mục
    MonAnSeeder::class,               // 5. Món ăn
    KhachHangSeeder::class,           // 6. Khách hàng
    DiaChiKhachHangSeeder::class,     // 7. Địa chỉ
    ShipperSeeder::class,             // 8. Shipper
    KhuyenMaiSeeder::class,           // 9. Khuyến mãi
    MaGiamGiaSeeder::class,           // 10. Mã giảm giá
    DonHangSeeder::class,             // 11. Đơn hàng
    ChiTietDonHangSeeder::class,      // 12. Chi tiết đơn hàng
    ThanhToanSeeder::class,           // 13. Thanh toán
    BinhLuanSeeder::class,            // 14. Bình luận
    DanhGiaSeeder::class,             // 15. Đánh giá
    TheoDoiDonHangSeeder::class,      // 16. Theo dõi đơn hàng
]);
```

## 🔍 Dữ liệu Mẫu Chính

### Tài khoản test:

- **Email**: admin@example.com, password: password
- **Email**: restaurant1@example.com, password: password
- **Email**: customer1@example.com, password: password
- **Email**: shipper1@example.com, password: password

### Dữ liệu liên kết:

- Nhà hàng 1 (ID: 1) -> Quản lý nhà hàng (ID: 2)
- Danh mục Phở (ID: 1) -> Nhà hàng 1 (ID: 1)
- Món ăn Phở Bò (ID: 1) -> Danh mục Phở (ID: 1)
- Đơn hàng 1 -> Khách hàng 1, Nhà hàng 1, Shipper 1
- Chi tiết đơn hàng 1 -> Đơn hàng 1, Món ăn Phở Bò

## ✅ Cách chạy Seeder

```bash
# Chạy tất cả seeders
php artisan db:seed

# Hoặc reset database và seed
php artisan migrate:fresh --seed

# Chạy seeder cụ thể
php artisan db:seed --class=NguoiDungSeeder
```

## ⚠️ Lưu ý quan trọng

1. **Thứ tự**: Các seeders phải chạy theo thứ tự đã định vì có phụ thuộc khóa ngoài
2. **NguoiDungSeeder**: Phải chạy TRƯỚC vì các model khác phụ thuộc vào người dùng
3. **ID**: Các ID được định cố định để dễ dàng kiểm tra và test
4. **Mật khẩu**: Tất cả tài khoản mặc định mật khẩu là `password`
5. **Thời gian**: Các thời gian được thiết lập dựa trên hiện tại (Carbon::now())

## 📊 Tổng quan dữ liệu

| Model              | Số lượng | ID   |
| ------------------ | -------- | ---- |
| Người Dùng         | 10       | 1-10 |
| Nhà Hàng           | 4        | 1-4  |
| Khu Vực Giao Hàng  | 4        | 1-4  |
| Danh Mục Món Ăn    | 5        | 1-5  |
| Món Ăn             | 6        | 1-6  |
| Khách Hàng         | 3        | 1-3  |
| Địa Chỉ Khách Hàng | 3        | 1-3  |
| Shipper            | 2        | 1-2  |
| Khuyến Mãi         | 2        | 1-2  |
| Mã Giảm Giá        | 2        | 1-2  |
| Đơn Hàng           | 3        | 1-3  |
| Chi Tiết Đơn Hàng  | 3        | 1-3  |
| Thanh Toán         | 2        | 1-2  |
| Bình Luận          | 2        | 1-2  |
| Đánh Giá           | 2        | 1-2  |
| Theo Dõi Đơn Hàng  | 2        | 1-2  |

## 🚀 Bước tiếp theo

1. ✅ Kiểm tra tất cả seeder files
2. ✅ Chạy: `php artisan db:seed`
3. ✅ Kiểm tra dữ liệu trong database
4. ✅ Test API với dữ liệu mẫu

---

**Tất cả files đã được tạo và sẵn sàng để kiểm tra!**
