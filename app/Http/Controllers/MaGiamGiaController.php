<?php

namespace App\Http\Controllers;

use App\Http\Requests\MaGiamGiaRequest;
use App\Http\Requests\MaGiamGiaUpdateRequest;
use App\Models\MaGiamGia;
use Illuminate\Http\Request;

class MaGiamGiaController extends Controller
{
    public function getMaGiamGia()
    {
        $maGiamGia = MaGiamGia::all();
        return response()->json(['status' => 1, 'data' => $maGiamGia], 200);
    }

    public function postMaGiamGia(MaGiamGiaRequest $request)
    {
        $maGiamGia = MaGiamGia::create([
            'id_nha_hang'           => $request->id_nha_hang,
            'ma_code'               => $request->ma_code,
            'mo_ta'                 => $request->mo_ta,
            'loai_giam_gia'         => $request->loai_giam_gia ?? 0,
            'gia_tri_giam'          => $request->gia_tri_giam,
            'gia_tri_don_toi_thieu' => $request->gia_tri_don_toi_thieu,
            'giam_toi_da'           => $request->giam_toi_da,
            'gioi_han_su_dung'      => $request->gioi_han_su_dung,
            'gioi_han_moi_nguoi'    => $request->gioi_han_moi_nguoi,
            'ngay_bat_dau'          => $request->ngay_bat_dau,
            'ngay_ket_thuc'         => $request->ngay_ket_thuc,
            'trang_thai'            => $request->trang_thai ?? 0,
            'da_du_dung'            => $request->da_du_dung ?? 0,
        ]);
        return response()->json(['status' => 1, 'data' => $maGiamGia, 'message' => 'Tạo mã giảm giá thành công'], 200);
    }

    public function putMaGiamGia(MaGiamGiaUpdateRequest $request)
    {
        MaGiamGia::where('id', $request->id)->update([
            'id_nha_hang'           => $request->id_nha_hang,
            'ma_code'               => $request->ma_code,
            'mo_ta'                 => $request->mo_ta,
            'loai_giam_gia'         => $request->loai_giam_gia,
            'gia_tri_giam'          => $request->gia_tri_giam,
            'gia_tri_don_toi_thieu' => $request->gia_tri_don_toi_thieu,
            'giam_toi_da'           => $request->giam_toi_da,
            'gioi_han_su_dung'      => $request->gioi_han_su_dung,
            'gioi_han_moi_nguoi'    => $request->gioi_han_moi_nguoi,
            'ngay_bat_dau'          => $request->ngay_bat_dau,
            'ngay_ket_thuc'         => $request->ngay_ket_thuc,
            'da_du_dung'            => $request->da_du_dung ?? 0,
        ]);
        return response()->json(['status' => 1, 'message' => 'Cập nhật mã giảm giá thành công'], 200);
    }

    public function deleteMaGiamGia($id)
    {
        $maGiamGia = MaGiamGia::find($id);
        if (!$maGiamGia) return response()->json(['status' => 0, 'message' => 'Không tìm thấy mã giảm giá'], 404);
        $maGiamGia->delete();
        return response()->json(['status' => 1, 'message' => 'Xóa mã giảm giá thành công'], 200);
    }

    public function changesStatus(Request $request)
    {
        $maGiamGia = MaGiamGia::find($request->id);
        if (!$maGiamGia) return response()->json(['status' => 0, 'message' => 'Không tìm thấy mã giảm giá'], 404);
        $maGiamGia->trang_thai = $request->trang_thai;
        $maGiamGia->save();
        return response()->json(['status' => 1, 'message' => 'Cập nhật trạng thái mã giảm giá thành công'], 200);
    }
}
