<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use App\Models\Orders;
use App\Models\Products;

class OrdersController extends Controller
{
    public function index(){
        //call the products here and display for ordering.
        $orders = Orders::all();
        return view('orders.index', ['orders'=> $orders]);
    }

    // TODO: sort by product name, then sort again to make the 0 stock to the last on the list. 
    public function create(){

        $batteries = Products::latest()->get();
        return view('orders.create', ['batteries'=> $batteries]);
    }

     // TODO: show blade design.
    public function show($id) {

        $order = Orders::findOrFail($id);
        return view('orders.show', ['order' => $order]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'contact' => ['required', 'regex:/^[1-9]\d{9}$/'],
            'address' => 'required|string|max:255',
            'battery_id' => 'required'
        ]);

        if ($validator->fails()) {
            Log::info('Fails');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $product = Products::findOrFail($request->battery_id);

        if (!$product || $product->stock == 0) {
            return redirect()->back()->with('error', 'Selected product is out of stock.');
        }


        $order = new Orders();
        $order->name = $request->name;
        $order->contact = $request->contact;
        $order->address = $request->address;
        $order->product_id = $request->battery_id;
        $order->quantity = 1;

        $order->save();
        return redirect('/')->with('message', 'Order submitted successfully!');
    }


    //will destroy the order and will update the stock number of that specific product
    public function destroy($id)
    {
        $order = Orders::findOrFail($id);

        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }
        
        //the product came from the order model. Created a relationship between the 2 tables
        $product = $order->product;
        
        //Will not complete the order if stick is 0
        if (!$product || $product->stock == 0) {
            return redirect()->back()->with('noStockError', 'Selected product is out of stock.');
        }

        $product->stock -= $order->quantity;
        $product->save();

        $order->delete();

        return redirect('/orders');
    }

}
