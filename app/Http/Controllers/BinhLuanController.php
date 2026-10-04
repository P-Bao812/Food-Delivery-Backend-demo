<?php

namespace App\Http\Controllers;

use App\Http\Requests\BinhLuanRequest;
use App\Http\Requests\BinhLuanUpdateRequest;
use App\Models\BinhLuan;
use Illuminate\Http\Request;

class BinhLuanController extends Controller
{
    public function getBinhLuan()
    {
        $binhLuan = BinhLuan::all();
        return response()->json([
            'status' => 1,
            'data'   => $binhLuan
        ], 200);
    }
    public function postBinhLuan(BinhLuanRequest $request)
    {
        $binhLuan = BinhLuan::create([
            'id_nguoi_dung'     => $request->id_nguoi_dung,
            'id_doi_tuong'      => $request->id_doi_tuong,
            'id_binh_luan_cha'  => $request->id_binh_luan_cha,
            'loai_doi_tuong'    =>  $request->loai_doi_tuong,
            'noi_dung'          => $request->noi_dung,
            'so_luot_thich'     => $request->so_luot_thich,
            'trang_thai'        => $request->trang_thai
        ]);
        return response()->json([
            'status' => 1,
            'data'   => $binhLuan,
            'message' => "Thêm bình luận thành công"
        ], 200);
    }
    public function putBinhLuan(BinhLuanUpdateRequest $request)
    {
        $binhLuan = BinhLuan::where('id', $request->id)
            ->update([
                'id_nguoi_dung'     => $request->id_nguoi_dung,
                'id_doi_tuong'      => $request->id_doi_tuong,
                'id_binh_luan_cha'  => $request->id_binh_luan_cha,
                'loai_doi_tuong'    => $request->loai_doi_tuong,
                'noi_dung'          => $request->noi_dung,
                'so_luot_thich'     => $request->so_luot_thich,
                'trang_thai'        => $request->trang_thai
            ]);
        return response()->json([
            'status'    => 1,
            'data'      => $binhLuan,
            'message'   => 'Cập nhật bình luận thành công'
        ], 200);
    }
    public function deleteBinhLuan(Request $request, $id)
    {
        $binhLuan = BinhLuan::find($id);
        if (!$binhLuan) {
            return response()->json([
                'status' => 0,
                'message' => 'Không tìm hấy đánh giá',
            ], 404);
        }
        $binhLuan->delete();
        return response()->json([
            'status' => 1,
            'message' => 'Xóa thành công',
        ], 200);
    }
    public function changesStatus(Request $request)
    {
        $binhLuan = BinhLuan::find($request->id);
        if (!$binhLuan) {
            return response()->json([
                'status' => 0,
                'message' => 'Không tìm thấy đánh giá'
            ], 404);
        }
        $binhLuan->trang_thai = $request->trang_thai;
        $binhLuan->save();
        return response()->json([
            'status' => 1,
            'message' => 'Cập nhật trạng thái thành công'
        ], 200);
    }
}
