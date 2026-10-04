<?php

namespace App\Http\Controllers;

use App\Http\Requests\CouponKhachHangRequest;
use App\Http\Requests\CouponKhachHangUpdateRequest;
use App\Models\CouponKhachHang;
use Illuminate\Http\Request;

class CouponKhachHangController extends Controller
{
    public function getCouponKhachHang()
    {
        $coupon = CouponKhachHang::all();
        return response()->json(['status' => 1, 'data' => $coupon], 200);
    }

    public function postCouponKhachHang(CouponKhachHangRequest $request)
    {
        $coupon = CouponKhachHang::create([
            'id_khach_hang'     => $request->id_khach_hang,
            'id_coupon'         => $request->id_coupon,
            'so_lan_da_dung'    => $request->so_lan_da_dung ?? 0,
            'lan_cuoi_su_dung'  => $request->lan_cuoi_su_dung,
        ]);
        return response()->json(['status' => 1, 'data' => $coupon, 'message' => 'Tạo coupon khách hàng thành công'], 200);
    }

    public function putCouponKhachHang(CouponKhachHangUpdateRequest $request)
    {
        CouponKhachHang::where('id', $request->id)->update([
            'id_khach_hang'     => $request->id_khach_hang,
            'id_coupon'         => $request->id_coupon,
            'so_lan_da_dung'    => $request->so_lan_da_dung,
            'lan_cuoi_su_dung'  => $request->lan_cuoi_su_dung,
        ]);
        return response()->json(['status' => 1, 'message' => 'Cập nhật coupon khách hàng thành công'], 200);
    }

    public function deleteCouponKhachHang($id)
    {
        $coupon = CouponKhachHang::find($id);
        if (!$coupon) return response()->json(['status' => 0, 'message' => 'Không tìm thấy coupon'], 404);
        $coupon->delete();
        return response()->json(['status' => 1, 'message' => 'Xóa coupon thành công'], 200);
    }
}
