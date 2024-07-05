<?php

namespace App\Http\Controllers;

use App\Models\Upload;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        notify()->success('Notified');
        return view('upload.index');
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('upload.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:15',
            'upload' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        ]);
    }
        $name = strtolower(str_replace(" ", "", $request->title) . "-" . time() . "." . $request->upload->extension());

        $request->image->move(public_path('upload'), $name);

        $image = new Image();
        $image->title = $request->title;
        $image->image = $name;
        $image->save();

        return redirect()->route('upload.index');
}
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Upload  $upload
     * @return \Illuminate\Http\Response
     */
    public function show(Upload $upload)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Upload  $upload
     * @return \Illuminate\Http\Response
     */
    public function edit(Upload $upload)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Upload  $upload
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Upload $upload)
    {
        $request->validate([
            'title' => 'required|string|max:15',
        ]);

        $image->title = $request->title;

        if ($request->img !== null) {
            $request->validate([
                'img' => 'image|mimes:png,jpg,jpeg|max:2048'
            ]);
            File::delete(public_path('uploads/' . $image->image));

            $name = strtolower(str_replace(" ", "", $request->title) . "-" . time() . "." . $request->img->extension());
            $request->img->move(public_path('uploads'), $name);

            $image->image = $name;
        }
        $image->update();

        return redirect()->route('images.index');
    }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Upload  $upload
     * @return \Illuminate\Http\Response
     */
    public function destroy(Upload $upload)
    {
        //
    }
}
