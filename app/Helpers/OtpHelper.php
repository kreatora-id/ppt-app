<?php

namespace App\Helpers;

use App\Mails\EmailOTPCode;
use App\Models\Otp;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class OtpHelper
{
    public function generateOTP(string $email, string $reference_id)
    {
        if (!$email) return 'Email is required';
        $last_otp = Otp::query()->where('email', $email)->orWhere('reference_id', $reference_id)
            ->latest()->first();
        if ($last_otp) {
            $expired_time = new Carbon($last_otp->expired_at);
            if ($expired_time->diffInMinutes(Carbon::now()) < 5) {
                return $last_otp;
            }
        }
        $otp = mt_rand(100000, 999999);
        $unique_code = str_random(50);

        $new_otp = new Otp();
        $new_otp->reference_id = $reference_id;
        $new_otp->email = $email;
        $new_otp->otp = $otp;
        $new_otp->unique_code = $unique_code;
        $new_otp->expired_at = Carbon::now()->addMinutes(5);
        $new_otp->save();

        return $this->sendOTP($new_otp->email, $new_otp->otp);
    }

    public function resendOTP(string $email, string $reference_id)
    {
        if (!$email) return 'Email is required';
        $last_otp = Otp::query()->where('email', $email)->orWhere('reference_id', $reference_id)
            ->latest()->first();
        if (!$last_otp) {
            return $this->generateOTP($email, $reference_id);
        }
        $last_time = new Carbon($last_otp->last_sent);
        $now = Carbon::now();
        if ($last_time->diffInSeconds($now) < 120) {
            return 'Mohon tunggu ' . (120 - $last_time->diffInSeconds($now)) . ' detik lagi untuk mengirim ulang OTP';
        }
        return $this->sendOTP($last_otp->email, $last_otp->otp);
    }

    public function sendOTP(string $email, string $otp): string
    {
        if (!($email && $otp)) return 'Email & OTP is required';
        Mail::to($email)->send(new EmailOTPCode($otp));
        return 'Kode OTP telah berhasil dikirim ke email anda';
    }
}
