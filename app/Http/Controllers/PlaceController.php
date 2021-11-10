<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $places = Place::get()->all();

        return view('backend.places.index', compact(['places']));
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
        $validateData = $request->validate(
            [
                'name' => 'required|unique:places|min:2',
            ],
            [
                'name.required' => 'შეიყვანეთ სახელი',
            ]
        );

        Place::insert([
            'name' => $request->name,
            'created_at' => Carbon::now()
        ]);


        return Redirect()->route('places')->with('success', 'ობიექტი დაემატა');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function show(Place $place)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $places = Place::find($id);

        return view('backend.places.edit', compact('places'));

    }





    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function update1(Request $request, Place $place)
    {
        //
    }

    public function update(Request $request, $id)
    {

        $validateData = $request->validate(
            [
                'name' => 'required|unique:places|min:2',
            ],
            [
                'name.required' => 'შეიყვანეთ სახელი',
            ]
        );

        Place::find($id)->update([
            'name' => $request->name,
            'created_at' => Carbon::now()
        ]);


        return redirect()->route('places')->with('success', 'ობიექტი განახლდა');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Place::find($id)->delete();
        return redirect()->back()->with('success', 'ობიექტი წაიშალა !');
    }
}
