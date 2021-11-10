<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Carbon;
Use Image;


class CategoryController extends Controller
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
        $categories = Category::with('children')->whereNull('parent_id')->get();

        return view('backend.categories.index')->with([
            'categories'  => $categories
        ]);
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
    // public function store(Request $request)
    // {
    //     return 'all';
    // }

    public function store(Request $request)
    {
        $validateData = $request->validate(
            [
                'name_ka' => 'required',
                'name_en' => '',
                'name_ru' => '',
                // 'image' => 'mimes:jpg,jpeg,png',
            ],
            [
                'name_ka.required' => 'Please Input title',
                'name_en.required' => 'Please Input title',
                'name_ru.required' => 'Please Input title',
                'image' => '',
                'parent_id' => '',
            ]
        );

        $image = $request->file('image');

        if ($image) {
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save('backend/images/category/' . $name_gen);
            $last_img = 'backend/images/category/' . $name_gen;

            Category::insert([
                'name_ka' => $request->name_ka,
                'name_en' => $request->name_en,
                'name_ru' => $request->name_ru,
                'image' => $last_img,
                'parent_id' => $request->parent_id,
                'created_at' => Carbon::now()
            ]);
        } else {
            Category::insert([
                'name_ka' => $request->name_ka,
                'name_en' => $request->name_en,
                'name_ru' => $request->name_ru,
                'image' => '',
                'parent_id' => $request->parent_id,
                'created_at' => Carbon::now()
            ]);
        }


        return Redirect()->route('categories')->with('success', 'კატეგორია დაემატა');
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
        $category = Category::find($id);
        $categories = Category::where([['parent_id', null], ['id', '!=', $id]])->get()->all();

        return view('backend.categories.edit', compact('category', 'categories'));
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
        $validateData = $request->validate(
            [
                'name_ka' => 'required|min:2',
            ],
            [
                'name_ka.required' => 'Name',
                'image' => 'image',
            ]
        );

        $old_image = $request->old_image;

        $image = $request->file('image');

        if ($image) {
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($image->getClientOriginalExtension());
            $img_name = $name_gen . '.' . $img_ext;
            $up_location = 'backend/images/category/';
            $last_img = $up_location . $img_name;
            $image->move($up_location, $img_name);

            if (file_exists($old_image)) unlink($old_image);
            Category::find($id)->update([
                'name_ka' => $request->name_ka,
                'name_en' => $request->name_en,
                'name_ru' => $request->name_ru,
                'image' => $last_img,
                'parent_id' => $request->parent_id != '' ? $request->parent_id : null,
                'created_at' => Carbon::now()
            ]);

            return Redirect()->route('categories')->with('success', 'კატეგორია განახლდა');
        } else {
            Category::find($id)->update([
                'name_ka' => $request->name_ka,
                'name_en' => $request->name_en,
                'name_ru' => $request->name_ru,
                'parent_id' => $request->parent_id ? $request->parent_id : null,
                'created_at' => Carbon::now()
            ]);

            return Redirect()->route('categories')->with('success', 'კატეგორია განახლდა');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        $category = Category::find($id);

        if ($category->children) {
            foreach ($category->children()->with('products')->get() as $child) {
                foreach ($child->products as $post) {
                    $post->update(['category_id' => NULL]);
                }
            }

            $category->children()->delete();
        }

        foreach ($category->products as $post) {
            $post->update(['category_id' => NULL]);
        }

        $category->delete();

        return redirect()->back()->with('success', 'კატეგორია წაიშალა !');
    }
}
