<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\Products;

class ProductsController extends Controller
{

    public function index(){
        $batteries = Products::latest()->get();
        return view('products.index', ['batteries'=> $batteries]);
    }

    public function create(){
        return view('products.create');
    }

    public function show($id)
    {
        $battery = Products::findOrFail($id);
        
        return view('products.show', ['battery' => $battery]);
    }

    public function store(){
        //get the id of the order and store it in the
        $new_product = new Products();

        $new_product->brand_name = request('product');
        $new_product->size = request('size');
        $new_product->month_warranty = request('warranty');
        $new_product->description = " ";
        $new_product->price = request('price');
        $new_product->stock = request('stock');

        $new_product->save();
        // will return with a message to the index.
        return redirect()->route('products.index')->with('mssg', 'New battery added: ' . $new_product->brand_name);
    }

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'warranty' => 'required|string|max:255',
            'price' => 'required',
            'stock' => 'required|string|max:255',
        ]);
    
        if ($validator->fails()) {
            Log::info('Fails');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $product = Products::findOrFail($id);
        
        $product->month_warranty = request('warranty');
        $product->description = " ";
        $product->price = request('price');
        $product->stock = request('stock');

        $product->save();

        return redirect()->route('products.index')->with('mssg', 'The details of the ' . $product->brand_name . ' battery was updated!');
    }

    public function destroy($id) {

        $battery = Products::findOrFail($id);
        $battery->delete();
    
        return redirect('/products');
    }
}
