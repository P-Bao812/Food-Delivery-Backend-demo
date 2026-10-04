<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuanTriVienRequest;
use App\Http\Requests\QuanTriVienUpdateRequest;
use App\Models\QuanTriVien;
use Illuminate\Http\Request;

class QuanTriVienController extends Controller
{
    public function getQuanTriVien()
    {
        $quanTriVien = QuanTriVien::all();
        return response()->json(['status' => 1, 'data' => $quanTriVien], 200);
    }

    public function postQuanTriVien(QuanTriVienRequest $request)
    {
        $quanTriVien = QuanTriVien::create([
            'id_nguoi_dung'     => $request->id_nguoi_dung,
            'phong_ban'         => $request->phong_ban,
        ]);
        return response()->json(['status' => 1, 'data' => $quanTriVien, 'message' => 'Tạo quản trị viên thành công'], 200);
    }

    public function putQuanTriVien(QuanTriVienUpdateRequest $request)
    {
        QuanTriVien::where('id', $request->id)->update([
            'id_nguoi_dung'     => $request->id_nguoi_dung,
            'phong_ban'         => $request->phong_ban,
        ]);
        return response()->json(['status' => 1, 'message' => 'Cập nhật quản trị viên thành công'], 200);
    }

    public function deleteQuanTriVien($id)
    {
        $quanTriVien = QuanTriVien::find($id);
        if (!$quanTriVien) return response()->json(['status' => 0, 'message' => 'Không tìm thấy quản trị viên'], 404);
        $quanTriVien->delete();
        return response()->json(['status' => 1, 'message' => 'Xóa quản trị viên thành công'], 200);
    }
}
