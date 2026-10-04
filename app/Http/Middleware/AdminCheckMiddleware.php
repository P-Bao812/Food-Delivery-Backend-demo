<?php

namespace App\Http\Middleware;

use App\Models\NguoiDung;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminCheckMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::guard('sanctum')->user();
        if($user && $user instanceof \App\Models\NguoiDung){
            return $next($request);
        }else{
            return response()->json([
                'status' => 0,
                'message'=> 'Bạn không đủ quyền truy cập tài nguyên này'
            ],401);
        }
    }
}
