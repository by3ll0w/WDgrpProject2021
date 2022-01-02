<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use App\Models\Food;
use App\Models\Cart;
use App\Models\NoodleType;
use App\Models\Topping;
use App\Http\Controllers\CartController;

class FoodController extends Controller
{
    //
    public function add()
    {
        $r = request();
        $price=$this::getPrice($r->foodSize);


        $addProduct = Food::create([
            'size' => $r->foodSize,
            'quantity' => $r->foodQuantity,
            'unitPrice' => $price,
            'totalPrice' => $price * ($r->foodQuantity),
            'ToppingID' => $r->ToppingID,
            'NoodleTypeID' => $r->NoodleTypeID,
            'CartID' =>$this->obtainCart()->value('id')

        ]);

            (new CartController)->updatePrice();

        Session::flash('success', "Product created successfully!");

        return redirect()->route('home');
    }




   


    public static function obtainCart()
    {
        $key = auth()->user()->id;
        $cart = Cart::where('UserID', $key)->where('checkout', 'NO')->first();

        if (!$cart) {
            $cart = Cart::create([
                'UserID' => $key,
                'amount' => 0,
                'checkout' => "NO"
            ]);
        }

        return $cart;
    }

    public static function getPrice($size)
    {
        switch ($size) {
            case "S":
                return 4.50;
                break;
            case "M":
                return 6.00;
                break;
            case "L":
                return 8.00;
            default:
                return 0;
                break;
        }
    }
}
