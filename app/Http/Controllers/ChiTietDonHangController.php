<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChiTietDonHangRequest;
use App\Http\Requests\ChiTietDonHangUpdateRequest;
use App\Models\ChiTietDonHang;
use Illuminate\Http\Request;

class ChiTietDonHangController extends Controller
{
    public function getChiTietDonHang()
    {
        $chiTiet = ChiTietDonHang::all();
        return response()->json(['status' => 1, 'data' => $chiTiet], 200);
    }

    public function postChiTietDonHang(ChiTietDonHangRequest $request)
    {
        $chiTiet = ChiTietDonHang::create([
            'id_don_hang'           => $request->id_don_hang,
            'id_mon_an'             => $request->id_mon_an,
            'ten_mon_an_luu_tru'    => $request->ten_mon_an_luu_tru,
            'gia_luu_tru'           => $request->gia_luu_tru,
            'so_luong'              => $request->so_luong,
            'ghi_chu'               => $request->ghi_chu,
            'thanh_tien'            => $request->thanh_tien,
        ]);
        return response()->json(['status' => 1, 'data' => $chiTiet, 'message' => 'Tạo chi tiết đơn hàng thành công'], 200);
    }

    public function putChiTietDonHang(ChiTietDonHangUpdateRequest $request)
    {
        ChiTietDonHang::where('id', $request->id)->update([
            'id_don_hang'           => $request->id_don_hang,
            'id_mon_an'             => $request->id_mon_an,
            'ten_mon_an_luu_tru'    => $request->ten_mon_an_luu_tru,
            'gia_luu_tru'           => $request->gia_luu_tru,
            'so_luong'              => $request->so_luong,
            'ghi_chu'               => $request->ghi_chu,
            'thanh_tien'            => $request->thanh_tien,
        ]);
        return response()->json(['status' => 1, 'message' => 'Cập nhật chi tiết đơn hàng thành công'], 200);
    }

    public function deleteChiTietDonHang($id)
    {
        $chiTiet = ChiTietDonHang::find($id);
        if (!$chiTiet) return response()->json(['status' => 0, 'message' => 'Không tìm thấy chi tiết'], 404);
        $chiTiet->delete();
        return response()->json(['status' => 1, 'message' => 'Xóa chi tiết thành công'], 200);
    }
}
