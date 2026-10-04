<?php

namespace App\Http\Controllers;

use App\Http\Requests\ThuNhapNhaHangRequest;
use App\Http\Requests\ThuNhapNhaHangUpdateRequest;
use App\Models\ThuNhapNhaHang;
use Illuminate\Http\Request;

class ThuNhapNhaHangController extends Controller
{
    public function getThuNhapNhaHang()
    {
        $thuNhap = ThuNhapNhaHang::all();
        return response()->json(['status' => 1, 'data' => $thuNhap], 200);
    }

    public function postThuNhapNhaHang(ThuNhapNhaHangRequest $request)
    {
        $thuNhap = ThuNhapNhaHang::create([
            'id_nha_hang'       => $request->id_nha_hang,
            'id_don_hang'       => $request->id_don_hang,
            'doanh_thu_gop'     => $request->doanh_thu_gop,
            'phi_hoa_hong'      => $request->phi_hoa_hong,
            'thu_nhap_rong'     => $request->thu_nhap_rong,
            'trang_thai'        => $request->trang_thai ?? 0,
            'ngay_thanh_toan'   => $request->ngay_thanh_toan,
        ]);
        return response()->json(['status' => 1, 'data' => $thuNhap, 'message' => 'Tạo thu nhập nhà hàng thành công'], 200);
    }

    public function putThuNhapNhaHang(ThuNhapNhaHangUpdateRequest $request)
    {
        ThuNhapNhaHang::where('id', $request->id)->update([
            'id_nha_hang'       => $request->id_nha_hang,
            'id_don_hang'       => $request->id_don_hang,
            'doanh_thu_gop'     => $request->doanh_thu_gop,
            'phi_hoa_hong'      => $request->phi_hoa_hong,
            'thu_nhap_rong'     => $request->thu_nhap_rong,
            'trang_thai'        => $request->trang_thai,
            'ngay_thanh_toan'   => $request->ngay_thanh_toan,
        ]);
        return response()->json(['status' => 1, 'message' => 'Cập nhật thu nhập nhà hàng thành công'], 200);
    }

    public function deleteThuNhapNhaHang($id)
    {
        $thuNhap = ThuNhapNhaHang::find($id);
        if (!$thuNhap) return response()->json(['status' => 0, 'message' => 'Không tìm thấy thu nhập'], 404);
        $thuNhap->delete();
        return response()->json(['status' => 1, 'message' => 'Xóa thu nhập thành công'], 200);
    }

    public function changesStatus(Request $request)
    {
        $thuNhap = ThuNhapNhaHang::find($request->id);
        if (!$thuNhap) return response()->json(['status' => 0, 'message' => 'Không tìm thấy thu nhập'], 404);
        $thuNhap->trang_thai = $request->trang_thai;
        $thuNhap->save();
        return response()->json(['status' => 1, 'message' => 'Cập nhật trạng thái thu nhập thành công'], 200);
    }
}
