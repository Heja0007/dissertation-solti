<?php

namespace App\Http\Controllers;

use App\Repositories\TrekkingRouteRepository;
use App\Repositories\UploadRepository;
use App\TrekkingRoute;
use App\Upload;
use Illuminate\Http\Request;

class TrekkingRouteController extends Controller
{

    public $model;
    public $upload;

    public function __construct(TrekkingRouteRepository $model, UploadRepository $upload)
    {
        $this->model = $model;
        $this->upload = $upload;
    }

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $treks = TrekkingRoute::all();
        return view('admin.treks.list')->with('treks', $treks);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('admin.treks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function store(Request $request)
    {
        $trek = $request->all();
        if (isset($trek['uploads'])) {
            $verify = $this->upload->verifyUploads($request);
            if ($verify == 0) {
                return redirect()->back()->with('message', 'File extensions allowed are jpg ,png ,jpeg');
            }
            $data = $this->model->store($trek);
            $this->upload->storeUploads($request, $data->id);
        } else {
            $data = $this->model->store($trek);
        }
        return redirect()->route('admin.treks.index')->with('message', 'Route successfully created');
    }

    public function show(TrekkingRoute $trek)
    {
        $uploads = Upload::where('routes_id', $trek->id)->get();
        return view('admin.treks.view')->with(['trek' => $trek, 'uploads' => $uploads]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     */

    public function edit($id)
    {
        $treks = TrekkingRoute::findOrFail($id);
        $uploads = Upload::where('routes_id', $id)->get();
        return view('admin.treks.edit')->with(['treks' => $treks, 'uploads' => $uploads]);
    }

    public function update(Request $request, $id)
    {
        $trek = $request->all();
        $this->model->update($id, $trek);
        if (isset($trek['uploads'])) {
            $verify = $this->upload->verifyUploads($request);
            if ($verify == 0) {
                return redirect()->back()->with('message', 'File extensions allowed are jpg ,png ,jpeg');
            }
            $this->upload->storeUploads($request, $id);
        }
        return redirect()->route('admin.treks.index')->with('message', 'Route successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy($id)
    {
        $this->model->delete($id);
        return redirect()->route('admin.treks.index')->with('message', 'Route successfully deleted');
    }

    public function search(Request $request)
    {
        $data = $request->all();
        $treks = TrekkingRoute::query();
        if (isset($data['destination'])) {
            $treks = $treks->where('destination', $data['destination']);
        }
        if (isset($data['cost'])) {
            $treks = $treks->orWhere('cost', '<', $data['cost']);
        }
        if (isset($data['difficulty'])) {
            $treks = $treks->orWhere('difficulty', $data['difficulty']);
        }

        $treks = $treks->paginate(6);
        return view('front.list')->with(['treks' => $treks, 'data' => $data]);
    }

    public function showFront($id)
    {
        $trek = TrekkingRoute::where('id', $id)->firstOrFail();
        $uploads = Upload::where('routes_id', $trek->id)->get();
        return view('front.trek-view')->with(['trek' => $trek, 'uploads' => $uploads]);
    }

    public function allRoutes()
    {
        $treks = TrekkingRoute::active()->paginate(3);
        return view('front.list')->with('treks', $treks);
    }

    public function bookingPage($id)
    {
        $trek = TrekkingRoute::where('id', $id)->first();
        return view('front.booking-form')->with('trek', $trek);
    }
}
