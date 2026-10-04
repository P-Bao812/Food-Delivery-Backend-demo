<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShipperRequest;
use App\Http\Requests\ShipperUpdateRequest;
use App\Models\Shipper;
use Illuminate\Http\Request;

class ShipperController extends Controller
{
    public function getShipper()
    {
        $shipper = Shipper::all();
        return response()->json(['status' => 1, 'data' => $shipper], 200);
    }

    public function postShipper(ShipperRequest $request)
    {
        $shipper = Shipper::create([
            'id_nguoi_dung'         => $request->id_nguoi_dung,
            'bien_so_xe'            => $request->bien_so_xe,
            'loai_xe'               => $request->loai_xe,
            'so_cccd'               => $request->so_cccd,
            'san_sang_nhan_don'     => $request->san_sang_nhan_don ?? false,
            'diem_danh_gia_tb'      => $request->diem_danh_gia_tb ?? 0,
            'trang_thai'            => $request->trang_thai ?? 'cho_duyet',
        ]);
        return response()->json(['status' => 1, 'data' => $shipper, 'message' => 'Tạo shipper thành công'], 200);
    }

    public function putShipper(ShipperUpdateRequest $request)
    {
        Shipper::where('id', $request->id)->update([
            'id_nguoi_dung'         => $request->id_nguoi_dung,
            'bien_so_xe'            => $request->bien_so_xe,
            'loai_xe'               => $request->loai_xe,
            'so_cccd'               => $request->so_cccd,
            'san_sang_nhan_don'     => $request->san_sang_nhan_don,
            'diem_danh_gia_tb'      => $request->diem_danh_gia_tb,
            'trang_thai'            => $request->trang_thai,
        ]);
        return response()->json(['status' => 1, 'message' => 'Cập nhật shipper thành công'], 200);
    }

    public function deleteShipper($id)
    {
        $shipper = Shipper::find($id);
        if (!$shipper) return response()->json(['status' => 0, 'message' => 'Không tìm thấy shipper'], 404);
        $shipper->delete();
        return response()->json(['status' => 1, 'message' => 'Xóa shipper thành công'], 200);
    }

    public function changesStatus(Request $request)
    {
        $shipper = Shipper::find($request->id);
        if (!$shipper) return response()->json(['status' => 0, 'message' => 'Không tìm thấy shipper'], 404);
        $shipper->trang_thai = $request->trang_thai;
        $shipper->save();
        return response()->json(['status' => 1, 'message' => 'Cập nhật trạng thái shipper thành công'], 200);
    }
}
