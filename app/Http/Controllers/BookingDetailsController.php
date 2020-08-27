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
        $bookings = BookingDetails::with(['payment','trek'])->get();
        return view('admin.bookings.list')->with('datas', $bookings);
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
        return redirect()->route('front.payment.checkout', ['id' => $book->id]);
//        return view('front.payment')->with(['data' => $payment, 'trek' => $trek]);
    }


    public function checkout($id)
    {
        $book = BookingDetails::where('id', $id)->first();
        return view('front.payment')->with(['data' => $book]);

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
