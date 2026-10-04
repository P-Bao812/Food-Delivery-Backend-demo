<?php

namespace App\Http\Controllers;

use App\Http\Requests\DiaChiKhachHangRequest;
use App\Http\Requests\DiaChiKhachHangUpdateRequest;
use App\Models\DiaChiKhachHang;
use Illuminate\Http\Request;

class DiaChiKhachHangController extends Controller
{
    public function getDiaChiKhachHang()
    {
        $diaChi = DiaChiKhachHang::all();
        return response()->json(['status' => 1, 'data' => $diaChi], 200);
    }

    public function postDiaChiKhachHang(DiaChiKhachHangRequest $request)
    {
        $diaChi = DiaChiKhachHang::create([
            'id_khach_hang'     => $request->id_khach_hang,
            'ten_dia_chi'       => $request->ten_dia_chi,
            'dia_chi'           => $request->dia_chi,
            'vi_do'             => $request->vi_do,
            'kinh_do'           => $request->kinh_do,
            'so_dien_thoai'     => $request->so_dien_thoai,
        ]);
        return response()->json(['status' => 1, 'data' => $diaChi, 'message' => 'Tạo địa chỉ thành công'], 200);
    }

    public function putDiaChiKhachHang(DiaChiKhachHangUpdateRequest $request)
    {
        DiaChiKhachHang::where('id', $request->id)->update([
            'id_khach_hang'     => $request->id_khach_hang,
            'ten_dia_chi'       => $request->ten_dia_chi,
            'dia_chi'           => $request->dia_chi,
            'vi_do'             => $request->vi_do,
            'kinh_do'           => $request->kinh_do,
            'so_dien_thoai'     => $request->so_dien_thoai,
        ]);
        return response()->json(['status' => 1, 'message' => 'Cập nhật địa chỉ thành công'], 200);
    }

    public function deleteDiaChiKhachHang($id)
    {
        $diaChi = DiaChiKhachHang::find($id);
        if (!$diaChi) {
            return response()->json([
                'status' => 0,
                'message' => 'Không tìm thấy địa chỉ'
            ], 404);
        }
        $diaChi->delete();
        return response()->json([
            'status' => 1,
            'message' => 'Xóa địa chỉ thành công'
        ], 200);
    }
}
