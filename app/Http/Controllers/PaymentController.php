<?php

namespace App\Http\Controllers;

use App\Payment;
use App\Repositories\PaymentsRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Omnipay\Omnipay;

class PaymentController extends Controller
{

    public $model;

    public function __construct(PaymentsRepository $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        return view('payment');
    }

    public function charge(Request $request)
    {
        $data = $request->all();
        if ($data['stripeToken']) {

            $gateway = Omnipay::create('Stripe');
            $gateway->setApiKey(env('STRIPE_SECRET_KEY'));

            $token = $request->input('stripeToken');

            $response = $gateway->purchase([
                'amount' => $data['amount'],
                'currency' => env('STRIPE_CURRENCY'),
                'token' => $token,
            ])->send();
            if ($response->isSuccessful()) {
                // payment was successful: insert transaction data into the database
                $arr_payment_data = $response->getData();
                $payment = [
                    'booking_id' => $data['booking_id'],
                    'prn' => Carbon::now()->format('Ymdhs'),
                    'email' => $data['email'],
                    'amount' => $arr_payment_data['amount'],
                    'currency' => env('STRIPE_CURRENCY'),
                    'status' => $arr_payment_data['status']
                ];
                $as = $this->model->store($payment);
                $as = Payment::where('id', $as->id)->with('booking')->first();
                return view('front.checkout')->with(['message' => 'Payment is successful', 'payment' => $as]);
            } else {
                return view('front.payment-failure')->with('message', 'Payment failed :' . $response->getMessage());
            }
        }
    }
}
