<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Product;


class SearchController extends Controller
{

    public function index ()
    {
        $Products = Product::latest()->paginate(8);
        return view('products.index',compact('Products'));
    }


    public function show(Product $Product)
    {
        return view('products.show',compact('Product'));
    }

    public function search(Request $request)
    {

        $request->validate([
            'query' => 'required|min:2',
        ]);

        $query = $request->input('query');

        $products = Product::where('name', 'like', "%$query%")->paginate(10);
        return view('frontend.pages.search-results')->with('products', $products);
    }

}
