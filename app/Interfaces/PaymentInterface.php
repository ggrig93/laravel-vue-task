<?php

namespace App\Interfaces;

use App\Http\Requests\Payment\CreateRequest;
use App\Models\Payment;
use Illuminate\Http\Request;
interface PaymentInterface
{
    public function getAllPayments(Request $request): mixed;
    public function createPayment(CreateRequest $request): mixed;
    public function updatePayment(Request $request, Payment $payment): bool;
}
