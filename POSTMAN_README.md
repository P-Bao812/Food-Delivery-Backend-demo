# Postman API Testing Guide

## 📥 Hướng dẫn Import

### 1. Import Collection

- Mở **Postman**
- Chọn **File** > **Import** (hoặc Ctrl+O)
- Chọn file `postman_collection.json`
- Click **Import**

### 2. Import Environment

- Mở **Postman**
- Chọn **File** > **Import**
- Chọn file `postman_environment.json`
- Click **Import**
- Hoặc: Vào mục **Environments** > chọn environment vừa import

## ⚙️ Cấu hình Environment

1. Click vào **Environments** ở thanh sidebar trái
2. Chọn **BE_CNPM**
3. Cập nhật các biến:
    - **base_url**: `http://localhost:8000` (hoặc URL server của bạn)
    - **token**: Để trống (sẽ cập nhật sau khi đăng nhập)
    - **admin_email**: `admin@example.com`
    - **admin_password**: `password`

## 🚀 Bắt đầu Test

### Bước 1: Chọn Environment

- Click dropdown ở góc trên bên phải
- Chọn **BE_CNPM**

### Bước 2: Đăng nhập Admin

1. Mở folder **Auth** > **Admin Login**
2. Click **Send**
3. Nếu thành công, sẽ nhận được response với token

### Bước 3: Cập nhật Token

1. Copy token từ response
2. Vào **Environments** > **BE_CNPM**
3. Paste vào biến `token`

### Bước 4: Test API

- Chọn API muốn test từ collection
- Cập nhật request body nếu cần
- Click **Send**

## 📋 Danh sách Endpoints

### Có CRUD đầy đủ (GET, POST, PUT, DELETE):

- **Bình Luận** - Comments
- **Đánh Giá** - Ratings
- **Khuyến Mãi** - Promotions
- **Món Ăn** - Dishes
- **Đơn Hàng** - Orders
- **Khách Hàng** - Customers
- **Nhà Hàng** - Restaurants
- **Shipper** - Delivery Personnel

### Chỉ có GET:

- Thanh Toán (Payments)
- Theo Dõi Đơn Hàng (Order Tracking)
- Vị Trí Shipper (Shipper Location)
- Coupon Khách Hàng
- Mã Giảm Giá (Discount Codes)
- Chi Tiết Đơn Hàng (Order Items)
- Khu Vực Giao Hàng (Delivery Areas)
- Danh Mục Món Ăn (Categories)
- Địa Chỉ Khách Hàng (Customer Addresses)
- Người Dùng (Users)
- Quản Trị Viên (Admins)
- Phiên Chat AI (AI Chat Sessions)
- Tin Nhắn AI (AI Messages)
- Thông Báo (Notifications)

## 💡 Mẹo Sử Dụng

### Thay đổi ID

- Trong URL như `/delete/1`, hãy thay `1` bằng ID thực tế
- Ví dụ: `/delete/5` để xóa item có ID 5

### Cập nhật Request Body

- Click tab **Body**
- Chỉnh sửa JSON
- Click **Send**

### Xem Response

- Response hiển thị ở dưới
- Tab **Body**: Xem nội dung
- Tab **Headers**: Xem HTTP headers
- Tab **Tests**: Viết test cases

### Chạy Multiple Requests

- Click **Runner** (hoặc Ctrl+Alt+R)
- Chọn collection
- Chọn requests muốn chạy
- Click **Start Run**

## ⚠️ Lưu ý

1. **Server phải chạy**: Đảm bảo Laravel server đang chạy trên `http://localhost:8000`
2. **Cập nhật Token**: Token có thể hết hạn, cần đăng nhập lại
3. **Kiểm tra Database**: Có dữ liệu trong DB trước khi GET
4. **ID phải tồn tại**: Khi PUT/DELETE, ID phải có trong DB
5. **Format JSON**: Kiểm tra body request đúng format

## 🆘 Lỗi Thường Gặp

| Lỗi                | Nguyên nhân                   | Giải pháp                     |
| ------------------ | ----------------------------- | ----------------------------- |
| 401 Unauthorized   | Token không hợp lệ            | Đăng nhập lại, cập nhật token |
| 404 Not Found      | URL sai hoặc ID không tồn tại | Kiểm tra URL và ID            |
| 500 Server Error   | Lỗi server                    | Kiểm tra server logs          |
| Connection refused | Server không chạy             | Khởi động Laravel server      |
| Invalid JSON       | Body request không hợp lệ     | Kiểm tra syntax JSON          |

## ✅ Test Checklist

- [ ] Import collection
- [ ] Import environment
- [ ] Chọn environment BE_CNPM
- [ ] Đăng nhập Admin lấy token
- [ ] Cập nhật token vào environment
- [ ] Test GET endpoints
- [ ] Test POST endpoints
- [ ] Test PUT endpoints
- [ ] Test DELETE endpoints
