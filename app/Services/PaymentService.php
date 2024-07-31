<?php

namespace App\Services;

use App\Http\Requests\Payment\CreateRequest;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use App\Interfaces\PaymentInterface;

class PaymentService implements PaymentInterface
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function getAllPayments(Request $request): mixed
    {
        return Payment::when($request->search, function ($query) use ($request) {
            $query->where('id', 'like', "%" . $request->search . "%")
                ->orWhere('login', 'like', "%" . $request->search . "%")
                ->orWhere('details', 'like', "%" . $request->search . "%");
        })
            ->paginate(5);
    }

    /**
     * @param CreateRequest $request
     * @return mixed
     */
    public function createPayment(CreateRequest $request): mixed
    {
        return Payment::create($request->all());
    }

    /**
     * @param Request $request
     * @param Payment $payment
     * @return bool
     */
    public function updatePayment(Request $request, Payment $payment): bool
    {
        $user = User::where('login', $payment->login)->first();
        $user->balance += $payment->amount;
        $user->save();

        return $payment->update($request->all());
    }
}
