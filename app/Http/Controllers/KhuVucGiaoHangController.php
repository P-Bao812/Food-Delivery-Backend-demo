<?php

namespace App\Http\Controllers;

use App\Http\Requests\KhuVucGiaoHangRequest;
use App\Http\Requests\KhuVucGiaoHangUpdateRequest;
use App\Models\KhuVucGiaoHang;
use Illuminate\Http\Request;

class KhuVucGiaoHangController extends Controller
{
    public function getKhuVucGiaoHang()
    {
        $khuVuc = KhuVucGiaoHang::all();
        return response()->json(['status' => 1, 'data' => $khuVuc], 200);
    }

    public function postKhuVucGiaoHang(KhuVucGiaoHangRequest $request)
    {
        $khuVuc = KhuVucGiaoHang::create([
            'id_nha_hang'               => $request->id_nha_hang,
            'ten_khu_vuc'               => $request->ten_khu_vuc,
            'phi_giao_hang'             => $request->phi_giao_hang,
            'khoang_cach_toi_da_km'     => $request->khoang_cach_toi_da_km,
            'thoi_gian_du_kien_phut'    => $request->thoi_gian_du_kien_phut,
            'trang_thai'                => $request->trang_thai ?? 0,
        ]);
        return response()->json(['status' => 1, 'data' => $khuVuc, 'message' => 'Tạo khu vực giao hàng thành công'], 200);
    }

    public function putKhuVucGiaoHang(KhuVucGiaoHangUpdateRequest $request)
    {
        KhuVucGiaoHang::where('id', $request->id)->update([
            'id_nha_hang'               => $request->id_nha_hang,
            'ten_khu_vuc'               => $request->ten_khu_vuc,
            'phi_giao_hang'             => $request->phi_giao_hang,
            'khoang_cach_toi_da_km'     => $request->khoang_cach_toi_da_km,
            'thoi_gian_du_kien_phut'    => $request->thoi_gian_du_kien_phut,
            'trang_thai'                => $request->trang_thai,
        ]);
        return response()->json(['status' => 1, 'message' => 'Cập nhật khu vực giao hàng thành công'], 200);
    }

    public function deleteKhuVucGiaoHang($id)
    {
        $khuVuc = KhuVucGiaoHang::find($id);
        if (!$khuVuc) return response()->json(['status' => 0, 'message' => 'Không tìm thấy khu vực'], 404);
        $khuVuc->delete();
        return response()->json(['status' => 1, 'message' => 'Xóa khu vực thành công'], 200);
    }

    public function changesStatus(Request $request)
    {
        $khuVuc = KhuVucGiaoHang::find($request->id);
        if (!$khuVuc) return response()->json(['status' => 0, 'message' => 'Không tìm thấy khu vực'], 404);
        $khuVuc->trang_thai = $request->trang_thai;
        $khuVuc->save();
        return response()->json(['status' => 1, 'message' => 'Cập nhật trạng thái khu vực thành công'], 200);
    }
}
