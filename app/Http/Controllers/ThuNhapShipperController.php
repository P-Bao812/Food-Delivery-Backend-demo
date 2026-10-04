<?php

namespace App\Http\Controllers;

use App\Http\Requests\ThuNhapShipperRequest;
use App\Http\Requests\ThuNhapShipperUpdateRequest;
use App\Models\ThuNhapShipper;
use Illuminate\Http\Request;

class ThuNhapShipperController extends Controller
{
    public function getThuNhapShipper()
    {
        $thuNhap = ThuNhapShipper::all();
        return response()->json(['status' => 1, 'data' => $thuNhap], 200);
    }

    public function postThuNhapShipper(ThuNhapShipperRequest $request)
    {
        $thuNhap = ThuNhapShipper::create([
            'id_shipper'    => $request->id_shipper,
            'id_don_hang'   => $request->id_don_hang,
            'phi_giao_hang' => $request->phi_giao_hang,
            'tien_tip'      => $request->tien_tip,
            'tien_thuong'   => $request->tien_thuong,
            'tong_thu_nhap' => $request->tong_thu_nhap,
            'trang_thai'    => $request->trang_thai ?? 0,
            'ngay_tao'      => $request->ngay_tao,
        ]);
        return response()->json(['status' => 1, 'data' => $thuNhap, 'message' => 'Tạo thu nhập shipper thành công'], 200);
    }

    public function putThuNhapShipper(ThuNhapShipperUpdateRequest $request)
    {
        ThuNhapShipper::where('id', $request->id)->update([
            'id_shipper'    => $request->id_shipper,
            'id_don_hang'   => $request->id_don_hang,
            'phi_giao_hang' => $request->phi_giao_hang,
            'tien_tip'      => $request->tien_tip,
            'tien_thuong'   => $request->tien_thuong,
            'tong_thu_nhap' => $request->tong_thu_nhap,
            'trang_thai'    => $request->trang_thai,
            'ngay_tao'      => $request->ngay_tao,
        ]);
        return response()->json(['status' => 1, 'message' => 'Cập nhật thu nhập shipper thành công'], 200);
    }

    public function deleteThuNhapShipper($id)
    {
        $thuNhap = ThuNhapShipper::find($id);
        if (!$thuNhap) return response()->json(['status' => 0, 'message' => 'Không tìm thấy thu nhập'], 404);
        $thuNhap->delete();
        return response()->json(['status' => 1, 'message' => 'Xóa thu nhập thành công'], 200);
    }

    public function changesStatus(Request $request)
    {
        $thuNhap = ThuNhapShipper::find($request->id);
        if (!$thuNhap) return response()->json(['status' => 0, 'message' => 'Không tìm thấy thu nhập'], 404);
        $thuNhap->trang_thai = $request->trang_thai;
        $thuNhap->save();
        return response()->json(['status' => 1, 'message' => 'Cập nhật trạng thái thu nhập thành công'], 200);
    }
}
