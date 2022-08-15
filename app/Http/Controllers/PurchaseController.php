<?php

namespace App\Http\Controllers;

use App\Models\OrderStatus;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Shetabit\Multipay\Exceptions\InvalidPaymentException;
use Shetabit\Multipay\Exceptions\PurchaseFailedException;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment;

class PurchaseController extends Controller
{
    public function purchase(Request $request)
    {
        $user = auth()->user();
        if (empty($user->address)) {
            $request->validate([
                'address' => ['required', 'string', 'max:1500'],
                'postalcode' => ['required', 'integer', 'max:9999999999'],

            ]);
        }elseif (empty($user->postalcode)){
            $request->validate([
                'postalcode' => ['required', 'integer', 'max:9999999999'],

            ]);
        }


        if ($request->address) {
            $address = $request->address;
            $postalcode = ($request->postalcode) ? $request->postalcode : $user->postalcode;
        }else{
            $address = $user->address;
            $postalcode = ($request->postalcode) ? $request->postalcode : $user->postalcode;
        }

        try {
            $invoice = new Invoice();
            $invoice->amount($user->order->sum);
            $carts = $user->carts;
            $invoice->detail('order' , $user->order);

            $paymentId = md5(uniqid());
            $transaction = $user->transactions()->create([
                'carts' => $carts,
                'paid' => $invoice->getAmount(),
                'invoice_details' => $invoice,
                'payment_id' => $paymentId,
                'address' => $address,
                'postalcode' => $postalcode,

            ]);


            $callbackUrl = route('purchase.result', ['payment_id' => $paymentId]);
            $payment = Payment::callbackUrl($callbackUrl);
            $payment->config('description', 'خرید کالا از آرسا');


            $payment->purchase($invoice, function ($driver, $transactionId) use ($transaction) {
                $transaction->transaction_id = $transactionId;
                $transaction->save();
            });

            return $payment->pay()->render();

        } catch (PurchaseFailedException |\Exception |\SoapFault  $e) {
            if (!empty($e)){
                $transaction->transaction_result = $e->getMessage();
            }else{
                $transaction->transaction_result = 'به دلایل فنی';
            }
            $transaction->status = Transaction::STATUS_FAILED;
            $transaction->save();
            return view('panel.purchase.error')->with('message', $e->getMessage());
        }


    }

    public function result(Request $request)
    {
        $user = auth()->user();

        if ($request->missing('payment_id')) {
            return view('panel.purchase.error')->with('message', 'شماره تراکنش موجود نمی باشد لطفا مجددا تلاش فرمایید');
        }

        $transaction = Transaction::where('payment_id', $request->payment_id)->first();

        if (empty($transaction)) {
            return view('panel.purchase.error')->with('message', 'تراکنش با خطا مواجه شده است');
        }

        if ($transaction->user_id <> auth()->id()) {
            return view('panel.purchase.error')->with('message', 'متاسفانه سبد خرید ارسالی برای کاربر دیگری می باشد');
        }

        if ($transaction->status <> Transaction::STATUS_PENDING) {
            return view('panel.purchase.error')->with('message', 'این تراکنش قبلا انجام شده است و یا به مشکل خورده است');
        }


        try {
            $receipt = Payment::amount($transaction->paid)
                ->transactionId($transaction->transaction_id)
                ->verify();

            $transaction->transaction_result = $receipt;
            $transaction->status = Transaction::STATUS_SUCCESS;
            $transaction->save();
            $user->transaction_success();

            $orderStatus = OrderStatus::create([
                'transaction_id' => $transaction->id,
            ]);

            $adminMobiles = ['09354607414','09132595622'];
            foreach ($adminMobiles as $mobile){
                User::send_admins_sms($mobile);
            }

            if ($transaction->transaction_result->getReferenceId()){
                $user->send_buyer_sms($user->mobile, $transaction->transaction_result->getReferenceId());
            }


            return view('panel.purchase.result')->with([
                'reference_id' => $receipt->getReferenceId(),
                'message' => 'پرداخت با موفقیت انجام شد'
            ]);


        } catch (InvalidPaymentException | \Exception $e) {
            if ($e->getCode() < 0) {
                $transaction->status = Transaction::STATUS_FAILED;
                $transaction->transaction_result = [
                    'message' => $e->getMessage(),
                    'code' => $e->getCode(),
                ];
                $transaction->save();

                return view('panel.purchase.error')->with('message', $e->getMessage());
            }
            return view('panel.purchase.error')->with('message', $e->getMessage());

        }
    }
}
