<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfileModel;
use App\Models\skill;

class SkillsController extends Controller
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
        $skills = ProfileModel::find(1)->skills();
        $data = request()->validate([
            'skill-name' => 'required',
            'skill-progress' => 'required|numeric|between:1,100',
        ]);
        $skills->create([
            'name' => $data['skill-name'],
            'progress' => $data['skill-progress'],
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
    public function update($skill_id)
    {
        $skills = skill::find($skill_id);

        $data = request()->validate([

            'skill-update-name' => 'required',
            'skill-update-progress' => 'required|numeric|between:1,100',
        ]);
        $skills->update([
            'name' => $data['skill-update-name'],
            'progress' => $data['skill-update-progress'],
        ]);
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
        $skill = skill::findOrFail($id);
        $skill->delete();
        return redirect('/admin');
    }
}
