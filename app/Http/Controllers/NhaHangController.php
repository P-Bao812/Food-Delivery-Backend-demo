<?php

namespace App\Http\Controllers;

use App\Http\Requests\NhaHangRequest;
use App\Http\Requests\NhaHangUpdateRequest;
use App\Models\NhaHang;
use Illuminate\Http\Request;

class NhaHangController extends Controller
{
    public function getNhaHang()
    {
        $nhaHang = NhaHang::all();
        return response()->json(['status' => 1, 'data' => $nhaHang], 200);
    }

    public function postNhaHang(NhaHangRequest $request)
    {
        $nhaHang = NhaHang::create([
            'id_nguoi_dung'     => $request->id_nguoi_dung,
            'ten_nha_hang'      => $request->ten_nha_hang,
            'mo_ta'             => $request->mo_ta,
            'dia_chi'           => $request->dia_chi,
            'vi_do'             => $request->vi_do,
            'kinh_do'           => $request->kinh_do,
            'so_dien_thoai'     => $request->so_dien_thoai,
            'gio_mo_cua'        => $request->gio_mo_cua,
            'gio_dong_cua'      => $request->gio_dong_cua,
            'diem_danh_gia_tb'  => $request->diem_danh_gia_tb ?? 0,
            'dang_mo_cua'       => $request->dang_mo_cua ?? true,
            'ty_le_hoan_hang'   => $request->ty_le_hoan_hang ?? 0,
        ]);
        return response()->json(['status' => 1, 'data' => $nhaHang, 'message' => 'Tạo nhà hàng thành công'], 200);
    }

    public function putNhaHang(NhaHangUpdateRequest $request)
    {
        NhaHang::where('id', $request->id)->update([
            'id_nguoi_dung'     => $request->id_nguoi_dung,
            'ten_nha_hang'      => $request->ten_nha_hang,
            'mo_ta'             => $request->mo_ta,
            'dia_chi'           => $request->dia_chi,
            'vi_do'             => $request->vi_do,
            'kinh_do'           => $request->kinh_do,
            'so_dien_thoai'     => $request->so_dien_thoai,
            'gio_mo_cua'        => $request->gio_mo_cua,
            'gio_dong_cua'      => $request->gio_dong_cua,
            'diem_danh_gia_tb'  => $request->diem_danh_gia_tb,
            'dang_mo_cua'       => $request->dang_mo_cua,
            'ty_le_hoan_hang'   => $request->ty_le_hoan_hang,
        ]);
        return response()->json(['status' => 1, 'message' => 'Cập nhật nhà hàng thành công'], 200);
    }

    public function deleteNhaHang($id)
    {
        $nhaHang = NhaHang::find($id);
        if (!$nhaHang) return response()->json(['status' => 0, 'message' => 'Không tìm thấy nhà hàng'], 404);
        $nhaHang->delete();
        return response()->json(['status' => 1, 'message' => 'Xóa nhà hàng thành công'], 200);
    }
}
