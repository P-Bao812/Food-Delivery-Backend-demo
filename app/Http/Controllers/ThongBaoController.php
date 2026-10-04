<?php

namespace App\Http\Controllers;

use App\Http\Requests\ThongBaoRequest;
use App\Http\Requests\ThongBaoUpdateRequest;
use App\Models\ThongBao;
use Illuminate\Http\Request;

class ThongBaoController extends Controller
{
    public function getThongBao()
    {
        $thongBao = ThongBao::all();
        return response()->json(['status' => 1, 'data' => $thongBao], 200);
    }

    public function postThongBao(ThongBaoRequest $request)
    {
        $thongBao = ThongBao::create([
            'id_nguoi_dung'         => $request->id_nguoi_dung,
            'loai'                  => $request->loai,
            'tieu_de'               => $request->tieu_de,
            'noi_dung'              => $request->noi_dung,
            'loai_tham_chieu'       => $request->loai_tham_chieu,
            'id_tham_chieu'         => $request->id_tham_chieu,
            'da_doc'                => $request->da_doc ?? false,
            'fcm_token'             => $request->fcm_token,
        ]);
        return response()->json(['status' => 1, 'data' => $thongBao, 'message' => 'Tạo thông báo thành công'], 200);
    }

    public function putThongBao(ThongBaoUpdateRequest $request)
    {
        ThongBao::where('id', $request->id)->update([
            'id_nguoi_dung'         => $request->id_nguoi_dung,
            'loai'                  => $request->loai,
            'tieu_de'               => $request->tieu_de,
            'noi_dung'              => $request->noi_dung,
            'loai_tham_chieu'       => $request->loai_tham_chieu,
            'id_tham_chieu'         => $request->id_tham_chieu,
            'da_doc'                => $request->da_doc,
            'fcm_token'             => $request->fcm_token,
        ]);
        return response()->json(['status' => 1, 'message' => 'Cập nhật thông báo thành công'], 200);
    }

    public function deleteThongBao($id)
    {
        $thongBao = ThongBao::find($id);
        if (!$thongBao) return response()->json(['status' => 0, 'message' => 'Không tìm thấy thông báo'], 404);
        $thongBao->delete();
        return response()->json(['status' => 1, 'message' => 'Xóa thông báo thành công'], 200);
    }

    public function changesStatus(Request $request)
    {
        $thongBao = ThongBao::find($request->id);
        if (!$thongBao) return response()->json(['status' => 0, 'message' => 'Không tìm thấy thông báo'], 404);
        $thongBao->da_doc = $request->da_doc;
        $thongBao->save();
        return response()->json(['status' => 1, 'message' => 'Cập nhật trạng thái thông báo thành công'], 200);
    }
}
