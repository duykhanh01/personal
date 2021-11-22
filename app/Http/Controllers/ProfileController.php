<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfileModel;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
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
    public function update($profile_id)
    {
        $profile = ProfileModel::find($profile_id);
        $data = request()->validate([
            'profile-name' => 'required',
            'profile-address' => 'required',
            'profile-phone'
            => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'profile-email' => 'required|email',
            'profile-fb' => 'url',
            'profile-ins' => 'url',
            'profile-image' => 'image',
        ]);
        $profile->name = $data['profile-name'];
        $profile->address = $data['profile-address'];
        $profile->email = $data['profile-email'];
        $profile->phone = $data['profile-phone'];
        $profile->fb_url = $data['profile-fb'];
        $profile->ins_url = $data['profile-ins'];
        if (request('profile-image')) {
            $imagePath = request('profile-image')->store('profile', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
            $image->save();
            $imageArray = ['profile-image' => $imagePath];
            $profile->image = $imagePath;
        }

        $profile->save();
        return redirect('/admin');

        // $profile->update(array_merge(
        //     $data,
        //     $imageArray ?? []
        // ));
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
