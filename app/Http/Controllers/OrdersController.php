<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\Products;

class OrdersController extends Controller
{
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
        //call the products here and display for ordering.
        return view('orders.index', ['batteries'=> self::batteries]);
    }

    public function create(){
        return view('orders.index', ['batteries'=> self::batteries]);
    }

    public function show($id) {

        $order = Orders::findOrFail($id);

        return view('orders.show', ['order' => $order]);
    }

    public function store(){
        //get the id of the order and store it in the
        $order = new Orders();

        return view('orders.index', ['batteries'=> self::batteries]);
    }
}
