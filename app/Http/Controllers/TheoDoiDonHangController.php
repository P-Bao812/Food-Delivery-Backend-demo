<?php

namespace App\Http\Controllers;

use App\Http\Requests\TheoDoiDonHangRequest;
use App\Http\Requests\TheoDoiDonHangUpdateRequest;
use App\Models\TheoDoiDonHang;
use Illuminate\Http\Request;

class TheoDoiDonHangController extends Controller
{
    public function getTheoDoiDonHang()
    {
        $theoDoiDonHang = TheoDoiDonHang::all();
        return response()->json(['status' => 1, 'data' => $theoDoiDonHang], 200);
    }

    public function postTheoDoiDonHang(TheoDoiDonHangRequest $request)
    {
        $theoDoiDonHang = TheoDoiDonHang::create([
            'id_don_hang'           => $request->id_don_hang,
            'id_shipper'            => $request->id_shipper,
            'trang_thai'            => $request->trang_thai ?? 0,
            'vi_do'                 => $request->vi_do,
            'kinh_do'               => $request->kinh_do,
            'ghi_chu'               => $request->ghi_chu,
            'thoi_diem'             => $request->thoi_diem,
            'khoan_cach_den_khach'  => $request->khoan_cach_den_khach,
        ]);
        return response()->json(['status' => 1, 'data' => $theoDoiDonHang, 'message' => 'Tạo theo dõi thành công'], 200);
    }

    public function putTheoDoiDonHang(TheoDoiDonHangUpdateRequest $request)
    {
        TheoDoiDonHang::where('id', $request->id)->update([
            'id_don_hang'           => $request->id_don_hang,
            'id_shipper'            => $request->id_shipper,
            'trang_thai'            => $request->trang_thai,
            'vi_do'                 => $request->vi_do,
            'kinh_do'               => $request->kinh_do,
            'ghi_chu'               => $request->ghi_chu,
            'thoi_diem'             => $request->thoi_diem,
            'khoan_cach_den_khach'  => $request->khoan_cach_den_khach,
        ]);
        return response()->json(['status' => 1, 'message' => 'Cập nhật theo dõi thành công'], 200);
    }

    public function deleteTheoDoiDonHang($id)
    {
        $theoDoiDonHang = TheoDoiDonHang::find($id);
        if (!$theoDoiDonHang) return response()->json(['status' => 0, 'message' => 'Không tìm thấy theo dõi'], 404);
        $theoDoiDonHang->delete();
        return response()->json(['status' => 1, 'message' => 'Xóa theo dõi thành công'], 200);
    }

    public function changesStatus(Request $request)
    {
        $theoDoiDonHang = TheoDoiDonHang::find($request->id);
        if (!$theoDoiDonHang) return response()->json(['status' => 0, 'message' => 'Không tìm thấy theo dõi'], 404);
        $theoDoiDonHang->trang_thai = $request->trang_thai;
        $theoDoiDonHang->save();
        return response()->json(['status' => 1, 'message' => 'Cập nhật trạng thái theo dõi thành công'], 200);
    }
}
