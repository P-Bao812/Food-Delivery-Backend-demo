<?php

namespace App\Http\Controllers;

use App\Http\Requests\ViTriShipperRequest;
use App\Http\Requests\ViTriShipperUpdateRequest;
use App\Models\ViTriShipper;
use Illuminate\Http\Request;

class ViTriShipperController extends Controller
{
    public function getViTriShipper()
    {
        $viTriShipper = ViTriShipper::all();
        return response()->json(['status' => 1, 'data' => $viTriShipper], 200);
    }

    public function postViTriShipper(ViTriShipperRequest $request)
    {
        $viTriShipper = ViTriShipper::create([
            'id_shipper'        => $request->id_shipper,
            'vi_do'             => $request->vi_do,
            'kinh_do'           => $request->kinh_do,
            'toc_do'            => $request->toc_do,
            'huong_di_chuyen'   => $request->huong_di_chuyen,
            'thoi_gian_ghi'     => $request->thoi_gian_ghi,
            'trang_thai'        => $request->trang_thai ?? 0,
        ]);
        return response()->json(['status' => 1, 'data' => $viTriShipper, 'message' => 'Tạo vị trí shipper thành công'], 200);
    }

    public function putViTriShipper(ViTriShipperUpdateRequest $request)
    {
        ViTriShipper::where('id', $request->id)->update([
            'id_shipper'        => $request->id_shipper,
            'vi_do'             => $request->vi_do,
            'kinh_do'           => $request->kinh_do,
            'toc_do'            => $request->toc_do,
            'huong_di_chuyen'   => $request->huong_di_chuyen,
            'thoi_gian_ghi'     => $request->thoi_gian_ghi,
            'trang_thai'        => $request->trang_thai,
        ]);
        return response()->json(['status' => 1, 'message' => 'Cập nhật vị trí shipper thành công'], 200);
    }

    public function deleteViTriShipper($id)
    {
        $viTriShipper = ViTriShipper::find($id);
        if (!$viTriShipper) return response()->json(['status' => 0, 'message' => 'Không tìm thấy vị trí shipper'], 404);
        $viTriShipper->delete();
        return response()->json(['status' => 1, 'message' => 'Xóa vị trí shipper thành công'], 200);
    }
}
