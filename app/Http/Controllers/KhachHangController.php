<?php

namespace App\Http\Controllers;

use App\Http\Requests\KhachHangRequest;
use App\Http\Requests\KhachHangUpdateRequest;
use App\Models\KhachHang;
use Illuminate\Http\Request;

class KhachHangController extends Controller
{
    public function getKhachHang()
    {
        $khachHang = KhachHang::all();
        return response()->json([
            'status' => 1,
            'data'   => $khachHang
        ], 200);
    }

    public function postKhachHang(KhachHangRequest $request)
    {
        $khachHang = KhachHang::create([
            'id_nguoi_dung'         => $request->id_nguoi_dung,
            'ngay_sinh'             => $request->ngay_sinh,
            'diem_tich_luy'         => $request->diem_tich_luy ?? 0,
            'id_dia_chi_mac_dinh'   => $request->id_dia_chi_mac_dinh,
        ]);
        return response()->json([
            'status'  => 1,
            'data'    => $khachHang,
            'message' => 'Tạo khách hàng thành công'
        ], 200);
    }

    public function putKhachHang(KhachHangUpdateRequest $request)
    {
        $khachHang = KhachHang::where('id', $request->id)
            ->update([
                'id_nguoi_dung'         => $request->id_nguoi_dung,
                'ngay_sinh'             => $request->ngay_sinh,
                'diem_tich_luy'         => $request->diem_tich_luy,
                'id_dia_chi_mac_dinh'   => $request->id_dia_chi_mac_dinh,
            ]);
        return response()->json([
            'status'  => 1,
            'data'    => $khachHang,
            'message' => 'Cập nhật khách hàng thành công'
        ], 200);
    }

    public function deleteKhachHang(Request $request, $id)
    {
        $khachHang = KhachHang::find($id);
        if (!$khachHang) {
            return response()->json([
                'status'  => 0,
                'message' => 'Không tìm thấy khách hàng'
            ], 404);
        }
        $khachHang->delete();
        return response()->json([
            'status'  => 1,
            'message' => 'Xóa khách hàng thành công'
        ], 200);
    }
}
