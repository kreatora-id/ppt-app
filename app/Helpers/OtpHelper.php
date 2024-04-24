<?php

namespace App\Helpers;

use App\Models\Otp;
use Carbon\Carbon;

class OtpHelper
{
    public function generateOTP(string $email, string $reference_id)
    {
        if (!$email) return '';
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

//        $this->sentOtpToEmail();

        return $new_otp;
    }

    public function resendOTP(string $email, string $reference_id)
    {
        if (!$email) return '';
        $last_otp = Otp::query()->where('email', $email)->orWhere('reference_id', $reference_id)
            ->latest()->first();
        if (!$last_otp) {
            return $this->generateOTP($email, $reference_id);
        }
        $updated_time = new Carbon($last_otp->updated_at);
        if ($updated_time->diffInSeconds(Carbon::now()) < 120) {
            return 'Mohon tunggu beberapa detik lagi';
        }
        // send OTP
        return '';
    }
}
