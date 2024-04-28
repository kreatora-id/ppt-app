<?php

namespace App\Http\Controllers;

use App\Helpers\OtpHelper;
use Illuminate\Http\Request;

class OtpController extends Controller
{
    public function resendOtp(Request $request)
    {
        if (!$request->filled('email')) return response()->json(['message' => 'email is required'], '400');
        $re_send_otp = (new \App\Helpers\OtpHelper)->resendOtp($request->email, $request->reference_id);
        return response()->json([
            'message' => $re_send_otp,
        ]);
    }
}
