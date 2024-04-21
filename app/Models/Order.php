<?php

namespace App\Models;

use App\Traits\OrderNumber;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory, OrderNumber;

    const PAYMENT = ["QRIS", "ShopeePay", "GoPay"];
    const PAYMENT_STATUS = ["UNPAID", "PENDING", "PAID"];
}
