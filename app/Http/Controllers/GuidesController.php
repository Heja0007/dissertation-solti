<?php

namespace App\Http\Controllers;

use App\Guides;
use App\Repositories\GuidesRepository;
use App\Repositories\UploadRepository;
use Illuminate\Http\Request;

class GuidesController extends Controller
{

    public $model;
    public $upload;


    public function __construct(GuidesRepository $model , UploadRepository $upload)
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
        $guides = Guides::all();
        return view('admin.guides.list')->with('guides', $guides);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('admin.guides.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $verifyUpload = $this->upload->verifyUpload($request , 'photo');
        if ($verifyUpload == 0) {
            return redirect()->back()->with('message', 'Uploaded extension should be type of jpg, png or jpeg');
        }
        $data['photo'] = $this->upload->upload($request, 'photo');
        try{
            $this->model->store($data);
        }catch (\Exception $exception)
        {
            return redirect()->back()->with('message' , 'Email already used');
        }
        return redirect()->route('admin.guides.index')->with('message','Guide successfully created');
    }

    /**
     * Display the specified resource.
     *
     */
    public function show(Guides $guide)
    {
        return view('admin.guides.view')->with('guide',$guide);
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit($id)
    {
        $guide = Guides::findOrFail($id);
        return view('admin.guides.edit')->with('guide',$guide);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        if ($request->file('photo')){
            $verifyUpload = $this->upload->verifyUpload($request , 'photo');
            if ($verifyUpload == 0) {
                return redirect()->back()->with('message', 'Uploaded extension should be type of jpg, png or jpeg');
            }
            $data['photo'] = $this->upload->upload($request, 'photo');
        }
        try{
            $this->model->update($id , $data);
        }catch (\Exception $exception)
        {
            return redirect()->back()->with('message' , 'Email already used');
        }
        return redirect()->route('admin.guides.index')->with('message','Guide successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy($id)
    {
        $this->model->delete($id);
        return redirect()->route('admin.guides.index')->with('message','Guide successfully deleted');
    }
}
