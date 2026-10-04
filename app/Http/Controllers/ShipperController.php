<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShipperRequest;
use App\Http\Requests\ShipperUpdateRequest;
use App\Models\Shipper;
use Illuminate\Http\Request;

class ShipperController extends Controller
{
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
