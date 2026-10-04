<?php

namespace App\Http\Controllers;

use App\Http\Requests\DanhGiaRequest;
use App\Http\Requests\DanhGiaUpdateRequest;
use App\Models\DanhGia;
use Illuminate\Http\Request;

class DanhGiaController extends Controller
{
    public function getDanhGia()
    {
        $danhGia = DanhGia::all();
        return response()->json([
            'status' => 1,
            'data'   => $danhGia,
        ], 200);
    }

    public function postDanhGia(DanhGiaRequest $request)
    {
        $danhGia = DanhGia::create([
            'id_don_hang'      => $request->id_don_hang,
            'id_khach_hang'    => $request->id_khach_hang,
            'id_nha_hang'      => $request->id_nha_hang,
            'id_shipper'       => $request->id_shipper,
            'diem_do_an'       => $request->diem_do_an,
            'diem_shipper'     => $request->diem_shipper,
            'diem_ung_dung'    => $request->diem_ung_dung,
            'nhan_xet_do_an'   => $request->nhan_xet_do_an,
            'nhan_xet_shipper' => $request->nhan_xet_shipper,
            'anh_danh_gia'     => $request->anh_danh_gia,
            'trang_thai'       => $request->trang_thai ?? 0,
        ]);

        return response()->json([
            'status'  => 1,
            'data'    => $danhGia,
            'message' => 'Tạo đánh giá thành công',
        ], 200);
    }

    public function putDanhGia(DanhGiaUpdateRequest $request)
    {
        DanhGia::where('id', $request->id)->update([
            'id_don_hang'      => $request->id_don_hang,
            'id_khach_hang'    => $request->id_khach_hang,
            'id_nha_hang'      => $request->id_nha_hang,
            'id_shipper'       => $request->id_shipper,
            'diem_do_an'       => $request->diem_do_an,
            'diem_shipper'     => $request->diem_shipper,
            'diem_ung_dung'    => $request->diem_ung_dung,
            'nhan_xet_do_an'   => $request->nhan_xet_do_an,
            'nhan_xet_shipper' => $request->nhan_xet_shipper,
            'anh_danh_gia'     => $request->anh_danh_gia,
            'trang_thai'       => $request->trang_thai ?? 0,
        ]);

        return response()->json([
            'status'  => 1,
            'message' => 'Cập nhật đánh giá thành công',
        ], 200);
    }

    public function deleteDanhGia(Request $request, $id)
    {
        $danhGia = DanhGia::find($id);
        if (!$danhGia) {
            return response()->json([
                'status'  => 0,
                'message' => 'Không tìm thấy đánh giá',
            ], 404);
        }

        $danhGia->delete();
        return response()->json([
            'status'  => 1,
            'message' => 'Xóa đánh giá thành công',
        ], 200);
    }

    public function changesStatus(Request $request)
    {
        $danhGia = DanhGia::find($request->id);
        if (!$danhGia) {
            return response()->json([
                'status'  => 0,
                'message' => 'Không tìm thấy đánh giá',
            ], 404);
        }

        $danhGia->trang_thai = $request->trang_thai;
        $danhGia->save();

        return response()->json([
            'status'  => 1,
            'message' => 'Cập nhật trạng thái thành công',
        ], 200);
    }
}
