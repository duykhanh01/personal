<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfileModel;
use App\Models\favorite;
use App\Models\favorite_details;
use Intervention\Image\Facades\Image;

class FavoriteDetailsController extends Controller
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
    public function store()
    {
        $data = request()->validate([
            'favorite-id' => 'required',
            'favorite-title' => 'max:255',
            'favorite-image' => 'image|required',
        ]);
        $details = favorite::find($data['favorite-id'])->favorite_details();
        $imagePath = request('favorite-image')->store('favorite', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1050, 930);
        $image->save();

        $details->create([
            'image' => $imagePath,
            'title' => $data['favorite-title'],
        ]);
        return redirect('/admin');
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
    public function update(Request $request, $id)
    {
        $details = favorite_details::findOrFail($id);

        $data = request()->validate([
            'favorite-update-title' => 'max:255',
            'favorite-update-image' => 'image',
        ]);
        $details->title = $data['favorite-update-title'];
        if (request('favorite-update-image')) {
            $imagePath = request('favorite-update-image')->store('favorite', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1050, 930);
            $image->save();
            $details->image = $imagePath;
        }
        $details->save();
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
        $favorite = favorite_details::find($id);
        $favorite->delete();
        return redirect('/admin');
    }
}
