<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfileModel;
use App\Models\about;
use Intervention\Image\Facades\Image;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return redirect('/admin');
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($profile)
    {
        $about = about::find($profile);
        $data = request()->validate([
            'about-content' => 'required',
            'about-bigimage' => 'image',
            'about-smallimage' => 'image',
        ]);

        $about->content = $data['about-content'];

        if (request('about-bigimage')) {
            $imagePath = request('about-bigimage')->store('about', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 600);
            $image->save();
            $about->big_image = $imagePath;
        }
        if (request('about-smallimage')) {
            $imagePath1 = request('about-smallimage')->store('about', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 680);
            $image->save();
            $about->small_image = $imagePath1;
        }

        $about->save();
        return redirect('/admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
