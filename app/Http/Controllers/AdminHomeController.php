<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfileModel;
use App\Models\home;
use App\Models\about;
use App\Models\skill;
use Intervention\Image\Facades\Image;



class AdminHomeController extends Controller
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
    public function store(ProfileModel $request)
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
        $home = home::find($profile);
        $data = request()->validate([
            'home-title' => 'required',
            'home-content' => 'required',

            'home-image' => 'image',
        ]);

        $home->title = $data['home-title'];
        $home->content = $data['home-content'];

        if (request('home-image')) {
            $imagePath = request('home-image')->store('home', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1920, 1080);
            $image->save();
            $imageArray = ['home-image' => $imagePath];
            $home->image = $imagePath;
        }

        $home->save();
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
