<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhienChatAiRequest;
use App\Http\Requests\PhienChatAiUpdateRequest;
use App\Models\PhienChatAi;
use Illuminate\Http\Request;

class PhienChatAiController extends Controller
{
    public function getPhienChatAi()
    {
        $phien = PhienChatAi::all();
        return response()->json(['status' => 1, 'data' => $phien], 200);
    }

    public function postPhienChatAi(PhienChatAiRequest $request)
    {
        $phien = PhienChatAi::create([
            'id_nguoi_dung'     => $request->id_nguoi_dung,
            'token_phien'       => $request->token_phien,
            'chu_de'            => $request->chu_de,
            'bat_dau_luc'       => $request->bat_dau_luc,
            'ket_thuc_luc'      => $request->ket_thuc_luc,
            'dang_hoat_dong'    => $request->dang_hoat_dong ?? true,
        ]);
        return response()->json(['status' => 1, 'data' => $phien, 'message' => 'Tạo phiên chat thành công'], 200);
    }

    public function putPhienChatAi(PhienChatAiUpdateRequest $request)
    {
        PhienChatAi::where('id', $request->id)->update([
            'id_nguoi_dung'     => $request->id_nguoi_dung,
            'token_phien'       => $request->token_phien,
            'chu_de'            => $request->chu_de,
            'bat_dau_luc'       => $request->bat_dau_luc,
            'ket_thuc_luc'      => $request->ket_thuc_luc,
            'dang_hoat_dong'    => $request->dang_hoat_dong,
        ]);
        return response()->json(['status' => 1, 'message' => 'Cập nhật phiên chat thành công'], 200);
    }

    public function deletePhienChatAi($id)
    {
        $phien = PhienChatAi::find($id);
        if (!$phien) return response()->json(['status' => 0, 'message' => 'Không tìm thấy phiên chat'], 404);
        $phien->delete();
        return response()->json(['status' => 1, 'message' => 'Xóa phiên chat thành công'], 200);
    }

    public function changesStatus(Request $request)
    {
        $phien = PhienChatAi::find($request->id);
        if (!$phien) return response()->json(['status' => 0, 'message' => 'Không tìm thấy phiên chat'], 404);
        $phien->dang_hoat_dong = $request->dang_hoat_dong;
        $phien->save();
        return response()->json(['status' => 1, 'message' => 'Cập nhật trạng thái phiên chat thành công'], 200);
    }
}
