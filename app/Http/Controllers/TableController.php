<?php

namespace App\Http\Controllers;

use App\Models\Table;
use App\Models\Place;
use App\Models\Category;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TableController extends Controller
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
        $tables = Table::get();
        $categories = Category::get()->all();
        $places = Place::get()->all();

        return view('backend.tables.index', compact(['tables', 'categories', 'places']));

    }



    public function Qrgenerate($id)
    {
        // $tables =Table::get();

        // $tables = DB::select('select * from tables');
        return view('backend.qrcodes.show', ['table' => Table::findOrFail($id)])->with('id', $id);

    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validateData = $request->validate(
            [
                'name' => 'required|max:2',
                'status' => 'required',
                'place_id' => '',
            ],
            [
                'name.required' => 'შეიყვანეთ მაგიდის ნომერი',
                'status.required' => 'შეიყვანეთ მაგიდის სტატუსი',
                'name.required' => 'შეიყვანეთ მაგიდის ლოკაცია',
            ]
        );

        Table::insert([
            'name' => $request->name,
            'status' => $request->status,
            'place_id' => $request->place_id,
            'created_at' => Carbon::now()
        ]);


        return Redirect()->route('tables')->with('success', 'მაგიდა დაემატა');
    }




    public function show(Table $table ,$id)
    {
        return view('backend.tables.show', ['table' => Table::findOrFail($id)])->with('id', $id);
    }

    public function edit($id)
    {
        $tables = Table::find($id);
        $places = Place::get()->all();
        $categories = Category::get()->all();


        return view('backend.tables.edit', compact('tables','places', 'categories'));
    }


    public function update(Request $request, $id)
    {
        $validateData = $request->validate(
            [
                'name' => 'required|max:2',
                'status' => 'required',
                'place_id' => '',
            ],
            [
                'name.required' => 'შეიყვანეთ მაგიდის ნომერი',
                'status.required' => 'შეიყვანეთ მაგიდის სტატუსი',
                'name.required' => 'შეიყვანეთ მაგიდის ლოკაცია',
            ]
        );

        Table::find($id)->update([
            'name' => $request->name,
            'status' => $request->status,
            'place_id' => $request->place_id,
            'created_at' => Carbon::now()
        ]);


        return Redirect()->route('tables')->with('success', 'მაგიდა დაემატა');
    }

    public function destroy($id)
    {


        Table::find($id)->delete();

        return redirect()->back()->with('success', 'მაგიდა წაიშალა !');
    }
}
