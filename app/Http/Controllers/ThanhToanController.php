<?php

namespace App\Http\Controllers;

use App\Http\Requests\ThanhToanRequest;
use App\Http\Requests\ThanhToanUpdateRequest;
use App\Models\ThanhToan;
use Illuminate\Http\Request;

class ThanhToanController extends Controller
{
    public function getThanhToan()
    {
        $thanhToan = ThanhToan::all();
        return response()->json(['status' => 1, 'data' => $thanhToan], 200);
    }

    public function postThanhToan(ThanhToanRequest $request)
    {
        $thanhToan = ThanhToan::create([
            'id_don_hang'           => $request->id_don_hang,
            'phuong_thuc'           => $request->phuong_thuc,
            'so_tien'               => $request->so_tien,
            'ma_giao_dich'          => $request->ma_giao_dich,
            'trang_thai'            => $request->trang_thai ?? 0,
            'thoi_gian_thanh_toan'  => $request->thoi_gian_thanh_toan,
            'phan_hoi_cong'         => $request->phan_hoi_cong,
        ]);
        return response()->json(['status' => 1, 'data' => $thanhToan, 'message' => 'Tạo thanh toán thành công'], 200);
    }

    public function putThanhToan(ThanhToanUpdateRequest $request)
    {
        ThanhToan::where('id', $request->id)->update([
            'id_don_hang'           => $request->id_don_hang,
            'phuong_thuc'           => $request->phuong_thuc,
            'so_tien'               => $request->so_tien,
            'ma_giao_dich'          => $request->ma_giao_dich,
            'trang_thai'            => $request->trang_thai,
            'thoi_gian_thanh_toan'  => $request->thoi_gian_thanh_toan,
            'phan_hoi_cong'         => $request->phan_hoi_cong,
        ]);
        return response()->json(['status' => 1, 'message' => 'Cập nhật thanh toán thành công'], 200);
    }

    public function deleteThanhToan($id)
    {
        $thanhToan = ThanhToan::find($id);
        if (!$thanhToan) return response()->json(['status' => 0, 'message' => 'Không tìm thấy thanh toán'], 404);
        $thanhToan->delete();
        return response()->json(['status' => 1, 'message' => 'Xóa thanh toán thành công'], 200);
    }

    public function changesStatus(Request $request)
    {
        $thanhToan = ThanhToan::find($request->id);
        if (!$thanhToan) return response()->json(['status' => 0, 'message' => 'Không tìm thấy thanh toán'], 404);
        $thanhToan->trang_thai = $request->trang_thai;
        $thanhToan->save();
        return response()->json(['status' => 1, 'message' => 'Cập nhật trạng thái thanh toán thành công'], 200);
    }
}
