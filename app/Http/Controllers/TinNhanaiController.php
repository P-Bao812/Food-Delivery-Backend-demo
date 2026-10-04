<?php

namespace App\Http\Controllers;

use App\Http\Requests\TinNhanaiRequest;
use App\Http\Requests\TinNhanaiUpdateRequest;
use App\Models\TinNhanai;
use Illuminate\Http\Request;

class TinNhanaiController extends Controller
{
    public function getTinNhanai()
    {
        $tinNhan = TinNhanai::all();
        return response()->json(['status' => 1, 'data' => $tinNhan], 200);
    }

    public function postTinNhanai(TinNhanaiRequest $request)
    {
        $tinNhan = TinNhanai::create([
            'id_phien'              => $request->id_phien,
            'vai_tro'               => $request->vai_tro,
            'noi_dung'              => $request->noi_dung,
            'so_token_dung'         => $request->so_token_dung ?? 0,
            'id_mon_an_goi_y'       => $request->id_mon_an_goi_y,
            'id_coupon_goi_y'       => $request->id_coupon_goi_y,
        ]);
        return response()->json(['status' => 1, 'data' => $tinNhan, 'message' => 'Tạo tin nhắn thành công'], 200);
    }

    public function putTinNhanai(TinNhanaiUpdateRequest $request)
    {
        TinNhanai::where('id', $request->id)->update([
            'id_phien'              => $request->id_phien,
            'vai_tro'               => $request->vai_tro,
            'noi_dung'              => $request->noi_dung,
            'so_token_dung'         => $request->so_token_dung,
            'id_mon_an_goi_y'       => $request->id_mon_an_goi_y,
            'id_coupon_goi_y'       => $request->id_coupon_goi_y,
        ]);
        return response()->json(['status' => 1, 'message' => 'Cập nhật tin nhắn thành công'], 200);
    }

    public function deleteTinNhanai($id)
    {
        $tinNhan = TinNhanai::find($id);
        if (!$tinNhan) return response()->json(['status' => 0, 'message' => 'Không tìm thấy tin nhắn'], 404);
        $tinNhan->delete();
        return response()->json(['status' => 1, 'message' => 'Xóa tin nhắn thành công'], 200);
    }
}
