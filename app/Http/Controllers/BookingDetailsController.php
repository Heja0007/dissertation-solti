<?php

namespace App\Http\Controllers;

use App\BookingDetails;
use App\Payment;
use App\Repositories\BookingDetailsRepository;
use App\Repositories\PaymentsRepository;
use App\TrekkingRoute;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookingDetailsController extends Controller
{

    public $model;
    public $payment;


    public function __construct(BookingDetailsRepository $model, PaymentsRepository $payment)
    {
        $this->model = $model;
        $this->payment = $payment;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = BookingDetails::all();
        return view('amin.bookings.list')->with('data', $bookings);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function store(Request $request, $id)
    {
        $data = $request->all();
        $trek = TrekkingRoute::where('id', $id)->firstOrFail();
        $data['cost'] = $trek->cost * $data['peoples'];
        $data['routes_id'] = $trek->id;
        $book = $this->model->store($data);
        $payment = $this->payments($book);
        return redirect()->route('front.payment.checkout', ['id' => $payment->prn]);
//        return view('front.payment')->with(['data' => $payment, 'trek' => $trek]);
    }

    public function payments($data)
    {
        $prn = Carbon::now()->format('Y-m-d-h-s');
        $unique_code = Carbon::now()->format('YmdHisu');
        $prn = str_ireplace('-', '', $prn);
        $payment = [
            'amount' => $data['cost'],
            'prn' => $prn,
            'payer_id' => $data['id'],
            'status' => 0,
            'unique_id' => $data['id'] + 10000000000,
        ];
        $payment = $this->payment->store($payment);
        return $payment;
    }

    public function checkout($id)
    {
        $payment = Payment::where('prn', $id)->first();
        return view('front.payment')->with(['data' => $payment]);

    }

    public function show($id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
