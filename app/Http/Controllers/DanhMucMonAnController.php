<?php

namespace App\Http\Controllers;

use App\Http\Requests\DanhMucMonAnRequest;
use App\Http\Requests\DanhMucMonAnUpdateRequest;
use App\Models\DanhMucMonAn;
use App\Models\MonAn;
use Illuminate\Http\Request;

class DanhMucMonAnController extends Controller
{
    public function getDanhMucMonAn()
    {

        $danhMuc = DanhMucMonAn::all();
        return response()->json(['status' => 1, 'data' => $danhMuc], 200);
    }

    public function postDanhMucMonAn(DanhMucMonAnRequest $request)
    {
        $danhMuc = DanhMucMonAn::create([
            'id_nha_hang'   => $request->id_nha_hang,
            'ten_danh_muc'  => $request->ten_danh_muc,
            'hinh_anh'      => $request->hinh_anh,
            'trang_thai'    => $request->trang_thai ?? 1,
        ]);
        return response()->json(['status' => 1, 'data' => $danhMuc, 'message' => 'Tạo danh mục thành công'], 200);
    }

    public function putDanhMucMonAn(DanhMucMonAnUpdateRequest $request)
    {
        DanhMucMonAn::where('id', $request->id)->update([
            'id_nha_hang'   => $request->id_nha_hang,
            'ten_danh_muc'  => $request->ten_danh_muc,
            'hinh_anh'      => $request->hinh_anh,
            'trang_thai'    => $request->trang_thai,
        ]);
        return response()->json(['status' => 1, 'message' => 'Cập nhật danh mục thành công'], 200);
    }

    public function deleteDanhMucMonAn($id)
    {
        $danhMuc = DanhMucMonAn::find($id);
        if (!$danhMuc) return response()->json(['status' => 0, 'message' => 'Không tìm thấy danh mục'], 404);
        $danhMuc->delete();
        return response()->json(['status' => 1, 'message' => 'Xóa danh mục thành công'], 200);
    }

    public function changesStatus(Request $request)
    {
        $danhMuc = DanhMucMonAn::find($request->id);
        if (!$danhMuc) return response()->json(['status' => 0, 'message' => 'Không tìm thấy danh mục'], 404);
        $danhMuc->trang_thai = $request->trang_thai;
        $danhMuc->save();
        return response()->json(['status' => 1, 'message' => 'Cập nhật trạng thái danh mục thành công'], 200);
    }
   
}
