<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\ChineseOrder;
use App\Models\Category;
use App\Models\ProductTranslation;
use App\Exceptions\CustomException;

use Redirect;
use Session;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;


class OrderController extends Controller
{

    public function Adminindex(Request $request)
    {
        // $orders = Order::get();
        $orders = DB::table('orders')
            // ->where('user_id', '=', $request->session()->get('wdUserId'))
            ->join('products', 'orders.product_id', '=', 'products.id')
            ->join('tables', 'orders.table_id', '=', 'tables.id')
            ->join('places', 'tables.place_id', '=', 'places.id')
            ->select('orders.*', 'products.name as pname', 'products.price', 'products.image','tables.place_id', 'tables.name','places.name as plname')
            ->get();
        return view('backend.orders.index', compact('orders'));
    }

    public function updateQuantity(Request $request){

        $id = $request->input('id');
        $quantity = $request->input('quantity');
        Order::find($id)->update([
            'quantity' => $quantity,
        ]);

        return $quantity;
    }

    public function FrontOrder(Request $request )
    {
        $locale = $request->query('language');
        $orders = DB::table('orders')
            ->where('user_id','=',$request->session()->get('wdUserId'))
            ->join('products', 'products.id', '=', 'orders.product_id')
            ->select('orders.*', 'products.numeric', 'products.name_ka','products.name_en', 'products.name_ru','products.price','products.image')
            ->get();
        return view('frontend.pages.orders',compact('orders'));
    }


    public function create(Request  $request)
    {
        $product_id = $request->input('product_id');
        $quantity = $request->input('quantity');
        $table_id = $request->session()->get('tableId');
        $request->session()->get('wdUserId');
        $generatedId =  Str::random();
        $user_id = $request->session()->get('wdUserId');
        if (!$user_id) {
            $request->session()->put('wdUserId', $generatedId);
            $user_id = $generatedId;
        }
        Order::insert([
            'product_id' => $product_id,
            'table_id' => $table_id,
            'user_id' => $user_id,
            // 'place_id' => $place_id,
            'quantity' => $quantity,
            'created_at' => Carbon::now()
        ]);

        return redirect()->back()->withErrors(['Order Added', 'The Message']);
    }

    public function destroy($id)
    {
        Order::find($id)->delete();
        return redirect()->back()->with('success', 'შეკვეთა წარმატებით წაიშალა!');
    }

    public function Chinesedestroy($id)
    {
        ChineseOrder::find($id)->delete();
        return redirect()->back()->with('success', 'შეკვეთა წარმატებით წაიშალა!');
    }

    public function clearCart(Request $request)
    {
        Order::where('user_id', $request->session()->get('wdUserId'))->delete();
        return redirect()->back()->with('success', 'კალათა წარმატებით გასუფთავდა!');
    }

    public function ChineseclearCart(Request $request)
    {
        ChineseOrder::where('user_id', $request->session()->get('wdUserId'))->delete();
        return redirect()->back()->with('success', 'კალათა წარმატებით გასუფთავდა!');
    }
}
