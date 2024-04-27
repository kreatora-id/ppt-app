<?php

namespace App\Models;

use App\Traits\OrderNumber;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory, OrderNumber;

    const PAYMENT = ["QRIS", "ShopeePay", "GoPay"];
    const MIDTRANS_PAYMENT = ["qris", "shopeepay", "gopay"];
    const PAYMENT_STATUS = ["UNPAID", "PENDING", "PAID", "CANCEL"];
    const MIDTRANS_TR_STATUS = ["settlement", "capture", "pending", "deny", "cancel", "expire", "failure"];
    public function product() {
        return $this->belongsTo(Product::class);
    }
}
