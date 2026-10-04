<?php

namespace App\Http\Controllers;

use App\Http\Requests\KhuyenMaiRequest;
use App\Http\Requests\KhuyenMaiUpdateRequest;
use App\Models\KhuyenMai;
use Illuminate\Http\Request;

class KhuyenMaiController extends Controller
{
    public function getKhuyenMai()
    {
        $khuyenMai = KhuyenMai::all();
        return response()->json([
            'status' => 1,
            'data'   => $khuyenMai,
        ], 200);
    }

    public function postKhuyenMai(KhuyenMaiRequest $request)
    {
        $khuyenMai = KhuyenMai::create([
            'id_nha_hang'          => $request->id_nha_hang,
            'ten_khuyen_mai'       => $request->ten_khuyen_mai,
            'mo_ta'                => $request->mo_ta,
            'kieu_giam'           => $request->kieu_giam ?? 0,
            'so_tien_giam'        => $request->so_tien_giam,
            'dieu_kien_toi_thieu' => $request->dieu_kien_toi_thieu,
            'ngay_bat_dau'        => $request->ngay_bat_dau,
            'ngay_ket_thuc'       => $request->ngay_ket_thuc,
            'trang_thai'          => $request->trang_thai ?? 0,
        ]);

        return response()->json([
            'status'  => 1,
            'data'    => $khuyenMai,
            'message' => 'Tạo khuyến mãi thành công',
        ], 200);
    }

    public function putKhuyenMai(KhuyenMaiUpdateRequest $request)
    {
        KhuyenMai::where('id', $request->id)->update([
            'id_nha_hang'          => $request->id_nha_hang,
            'ten_khuyen_mai'       => $request->ten_khuyen_mai,
            'mo_ta'                => $request->mo_ta,
            'kieu_giam'           => $request->kieu_giam ?? 0,
            'so_tien_giam'        => $request->so_tien_giam,
            'dieu_kien_toi_thieu' => $request->dieu_kien_toi_thieu,
            'ngay_bat_dau'        => $request->ngay_bat_dau,
            'ngay_ket_thuc'       => $request->ngay_ket_thuc,
            'trang_thai'          => $request->trang_thai ?? 0,
        ]);

        return response()->json([
            'status'  => 1,
            'message' => 'Cập nhật khuyến mãi thành công',
        ], 200);
    }

    public function deleteKhuyenMai(Request $request, $id)
    {
        $khuyenMai = KhuyenMai::find($id);
        if (!$khuyenMai) {
            return response()->json([
                'status'  => 0,
                'message' => 'Không tìm thấy khuyến mãi',
            ], 404);
        }

        $khuyenMai->delete();
        return response()->json([
            'status'  => 1,
            'message' => 'Xóa khuyến mãi thành công',
        ], 200);
    }

    public function changesStatus(Request $request)
    {
        $khuyenMai = KhuyenMai::find($request->id);
        if (!$khuyenMai) {
            return response()->json([
                'status'  => 0,
                'message' => 'Không tìm thấy khuyến mãi',
            ], 404);
        }

        $khuyenMai->trang_thai = $request->trang_thai;
        $khuyenMai->save();

        return response()->json([
            'status'  => 1,
            'message' => 'Cập nhật trạng thái thành công',
        ], 200);
    }
}
