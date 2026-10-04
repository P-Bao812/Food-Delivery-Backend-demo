<?php

namespace App\Http\Controllers;

use App\Http\Requests\DonHangRequest;
use App\Http\Requests\DonHangUpdateRequest;
use App\Models\ChiTietDonHang;
use App\Models\DonHang;
use App\Models\MonAn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DonHangController extends Controller
{
    public function getDonHang()
    {
        $donHang = DonHang::all();
        return response()->json([
            'status' => 1,
            'data'   => $donHang
        ], 200);
    }

    public function postDonHang(DonHangRequest $request)
    {
        $donHang = DonHang::create([
            'id_khach_hang'             => $request->id_khach_hang,
            'id_nha_hang'               => $request->id_nha_hang,
            'id_shipper'                => $request->id_shipper,
            'id_dia_chi'                => $request->id_dia_chi,
            'id_khu_vuc_giao_hang'      => $request->id_khu_vuc_giao_hang,
            'id_coupon'                 => $request->id_coupon,
            'trang_thai'                => $request->trang_thai ?? 0,
            'tong_tien_hang'            => $request->tong_tien_hang,
            'phi_giao_hang'             => $request->phi_giao_hang,
            'tien_giam_gia'             => $request->tien_giam_gia,
            'tong_thanh_toan'           => $request->tong_thanh_toan,
            'ghi_chu'                   => $request->ghi_chu,
            'thoi_gian_du_kien_giao'    => $request->thoi_gian_du_kien_giao,
            'phuong_thuc_thanh_toan'    => $request->phuong_thuc_thanh_toan ?? 0,
        ]);
        return response()->json([
            'status'  => 1,
            'data'    => $donHang,
            'message' => 'Tạo đơn hàng thành công'
        ], 200);
    }

    public function putDonHang(DonHangUpdateRequest $request)
    {
        $donHang = DonHang::where('id', $request->id)
            ->update([
                'id_khach_hang'             => $request->id_khach_hang,
                'id_nha_hang'               => $request->id_nha_hang,
                'id_shipper'                => $request->id_shipper,
                'id_dia_chi'                => $request->id_dia_chi,
                'id_khu_vuc_giao_hang'      => $request->id_khu_vuc_giao_hang,
                'id_coupon'                 => $request->id_coupon,
                'trang_thai'                => $request->trang_thai,
                'tong_tien_hang'            => $request->tong_tien_hang,
                'phi_giao_hang'             => $request->phi_giao_hang,
                'tien_giam_gia'             => $request->tien_giam_gia,
                'tong_thanh_toan'           => $request->tong_thanh_toan,
                'ghi_chu'                   => $request->ghi_chu,
                'thoi_gian_du_kien_giao'    => $request->thoi_gian_du_kien_giao,
                'phuong_thuc_thanh_toan'    => $request->phuong_thuc_thanh_toan,
            ]);
        return response()->json([
            'status'  => 1,
            'data'    => $donHang,
            'message' => 'Cập nhật đơn hàng thành công'
        ], 200);
    }

    public function deleteDonHang(Request $request, $id)
    {
        $donHang = DonHang::find($id);
        if (!$donHang) {
            return response()->json([
                'status'  => 0,
                'message' => 'Không tìm thấy đơn hàng'
            ], 404);
        }
        $donHang->delete();
        return response()->json([
            'status'  => 1,
            'message' => 'Xóa đơn hàng thành công'
        ], 200);
    }

    public function changesStatus(Request $request)
    {
        $donHang = DonHang::find($request->id);
        if (!$donHang) {
            return response()->json([
                'status'  => 0,
                'message' => 'Không tìm thấy đơn hàng'
            ], 404);
        }
        $donHang->trang_thai = $request->trang_thai;
        $donHang->save();
        return response()->json([
            'status'  => 1,
            'message' => 'Cập nhật trạng thái đơn hàng thành công'
        ], 200);
    }
    public function thanhToan(Request $request)
    {
        DB::beginTransaction();
        try {
            $hoa_don = DonHang::create([
                'id_khach_hang'             => 1,
                'id_nha_hang'               => 1,
                'id_shipper'                => 1,
                'id_dia_chi'                => 1,
                'id_khu_vuc_giao_hang'      => 1,
                'id_coupon'                 => 1,
                'trang_thai'                => $request->trang_thai == 1 ? 1 : 0, // Đặt trạng thái là đã thanh toán
                'tong_tien_hang'            => 0,
                'phi_giao_hang'             => 0,
                'tien_giam_gia'             => 0,
                'tong_thanh_toan'           => 0,
                'ghi_chu'                   => null,
                'thoi_gian_du_kien_giao'    => now(),
                'phuong_thuc_thanh_toan'    => 1,
                'ma_hoa_don'                => 'HD' . time() // Tạo mã hóa đơn đơn giản bằng cách sử dụng timestamp,
            ]);

            $tong_tien_hang     = 0;
            $tong_thanh_toan    = 0;
            foreach ($request->them_gio_hang as $index => $value) {

                $san_pham = MonAn::find($value['id']);

                if (!$san_pham) {
                    continue;
                }

                $so_luong = $value['so_luong'] ?? 1;

                $thanh_tien = $so_luong * $san_pham->gia_ban;

                $chiTiet = ChiTietDonHang::create([

                    'id_don_hang'         => $hoa_don->id,

                    'id_mon_an'           => $san_pham->id,

                    'ten_mon_an_luu_tru'  => $san_pham->ten_mon_an,

                    'gia_luu_tru'         => $san_pham->gia_ban,

                    'so_luong'            => $so_luong,

                    'ghi_chu'             => null,

                    'thanh_tien'          => $thanh_tien
                ]);

                $tong_tien_hang += $thanh_tien;

                $tong_thanh_toan += $thanh_tien;
            }

            $hoa_don->tong_tien_hang  = $tong_tien_hang;

            $hoa_don->tong_thanh_toan = $tong_thanh_toan;

            $hoa_don->save();

            DB::commit();

            return response()->json([
                'status'  => 1,
                'data'    => $hoa_don,
                'message' => 'Đã tạo hóa đơn thành công',
            ], 200);
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }
    public function thanhToanAuto()
    {
        // layGiaoDich() {
        //     let payLoad = {
        //         "USERNAME": "0905765124",
        //         "PASSWORD": "#PhanBao0812#",
        //         "DAY_BEGIN": "01/04/2026",
        //         "DAY_END": "30/04/2026",
        //         "NUMBER_MB": ""
        //     }
        //     axios.post(' https://api-mb.midstack.io.vn/api/transactions', payLoad).then(response => {
        //         if (response.data.success == true) {
        //             console.log(response.data.data.transactionHistoryList);

        //         }
        //     })
        $payLoad = [
            "USERNAME"  => "0905765124",
            "PASSWORD"  => "#PhanBao0812#",
            "DAY_BEGIN" => "01/04/2026",
            "DAY_END"   => "30/04/2026",
            "NUMBER_MB" => "1910060812"
        ];
        $client = new \GuzzleHttp\Client();
        $response = $client->post('https://api-mb.midstack.io.vn/api/transactions', ['json' => $payLoad]);
        $data = json_decode($response->getBody(), true);

        $list = $data['data']['transactionHistoryList'];

        foreach ($list as $key => $value) {
            $bien_a = $value['description'];
            preg_match('/HD\d+/', $bien_a, $matches);
            $bien_b = $value['creditAmount'];
            DonHang::where('ma_hoa_don', $bien_a)
                ->where('trang_thai', 0)
                ->where('tong_thanh_toan', '<=', $bien_b)
                ->update([
                    'trang_thai' => 1
                ]);
        }
    }
}
