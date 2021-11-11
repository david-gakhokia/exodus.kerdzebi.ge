<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Category;
use App\Models\Product;
use App\Models\Setting;
use RealRashid\SweetAlert\Facades\Alert;




class HomeController extends Controller
{


    public function test()
    {
        return "test";
    }


    public function index()
    {

        Alert::info('სისტემის განახლება', 'სერვერზე მიმდინარეობს ტექნიკური სამუშოები , ბოდიშს გიხდით შექმნილი უხერხულობისთვის');
        // Alert::toast('Toast Message', 'Toast Type');
        return view('frontend.pages.index');
    }




    public function menu()
    {

        $categories = Category::with('children')
        ->orderBy('orderNum')
        ->whereNull('parent_id')
        ->get();
        return view('frontend.pages.menu')->with(['categories'  => $categories]);
    }

    public function product($id)
    {
        $category =Category::where('id','=',$id)->first();
        $products =Product::where('category_id','=',$id)->get()->all();
        return view('frontend.pages.products.index' ,compact(['products', 'category']));

    }


    public function QrId($id, Request $request)
    {
        $request->session()->put('tableId', $id);
        return redirect('/home');
    }



    public function index5()
    {
        // $products = Product::get();
        $categories = Category::with('children')->whereNull('parent_id')->orderBy('orderNum')->get();

        // return $products;
        // return $categories;
        return view('frontend.pages.home')->with(['categories'  => $categories]);
    }
    public function language($lan)
    {
        Session::put('whlanguage', $lan);
        return redirect('/home');
    }




    // public function index()
    // {
    //     return view('backend.home');
    // }
}
