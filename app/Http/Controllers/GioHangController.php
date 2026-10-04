<?php

namespace App\Http\Controllers;

use App\Http\Requests\GioHangRequest;
use App\Models\GioHang;
use App\Models\MonAn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GioHangController extends Controller
{
    public function getGioHang()
    {
        $giohang = GioHang::select(
            'ten_mon_an',
            'gia_ban',
            'hinh_anh',
            DB::raw('COUNT(*) as so_luong'),
            DB::raw('SUM(gia_ban) as tong_gia')
        )
            ->groupBy(
                'ten_mon_an',
                'gia_ban',
                'hinh_anh'
            )
            ->get();
        return response()->json(['status' => 1, 'data' => $giohang], 200);
    }
    public function postGioHang(Request $request)
    {
        foreach ($request->them_gio_hang as $index => $value) {
            $san_pham = MonAn::find($value['id']);
            $gioHang = GioHang::create([
                'id_mon_an'   => $san_pham->id,

                'id_nha_hang' => $san_pham->id_nha_hang,

                'id_danh_muc' => $san_pham->id_danh_muc,

                'ten_mon_an'  => $san_pham->ten_mon_an,

                'mo_ta'       => $san_pham->mo_ta,

                'hinh_anh'    => $san_pham->hinh_anh,

                'gia_ban'     => $san_pham->gia_ban,

                'gia_goc'     => $san_pham->gia_goc,

                'thoi_gian_chuan_bi_phut'
                => $san_pham->thoi_gian_chuan_bi_phut,

                'trang_thai'  => 1,
            ]);

            return response()->json([
                'status'  => 1,
                'data'    => $gioHang,
                'message' => 'Thêm vào giỏ hàng thành công'
            ], 200);
        }
    }
}
