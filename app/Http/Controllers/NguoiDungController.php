<?php

namespace App\Http\Controllers;

use App\Http\Requests\DangKyRequest;
use App\Http\Requests\DoiMatKhauRequest;
use App\Http\Requests\NguoiDungLoginRequest;
use App\Http\Requests\NguoiDungQuenMKRequest;
use App\Http\Requests\NguoiDungRequest;
use App\Http\Requests\NguoiDungUpdateRequest;
use App\Http\Requests\XacNhanOTPRequest;
use App\Mail\sendMailDoiMatKhau;
use Illuminate\Support\Facades\Mail;
use App\Models\NguoiDung;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver\RequestPayloadValueResolver;

class NguoiDungController extends Controller
{
    public function getNguoiDung()
    {
        $nguoiDung = NguoiDung::all();
        return response()->json(['status' => 1, 'data' => $nguoiDung], 200);
    }

    public function postNguoiDung(NguoiDungRequest $request)
    {
        $nguoiDung = NguoiDung::create([
            'email'             => $request->email,
            'password'          => bcrypt($request->password),
            'so_dien_thoai'     => $request->so_dien_thoai,
            'ho_ten'            => $request->ho_ten,
            'anh_dai_dien'      => $request->anh_dai_dien,
            'vai_tro'           => $request->vai_tro,
            'trang_thai'        => $request->trang_thai,
        ]);
        return response()->json(['status' => 1, 'data' => $nguoiDung, 'message' => 'Tạo người dùng thành công'], 200);
    }

    public function putNguoiDung(NguoiDungUpdateRequest $request)
    {
        $updateData = [
            'email'             => $request->email,
            'password'          => bcrypt($request->password),
            'so_dien_thoai'     => $request->so_dien_thoai,
            'ho_ten'            => $request->ho_ten,
            'anh_dai_dien'      => $request->anh_dai_dien,
            'vai_tro'           => $request->vai_tro,
            'trang_thai'        => $request->tang_thai,
        ];
        return response()->json(['status' => 1, 'message' => 'Cập nhật người dùng thành công'], 200);
    }

    public function deleteNguoiDung($id)
    {
        $nguoiDung = NguoiDung::find($id);
        if (!$nguoiDung) return response()->json(['status' => 0, 'message' => 'Không tìm thấy người dùng'], 404);
        $nguoiDung->delete();
        return response()->json(['status' => 1, 'message' => 'Xóa người dùng thành công'], 200);
    }

    public function changesStatus(Request $request)
    {
        $nguoiDung = NguoiDung::find($request->id);
        if (!$nguoiDung) return response()->json(['status' => 0, 'message' => 'Không tìm thấy người dùng'], 404);
        $nguoiDung->dang_hoat_dong = $request->dang_hoat_dong;
        $nguoiDung->save();
        return response()->json(['status' => 1, 'message' => 'Cập nhật trạng thái người dùng thành công'], 200);
    }
    public function login(NguoiDungLoginRequest $request)
    {
        $user = Auth::guard('nguoi_dung')->attempt([
            'email'     => $request->email,
            'password'  => $request->password
        ]);
        if ($user) {
            $user = Auth::guard('nguoi_dung')->user();
            $token = $user->createToken('auth_token')->plainTextToken;
            return response()->json([
                'status' => 1,
                'message' => 'Đăng nhập thành công',
                'token'  => $token,
                'data'   => $user
            ], 200);
        } else {
            return response()->json([
                'status' => 0,
                'messege'  => 'Đăng nhập thất bại, Vui lòng kiểm tra email và mật khẩu'
            ], 401);
        }
        return response()->json([
            'data' => $request->validated()
        ], 200);
    }
    public function checkToken(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        if ($user) {
            return response()->json([
                'status' => 1,
                'data'  => $user
            ], 200);
        } else {
            return response()->json([
                'status' => 0,
                'message'   => 'Token không tồn tại hoặc đã hết hạn'
            ], 401);
        }
    }
    public function logout(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        if ($user) {
            $user->currentAccessToken()->delete();
            return response()->json([
                'status' => 1,
                'message' => 'Đăng xuất thành công'
            ], 200);
        } else {
            return response()->json([
                'status' => 0,
                'message' => 'Không tìm thấy người dùng hoặc token không hợp lệ'
            ], 401);
        }
    }
    public function logoutAll(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        if ($user) {
            $user->tokens()->delete();
            return response()->json([
                'status' => 1,
                'message' => 'Đăng xuất thành công'
            ], 200);
        } else {
            return response()->json([
                'status' => 0,
                'message' => 'Không tìm thấy người dùng hoặc token không hợp lệ'
            ], 401);
        }
    }
    public function OTP(NguoiDungQuenMKRequest $request)
    {
        $nguoiDung = NguoiDung::where('email', $request->email)->first();
        if ($nguoiDung) {
            $otp = rand(10000, 99999);
            $data['ho_ten'] = $nguoiDung->ho_ten;
            $data['otp'] = $otp;
            Mail::to($nguoiDung->email)->send(new sendMailDoiMatKhau('otp', $data));
            $nguoiDung->otp = $otp;
            $nguoiDung->save();
            return response()->json([
                'status' => 1,
                'message' => 'Một email đã được gửi đến địa chỉ của bạn với OPT đặt lại mật khẩu'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Email không tồn tại trong hệ thống',
                'status'  => 1
            ], 200);
        }
    }
    public function OTPXacNhan(XacNhanOTPRequest $request)
    {
        $nguoiDung = NguoiDung::where('otp', $request->otp)->first();
        if (!$nguoiDung) {
            return response()->json([
                'status'  => 0,
                'message' => 'Mã xác nhận không hợp lệ hoặc đã hết hạn.',
            ]);
        }
        $nguoiDung->otp = null;
        $nguoiDung->save();
        return response()->json([
            'data' => $nguoiDung,
            'status'  => 1
        ], 200);
    }
    public function doiMatKhau(DoiMatKhauRequest $request)
    {
        $nguoiDung = NguoiDung::where('otp', $request->otp)->first();
        $nguoiDung->password = bcrypt($request->new_password);
        return response()->json([
            'status'  => 1,
            'message' => 'Đổi mật khẩu thành công. Vui lòng đăng nhập.',
        ]);
    }
    public function dangKy(DangKyRequest $request)
    {
        $nguoiDung = NguoiDung::create([
            'email'             => $request->email,
            'ho_ten'            => $request->ho_ten,
            'password'          => bcrypt($request->password),
        ]);
        return response()->json(['status' => 1, 'data' => $nguoiDung, 'message' => 'Đăng ký thành công'], 200);
    }
}
