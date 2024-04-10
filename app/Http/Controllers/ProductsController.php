<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class ProductsController extends Controller
{

    // $table->bigIncrements('id');
    // $table->timestamps();
    // $table->string('brand_name');
    // $table->string('month_warranty');
    // $table->json('description');
    // $table->unsignedBigInteger('price');
    // $table->unsignedBigInteger('stock');

    const PLATINUM = 'Yokohama Platinum';
    const SUPREME = 'Yokohama Supreme ';

    const batteries = [
        ['id'=> '1','brand'=> self::PLATINUM, 'size'=>'3SM', 'warranty'=> '27','price'=>'9,000' , 'stock'=>'20'],
        ['id'=> '2','brand'=> self::PLATINUM, 'size'=>'2SM', 'warranty'=> '27','price'=>'8,000' , 'stock'=>'10'],
        ['id'=> '3','brand'=> self::PLATINUM, 'size'=>'1SM', 'warranty'=> '27','price'=>'7,000' , 'stock'=>'20'],
        ['id'=> '4','brand'=> self::SUPREME, 'size'=>'1SM', 'warranty'=> '24','price'=>'6,000' , 'stock'=>'35'],
        ['id'=> '5','brand'=> self::SUPREME, 'size'=>'2SM', 'warranty'=> '24','price'=>'5,000' , 'stock'=>'90'],
        ['id'=> '6','brand'=> self::SUPREME, 'size'=>'3SM', 'warranty'=> '24','price'=>'4,000' , 'stock'=>'40']
    ];

    public function index(){

        //$batteries = Products::latest()->get();     

        return view('products.index', ['batteries'=> self::batteries]);
    }

    public function create(){
        return view('products.create');
    }

    public function store(){
        //get the id of the order and store it in the
        $new_product = new Products();

        $new_product->brand_name = request('product');
        $new_product->month_warranty = request('warranty');
        $new_product->description = request('base');
        $new_product->price = request('price');
        $new_product->stock = request('stock');

        // $new_product->save();

        return view('products.index')->with('mssg', 'Thanks for your order!');
    }

    public function destroy($id) {

        $battery = Products::findOrFail($id);
        $battery->delete();
    
        return redirect('/products');
    }
}
