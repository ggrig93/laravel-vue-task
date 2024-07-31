<?php

namespace App\Http\Controllers;

use App\Http\Requests\Payment\CreateRequest;
use App\Interfaces\PaymentInterface;
use App\Models\Payment;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class PaymentController extends Controller
{

    protected PaymentInterface $paymentService;

    public function __construct(PaymentInterface $paymentService)
    {
        $this->paymentService = $paymentService;
    }

    /**
     * @return Response
     */
    public function index(): Response
    {
        return Inertia::render('Payment/index');

    }

    public function store(CreateRequest $request)
    {
        return $this->paymentService->createPayment($request);
    }

    /**
     * @param Request $request
     * @param Payment $payment
     * @return bool
     */
    public function update(Request $request, Payment $payment): bool
    {
        return $this->paymentService->updatePayment($request, $payment);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function getPayments(Request $request): mixed
    {
        return $this->paymentService->getAllPayments($request);
    }
}
