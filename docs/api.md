# API Documentation

## Authentication

---

## Login

### Endpoint

POST /admin/login

### Authentication

Public

### Request Body

```json
{
    "email": "user@example.com",
    "password": "password123"
}
```

### Validation Rules

- email: required|email
- password: required|min:6|string

### Success Response

```json
{
    "status": 1,
    "message": "Đăng nhập thành công",
    "token": "bearer_token_here",
    "data": {
        "id": 1,
        "email": "user@example.com",
        "ho_ten": "Nguyễn Văn A",
        "vai_tro": "admin"
    }
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Đăng nhập thất bại, Vui lòng kiểm tra email và mật khẩu"
}
```

### Notes

- Token sử dụng cho các API khác với header Authorization: Bearer {token}

---

## Check Token

### Endpoint

GET /admin/check-token

### Authentication

Bearer Token

### Request Body

Không có

### Validation Rules

Không có

### Success Response

```json
{
    "status": 1,
    "data": {
        "id": 1,
        "email": "user@example.com",
        "ho_ten": "Nguyễn Văn A",
        "vai_tro": "admin"
    }
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Token không tồn tại hoặc đã hết hạn"
}
```

### Notes

- Kiểm tra token hợp lệ

---

## Logout

### Endpoint

GET /admin/logout

### Authentication

Bearer Token

### Request Body

Không có

### Validation Rules

Không có

### Success Response

```json
{
    "status": 1,
    "message": "Đăng xuất thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Không tìm thấy người dùng hoặc token không hợp lệ"
}
```

### Notes

- Đăng xuất token hiện tại

---

## Logout All

### Endpoint

GET /admin/logout-all

### Authentication

Bearer Token

### Request Body

Không có

### Validation Rules

Không có

### Success Response

```json
{
    "status": 1,
    "message": "Đăng xuất thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Không tìm thấy người dùng hoặc token không hợp lệ"
}
```

### Notes

- Đăng xuất tất cả token của user

## Bình Luận (Comments)

---

## Lấy danh sách bình luận

### Endpoint

GET /admin/binh-luan

### Authentication

Bearer Token

### Request Body

Không có

### Validation Rules

Không có

### Success Response

```json
{
    "status": 1,
    "data": [
        {
            "id": 1,
            "id_nguoi_dung": 1,
            "id_doi_tuong": 1,
            "id_binh_luan_cha": null,
            "loai_doi_tuong": 0,
            "noi_dung": "Bình luận mẫu",
            "so_luot_thich": 0,
            "trang_thai": 1,
            "created_at": "2023-01-01T00:00:00.000000Z",
            "updated_at": "2023-01-01T00:00:00.000000Z"
        }
    ]
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Lỗi server"
}
```

### Notes

- Lấy tất cả bình luận

---

## Tạo bình luận

### Endpoint

POST /admin/binh-luan/create

### Authentication

Bearer Token

### Request Body

```json
{
    "id_nguoi_dung": 1,
    "id_doi_tuong": 1,
    "id_binh_luan_cha": null,
    "loai_doi_tuong": 0,
    "noi_dung": "Nội dung bình luận",
    "so_luot_thich": 0,
    "trang_thai": 1
}
```

### Validation Rules

- id_nguoi_dung: required|integer
- id_doi_tuong: required|integer
- id_binh_luan_cha: nullable|integer
- loai_doi_tuong: integer|in:0,1,2
- noi_dung: string|max:200
- so_luot_thich: integer
- trang_thai: integer|in:0,1,2

### Success Response

```json
{
    "status": 1,
    "data": {
        "id": 1,
        "id_nguoi_dung": 1,
        "id_doi_tuong": 1,
        "id_binh_luan_cha": null,
        "loai_doi_tuong": 0,
        "noi_dung": "Nội dung bình luận",
        "so_luot_thich": 0,
        "trang_thai": 1,
        "created_at": "2023-01-01T00:00:00.000000Z",
        "updated_at": "2023-01-01T00:00:00.000000Z"
    },
    "message": "Thêm bình luận thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Validation error",
    "errors": {
        "id_nguoi_dung": ["ID người dùng không được để trống"]
    }
}
```

### Notes

- loai_doi_tuong: 0 - món ăn, 1 - nhà hàng, 2 - đơn hàng
- trang_thai: 0 - ẩn, 1 - hiển thị, 2 - chờ duyệt

---

## Cập nhật bình luận

### Endpoint

PUT /admin/binh-luan/update

### Authentication

Bearer Token

### Request Body

```json
{
    "id": 1,
    "id_nguoi_dung": 1,
    "id_doi_tuong": 1,
    "id_binh_luan_cha": null,
    "loai_doi_tuong": 0,
    "noi_dung": "Nội dung cập nhật",
    "so_luot_thich": 0,
    "trang_thai": 1
}
```

### Validation Rules

- id: required|integer
- id_nguoi_dung: required|integer
- id_doi_tuong: required|integer
- id_binh_luan_cha: nullable|integer
- loai_doi_tuong: integer|in:0,1,2
- noi_dung: string|max:200
- so_luot_thich: integer
- trang_thai: integer|in:0,1,2

### Success Response

```json
{
    "status": 1,
    "data": {
        "id": 1,
        "id_nguoi_dung": 1,
        "id_doi_tuong": 1,
        "id_binh_luan_cha": null,
        "loai_doi_tuong": 0,
        "noi_dung": "Nội dung cập nhật",
        "so_luot_thich": 0,
        "trang_thai": 1,
        "updated_at": "2023-01-01T00:00:00.000000Z"
    },
    "message": "Cập nhật bình luận thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Không tìm thấy bình luận"
}
```

### Notes

- Cập nhật theo ID

---

## Xóa bình luận

### Endpoint

DELETE /admin/binh-luan/delete/{id}

### Authentication

Bearer Token

### Request Body

Không có

### Validation Rules

Không có

### Success Response

```json
{
    "status": 1,
    "message": "Xóa thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Không tìm thấy bình luận"
}
```

### Notes

- Xóa bình luận theo ID

---

## Thay đổi trạng thái bình luận

### Endpoint

PATCH /admin/binh-luan/change-status

### Authentication

Bearer Token

### Request Body

```json
{
    "id": 1,
    "trang_thai": 1
}
```

### Validation Rules

- id: required|integer
- trang_thai: required|integer|in:0,1,2

### Success Response

```json
{
    "status": 1,
    "message": "Cập nhật trạng thái thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Không tìm thấy bình luận"
}
```

### Notes

- Thay đổi trạng thái bình luận

## Đánh Giá (Reviews)

---

## Lấy danh sách đánh giá

### Endpoint

GET /admin/danh-gia

### Authentication

Bearer Token

### Request Body

Không có

### Validation Rules

Không có

### Success Response

```json
{
    "status": 1,
    "data": [
        {
            "id": 1,
            "id_don_hang": 1,
            "id_khach_hang": 1,
            "id_nha_hang": 1,
            "id_shipper": 1,
            "diem_do_an": 5,
            "diem_shipper": 4,
            "diem_ung_dung": 5,
            "nhan_xet_do_an": "Đồ ăn ngon",
            "nhan_xet_shipper": "Shipper nhanh",
            "anh_danh_gia": "url_to_image",
            "trang_thai": 1,
            "created_at": "2023-01-01T00:00:00.000000Z",
            "updated_at": "2023-01-01T00:00:00.000000Z"
        }
    ]
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Lỗi server"
}
```

### Notes

- Lấy tất cả đánh giá

---

## Tạo đánh giá

### Endpoint

POST /admin/danh-gia/create

### Authentication

Bearer Token

### Request Body

```json
{
    "id_don_hang": 1,
    "id_khach_hang": 1,
    "id_nha_hang": 1,
    "id_shipper": 1,
    "diem_do_an": 5,
    "diem_shipper": 4,
    "diem_ung_dung": 5,
    "nhan_xet_do_an": "Đồ ăn ngon",
    "nhan_xet_shipper": "Shipper nhanh",
    "anh_danh_gia": "url_to_image",
    "trang_thai": 1
}
```

### Validation Rules

- id_don_hang: required|integer
- id_khach_hang: required|integer
- id_nha_hang: required|integer
- id_shipper: nullable|integer
- diem_do_an: required|integer|min:1|max:5
- diem_shipper: nullable|integer|min:1|max:5
- diem_ung_dung: required|integer|min:1|max:5
- nhan_xet_do_an: nullable|string
- nhan_xet_shipper: nullable|string
- anh_danh_gia: nullable|string
- trang_thai: integer|in:0,1

### Success Response

```json
{
    "status": 1,
    "data": {
        "id": 1,
        "id_don_hang": 1,
        "id_khach_hang": 1,
        "id_nha_hang": 1,
        "id_shipper": 1,
        "diem_do_an": 5,
        "diem_shipper": 4,
        "diem_ung_dung": 5,
        "nhan_xet_do_an": "Đồ ăn ngon",
        "nhan_xet_shipper": "Shipper nhanh",
        "anh_danh_gia": "url_to_image",
        "trang_thai": 1,
        "created_at": "2023-01-01T00:00:00.000000Z",
        "updated_at": "2023-01-01T00:00:00.000000Z"
    },
    "message": "Tạo đánh giá thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Validation error"
}
```

### Notes

- trang_thai: 0 - ẩn, 1 - hiển thị

---

## Cập nhật đánh giá

### Endpoint

PUT /admin/danh-gia/update

### Authentication

Bearer Token

### Request Body

```json
{
    "id": 1,
    "id_don_hang": 1,
    "id_khach_hang": 1,
    "id_nha_hang": 1,
    "id_shipper": 1,
    "diem_do_an": 5,
    "diem_shipper": 4,
    "diem_ung_dung": 5,
    "nhan_xet_do_an": "Đồ ăn ngon",
    "nhan_xet_shipper": "Shipper nhanh",
    "anh_danh_gia": "url_to_image",
    "trang_thai": 1
}
```

### Validation Rules

- id: required|integer
- id_don_hang: required|integer
- id_khach_hang: required|integer
- id_nha_hang: required|integer
- id_shipper: nullable|integer
- diem_do_an: required|integer|min:1|max:5
- diem_shipper: nullable|integer|min:1|max:5
- diem_ung_dung: required|integer|min:1|max:5
- nhan_xet_do_an: nullable|string
- nhan_xet_shipper: nullable|string
- anh_danh_gia: nullable|string
- trang_thai: integer|in:0,1

### Success Response

```json
{
    "status": 1,
    "message": "Cập nhật đánh giá thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Không tìm thấy đánh giá"
}
```

### Notes

- Cập nhật đánh giá theo ID

---

## Xóa đánh giá

### Endpoint

DELETE /admin/danh-gia/delete/{id}

### Authentication

Bearer Token

### Request Body

Không có

### Validation Rules

Không có

### Success Response

```json
{
    "status": 1,
    "message": "Xóa đánh giá thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Không tìm thấy đánh giá"
}
```

### Notes

- Xóa đánh giá theo ID

---

## Thay đổi trạng thái đánh giá

### Endpoint

PATCH /admin/danh-gia/change-status

### Authentication

Bearer Token

### Request Body

```json
{
    "id": 1,
    "trang_thai": 1
}
```

### Validation Rules

- id: required|integer
- trang_thai: required|integer|in:0,1

### Success Response

```json
{
    "status": 1,
    "message": "Cập nhật trạng thái thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Không tìm thấy đánh giá"
}
```

### Notes

- Thay đổi trạng thái đánh giá

## Khuyến Mãi (Promotions)

---

## Lấy danh sách khuyến mãi

### Endpoint

GET /admin/khuyen-mai

### Authentication

Bearer Token

### Request Body

Không có

### Validation Rules

Không có

### Success Response

```json
{
    "status": 1,
    "data": [
        {
            "id": 1,
            "id_nha_hang": 1,
            "ten_khuyen_mai": "Giảm 20%",
            "mo_ta": "Khuyến mãi đặc biệt",
            "kieu_giam": 0,
            "so_tien_giam": 20000,
            "dieu_kien_toi_thieu": 100000,
            "ngay_bat_dau": "2023-01-01",
            "ngay_ket_thuc": "2023-12-31",
            "trang_thai": 1,
            "created_at": "2023-01-01T00:00:00.000000Z",
            "updated_at": "2023-01-01T00:00:00.000000Z"
        }
    ]
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Lỗi server"
}
```

### Notes

- Lấy tất cả khuyến mãi

---

## Tạo khuyến mãi

### Endpoint

POST /admin/khuyen-mai/create

### Authentication

Bearer Token

### Request Body

```json
{
    "id_nha_hang": 1,
    "ten_khuyen_mai": "Giảm 20%",
    "mo_ta": "Khuyến mãi đặc biệt",
    "kieu_giam": 0,
    "so_tien_giam": 20000,
    "dieu_kien_toi_thieu": 100000,
    "ngay_bat_dau": "2023-01-01",
    "ngay_ket_thuc": "2023-12-31",
    "trang_thai": 1
}
```

### Validation Rules

- id_nha_hang: required|integer
- ten_khuyen_mai: required|string
- mo_ta: nullable|string
- kieu_giam: integer|in:0,1
- so_tien_giam: required|numeric
- dieu_kien_toi_thieu: required|numeric
- ngay_bat_dau: required|date
- ngay_ket_thuc: required|date
- trang_thai: integer|in:0,1

### Success Response

```json
{
    "status": 1,
    "data": {
        "id": 1,
        "id_nha_hang": 1,
        "ten_khuyen_mai": "Giảm 20%",
        "mo_ta": "Khuyến mãi đặc biệt",
        "kieu_giam": 0,
        "so_tien_giam": 20000,
        "dieu_kien_toi_thieu": 100000,
        "ngay_bat_dau": "2023-01-01",
        "ngay_ket_thuc": "2023-12-31",
        "trang_thai": 1,
        "created_at": "2023-01-01T00:00:00.000000Z",
        "updated_at": "2023-01-01T00:00:00.000000Z"
    },
    "message": "Tạo khuyến mãi thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Validation error"
}
```

### Notes

- kieu_giam: 0 - giảm tiền, 1 - giảm %
- trang_thai: 0 - ẩn, 1 - hiển thị

---

## Cập nhật khuyến mãi

### Endpoint

PUT /admin/khuyen-mai/update

### Authentication

Bearer Token

### Request Body

```json
{
    "id": 1,
    "id_nha_hang": 1,
    "ten_khuyen_mai": "Giảm 20%",
    "mo_ta": "Khuyến mãi đặc biệt",
    "kieu_giam": 0,
    "so_tien_giam": 20000,
    "dieu_kien_toi_thieu": 100000,
    "ngay_bat_dau": "2023-01-01",
    "ngay_ket_thuc": "2023-12-31",
    "trang_thai": 1
}
```

### Validation Rules

- id: required|integer
- id_nha_hang: required|integer
- ten_khuyen_mai: required|string
- mo_ta: nullable|string
- kieu_giam: integer|in:0,1
- so_tien_giam: required|numeric
- dieu_kien_toi_thieu: required|numeric
- ngay_bat_dau: required|date
- ngay_ket_thuc: required|date
- trang_thai: integer|in:0,1

### Success Response

```json
{
    "status": 1,
    "message": "Cập nhật khuyến mãi thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Không tìm thấy khuyến mãi"
}
```

### Notes

- Cập nhật khuyến mãi theo ID

---

## Xóa khuyến mãi

### Endpoint

DELETE /admin/khuyen-mai/delete/{id}

### Authentication

Bearer Token

### Request Body

Không có

### Validation Rules

Không có

### Success Response

```json
{
    "status": 1,
    "message": "Xóa khuyến mãi thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Không tìm thấy khuyến mãi"
}
```

### Notes

- Xóa khuyến mãi theo ID

---

## Thay đổi trạng thái khuyến mãi

### Endpoint

PATCH /admin/khuyen-mai/change-status

### Authentication

Bearer Token

### Request Body

```json
{
    "id": 1,
    "trang_thai": 1
}
```

### Validation Rules

- id: required|integer
- trang_thai: required|integer|in:0,1

### Success Response

```json
{
    "status": 1,
    "message": "Cập nhật trạng thái thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Không tìm thấy khuyến mãi"
}
```

### Notes

- Thay đổi trạng thái khuyến mãi

## Món Ăn (Food Items)

---

## Lấy danh sách món ăn

### Endpoint

GET /admin/mon-an

### Authentication

Bearer Token

### Request Body

Không có

### Validation Rules

Không có

### Success Response

```json
{
    "status": 1,
    "data": [
        {
            "id": 1,
            "id_nha_hang": 1,
            "id_danh_muc": 1,
            "ten_mon_an": "Phở bò",
            "mo_ta": "Phở bò truyền thống",
            "hinh_anh": "url_to_image",
            "gia_ban": 50000,
            "gia_goc": 45000,
            "thoi_gian_chuan_bi_phut": 15,
            "trang_thai": 1,
            "created_at": "2023-01-01T00:00:00.000000Z",
            "updated_at": "2023-01-01T00:00:00.000000Z"
        }
    ]
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Lỗi server"
}
```

### Notes

- Lấy tất cả món ăn

---

## Tạo món ăn

### Endpoint

POST /admin/mon-an/create

### Authentication

Bearer Token

### Request Body

```json
{
    "id_nha_hang": 1,
    "id_danh_muc": 1,
    "ten_mon_an": "Phở bò",
    "mo_ta": "Phở bò truyền thống",
    "hinh_anh": "url_to_image",
    "gia_ban": 50000,
    "gia_goc": 45000,
    "thoi_gian_chuan_bi_phut": 15,
    "trang_thai": 1
}
```

### Validation Rules

- id_nha_hang: required|integer
- id_danh_muc: required|integer
- ten_mon_an: required|string
- mo_ta: nullable|string
- hinh_anh: nullable|string
- gia_ban: required|numeric
- gia_goc: required|numeric
- thoi_gian_chuan_bi_phut: required|integer
- trang_thai: integer|in:0,1

### Success Response

```json
{
    "status": 1,
    "data": {
        "id": 1,
        "id_nha_hang": 1,
        "id_danh_muc": 1,
        "ten_mon_an": "Phở bò",
        "mo_ta": "Phở bò truyền thống",
        "hinh_anh": "url_to_image",
        "gia_ban": 50000,
        "gia_goc": 45000,
        "thoi_gian_chuan_bi_phut": 15,
        "trang_thai": 1,
        "created_at": "2023-01-01T00:00:00.000000Z",
        "updated_at": "2023-01-01T00:00:00.000000Z"
    },
    "message": "Thêm món ăn thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Validation error"
}
```

### Notes

- trang_thai: 0 - ẩn, 1 - hiển thị

---

## Cập nhật món ăn

### Endpoint

PUT /admin/mon-an/update

### Authentication

Bearer Token

### Request Body

```json
{
    "id": 1,
    "id_nha_hang": 1,
    "id_danh_muc": 1,
    "ten_mon_an": "Phở bò",
    "mo_ta": "Phở bò truyền thống",
    "hinh_anh": "url_to_image",
    "gia_ban": 50000,
    "gia_goc": 45000,
    "thoi_gian_chuan_bi_phut": 15,
    "trang_thai": 1
}
```

### Validation Rules

- id: required|integer
- id_nha_hang: required|integer
- id_danh_muc: required|integer
- ten_mon_an: required|string
- mo_ta: nullable|string
- hinh_anh: nullable|string
- gia_ban: required|numeric
- gia_goc: required|numeric
- thoi_gian_chuan_bi_phut: required|integer
- trang_thai: integer|in:0,1

### Success Response

```json
{
    "status": 1,
    "data": {
        "id": 1,
        "id_nha_hang": 1,
        "id_danh_muc": 1,
        "ten_mon_an": "Phở bò",
        "mo_ta": "Phở bò truyền thống",
        "hinh_anh": "url_to_image",
        "gia_ban": 50000,
        "gia_goc": 45000,
        "thoi_gian_chuan_bi_phut": 15,
        "trang_thai": 1,
        "updated_at": "2023-01-01T00:00:00.000000Z"
    },
    "message": "Cập nhật món ăn thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Không tìm thấy món ăn"
}
```

### Notes

- Cập nhật món ăn theo ID

---

## Xóa món ăn

### Endpoint

DELETE /admin/mon-an/delete/{id}

### Authentication

Bearer Token

### Request Body

Không có

### Validation Rules

Không có

### Success Response

```json
{
    "status": 1,
    "message": "Xóa món ăn thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Không tìm thấy món ăn"
}
```

### Notes

- Xóa món ăn theo ID

---

## Thay đổi trạng thái món ăn

### Endpoint

PATCH /admin/mon-an/change-status

### Authentication

Bearer Token

### Request Body

```json
{
    "id": 1,
    "trang_thai": 1
}
```

### Validation Rules

- id: required|integer
- trang_thai: required|integer|in:0,1

### Success Response

```json
{
    "status": 1,
    "message": "Cập nhật trạng thái món ăn thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Không tìm thấy món ăn"
}
```

### Notes

- Thay đổi trạng thái món ăn

## Đơn Hàng (Orders)

---

## Lấy danh sách đơn hàng

### Endpoint

GET /admin/don-hang

### Authentication

Bearer Token

### Request Body

Không có

### Validation Rules

Không có

### Success Response

```json
{
    "status": 1,
    "data": [
        {
            "id": 1,
            "id_khach_hang": 1,
            "id_nha_hang": 1,
            "id_shipper": 1,
            "id_dia_chi": 1,
            "id_khu_vuc_giao_hang": 1,
            "id_coupon": null,
            "trang_thai": 0,
            "tong_tien_hang": 100000,
            "phi_giao_hang": 15000,
            "tien_giam_gia": 0,
            "tong_thanh_toan": 115000,
            "ghi_chu": "Giao nhanh",
            "thoi_gian_du_kien_giao": "2023-01-01 12:00:00",
            "phuong_thuc_thanh_toan": 0,
            "created_at": "2023-01-01T00:00:00.000000Z",
            "updated_at": "2023-01-01T00:00:00.000000Z"
        }
    ]
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Lỗi server"
}
```

### Notes

- Lấy tất cả đơn hàng

---

## Tạo đơn hàng

### Endpoint

POST /admin/don-hang/create

### Authentication

Bearer Token

### Request Body

```json
{
    "id_khach_hang": 1,
    "id_nha_hang": 1,
    "id_shipper": 1,
    "id_dia_chi": 1,
    "id_khu_vuc_giao_hang": 1,
    "id_coupon": null,
    "trang_thai": 0,
    "tong_tien_hang": 100000,
    "phi_giao_hang": 15000,
    "tien_giam_gia": 0,
    "tong_thanh_toan": 115000,
    "ghi_chu": "Giao nhanh",
    "thoi_gian_du_kien_giao": "2023-01-01 12:00:00",
    "phuong_thuc_thanh_toan": 0
}
```

### Validation Rules

- id_khach_hang: required|integer
- id_nha_hang: required|integer
- id_shipper: nullable|integer
- id_dia_chi: required|integer
- id_khu_vuc_giao_hang: required|integer
- id_coupon: nullable|integer
- trang_thai: integer|in:0,1,2,3,4,5
- tong_tien_hang: required|numeric
- phi_giao_hang: required|numeric
- tien_giam_gia: required|numeric
- tong_thanh_toan: required|numeric
- ghi_chu: nullable|string
- thoi_gian_du_kien_giao: required|date
- phuong_thuc_thanh_toan: integer|in:0,1

### Success Response

```json
{
    "status": 1,
    "data": {
        "id": 1,
        "id_khach_hang": 1,
        "id_nha_hang": 1,
        "id_shipper": 1,
        "id_dia_chi": 1,
        "id_khu_vuc_giao_hang": 1,
        "id_coupon": null,
        "trang_thai": 0,
        "tong_tien_hang": 100000,
        "phi_giao_hang": 15000,
        "tien_giam_gia": 0,
        "tong_thanh_toan": 115000,
        "ghi_chu": "Giao nhanh",
        "thoi_gian_du_kien_giao": "2023-01-01 12:00:00",
        "phuong_thuc_thanh_toan": 0,
        "created_at": "2023-01-01T00:00:00.000000Z",
        "updated_at": "2023-01-01T00:00:00.000000Z"
    },
    "message": "Tạo đơn hàng thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Validation error"
}
```

### Notes

- trang_thai: 0 - chờ xác nhận, 1 - đã xác nhận, 2 - đang chuẩn bị, 3 - đang giao, 4 - đã giao, 5 - hủy
- phuong_thuc_thanh_toan: 0 - tiền mặt, 1 - online

---

## Cập nhật đơn hàng

### Endpoint

PUT /admin/don-hang/update

### Authentication

Bearer Token

### Request Body

```json
{
    "id": 1,
    "id_khach_hang": 1,
    "id_nha_hang": 1,
    "id_shipper": 1,
    "id_dia_chi": 1,
    "id_khu_vuc_giao_hang": 1,
    "id_coupon": null,
    "trang_thai": 0,
    "tong_tien_hang": 100000,
    "phi_giao_hang": 15000,
    "tien_giam_gia": 0,
    "tong_thanh_toan": 115000,
    "ghi_chu": "Giao nhanh",
    "thoi_gian_du_kien_giao": "2023-01-01 12:00:00",
    "phuong_thuc_thanh_toan": 0
}
```

### Validation Rules

- id: required|integer
- id_khach_hang: required|integer
- id_nha_hang: required|integer
- id_shipper: nullable|integer
- id_dia_chi: required|integer
- id_khu_vuc_giao_hang: required|integer
- id_coupon: nullable|integer
- trang_thai: integer|in:0,1,2,3,4,5
- tong_tien_hang: required|numeric
- phi_giao_hang: required|numeric
- tien_giam_gia: required|numeric
- tong_thanh_toan: required|numeric
- ghi_chu: nullable|string
- thoi_gian_du_kien_giao: required|date
- phuong_thuc_thanh_toan: integer|in:0,1

### Success Response

```json
{
    "status": 1,
    "data": {
        "id": 1,
        "id_khach_hang": 1,
        "id_nha_hang": 1,
        "id_shipper": 1,
        "id_dia_chi": 1,
        "id_khu_vuc_giao_hang": 1,
        "id_coupon": null,
        "trang_thai": 0,
        "tong_tien_hang": 100000,
        "phi_giao_hang": 15000,
        "tien_giam_gia": 0,
        "tong_thanh_toan": 115000,
        "ghi_chu": "Giao nhanh",
        "thoi_gian_du_kien_giao": "2023-01-01 12:00:00",
        "phuong_thuc_thanh_toan": 0,
        "updated_at": "2023-01-01T00:00:00.000000Z"
    },
    "message": "Cập nhật đơn hàng thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Không tìm thấy đơn hàng"
}
```

### Notes

- Cập nhật đơn hàng theo ID

---

## Xóa đơn hàng

### Endpoint

DELETE /admin/don-hang/delete/{id}

### Authentication

Bearer Token

### Request Body

Không có

### Validation Rules

Không có

### Success Response

```json
{
    "status": 1,
    "message": "Xóa đơn hàng thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Không tìm thấy đơn hàng"
}
```

### Notes

- Xóa đơn hàng theo ID

---

## Thay đổi trạng thái đơn hàng

### Endpoint

PATCH /admin/don-hang/change-status

### Authentication

Bearer Token

### Request Body

```json
{
    "id": 1,
    "trang_thai": 1
}
```

### Validation Rules

- id: required|integer
- trang_thai: required|integer|in:0,1,2,3,4,5

### Success Response

```json
{
    "status": 1,
    "message": "Cập nhật trạng thái đơn hàng thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Không tìm thấy đơn hàng"
}
```

### Notes

- Thay đổi trạng thái đơn hàng

## Khách Hàng (Customers)

---

## Lấy danh sách khách hàng

### Endpoint

GET /admin/khach-hang

### Authentication

Bearer Token

### Request Body

Không có

### Validation Rules

Không có

### Success Response

```json
{
    "status": 1,
    "data": [
        {
            "id": 1,
            "id_nguoi_dung": 1,
            "ngay_sinh": "1990-01-01",
            "diem_tich_luy": 100,
            "id_dia_chi_mac_dinh": 1,
            "created_at": "2023-01-01T00:00:00.000000Z",
            "updated_at": "2023-01-01T00:00:00.000000Z"
        }
    ]
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Lỗi server"
}
```

### Notes

- Lấy tất cả khách hàng

---

## Tạo khách hàng

### Endpoint

POST /admin/khach-hang/create

### Authentication

Bearer Token

### Request Body

```json
{
    "id_nguoi_dung": 1,
    "ngay_sinh": "1990-01-01",
    "diem_tich_luy": 100,
    "id_dia_chi_mac_dinh": 1
}
```

### Validation Rules

- id_nguoi_dung: required|integer
- ngay_sinh: nullable|date
- diem_tich_luy: numeric
- id_dia_chi_mac_dinh: nullable|integer

### Success Response

```json
{
    "status": 1,
    "data": {
        "id": 1,
        "id_nguoi_dung": 1,
        "ngay_sinh": "1990-01-01",
        "diem_tich_luy": 100,
        "id_dia_chi_mac_dinh": 1,
        "created_at": "2023-01-01T00:00:00.000000Z",
        "updated_at": "2023-01-01T00:00:00.000000Z"
    },
    "message": "Tạo khách hàng thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Validation error"
}
```

### Notes

- diem_tich_luy mặc định 0

---

## Cập nhật khách hàng

### Endpoint

PUT /admin/khach-hang/update

### Authentication

Bearer Token

### Request Body

```json
{
    "id": 1,
    "id_nguoi_dung": 1,
    "ngay_sinh": "1990-01-01",
    "diem_tich_luy": 100,
    "id_dia_chi_mac_dinh": 1
}
```

### Validation Rules

- id: required|integer
- id_nguoi_dung: required|integer
- ngay_sinh: nullable|date
- diem_tich_luy: numeric
- id_dia_chi_mac_dinh: nullable|integer

### Success Response

```json
{
    "status": 1,
    "data": {
        "id": 1,
        "id_nguoi_dung": 1,
        "ngay_sinh": "1990-01-01",
        "diem_tich_luy": 100,
        "id_dia_chi_mac_dinh": 1,
        "updated_at": "2023-01-01T00:00:00.000000Z"
    },
    "message": "Cập nhật khách hàng thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Không tìm thấy khách hàng"
}
```

### Notes

- Cập nhật khách hàng theo ID

---

## Xóa khách hàng

### Endpoint

DELETE /admin/khach-hang/delete/{id}

### Authentication

Bearer Token

### Request Body

Không có

### Validation Rules

Không có

### Success Response

```json
{
    "status": 1,
    "message": "Xóa khách hàng thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Không tìm thấy khách hàng"
}
```

### Notes

- Xóa khách hàng theo ID

## Nhà Hàng (Restaurants)

---

## Lấy danh sách nhà hàng

### Endpoint

GET /admin/nha-hang

### Authentication

Bearer Token

### Request Body

Không có

### Validation Rules

Không có

### Success Response

```json
{
    "status": 1,
    "data": [
        {
            "id": 1,
            "id_nguoi_dung": 1,
            "ten_nha_hang": "Nhà hàng ABC",
            "mo_ta": "Nhà hàng ngon",
            "dia_chi": "123 Đường ABC",
            "vi_do": 10.123,
            "kinh_do": 106.123,
            "so_dien_thoai": "0123456789",
            "gio_mo_cua": "08:00",
            "gio_dong_cua": "22:00",
            "diem_danh_gia_tb": 4.5,
            "dang_mo_cua": true,
            "ty_le_hoan_hang": 0,
            "created_at": "2023-01-01T00:00:00.000000Z",
            "updated_at": "2023-01-01T00:00:00.000000Z"
        }
    ]
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Lỗi server"
}
```

### Notes

- Lấy tất cả nhà hàng

---

## Tạo nhà hàng

### Endpoint

POST /admin/nha-hang/create

### Authentication

Bearer Token

### Request Body

```json
{
    "id_nguoi_dung": 1,
    "ten_nha_hang": "Nhà hàng ABC",
    "mo_ta": "Nhà hàng ngon",
    "dia_chi": "123 Đường ABC",
    "vi_do": 10.123,
    "kinh_do": 106.123,
    "so_dien_thoai": "0123456789",
    "gio_mo_cua": "08:00",
    "gio_dong_cua": "22:00",
    "diem_danh_gia_tb": 4.5,
    "dang_mo_cua": true,
    "ty_le_hoan_hang": 0
}
```

### Validation Rules

- id_nguoi_dung: required|integer
- ten_nha_hang: required|string
- mo_ta: nullable|string
- dia_chi: required|string
- vi_do: required|numeric
- kinh_do: required|numeric
- so_dien_thoai: required|string
- gio_mo_cua: required|string
- gio_dong_cua: required|string
- diem_danh_gia_tb: numeric
- dang_mo_cua: boolean
- ty_le_hoan_hang: numeric

### Success Response

```json
{
    "status": 1,
    "data": {
        "id": 1,
        "id_nguoi_dung": 1,
        "ten_nha_hang": "Nhà hàng ABC",
        "mo_ta": "Nhà hàng ngon",
        "dia_chi": "123 Đường ABC",
        "vi_do": 10.123,
        "kinh_do": 106.123,
        "so_dien_thoai": "0123456789",
        "gio_mo_cua": "08:00",
        "gio_dong_cua": "22:00",
        "diem_danh_gia_tb": 4.5,
        "dang_mo_cua": true,
        "ty_le_hoan_hang": 0,
        "created_at": "2023-01-01T00:00:00.000000Z",
        "updated_at": "2023-01-01T00:00:00.000000Z"
    },
    "message": "Tạo nhà hàng thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Validation error"
}
```

### Notes

- diem_danh_gia_tb mặc định 0, dang_mo_cua mặc định true, ty_le_hoan_hang mặc định 0

---

## Cập nhật nhà hàng

### Endpoint

PUT /admin/nha-hang/update

### Authentication

Bearer Token

### Request Body

```json
{
    "id": 1,
    "id_nguoi_dung": 1,
    "ten_nha_hang": "Nhà hàng ABC",
    "mo_ta": "Nhà hàng ngon",
    "dia_chi": "123 Đường ABC",
    "vi_do": 10.123,
    "kinh_do": 106.123,
    "so_dien_thoai": "0123456789",
    "gio_mo_cua": "08:00",
    "gio_dong_cua": "22:00",
    "diem_danh_gia_tb": 4.5,
    "dang_mo_cua": true,
    "ty_le_hoan_hang": 0
}
```

### Validation Rules

- id: required|integer
- id_nguoi_dung: required|integer
- ten_nha_hang: required|string
- mo_ta: nullable|string
- dia_chi: required|string
- vi_do: required|numeric
- kinh_do: required|numeric
- so_dien_thoai: required|string
- gio_mo_cua: required|string
- gio_dong_cua: required|string
- diem_danh_gia_tb: numeric
- dang_mo_cua: boolean
- ty_le_hoan_hang: numeric

### Success Response

```json
{
    "status": 1,
    "message": "Cập nhật nhà hàng thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Không tìm thấy nhà hàng"
}
```

### Notes

- Cập nhật nhà hàng theo ID

---

## Xóa nhà hàng

### Endpoint

DELETE /admin/nha-hang/delete/{id}

### Authentication

Bearer Token

### Request Body

Không có

### Validation Rules

Không có

### Success Response

```json
{
    "status": 1,
    "message": "Xóa nhà hàng thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Không tìm thấy nhà hàng"
}
```

### Notes

- Xóa nhà hàng theo ID

## Shipper

---

## Lấy danh sách shipper

### Endpoint

GET /admin/shipper

### Authentication

Bearer Token

### Request Body

Không có

### Validation Rules

Không có

### Success Response

```json
{
    "status": 1,
    "data": [
        {
            "id": 1,
            "id_nguoi_dung": 1,
            "bien_so_xe": "29A-12345",
            "loai_xe": "Honda",
            "so_cccd": "123456789",
            "san_sang_nhan_don": false,
            "diem_danh_gia_tb": 4.2,
            "trang_thai": "cho_duyet",
            "created_at": "2023-01-01T00:00:00.000000Z",
            "updated_at": "2023-01-01T00:00:00.000000Z"
        }
    ]
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Lỗi server"
}
```

### Notes

- Lấy tất cả shipper

---

## Tạo shipper

### Endpoint

POST /admin/shipper/create

### Authentication

Bearer Token

### Request Body

```json
{
    "id_nguoi_dung": 1,
    "bien_so_xe": "29A-12345",
    "loai_xe": "Honda",
    "so_cccd": "123456789",
    "san_sang_nhan_don": false,
    "diem_danh_gia_tb": 4.2,
    "trang_thai": "cho_duyet"
}
```

### Validation Rules

- id_nguoi_dung: required|integer
- bien_so_xe: required|string
- loai_xe: required|string
- so_cccd: required|string
- san_sang_nhan_don: boolean
- diem_danh_gia_tb: numeric
- trang_thai: string|in:cho_duyet,da_duyet,tu_choi

### Success Response

```json
{
    "status": 1,
    "data": {
        "id": 1,
        "id_nguoi_dung": 1,
        "bien_so_xe": "29A-12345",
        "loai_xe": "Honda",
        "so_cccd": "123456789",
        "san_sang_nhan_don": false,
        "diem_danh_gia_tb": 4.2,
        "trang_thai": "cho_duyet",
        "created_at": "2023-01-01T00:00:00.000000Z",
        "updated_at": "2023-01-01T00:00:00.000000Z"
    },
    "message": "Tạo shipper thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Validation error"
}
```

### Notes

- san_sang_nhan_don mặc định false, diem_danh_gia_tb mặc định 0, trang_thai mặc định 'cho_duyet'

---

## Cập nhật shipper

### Endpoint

PUT /admin/shipper/update

### Authentication

Bearer Token

### Request Body

```json
{
    "id": 1,
    "id_nguoi_dung": 1,
    "bien_so_xe": "29A-12345",
    "loai_xe": "Honda",
    "so_cccd": "123456789",
    "san_sang_nhan_don": false,
    "diem_danh_gia_tb": 4.2,
    "trang_thai": "cho_duyet"
}
```

### Validation Rules

- id: required|integer
- id_nguoi_dung: required|integer
- bien_so_xe: required|string
- loai_xe: required|string
- so_cccd: required|string
- san_sang_nhan_don: boolean
- diem_danh_gia_tb: numeric
- trang_thai: string|in:cho_duyet,da_duyet,tu_choi

### Success Response

```json
{
    "status": 1,
    "message": "Cập nhật shipper thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Không tìm thấy shipper"
}
```

### Notes

- Cập nhật shipper theo ID

---

## Xóa shipper

### Endpoint

DELETE /admin/shipper/delete/{id}

### Authentication

Bearer Token

### Request Body

Không có

### Validation Rules

Không có

### Success Response

```json
{
    "status": 1,
    "message": "Xóa shipper thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Không tìm thấy shipper"
}
```

### Notes

- Xóa shipper theo ID

---

## Thay đổi trạng thái shipper

### Endpoint

PATCH /admin/shipper/change-status

### Authentication

Bearer Token

### Request Body

```json
{
    "id": 1,
    "trang_thai": "da_duyet"
}
```

### Validation Rules

- id: required|integer
- trang_thai: required|string|in:cho_duyet,da_duyet,tu_choi

### Success Response

```json
{
    "status": 1,
    "message": "Cập nhật trạng thái shipper thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Không tìm thấy shipper"
}
```

### Notes

- Thay đổi trạng thái shipper

## Thanh Toán (Payments)

---

## Lấy danh sách thanh toán

### Endpoint

GET /admin/thanh-toan

### Authentication

Bearer Token

### Request Body

Không có

### Validation Rules

Không có

### Success Response

```json
{
    "status": 1,
    "data": [
        {
            "id": 1,
            "id_don_hang": 1,
            "phuong_thuc": "COD",
            "so_tien": 115000,
            "ma_giao_dich": "TXN123",
            "trang_thai": 1,
            "thoi_gian_thanh_toan": "2023-01-01 12:00:00",
            "phan_hoi_cong": "Success",
            "created_at": "2023-01-01T00:00:00.000000Z",
            "updated_at": "2023-01-01T00:00:00.000000Z"
        }
    ]
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Lỗi server"
}
```

### Notes

- Lấy tất cả thanh toán

---

## Tạo thanh toán

### Endpoint

POST /admin/thanh-toan/create

### Authentication

Bearer Token

### Request Body

```json
{
    "id_don_hang": 1,
    "phuong_thuc": "COD",
    "so_tien": 115000,
    "ma_giao_dich": "TXN123",
    "trang_thai": 1,
    "thoi_gian_thanh_toan": "2023-01-01 12:00:00",
    "phan_hoi_cong": "Success"
}
```

### Validation Rules

- id_don_hang: required|integer
- phuong_thuc: required|string
- so_tien: required|numeric
- ma_giao_dich: nullable|string
- trang_thai: integer|in:0,1,2
- thoi_gian_thanh_toan: nullable|date
- phan_hoi_cong: nullable|string

### Success Response

```json
{
    "status": 1,
    "data": {
        "id": 1,
        "id_don_hang": 1,
        "phuong_thuc": "COD",
        "so_tien": 115000,
        "ma_giao_dich": "TXN123",
        "trang_thai": 1,
        "thoi_gian_thanh_toan": "2023-01-01 12:00:00",
        "phan_hoi_cong": "Success",
        "created_at": "2023-01-01T00:00:00.000000Z",
        "updated_at": "2023-01-01T00:00:00.000000Z"
    },
    "message": "Tạo thanh toán thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Validation error"
}
```

### Notes

- trang_thai: 0 - chờ thanh toán, 1 - thành công, 2 - thất bại

---

## Cập nhật thanh toán

### Endpoint

PUT /admin/thanh-toan/update

### Authentication

Bearer Token

### Request Body

```json
{
    "id": 1,
    "id_don_hang": 1,
    "phuong_thuc": "COD",
    "so_tien": 115000,
    "ma_giao_dich": "TXN123",
    "trang_thai": 1,
    "thoi_gian_thanh_toan": "2023-01-01 12:00:00",
    "phan_hoi_cong": "Success"
}
```

### Validation Rules

- id: required|integer
- id_don_hang: required|integer
- phuong_thuc: required|string
- so_tien: required|numeric
- ma_giao_dich: nullable|string
- trang_thai: integer|in:0,1,2
- thoi_gian_thanh_toan: nullable|date
- phan_hoi_cong: nullable|string

### Success Response

```json
{
    "status": 1,
    "message": "Cập nhật thanh toán thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Không tìm thấy thanh toán"
}
```

### Notes

- Cập nhật thanh toán theo ID

---

## Xóa thanh toán

### Endpoint

DELETE /admin/thanh-toan/delete/{id}

### Authentication

Bearer Token

### Request Body

Không có

### Validation Rules

Không có

### Success Response

```json
{
    "status": 1,
    "message": "Xóa thanh toán thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Không tìm thấy thanh toán"
}
```

### Notes

- Xóa thanh toán theo ID

---

## Thay đổi trạng thái thanh toán

### Endpoint

PATCH /admin/thanh-toan/change-status

### Authentication

Bearer Token

### Request Body

```json
{
    "id": 1,
    "trang_thai": 1
}
```

### Validation Rules

- id: required|integer
- trang_thai: required|integer|in:0,1,2

### Success Response

```json
{
    "status": 1,
    "message": "Cập nhật trạng thái thanh toán thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Không tìm thấy thanh toán"
}
```

### Notes

- Thay đổi trạng thái thanh toán

## Theo Dõi Đơn Hàng (Order Tracking)

---

## Lấy danh sách theo dõi

### Endpoint

GET /admin/theo-doi-don-hang

### Authentication

Bearer Token

### Request Body

Không có

### Validation Rules

Không có

### Success Response

```json
{
    "status": 1,
    "data": [
        {
            "id": 1,
            "id_don_hang": 1,
            "id_shipper": 1,
            "trang_thai": 0,
            "vi_do": 10.123,
            "kinh_do": 106.123,
            "ghi_chu": "Đang giao",
            "thoi_diem": "2023-01-01 12:00:00",
            "khoan_cach_den_khach": 2.5,
            "created_at": "2023-01-01T00:00:00.000000Z",
            "updated_at": "2023-01-01T00:00:00.000000Z"
        }
    ]
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Lỗi server"
}
```

### Notes

- Lấy tất cả theo dõi đơn hàng

---

## Tạo theo dõi

### Endpoint

POST /admin/theo-doi-don-hang/create

### Authentication

Bearer Token

### Request Body

```json
{
    "id_don_hang": 1,
    "id_shipper": 1,
    "trang_thai": 0,
    "vi_do": 10.123,
    "kinh_do": 106.123,
    "ghi_chu": "Đang giao",
    "thoi_diem": "2023-01-01 12:00:00",
    "khoan_cach_den_khach": 2.5
}
```

### Validation Rules

- id_don_hang: required|integer
- id_shipper: required|integer
- trang_thai: integer|in:0,1,2,3,4,5
- vi_do: required|numeric
- kinh_do: required|numeric
- ghi_chu: nullable|string
- thoi_diem: required|date
- khoan_cach_den_khach: required|numeric

### Success Response

```json
{
    "status": 1,
    "data": {
        "id": 1,
        "id_don_hang": 1,
        "id_shipper": 1,
        "trang_thai": 0,
        "vi_do": 10.123,
        "kinh_do": 106.123,
        "ghi_chu": "Đang giao",
        "thoi_diem": "2023-01-01 12:00:00",
        "khoan_cach_den_khach": 2.5,
        "created_at": "2023-01-01T00:00:00.000000Z",
        "updated_at": "2023-01-01T00:00:00.000000Z"
    },
    "message": "Tạo theo dõi thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Validation error"
}
```

### Notes

- trang_thai: 0 - bắt đầu, 1 - nhận đơn, 2 - đến nhà hàng, 3 - rời nhà hàng, 4 - đến khách, 5 - hoàn thành

---

## Cập nhật theo dõi

### Endpoint

PUT /admin/theo-doi-don-hang/update

### Authentication

Bearer Token

### Request Body

```json
{
    "id": 1,
    "id_don_hang": 1,
    "id_shipper": 1,
    "trang_thai": 0,
    "vi_do": 10.123,
    "kinh_do": 106.123,
    "ghi_chu": "Đang giao",
    "thoi_diem": "2023-01-01 12:00:00",
    "khoan_cach_den_khach": 2.5
}
```

### Validation Rules

- id: required|integer
- id_don_hang: required|integer
- id_shipper: required|integer
- trang_thai: integer|in:0,1,2,3,4,5
- vi_do: required|numeric
- kinh_do: required|numeric
- ghi_chu: nullable|string
- thoi_diem: required|date
- khoan_cach_den_khach: required|numeric

### Success Response

```json
{
    "status": 1,
    "message": "Cập nhật theo dõi thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Không tìm thấy theo dõi"
}
```

### Notes

- Cập nhật theo dõi theo ID

---

## Xóa theo dõi

### Endpoint

DELETE /admin/theo-doi-don-hang/delete/{id}

### Authentication

Bearer Token

### Request Body

Không có

### Validation Rules

Không có

### Success Response

```json
{
    "status": 1,
    "message": "Xóa theo dõi thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Không tìm thấy theo dõi"
}
```

### Notes

- Xóa theo dõi theo ID

---

## Thay đổi trạng thái theo dõi

### Endpoint

PATCH /admin/theo-doi-don-hang/change-status

### Authentication

Bearer Token

### Request Body

```json
{
    "id": 1,
    "trang_thai": 1
}
```

### Validation Rules

- id: required|integer
- trang_thai: required|integer|in:0,1,2,3,4,5

### Success Response

```json
{
    "status": 1,
    "message": "Cập nhật trạng thái theo dõi thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Không tìm thấy theo dõi"
}
```

### Notes

- Thay đổi trạng thái theo dõi

## Vị Trí Shipper (Shipper Location)

---

## Lấy danh sách vị trí

### Endpoint

GET /admin/vi-tri-shipper

### Authentication

Bearer Token

### Request Body

Không có

### Validation Rules

Không có

### Success Response

```json
{
    "status": 1,
    "data": [
        {
            "id": 1,
            "id_shipper": 1,
            "vi_do": 10.123,
            "kinh_do": 106.123,
            "toc_do": 30,
            "huong_di_chuyen": 90,
            "thoi_gian_ghi": "2023-01-01 12:00:00",
            "trang_thai": 1,
            "created_at": "2023-01-01T00:00:00.000000Z",
            "updated_at": "2023-01-01T00:00:00.000000Z"
        }
    ]
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Lỗi server"
}
```

### Notes

- Lấy tất cả vị trí shipper

---

## Tạo vị trí

### Endpoint

POST /admin/vi-tri-shipper/create

### Authentication

Bearer Token

### Request Body

```json
{
    "id_shipper": 1,
    "vi_do": 10.123,
    "kinh_do": 106.123,
    "toc_do": 30,
    "huong_di_chuyen": 90,
    "thoi_gian_ghi": "2023-01-01 12:00:00",
    "trang_thai": 1
}
```

### Validation Rules

- id_shipper: required|integer
- vi_do: required|numeric
- kinh_do: required|numeric
- toc_do: nullable|numeric
- huong_di_chuyen: nullable|numeric
- thoi_gian_ghi: required|date
- trang_thai: integer|in:0,1

### Success Response

```json
{
    "status": 1,
    "data": {
        "id": 1,
        "id_shipper": 1,
        "vi_do": 10.123,
        "kinh_do": 106.123,
        "toc_do": 30,
        "huong_di_chuyen": 90,
        "thoi_gian_ghi": "2023-01-01 12:00:00",
        "trang_thai": 1,
        "created_at": "2023-01-01T00:00:00.000000Z",
        "updated_at": "2023-01-01T00:00:00.000000Z"
    },
    "message": "Tạo vị trí shipper thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Validation error"
}
```

### Notes

- trang_thai mặc định 0

---

## Cập nhật vị trí

### Endpoint

PUT /admin/vi-tri-shipper/update

### Authentication

Bearer Token

### Request Body

```json
{
    "id": 1,
    "id_shipper": 1,
    "vi_do": 10.123,
    "kinh_do": 106.123,
    "toc_do": 30,
    "huong_di_chuyen": 90,
    "thoi_gian_ghi": "2023-01-01 12:00:00",
    "trang_thai": 1
}
```

### Validation Rules

- id: required|integer
- id_shipper: required|integer
- vi_do: required|numeric
- kinh_do: required|numeric
- toc_do: nullable|numeric
- huong_di_chuyen: nullable|numeric
- thoi_gian_ghi: required|date
- trang_thai: integer|in:0,1

### Success Response

```json
{
    "status": 1,
    "message": "Cập nhật vị trí shipper thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Không tìm thấy vị trí shipper"
}
```

### Notes

- Cập nhật vị trí theo ID

---

## Xóa vị trí

### Endpoint

DELETE /admin/vi-tri-shipper/delete/{id}

### Authentication

Bearer Token

### Request Body

Không có

### Validation Rules

Không có

### Success Response

```json
{
    "status": 1,
    "message": "Xóa vị trí shipper thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Không tìm thấy vị trí shipper"
}
```

### Notes

- Xóa vị trí theo ID

## Coupon Khách Hàng (Customer Coupons)

---

## Lấy danh sách coupon

### Endpoint

GET /admin/coupon-khach-hang

### Authentication

Bearer Token

### Request Body

Không có

### Validation Rules

Không có

### Success Response

```json
{
    "status": 1,
    "data": [
        {
            "id": 1,
            "id_khach_hang": 1,
            "id_coupon": 1,
            "so_lan_da_dung": 0,
            "lan_cuoi_su_dung": "2023-01-01",
            "created_at": "2023-01-01T00:00:00.000000Z",
            "updated_at": "2023-01-01T00:00:00.000000Z"
        }
    ]
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Lỗi server"
}
```

### Notes

- Lấy tất cả coupon khách hàng

---

## Tạo coupon

### Endpoint

POST /admin/coupon-khach-hang/create

### Authentication

Bearer Token

### Request Body

```json
{
    "id_khach_hang": 1,
    "id_coupon": 1,
    "so_lan_da_dung": 0,
    "lan_cuoi_su_dung": "2023-01-01"
}
```

### Validation Rules

- id_khach_hang: required|integer
- id_coupon: required|integer
- so_lan_da_dung: integer
- lan_cuoi_su_dung: nullable|date

### Success Response

```json
{
    "status": 1,
    "data": {
        "id": 1,
        "id_khach_hang": 1,
        "id_coupon": 1,
        "so_lan_da_dung": 0,
        "lan_cuoi_su_dung": "2023-01-01",
        "created_at": "2023-01-01T00:00:00.000000Z",
        "updated_at": "2023-01-01T00:00:00.000000Z"
    },
    "message": "Tạo coupon khách hàng thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Validation error"
}
```

### Notes

- so_lan_da_dung mặc định 0

---

## Cập nhật coupon

### Endpoint

PUT /admin/coupon-khach-hang/update

### Authentication

Bearer Token

### Request Body

```json
{
    "id": 1,
    "id_khach_hang": 1,
    "id_coupon": 1,
    "so_lan_da_dung": 0,
    "lan_cuoi_su_dung": "2023-01-01"
}
```

### Validation Rules

- id: required|integer
- id_khach_hang: required|integer
- id_coupon: required|integer
- so_lan_da_dung: integer
- lan_cuoi_su_dung: nullable|date

### Success Response

```json
{
    "status": 1,
    "message": "Cập nhật coupon khách hàng thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Không tìm thấy coupon"
}
```

### Notes

- Cập nhật coupon theo ID

---

## Xóa coupon

### Endpoint

DELETE /admin/coupon-khach-hang/delete/{id}

### Authentication

Bearer Token

### Request Body

Không có

### Validation Rules

Không có

### Success Response

```json
{
    "status": 1,
    "message": "Xóa coupon thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Không tìm thấy coupon"
}
```

### Notes

- Xóa coupon theo ID

## Mã Giảm Giá (Discount Codes)

---

## Lấy danh sách mã giảm giá

### Endpoint

GET /admin/ma-giam-gia

### Authentication

Bearer Token

### Request Body

Không có

### Validation Rules

Không có

### Success Response

```json
{
    "status": 1,
    "data": [
        {
            "id": 1,
            "id_nha_hang": 1,
            "ma_code": "GIAM20",
            "mo_ta": "Giảm 20%",
            "loai_giam_gia": 0,
            "gia_tri_giam": 20000,
            "gia_tri_don_toi_thieu": 100000,
            "giam_toi_da": 50000,
            "gioi_han_su_dung": 100,
            "gioi_han_moi_nguoi": 1,
            "ngay_bat_dau": "2023-01-01",
            "ngay_ket_thuc": "2023-12-31",
            "trang_thai": 1,
            "da_du_dung": 0,
            "created_at": "2023-01-01T00:00:00.000000Z",
            "updated_at": "2023-01-01T00:00:00.000000Z"
        }
    ]
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Lỗi server"
}
```

### Notes

- Lấy tất cả mã giảm giá

---

## Tạo mã giảm giá

### Endpoint

POST /admin/ma-giam-gia/create

### Authentication

Bearer Token

### Request Body

```json
{
    "id_nha_hang": 1,
    "ma_code": "GIAM20",
    "mo_ta": "Giảm 20%",
    "loai_giam_gia": 0,
    "gia_tri_giam": 20000,
    "gia_tri_don_toi_thieu": 100000,
    "giam_toi_da": 50000,
    "gioi_han_su_dung": 100,
    "gioi_han_moi_nguoi": 1,
    "ngay_bat_dau": "2023-01-01",
    "ngay_ket_thuc": "2023-12-31",
    "trang_thai": 1,
    "da_du_dung": 0
}
```

### Validation Rules

- id_nha_hang: required|integer
- ma_code: required|string
- mo_ta: nullable|string
- loai_giam_gia: integer|in:0,1
- gia_tri_giam: required|numeric
- gia_tri_don_toi_thieu: required|numeric
- giam_toi_da: nullable|numeric
- gioi_han_su_dung: nullable|integer
- gioi_han_moi_nguoi: nullable|integer
- ngay_bat_dau: required|date
- ngay_ket_thuc: required|date
- trang_thai: integer|in:0,1
- da_du_dung: integer

### Success Response

```json
{
    "status": 1,
    "data": {
        "id": 1,
        "id_nha_hang": 1,
        "ma_code": "GIAM20",
        "mo_ta": "Giảm 20%",
        "loai_giam_gia": 0,
        "gia_tri_giam": 20000,
        "gia_tri_don_toi_thieu": 100000,
        "giam_toi_da": 50000,
        "gioi_han_su_dung": 100,
        "gioi_han_moi_nguoi": 1,
        "ngay_bat_dau": "2023-01-01",
        "ngay_ket_thuc": "2023-12-31",
        "trang_thai": 1,
        "da_du_dung": 0,
        "created_at": "2023-01-01T00:00:00.000000Z",
        "updated_at": "2023-01-01T00:00:00.000000Z"
    },
    "message": "Tạo mã giảm giá thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Validation error"
}
```

### Notes

- loai_giam_gia: 0 - giảm tiền, 1 - giảm %
- trang_thai mặc định 0, da_du_dung mặc định 0

---

## Cập nhật mã giảm giá

### Endpoint

PUT /admin/ma-giam-gia/update

### Authentication

Bearer Token

### Request Body

```json
{
    "id": 1,
    "id_nha_hang": 1,
    "ma_code": "GIAM20",
    "mo_ta": "Giảm 20%",
    "loai_giam_gia": 0,
    "gia_tri_giam": 20000,
    "gia_tri_don_toi_thieu": 100000,
    "giam_toi_da": 50000,
    "gioi_han_su_dung": 100,
    "gioi_han_moi_nguoi": 1,
    "ngay_bat_dau": "2023-01-01",
    "ngay_ket_thuc": "2023-12-31",
    "da_du_dung": 0
}
```

### Validation Rules

- id: required|integer
- id_nha_hang: required|integer
- ma_code: required|string
- mo_ta: nullable|string
- loai_giam_gia: integer|in:0,1
- gia_tri_giam: required|numeric
- gia_tri_don_toi_thieu: required|numeric
- giam_toi_da: nullable|numeric
- gioi_han_su_dung: nullable|integer
- gioi_han_moi_nguoi: nullable|integer
- ngay_bat_dau: required|date
- ngay_ket_thuc: required|date
- da_du_dung: integer

### Success Response

```json
{
    "status": 1,
    "message": "Cập nhật mã giảm giá thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Không tìm thấy mã giảm giá"
}
```

### Notes

- Cập nhật mã giảm giá theo ID

---

## Xóa mã giảm giá

### Endpoint

DELETE /admin/ma-giam-gia/delete/{id}

### Authentication

Bearer Token

### Request Body

Không có

### Validation Rules

Không có

### Success Response

```json
{
    "status": 1,
    "message": "Xóa mã giảm giá thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Không tìm thấy mã giảm giá"
}
```

### Notes

- Xóa mã giảm giá theo ID

---

## Thay đổi trạng thái mã giảm giá

### Endpoint

PATCH /admin/ma-giam-gia/change-status

### Authentication

Bearer Token

### Request Body

```json
{
    "id": 1,
    "trang_thai": 1
}
```

### Validation Rules

- id: required|integer
- trang_thai: required|integer|in:0,1

### Success Response

```json
{
    "status": 1,
    "message": "Cập nhật trạng thái mã giảm giá thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Không tìm thấy mã giảm giá"
}
```

### Notes

- Thay đổi trạng thái mã giảm giá

## Thu Nhập Nhà Hàng (Restaurant Income)

---

## Lấy danh sách thu nhập

### Endpoint

GET /admin/thu-nhap-nha-hang

### Authentication

Bearer Token

### Request Body

Không có

### Validation Rules

Không có

### Success Response

```json
{
    "status": 1,
    "data": [
        {
            "id": 1,
            "id_nha_hang": 1,
            "id_don_hang": 1,
            "doanh_thu_gop": 100000,
            "phi_hoa_hong": 10000,
            "thu_nhap_rong": 90000,
            "trang_thai": 1,
            "ngay_thanh_toan": "2023-01-01",
            "created_at": "2023-01-01T00:00:00.000000Z",
            "updated_at": "2023-01-01T00:00:00.000000Z"
        }
    ]
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Lỗi server"
}
```

### Notes

- Lấy tất cả thu nhập nhà hàng

---

## Tạo thu nhập

### Endpoint

POST /admin/thu-nhap-nha-hang/create

### Authentication

Bearer Token

### Request Body

```json
{
    "id_nha_hang": 1,
    "id_don_hang": 1,
    "doanh_thu_gop": 100000,
    "phi_hoa_hong": 10000,
    "thu_nhap_rong": 90000,
    "trang_thai": 1,
    "ngay_thanh_toan": "2023-01-01"
}
```

### Validation Rules

- id_nha_hang: required|integer
- id_don_hang: required|integer
- doanh_thu_gop: required|numeric
- phi_hoa_hong: required|numeric
- thu_nhap_rong: required|numeric
- trang_thai: integer|in:0,1
- ngay_thanh_toan: required|date

### Success Response

```json
{
    "status": 1,
    "data": {
        "id": 1,
        "id_nha_hang": 1,
        "id_don_hang": 1,
        "doanh_thu_gop": 100000,
        "phi_hoa_hong": 10000,
        "thu_nhap_rong": 90000,
        "trang_thai": 1,
        "ngay_thanh_toan": "2023-01-01",
        "created_at": "2023-01-01T00:00:00.000000Z",
        "updated_at": "2023-01-01T00:00:00.000000Z"
    },
    "message": "Tạo thu nhập nhà hàng thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Validation error"
}
```

### Notes

- trang_thai mặc định 0

---

## Cập nhật thu nhập

### Endpoint

PUT /admin/thu-nhap-nha-hang/update

### Authentication

Bearer Token

### Request Body

```json
{
    "id": 1,
    "id_nha_hang": 1,
    "id_don_hang": 1,
    "doanh_thu_gop": 100000,
    "phi_hoa_hong": 10000,
    "thu_nhap_rong": 90000,
    "trang_thai": 1,
    "ngay_thanh_toan": "2023-01-01"
}
```

### Validation Rules

- id: required|integer
- id_nha_hang: required|integer
- id_don_hang: required|integer
- doanh_thu_gop: required|numeric
- phi_hoa_hong: required|numeric
- thu_nhap_rong: required|numeric
- trang_thai: integer|in:0,1
- ngay_thanh_toan: required|date

### Success Response

```json
{
    "status": 1,
    "message": "Cập nhật thu nhập nhà hàng thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Không tìm thấy thu nhập"
}
```

### Notes

- Cập nhật thu nhập theo ID

---

## Xóa thu nhập

### Endpoint

DELETE /admin/thu-nhap-nha-hang/delete/{id}

### Authentication

Bearer Token

### Request Body

Không có

### Validation Rules

Không có

### Success Response

```json
{
    "status": 1,
    "message": "Xóa thu nhập thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Không tìm thấy thu nhập"
}
```

### Notes

- Xóa thu nhập theo ID

---

## Thay đổi trạng thái thu nhập

### Endpoint

PATCH /admin/thu-nhap-nha-hang/change-status

### Authentication

Bearer Token

### Request Body

```json
{
    "id": 1,
    "trang_thai": 1
}
```

### Validation Rules

- id: required|integer
- trang_thai: required|integer|in:0,1

### Success Response

```json
{
    "status": 1,
    "message": "Cập nhật trạng thái thu nhập thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Không tìm thấy thu nhập"
}
```

### Notes

- Thay đổi trạng thái thu nhập

## Thu Nhập Shipper (Shipper Income)

---

## Lấy danh sách thu nhập

### Endpoint

GET /admin/thu-nhap-shipper

### Authentication

Bearer Token

### Request Body

Không có

### Validation Rules

Không có

### Success Response

```json
{
    "status": 1,
    "data": [
        {
            "id": 1,
            "id_shipper": 1,
            "id_don_hang": 1,
            "phi_giao_hang": 15000,
            "tien_tip": 5000,
            "tien_thuong": 0,
            "tong_thu_nhap": 20000,
            "trang_thai": 1,
            "ngay_tao": "2023-01-01",
            "created_at": "2023-01-01T00:00:00.000000Z",
            "updated_at": "2023-01-01T00:00:00.000000Z"
        }
    ]
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Lỗi server"
}
```

### Notes

- Lấy tất cả thu nhập shipper

---

## Tạo thu nhập

### Endpoint

POST /admin/thu-nhap-shipper/create

### Authentication

Bearer Token

### Request Body

```json
{
    "id_shipper": 1,
    "id_don_hang": 1,
    "phi_giao_hang": 15000,
    "tien_tip": 5000,
    "tien_thuong": 0,
    "tong_thu_nhap": 20000,
    "trang_thai": 1,
    "ngay_tao": "2023-01-01"
}
```

### Validation Rules

- id_shipper: required|integer
- id_don_hang: required|integer
- phi_giao_hang: required|numeric
- tien_tip: nullable|numeric
- tien_thuong: nullable|numeric
- tong_thu_nhap: required|numeric
- trang_thai: integer|in:0,1
- ngay_tao: required|date

### Success Response

```json
{
    "status": 1,
    "data": {
        "id": 1,
        "id_shipper": 1,
        "id_don_hang": 1,
        "phi_giao_hang": 15000,
        "tien_tip": 5000,
        "tien_thuong": 0,
        "tong_thu_nhap": 20000,
        "trang_thai": 1,
        "ngay_tao": "2023-01-01",
        "created_at": "2023-01-01T00:00:00.000000Z",
        "updated_at": "2023-01-01T00:00:00.000000Z"
    },
    "message": "Tạo thu nhập shipper thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Validation error"
}
```

### Notes

- trang_thai mặc định 0

---

## Cập nhật thu nhập

### Endpoint

PUT /admin/thu-nhap-shipper/update

### Authentication

Bearer Token

### Request Body

```json
{
    "id": 1,
    "id_shipper": 1,
    "id_don_hang": 1,
    "phi_giao_hang": 15000,
    "tien_tip": 5000,
    "tien_thuong": 0,
    "tong_thu_nhap": 20000,
    "trang_thai": 1,
    "ngay_tao": "2023-01-01"
}
```

### Validation Rules

- id: required|integer
- id_shipper: required|integer
- id_don_hang: required|integer
- phi_giao_hang: required|numeric
- tien_tip: nullable|numeric
- tien_thuong: nullable|numeric
- tong_thu_nhap: required|numeric
- trang_thai: integer|in:0,1
- ngay_tao: required|date

### Success Response

```json
{
    "status": 1,
    "message": "Cập nhật thu nhập shipper thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Không tìm thấy thu nhập"
}
```

### Notes

- Cập nhật thu nhập theo ID

---

## Xóa thu nhập

### Endpoint

DELETE /admin/thu-nhap-shipper/delete/{id}

### Authentication

Bearer Token

### Request Body

Không có

### Validation Rules

Không có

### Success Response

```json
{
    "status": 1,
    "message": "Xóa thu nhập thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Không tìm thấy thu nhập"
}
```

### Notes

- Xóa thu nhập theo ID

---

## Thay đổi trạng thái thu nhập

### Endpoint

PATCH /admin/thu-nhap-shipper/change-status

### Authentication

Bearer Token

### Request Body

```json
{
    "id": 1,
    "trang_thai": 1
}
```

### Validation Rules

- id: required|integer
- trang_thai: required|integer|in:0,1

### Success Response

```json
{
    "status": 1,
    "message": "Cập nhật trạng thái thu nhập thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Không tìm thấy thu nhập"
}
```

### Notes

- Thay đổi trạng thái thu nhập

## Chi Tiết Đơn Hàng (Order Details)

---

## Lấy danh sách chi tiết

### Endpoint

GET /admin/chi-tiet-don-hang

### Authentication

Bearer Token

### Request Body

Không có

### Validation Rules

Không có

### Success Response

```json
{
    "status": 1,
    "data": [
        {
            "id": 1,
            "id_don_hang": 1,
            "id_mon_an": 1,
            "ten_mon_an_luu_tru": "Phở bò",
            "gia_luu_tru": 50000,
            "so_luong": 2,
            "ghi_chu": "Ít cay",
            "thanh_tien": 100000,
            "created_at": "2023-01-01T00:00:00.000000Z",
            "updated_at": "2023-01-01T00:00:00.000000Z"
        }
    ]
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Lỗi server"
}
```

### Notes

- Lấy tất cả chi tiết đơn hàng

---

## Tạo chi tiết

### Endpoint

POST /admin/chi-tiet-don-hang/create

### Authentication

Bearer Token

### Request Body

```json
{
    "id_don_hang": 1,
    "id_mon_an": 1,
    "ten_mon_an_luu_tru": "Phở bò",
    "gia_luu_tru": 50000,
    "so_luong": 2,
    "ghi_chu": "Ít cay",
    "thanh_tien": 100000
}
```

### Validation Rules

- id_don_hang: required|integer
- id_mon_an: required|integer
- ten_mon_an_luu_tru: required|string
- gia_luu_tru: required|numeric
- so_luong: required|integer
- ghi_chu: nullable|string
- thanh_tien: required|numeric

### Success Response

```json
{
    "status": 1,
    "data": {
        "id": 1,
        "id_don_hang": 1,
        "id_mon_an": 1,
        "ten_mon_an_luu_tru": "Phở bò",
        "gia_luu_tru": 50000,
        "so_luong": 2,
        "ghi_chu": "Ít cay",
        "thanh_tien": 100000,
        "created_at": "2023-01-01T00:00:00.000000Z",
        "updated_at": "2023-01-01T00:00:00.000000Z"
    },
    "message": "Tạo chi tiết đơn hàng thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Validation error"
}
```

### Notes

- Tạo chi tiết đơn hàng

---

## Cập nhật chi tiết

### Endpoint

PUT /admin/chi-tiet-don-hang/update

### Authentication

Bearer Token

### Request Body

```json
{
    "id": 1,
    "id_don_hang": 1,
    "id_mon_an": 1,
    "ten_mon_an_luu_tru": "Phở bò",
    "gia_luu_tru": 50000,
    "so_luong": 2,
    "ghi_chu": "Ít cay",
    "thanh_tien": 100000
}
```

### Validation Rules

- id: required|integer
- id_don_hang: required|integer
- id_mon_an: required|integer
- ten_mon_an_luu_tru: required|string
- gia_luu_tru: required|numeric
- so_luong: required|integer
- ghi_chu: nullable|string
- thanh_tien: required|numeric

### Success Response

```json
{
    "status": 1,
    "message": "Cập nhật chi tiết đơn hàng thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Không tìm thấy chi tiết"
}
```

### Notes

- Cập nhật chi tiết theo ID

---

## Xóa chi tiết

### Endpoint

DELETE /admin/chi-tiet-don-hang/delete/{id}

### Authentication

Bearer Token

### Request Body

Không có

### Validation Rules

Không có

### Success Response

```json
{
    "status": 1,
    "message": "Xóa chi tiết thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Không tìm thấy chi tiết"
}
```

### Notes

- Xóa chi tiết theo ID

## Khu Vực Giao Hàng (Delivery Areas)

---

## Lấy danh sách khu vực

### Endpoint

GET /admin/khu-vuc-giao-hang

### Authentication

Bearer Token

### Request Body

Không có

### Validation Rules

Không có

### Success Response

```json
{
    "status": 1,
    "data": [
        {
            "id": 1,
            "id_nha_hang": 1,
            "ten_khu_vuc": "Quận 1",
            "phi_giao_hang": 15000,
            "khoang_cach_toi_da_km": 5,
            "thoi_gian_du_kien_phut": 30,
            "trang_thai": 1,
            "created_at": "2023-01-01T00:00:00.000000Z",
            "updated_at": "2023-01-01T00:00:00.000000Z"
        }
    ]
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Lỗi server"
}
```

### Notes

- Lấy tất cả khu vực giao hàng

---

## Tạo khu vực

### Endpoint

POST /admin/khu-vuc-giao-hang/create

### Authentication

Bearer Token

### Request Body

```json
{
    "id_nha_hang": 1,
    "ten_khu_vuc": "Quận 1",
    "phi_giao_hang": 15000,
    "khoang_cach_toi_da_km": 5,
    "thoi_gian_du_kien_phut": 30,
    "trang_thai": 1
}
```

### Validation Rules

- id_nha_hang: required|integer
- ten_khu_vuc: required|string
- phi_giao_hang: required|numeric
- khoang_cach_toi_da_km: required|numeric
- thoi_gian_du_kien_phut: required|integer
- trang_thai: integer|in:0,1

### Success Response

```json
{
    "status": 1,
    "data": {
        "id": 1,
        "id_nha_hang": 1,
        "ten_khu_vuc": "Quận 1",
        "phi_giao_hang": 15000,
        "khoang_cach_toi_da_km": 5,
        "thoi_gian_du_kien_phut": 30,
        "trang_thai": 1,
        "created_at": "2023-01-01T00:00:00.000000Z",
        "updated_at": "2023-01-01T00:00:00.000000Z"
    },
    "message": "Tạo khu vực giao hàng thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Validation error"
}
```

### Notes

- trang_thai mặc định 0

---

## Cập nhật khu vực

### Endpoint

PUT /admin/khu-vuc-giao-hang/update

### Authentication

Bearer Token

### Request Body

```json
{
    "id": 1,
    "id_nha_hang": 1,
    "ten_khu_vuc": "Quận 1",
    "phi_giao_hang": 15000,
    "khoang_cach_toi_da_km": 5,
    "thoi_gian_du_kien_phut": 30,
    "trang_thai": 1
}
```

### Validation Rules

- id: required|integer
- id_nha_hang: required|integer
- ten_khu_vuc: required|string
- phi_giao_hang: required|numeric
- khoang_cach_toi_da_km: required|numeric
- thoi_gian_du_kien_phut: required|integer
- trang_thai: integer|in:0,1

### Success Response

```json
{
    "status": 1,
    "message": "Cập nhật khu vực giao hàng thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Không tìm thấy khu vực"
}
```

### Notes

- Cập nhật khu vực theo ID

---

## Xóa khu vực

### Endpoint

DELETE /admin/khu-vuc-giao-hang/delete/{id}

### Authentication

Bearer Token

### Request Body

Không có

### Validation Rules

Không có

### Success Response

```json
{
    "status": 1,
    "message": "Xóa khu vực thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Không tìm thấy khu vực"
}
```

### Notes

- Xóa khu vực theo ID

---

## Thay đổi trạng thái khu vực

### Endpoint

PATCH /admin/khu-vuc-giao-hang/change-status

### Authentication

Bearer Token

### Request Body

```json
{
    "id": 1,
    "trang_thai": 1
}
```

### Validation Rules

- id: required|integer
- trang_thai: required|integer|in:0,1

### Success Response

```json
{
    "status": 1,
    "message": "Cập nhật trạng thái khu vực thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Không tìm thấy khu vực"
}
```

### Notes

- Thay đổi trạng thái khu vực

## Danh Mục Món Ăn (Food Categories)

---

## Lấy danh sách danh mục

### Endpoint

GET /admin/danh-muc-mon-an

### Authentication

Bearer Token

### Request Body

Không có

### Validation Rules

Không có

### Success Response

```json
{
    "status": 1,
    "data": [
        {
            "id": 1,
            "id_nha_hang": 1,
            "ten_danh_muc": "Món chính",
            "hinh_anh": "url_to_image",
            "trang_thai": 1,
            "created_at": "2023-01-01T00:00:00.000000Z",
            "updated_at": "2023-01-01T00:00:00.000000Z"
        }
    ]
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Lỗi server"
}
```

### Notes

- Lấy tất cả danh mục món ăn

---

## Tạo danh mục

### Endpoint

POST /admin/danh-muc-mon-an/create

### Authentication

Bearer Token

### Request Body

```json
{
    "id_nha_hang": 1,
    "ten_danh_muc": "Món chính",
    "hinh_anh": "url_to_image",
    "trang_thai": 1
}
```

### Validation Rules

- id_nha_hang: required|integer
- ten_danh_muc: required|string
- hinh_anh: nullable|string
- trang_thai: integer|in:0,1

### Success Response

```json
{
    "status": 1,
    "data": {
        "id": 1,
        "id_nha_hang": 1,
        "ten_danh_muc": "Món chính",
        "hinh_anh": "url_to_image",
        "trang_thai": 1,
        "created_at": "2023-01-01T00:00:00.000000Z",
        "updated_at": "2023-01-01T00:00:00.000000Z"
    },
    "message": "Tạo danh mục thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Validation error"
}
```

### Notes

- trang_thai mặc định 1

---

## Cập nhật danh mục

### Endpoint

PUT /admin/danh-muc-mon-an/update

### Authentication

Bearer Token

### Request Body

```json
{
    "id": 1,
    "id_nha_hang": 1,
    "ten_danh_muc": "Món chính",
    "hinh_anh": "url_to_image",
    "trang_thai": 1
}
```

### Validation Rules

- id: required|integer
- id_nha_hang: required|integer
- ten_danh_muc: required|string
- hinh_anh: nullable|string
- trang_thai: integer|in:0,1

### Success Response

```json
{
    "status": 1,
    "message": "Cập nhật danh mục thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Không tìm thấy danh mục"
}
```

### Notes

- Cập nhật danh mục theo ID

---

## Xóa danh mục

### Endpoint

DELETE /admin/danh-muc-mon-an/delete/{id}

### Authentication

Bearer Token

### Request Body

Không có

### Validation Rules

Không có

### Success Response

```json
{
    "status": 1,
    "message": "Xóa danh mục thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Không tìm thấy danh mục"
}
```

### Notes

- Xóa danh mục theo ID

---

## Thay đổi trạng thái danh mục

### Endpoint

PATCH /admin/danh-muc-mon-an/change-status

### Authentication

Bearer Token

### Request Body

```json
{
    "id": 1,
    "trang_thai": 1
}
```

### Validation Rules

- id: required|integer
- trang_thai: required|integer|in:0,1

### Success Response

```json
{
    "status": 1,
    "message": "Cập nhật trạng thái danh mục thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Không tìm thấy danh mục"
}
```

### Notes

- Thay đổi trạng thái danh mục

## Địa Chỉ Khách Hàng (Customer Addresses)

---

## Lấy danh sách địa chỉ

### Endpoint

GET /admin/dia-chi-khach-hang

### Authentication

Bearer Token

### Request Body

Không có

### Validation Rules

Không có

### Success Response

```json
{
    "status": 1,
    "data": [
        {
            "id": 1,
            "id_khach_hang": 1,
            "ten_dia_chi": "Nhà",
            "dia_chi": "123 Đường ABC",
            "vi_do": 10.123,
            "kinh_do": 106.123,
            "so_dien_thoai": "0123456789",
            "created_at": "2023-01-01T00:00:00.000000Z",
            "updated_at": "2023-01-01T00:00:00.000000Z"
        }
    ]
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Lỗi server"
}
```

### Notes

- Lấy tất cả địa chỉ khách hàng

---

## Tạo địa chỉ

### Endpoint

POST /admin/dia-chi-khach-hang/create

### Authentication

Bearer Token

### Request Body

```json
{
    "id_khach_hang": 1,
    "ten_dia_chi": "Nhà",
    "dia_chi": "123 Đường ABC",
    "vi_do": 10.123,
    "kinh_do": 106.123,
    "so_dien_thoai": "0123456789"
}
```

### Validation Rules

- id_khach_hang: required|integer
- ten_dia_chi: required|string
- dia_chi: required|string
- vi_do: required|numeric
- kinh_do: required|numeric
- so_dien_thoai: required|string

### Success Response

```json
{
    "status": 1,
    "data": {
        "id": 1,
        "id_khach_hang": 1,
        "ten_dia_chi": "Nhà",
        "dia_chi": "123 Đường ABC",
        "vi_do": 10.123,
        "kinh_do": 106.123,
        "so_dien_thoai": "0123456789",
        "created_at": "2023-01-01T00:00:00.000000Z",
        "updated_at": "2023-01-01T00:00:00.000000Z"
    },
    "message": "Tạo địa chỉ thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Validation error"
}
```

### Notes

- Tạo địa chỉ khách hàng

---

## Cập nhật địa chỉ

### Endpoint

PUT /admin/dia-chi-khach-hang/update

### Authentication

Bearer Token

### Request Body

```json
{
    "id": 1,
    "id_khach_hang": 1,
    "ten_dia_chi": "Nhà",
    "dia_chi": "123 Đường ABC",
    "vi_do": 10.123,
    "kinh_do": 106.123,
    "so_dien_thoai": "0123456789"
}
```

### Validation Rules

- id: required|integer
- id_khach_hang: required|integer
- ten_dia_chi: required|string
- dia_chi: required|string
- vi_do: required|numeric
- kinh_do: required|numeric
- so_dien_thoai: required|string

### Success Response

```json
{
    "status": 1,
    "message": "Cập nhật địa chỉ thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Không tìm thấy địa chỉ"
}
```

### Notes

- Cập nhật địa chỉ theo ID

---

## Xóa địa chỉ

### Endpoint

DELETE /admin/dia-chi-khach-hang/delete/{id}

### Authentication

Bearer Token

### Request Body

Không có

### Validation Rules

Không có

### Success Response

```json
{
    "status": 1,
    "message": "Xóa địa chỉ thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Không tìm thấy địa chỉ"
}
```

### Notes

- Xóa địa chỉ theo ID

## Người Dùng (Users)

---

## Lấy danh sách người dùng

### Endpoint

GET /admin/nguoi-dung

### Authentication

Bearer Token

### Request Body

Không có

### Validation Rules

Không có

### Success Response

```json
{
    "status": 1,
    "data": [
        {
            "id": 1,
            "email": "user@example.com",
            "password": "hashed_password",
            "so_dien_thoai": "0123456789",
            "ho_ten": "Nguyễn Văn A",
            "anh_dai_dien": "url_to_image",
            "vai_tro": "customer",
            "trang_thai": 1,
            "created_at": "2023-01-01T00:00:00.000000Z",
            "updated_at": "2023-01-01T00:00:00.000000Z"
        }
    ]
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Lỗi server"
}
```

### Notes

- Lấy tất cả người dùng

---

## Tạo người dùng

### Endpoint

POST /admin/nguoi-dung/create

### Authentication

Bearer Token

### Request Body

```json
{
    "email": "user@example.com",
    "password": "password123",
    "so_dien_thoai": "0123456789",
    "ho_ten": "Nguyễn Văn A",
    "anh_dai_dien": "url_to_image",
    "vai_tro": "customer",
    "trang_thai": 1
}
```

### Validation Rules

- email: required|email
- password: required|string
- so_dien_thoai: required|string
- ho_ten: required|string
- anh_dai_dien: nullable|string
- vai_tro: required|string
- trang_thai: required|integer

### Success Response

```json
{
    "status": 1,
    "data": {
        "id": 1,
        "email": "user@example.com",
        "password": "hashed_password",
        "so_dien_thoai": "0123456789",
        "ho_ten": "Nguyễn Văn A",
        "anh_dai_dien": "url_to_image",
        "vai_tro": "customer",
        "trang_thai": 1,
        "created_at": "2023-01-01T00:00:00.000000Z",
        "updated_at": "2023-01-01T00:00:00.000000Z"
    },
    "message": "Tạo người dùng thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Validation error"
}
```

### Notes

- Password sẽ được hash tự động

---

## Cập nhật người dùng

### Endpoint

PUT /admin/nguoi-dung/update

### Authentication

Bearer Token

### Request Body

```json
{
    "id": 1,
    "email": "user@example.com",
    "password": "newpassword123",
    "so_dien_thoai": "0123456789",
    "ho_ten": "Nguyễn Văn A",
    "anh_dai_dien": "url_to_image",
    "vai_tro": "customer",
    "trang_thai": 1
}
```

### Validation Rules

- id: required|integer
- email: required|email
- password: required|string
- so_dien_thoai: required|string
- ho_ten: required|string
- anh_dai_dien: nullable|string
- vai_tro: required|string
- trang_thai: required|integer

### Success Response

```json
{
    "status": 1,
    "message": "Cập nhật người dùng thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Không tìm thấy người dùng"
}
```

### Notes

- Cập nhật người dùng theo ID

---

## Xóa người dùng

### Endpoint

DELETE /admin/nguoi-dung/delete/{id}

### Authentication

Bearer Token

### Request Body

Không có

### Validation Rules

Không có

### Success Response

```json
{
    "status": 1,
    "message": "Xóa người dùng thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Không tìm thấy người dùng"
}
```

### Notes

- Xóa người dùng theo ID

---

## Thay đổi trạng thái người dùng

### Endpoint

PATCH /admin/nguoi-dung/change-status

### Authentication

Bearer Token

### Request Body

```json
{
    "id": 1,
    "dang_hoat_dong": 1
}
```

### Validation Rules

- id: required|integer
- dang_hoat_dong: required|integer|in:0,1

### Success Response

```json
{
    "status": 1,
    "message": "Cập nhật trạng thái người dùng thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Không tìm thấy người dùng"
}
```

### Notes

- Thay đổi trạng thái người dùng

## Quản Trị Viên (Administrators)

---

## Lấy danh sách quản trị viên

### Endpoint

GET /admin/quan-tri-vien

### Authentication

Bearer Token

### Request Body

Không có

### Validation Rules

Không có

### Success Response

```json
{
    "status": 1,
    "data": [
        {
            "id": 1,
            "id_nguoi_dung": 1,
            "phong_ban": "IT",
            "created_at": "2023-01-01T00:00:00.000000Z",
            "updated_at": "2023-01-01T00:00:00.000000Z"
        }
    ]
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Lỗi server"
}
```

### Notes

- Lấy tất cả quản trị viên

---

## Tạo quản trị viên

### Endpoint

POST /admin/quan-tri-vien/create

### Authentication

Bearer Token

### Request Body

```json
{
    "id_nguoi_dung": 1,
    "phong_ban": "IT"
}
```

### Validation Rules

- id_nguoi_dung: required|integer
- phong_ban: required|string

### Success Response

```json
{
    "status": 1,
    "data": {
        "id": 1,
        "id_nguoi_dung": 1,
        "phong_ban": "IT",
        "created_at": "2023-01-01T00:00:00.000000Z",
        "updated_at": "2023-01-01T00:00:00.000000Z"
    },
    "message": "Tạo quản trị viên thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Validation error"
}
```

### Notes

- Tạo quản trị viên

---

## Cập nhật quản trị viên

### Endpoint

PUT /admin/quan-tri-vien/update

### Authentication

Bearer Token

### Request Body

```json
{
    "id": 1,
    "id_nguoi_dung": 1,
    "phong_ban": "IT"
}
```

### Validation Rules

- id: required|integer
- id_nguoi_dung: required|integer
- phong_ban: required|string

### Success Response

```json
{
    "status": 1,
    "message": "Cập nhật quản trị viên thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Không tìm thấy quản trị viên"
}
```

### Notes

- Cập nhật quản trị viên theo ID

---

## Xóa quản trị viên

### Endpoint

DELETE /admin/quan-tri-vien/delete/{id}

### Authentication

Bearer Token

### Request Body

Không có

### Validation Rules

Không có

### Success Response

```json
{
    "status": 1,
    "message": "Xóa quản trị viên thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Không tìm thấy quản trị viên"
}
```

### Notes

- Xóa quản trị viên theo ID

## Phiên Chat AI (AI Chat Sessions)

---

## Lấy danh sách phiên chat

### Endpoint

GET /admin/phien-chat-ai

### Authentication

Bearer Token

### Request Body

Không có

### Validation Rules

Không có

### Success Response

```json
{
    "status": 1,
    "data": [
        {
            "id": 1,
            "id_nguoi_dung": 1,
            "token_phien": "token123",
            "chu_de": "Đặt đồ ăn",
            "bat_dau_luc": "2023-01-01 10:00:00",
            "ket_thuc_luc": null,
            "dang_hoat_dong": true,
            "created_at": "2023-01-01T00:00:00.000000Z",
            "updated_at": "2023-01-01T00:00:00.000000Z"
        }
    ]
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Lỗi server"
}
```

### Notes

- Lấy tất cả phiên chat AI

---

## Tạo phiên chat

### Endpoint

POST /admin/phien-chat-ai/create

### Authentication

Bearer Token

### Request Body

```json
{
    "id_nguoi_dung": 1,
    "token_phien": "token123",
    "chu_de": "Đặt đồ ăn",
    "bat_dau_luc": "2023-01-01 10:00:00",
    "ket_thuc_luc": null,
    "dang_hoat_dong": true
}
```

### Validation Rules

- id_nguoi_dung: required|integer
- token_phien: required|string
- chu_de: nullable|string
- bat_dau_luc: required|date
- ket_thuc_luc: nullable|date
- dang_hoat_dong: boolean

### Success Response

```json
{
    "status": 1,
    "data": {
        "id": 1,
        "id_nguoi_dung": 1,
        "token_phien": "token123",
        "chu_de": "Đặt đồ ăn",
        "bat_dau_luc": "2023-01-01 10:00:00",
        "ket_thuc_luc": null,
        "dang_hoat_dong": true,
        "created_at": "2023-01-01T00:00:00.000000Z",
        "updated_at": "2023-01-01T00:00:00.000000Z"
    },
    "message": "Tạo phiên chat thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Validation error"
}
```

### Notes

- dang_hoat_dong mặc định true

---

## Cập nhật phiên chat

### Endpoint

PUT /admin/phien-chat-ai/update

### Authentication

Bearer Token

### Request Body

```json
{
    "id": 1,
    "id_nguoi_dung": 1,
    "token_phien": "token123",
    "chu_de": "Đặt đồ ăn",
    "bat_dau_luc": "2023-01-01 10:00:00",
    "ket_thuc_luc": null,
    "dang_hoat_dong": true
}
```

### Validation Rules

- id: required|integer
- id_nguoi_dung: required|integer
- token_phien: required|string
- chu_de: nullable|string
- bat_dau_luc: required|date
- ket_thuc_luc: nullable|date
- dang_hoat_dong: boolean

### Success Response

```json
{
    "status": 1,
    "message": "Cập nhật phiên chat thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Không tìm thấy phiên chat"
}
```

### Notes

- Cập nhật phiên chat theo ID

---

## Xóa phiên chat

### Endpoint

DELETE /admin/phien-chat-ai/delete/{id}

### Authentication

Bearer Token

### Request Body

Không có

### Validation Rules

Không có

### Success Response

```json
{
    "status": 1,
    "message": "Xóa phiên chat thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Không tìm thấy phiên chat"
}
```

### Notes

- Xóa phiên chat theo ID

---

## Thay đổi trạng thái phiên chat

### Endpoint

PATCH /admin/phien-chat-ai/change-status

### Authentication

Bearer Token

### Request Body

```json
{
    "id": 1,
    "dang_hoat_dong": true
}
```

### Validation Rules

- id: required|integer
- dang_hoat_dong: required|boolean

### Success Response

```json
{
    "status": 1,
    "message": "Cập nhật trạng thái phiên chat thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Không tìm thấy phiên chat"
}
```

### Notes

- Thay đổi trạng thái phiên chat

## Tin Nhắn AI (AI Messages)

---

## Lấy danh sách tin nhắn

### Endpoint

GET /admin/tin-nhanai

### Authentication

Bearer Token

### Request Body

Không có

### Validation Rules

Không có

### Success Response

```json
{
    "status": 1,
    "data": [
        {
            "id": 1,
            "id_phien": 1,
            "vai_tro": "user",
            "noi_dung": "Tôi muốn đặt phở",
            "so_token_dung": 10,
            "id_mon_an_goi_y": 1,
            "id_coupon_goi_y": null,
            "created_at": "2023-01-01T00:00:00.000000Z",
            "updated_at": "2023-01-01T00:00:00.000000Z"
        }
    ]
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Lỗi server"
}
```

### Notes

- Lấy tất cả tin nhắn AI

---

## Tạo tin nhắn

### Endpoint

POST /admin/tin-nhanai/create

### Authentication

Bearer Token

### Request Body

```json
{
    "id_phien": 1,
    "vai_tro": "user",
    "noi_dung": "Tôi muốn đặt phở",
    "so_token_dung": 10,
    "id_mon_an_goi_y": 1,
    "id_coupon_goi_y": null
}
```

### Validation Rules

- id_phien: required|integer
- vai_tro: required|string
- noi_dung: required|string
- so_token_dung: integer
- id_mon_an_goi_y: nullable|integer
- id_coupon_goi_y: nullable|integer

### Success Response

```json
{
    "status": 1,
    "data": {
        "id": 1,
        "id_phien": 1,
        "vai_tro": "user",
        "noi_dung": "Tôi muốn đặt phở",
        "so_token_dung": 10,
        "id_mon_an_goi_y": 1,
        "id_coupon_goi_y": null,
        "created_at": "2023-01-01T00:00:00.000000Z",
        "updated_at": "2023-01-01T00:00:00.000000Z"
    },
    "message": "Tạo tin nhắn thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Validation error"
}
```

### Notes

- so_token_dung mặc định 0

---

## Cập nhật tin nhắn

### Endpoint

PUT /admin/tin-nhanai/update

### Authentication

Bearer Token

### Request Body

```json
{
    "id": 1,
    "id_phien": 1,
    "vai_tro": "user",
    "noi_dung": "Tôi muốn đặt phở",
    "so_token_dung": 10,
    "id_mon_an_goi_y": 1,
    "id_coupon_goi_y": null
}
```

### Validation Rules

- id: required|integer
- id_phien: required|integer
- vai_tro: required|string
- noi_dung: required|string
- so_token_dung: integer
- id_mon_an_goi_y: nullable|integer
- id_coupon_goi_y: nullable|integer

### Success Response

```json
{
    "status": 1,
    "message": "Cập nhật tin nhắn thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Không tìm thấy tin nhắn"
}
```

### Notes

- Cập nhật tin nhắn theo ID

---

## Xóa tin nhắn

### Endpoint

DELETE /admin/tin-nhanai/delete/{id}

### Authentication

Bearer Token

### Request Body

Không có

### Validation Rules

Không có

### Success Response

```json
{
    "status": 1,
    "message": "Xóa tin nhắn thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Không tìm thấy tin nhắn"
}
```

### Notes

- Xóa tin nhắn theo ID

## Thông Báo (Notifications)

---

## Lấy danh sách thông báo

### Endpoint

GET /admin/thong-bao

### Authentication

Bearer Token

### Request Body

Không có

### Validation Rules

Không có

### Success Response

```json
{
    "status": 1,
    "data": [
        {
            "id": 1,
            "id_nguoi_dung": 1,
            "loai": "order",
            "tieu_de": "Đơn hàng mới",
            "noi_dung": "Bạn có đơn hàng mới",
            "loai_tham_chieu": "order",
            "id_tham_chieu": 1,
            "da_doc": false,
            "fcm_token": "token123",
            "created_at": "2023-01-01T00:00:00.000000Z",
            "updated_at": "2023-01-01T00:00:00.000000Z"
        }
    ]
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Lỗi server"
}
```

### Notes

- Lấy tất cả thông báo

---

## Tạo thông báo

### Endpoint

POST /admin/thong-bao/create

### Authentication

Bearer Token

### Request Body

```json
{
    "id_nguoi_dung": 1,
    "loai": "order",
    "tieu_de": "Đơn hàng mới",
    "noi_dung": "Bạn có đơn hàng mới",
    "loai_tham_chieu": "order",
    "id_tham_chieu": 1,
    "da_doc": false,
    "fcm_token": "token123"
}
```

### Validation Rules

- id_nguoi_dung: required|integer
- loai: required|string
- tieu_de: required|string
- noi_dung: required|string
- loai_tham_chieu: nullable|string
- id_tham_chieu: nullable|integer
- da_doc: boolean
- fcm_token: nullable|string

### Success Response

```json
{
    "status": 1,
    "data": {
        "id": 1,
        "id_nguoi_dung": 1,
        "loai": "order",
        "tieu_de": "Đơn hàng mới",
        "noi_dung": "Bạn có đơn hàng mới",
        "loai_tham_chieu": "order",
        "id_tham_chieu": 1,
        "da_doc": false,
        "fcm_token": "token123",
        "created_at": "2023-01-01T00:00:00.000000Z",
        "updated_at": "2023-01-01T00:00:00.000000Z"
    },
    "message": "Tạo thông báo thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Validation error"
}
```

### Notes

- da_doc mặc định false

---

## Cập nhật thông báo

### Endpoint

PUT /admin/thong-bao/update

### Authentication

Bearer Token

### Request Body

```json
{
    "id": 1,
    "id_nguoi_dung": 1,
    "loai": "order",
    "tieu_de": "Đơn hàng mới",
    "noi_dung": "Bạn có đơn hàng mới",
    "loai_tham_chieu": "order",
    "id_tham_chieu": 1,
    "da_doc": false,
    "fcm_token": "token123"
}
```

### Validation Rules

- id: required|integer
- id_nguoi_dung: required|integer
- loai: required|string
- tieu_de: required|string
- noi_dung: required|string
- loai_tham_chieu: nullable|string
- id_tham_chieu: nullable|integer
- da_doc: boolean
- fcm_token: nullable|string

### Success Response

```json
{
    "status": 1,
    "message": "Cập nhật thông báo thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Không tìm thấy thông báo"
}
```

### Notes

- Cập nhật thông báo theo ID

---

## Xóa thông báo

### Endpoint

DELETE /admin/thong-bao/delete/{id}

### Authentication

Bearer Token

### Request Body

Không có

### Validation Rules

Không có

### Success Response

```json
{
    "status": 1,
    "message": "Xóa thông báo thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Không tìm thấy thông báo"
}
```

### Notes

- Xóa thông báo theo ID

---

## Thay đổi trạng thái thông báo

### Endpoint

PATCH /admin/thong-bao/change-status

### Authentication

Bearer Token

### Request Body

```json
{
    "id": 1,
    "da_doc": true
}
```

### Validation Rules

- id: required|integer
- da_doc: required|boolean

### Success Response

```json
{
    "status": 1,
    "message": "Cập nhật trạng thái thông báo thành công"
}
```

### Error Response

```json
{
    "status": 0,
    "message": "Không tìm thấy thông báo"
}
```

### Notes

- Thay đổi trạng thái thông báo
