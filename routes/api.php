<?php

use App\Http\Controllers\BinhLuanController;
use App\Http\Controllers\ChiTietDonHangController;
use App\Http\Controllers\CouponKhachHangController;
use App\Http\Controllers\DanhGiaController;
use App\Http\Controllers\DanhMucMonAnController;
use App\Http\Controllers\DiaChiKhachHangController;
use App\Http\Controllers\DonHangController;
use App\Http\Controllers\GioHangController;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\KhuVucGiaoHangController;
use App\Http\Controllers\KhuyenMaiController;
use App\Http\Controllers\MaGiamGiaController;
use App\Http\Controllers\MonAnController;
use App\Http\Controllers\NguoiDungController;
use App\Http\Controllers\NhaHangController;
use App\Http\Controllers\PhienChatAiController;
use App\Http\Controllers\QuanTriVienController;
use App\Http\Controllers\ShipperController;
use App\Http\Controllers\ThanhToanController;
use App\Http\Controllers\TheoDoiDonHangController;
use App\Http\Controllers\ThongBaoController;
use App\Http\Controllers\ThuNhapNhaHangController;
use App\Http\Controllers\ThuNhapShipperController;
use App\Http\Controllers\TinNhanaiController;
use App\Http\Controllers\ViTriShipperController;
use App\Models\DonHang;
use App\Models\NguoiDung;
use Illuminate\Support\Facades\Route;

Route::post('/login', [NguoiDungController::class, 'login']);
Route::post('/dang-nhap', [NguoiDungController::class, 'dangKy']);
Route::get('/admin/check-token', [NguoiDungController::class, 'checkToken']);
Route::get('/logout', [NguoiDungController::class, 'logout']);
Route::get('/logout-all', [NguoiDungController::class, 'logoutAll']);
Route::post('/quen-mat-khau', [NguoiDungController::class, 'OTP']);
Route::post('/xac-nhan-otp', [NguoiDungController::class, 'OTPXacNhan']);
Route::post('/doi-mat-khau', [NguoiDungController::class, 'doiMatKhau']);
Route::get('/thanh-toan-auto', [DonHangController::class, 'thanhToanAuto']);

Route::prefix('/admin')->middleware('')->group(function () {
    // Bình Luận
    Route::prefix('/binh-luan')->group(function () {
        Route::get('/', [BinhLuanController::class, 'getBinhLuan']);
        Route::post('/create', [BinhLuanController::class, 'postBinhLuan']);
        Route::put('/update', [BinhLuanController::class, 'putBinhLuan']);
        Route::delete('/delete/{id}', [BinhLuanController::class, 'deleteBinhLuan']);
        Route::patch('/change-status', [BinhLuanController::class, 'changesStatus']);
    });

    // Đánh Giá
    Route::prefix('/danh-gia')->group(function () {
        Route::get('/', [DanhGiaController::class, 'getDanhGia']);
        Route::post('/create', [DanhGiaController::class, 'postDanhGia']);
        Route::put('/update', [DanhGiaController::class, 'putDanhGia']);
        Route::delete('/delete/{id}', [DanhGiaController::class, 'deleteDanhGia']);
        Route::patch('/change-status', [DanhGiaController::class, 'changesStatus']);
    });

    // Khuyến Mãi
    Route::prefix('/khuyen-mai')->group(function () {
        Route::get('/', [KhuyenMaiController::class, 'getKhuyenMai']);
        Route::post('/create', [KhuyenMaiController::class, 'postKhuyenMai']);
        Route::put('/update', [KhuyenMaiController::class, 'putKhuyenMai']);
        Route::delete('/delete/{id}', [KhuyenMaiController::class, 'deleteKhuyenMai']);
        Route::patch('/change-status', [KhuyenMaiController::class, 'changesStatus']);
    });



    // Đơn Hàng
    Route::prefix('/don-hang')->group(function () {
        Route::get('/', [DonHangController::class, 'getDonHang']);
        Route::post('/create', [DonHangController::class, 'postDonHang']);
        Route::put('/update', [DonHangController::class, 'putDonHang']);
        Route::delete('/delete/{id}', [DonHangController::class, 'deleteDonHang']);
        Route::patch('/change-status', [DonHangController::class, 'changesStatus']);
        Route::post('/thanh-toan', [DonHangController::class, 'thanhToan']);
    });

    // Khách Hàng
    Route::prefix('/khach-hang')->group(function () {
        Route::get('/', [KhachHangController::class, 'getKhachHang']);
        Route::post('/create', [KhachHangController::class, 'postKhachHang']);
        Route::put('/update', [KhachHangController::class, 'putKhachHang']);
        Route::delete('/delete/{id}', [KhachHangController::class, 'deleteKhachHang']);
    });



    // Shipper
    

    // Thanh Toán
    Route::prefix('/thanh-toan')->group(function () {
        Route::get('/', [ThanhToanController::class, 'getThanhToan']);
        Route::post('/create', [ThanhToanController::class, 'postThanhToan']);
        Route::put('/update', [ThanhToanController::class, 'putThanhToan']);
        Route::delete('/delete/{id}', [ThanhToanController::class, 'deleteThanhToan']);
        Route::patch('/change-status', [ThanhToanController::class, 'changesStatus']);
    });

    // Theo Dõi Đơn Hàng
    Route::prefix('/theo-doi-don-hang')->group(function () {
        Route::get('/', [TheoDoiDonHangController::class, 'getTheoDoiDonHang']);
        Route::post('/create', [TheoDoiDonHangController::class, 'postTheoDoiDonHang']);
        Route::put('/update', [TheoDoiDonHangController::class, 'putTheoDoiDonHang']);
        Route::delete('/delete/{id}', [TheoDoiDonHangController::class, 'deleteTheoDoiDonHang']);
        Route::patch('/change-status', [TheoDoiDonHangController::class, 'changesStatus']);
    });

    // Vị Trí Shipper
    Route::prefix('/vi-tri-shipper')->group(function () {
        Route::get('/', [ViTriShipperController::class, 'getViTriShipper']);
        Route::post('/create', [ViTriShipperController::class, 'postViTriShipper']);
        Route::put('/update', [ViTriShipperController::class, 'putViTriShipper']);
        Route::delete('/delete/{id}', [ViTriShipperController::class, 'deleteViTriShipper']);
    });

    // Coupon Khách Hàng
    Route::prefix('/coupon-khach-hang')->group(function () {
        Route::get('/', [CouponKhachHangController::class, 'getCouponKhachHang']);
        Route::post('/create', [CouponKhachHangController::class, 'postCouponKhachHang']);
        Route::put('/update', [CouponKhachHangController::class, 'putCouponKhachHang']);
        Route::delete('/delete/{id}', [CouponKhachHangController::class, 'deleteCouponKhachHang']);
    });

    // Mã Giảm Giá
    Route::prefix('/ma-giam-gia')->group(function () {
        Route::get('/', [MaGiamGiaController::class, 'getMaGiamGia']);
        Route::post('/create', [MaGiamGiaController::class, 'postMaGiamGia']);
        Route::put('/update', [MaGiamGiaController::class, 'putMaGiamGia']);
        Route::delete('/delete/{id}', [MaGiamGiaController::class, 'deleteMaGiamGia']);
        Route::patch('/change-status', [MaGiamGiaController::class, 'changesStatus']);
    });

    // Thu Nhập Nhà Hàng
    Route::prefix('/thu-nhap-nha-hang')->group(function () {
        Route::get('/', [ThuNhapNhaHangController::class, 'getThuNhapNhaHang']);
        Route::post('/create', [ThuNhapNhaHangController::class, 'postThuNhapNhaHang']);
        Route::put('/update', [ThuNhapNhaHangController::class, 'putThuNhapNhaHang']);
        Route::delete('/delete/{id}', [ThuNhapNhaHangController::class, 'deleteThuNhapNhaHang']);
        Route::patch('/change-status', [ThuNhapNhaHangController::class, 'changesStatus']);
    });

    // Thu Nhập Shipper
    Route::prefix('/thu-nhap-shipper')->group(function () {
        Route::get('/', [ThuNhapShipperController::class, 'getThuNhapShipper']);
        Route::post('/create', [ThuNhapShipperController::class, 'postThuNhapShipper']);
        Route::put('/update', [ThuNhapShipperController::class, 'putThuNhapShipper']);
        Route::delete('/delete/{id}', [ThuNhapShipperController::class, 'deleteThuNhapShipper']);
        Route::patch('/change-status', [ThuNhapShipperController::class, 'changesStatus']);
    });

    // Chi Tiết Đơn Hàng
    Route::prefix('/chi-tiet-don-hang')->group(function () {
        Route::get('/', [ChiTietDonHangController::class, 'getChiTietDonHang']);
        Route::post('/create', [ChiTietDonHangController::class, 'postChiTietDonHang']);
        Route::put('/update', [ChiTietDonHangController::class, 'putChiTietDonHang']);
        Route::delete('/delete/{id}', [ChiTietDonHangController::class, 'deleteChiTietDonHang']);
    });

    // Khu Vực Giao Hàng
    Route::prefix('/khu-vuc-giao-hang')->group(function () {
        Route::get('/', [KhuVucGiaoHangController::class, 'getKhuVucGiaoHang']);
        Route::post('/create', [KhuVucGiaoHangController::class, 'postKhuVucGiaoHang']);
        Route::put('/update', [KhuVucGiaoHangController::class, 'putKhuVucGiaoHang']);
        Route::delete('/delete/{id}', [KhuVucGiaoHangController::class, 'deleteKhuVucGiaoHang']);
        Route::patch('/change-status', [KhuVucGiaoHangController::class, 'changesStatus']);
    });

    // Danh Mục Món Ăn
    Route::prefix('/danh-muc-mon-an')->group(function () {
        Route::get('/', [DanhMucMonAnController::class, 'getDanhMucMonAn']);
        Route::post('/create', [DanhMucMonAnController::class, 'postDanhMucMonAn']);
        Route::put('/update', [DanhMucMonAnController::class, 'putDanhMucMonAn']);
        Route::delete('/delete/{id}', [DanhMucMonAnController::class, 'deleteDanhMucMonAn']);
        Route::patch('/change-status', [DanhMucMonAnController::class, 'changesStatus']);
    });

    // Địa Chỉ Khách Hàng
    Route::prefix('/dia-chi-khach-hang')->group(function () {
        Route::get('/', [DiaChiKhachHangController::class, 'getDiaChiKhachHang']);
        Route::post('/create', [DiaChiKhachHangController::class, 'postDiaChiKhachHang']);
        Route::put('/update', [DiaChiKhachHangController::class, 'putDiaChiKhachHang']);
        Route::delete('/delete/{id}', [DiaChiKhachHangController::class, 'deleteDiaChiKhachHang']);
    });

    // Người Dùng
    Route::prefix('/nguoi-dung')->group(function () {
        Route::get('/', [NguoiDungController::class, 'getNguoiDung']);
        Route::post('/create', [NguoiDungController::class, 'postNguoiDung']);
        Route::put('/update', [NguoiDungController::class, 'putNguoiDung']);
        Route::delete('/delete/{id}', [NguoiDungController::class, 'deleteNguoiDung']);
        Route::patch('/change-status', [NguoiDungController::class, 'changesStatus']);
    });

    // Quản Trị Viên
    Route::prefix('/quan-tri-vien')->group(function () {
        Route::get('/', [QuanTriVienController::class, 'getQuanTriVien']);
        Route::post('/create', [QuanTriVienController::class, 'postQuanTriVien']);
        Route::put('/update', [QuanTriVienController::class, 'putQuanTriVien']);
        Route::delete('/delete/{id}', [QuanTriVienController::class, 'deleteQuanTriVien']);
    });

    // Phiên Chat AI
    Route::prefix('/phien-chat-ai')->group(function () {
        Route::get('/', [PhienChatAiController::class, 'getPhienChatAi']);
        Route::post('/create', [PhienChatAiController::class, 'postPhienChatAi']);
        Route::put('/update', [PhienChatAiController::class, 'putPhienChatAi']);
        Route::delete('/delete/{id}', [PhienChatAiController::class, 'deletePhienChatAi']);
        Route::patch('/change-status', [PhienChatAiController::class, 'changesStatus']);
    });

    // Tin Nhắn AI
    Route::prefix('/tin-nhanai')->group(function () {
        Route::get('/', [TinNhanaiController::class, 'getTinNhanai']);
        Route::post('/create', [TinNhanaiController::class, 'postTinNhanai']);
        Route::put('/update', [TinNhanaiController::class, 'putTinNhanai']);
        Route::delete('/delete/{id}', [TinNhanaiController::class, 'deleteTinNhanai']);
    });

    // Thông Báo
    Route::prefix('/thong-bao')->group(function () {
        Route::get('/', [ThongBaoController::class, 'getThongBao']);
        Route::post('/create', [ThongBaoController::class, 'postThongBao']);
        Route::put('/update', [ThongBaoController::class, 'putThongBao']);
        Route::delete('/delete/{id}', [ThongBaoController::class, 'deleteThongBao']);
        Route::patch('/change-status', [ThongBaoController::class, 'changesStatus']);
    });
    //Gio hàng
    Route::prefix('/gio-hang')->group(function () {
        Route::get('/', [GioHangController::class, 'getGioHang']);
        Route::post('/create', [GioHangController::class, 'postGioHang']);
        Route::put('/update', [GioHangController::class, 'putGioHang']);
        Route::delete('/delete/{id}', [GioHangController::class, 'deleteGioHang']);
    });
});
