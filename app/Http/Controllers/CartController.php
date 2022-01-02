<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Cart;
use App\Models\Food;


class CartController extends Controller
{
    //

    public function getCart()
    {


        $cart = $this->obtainCart();

        return view('testCart');
    }


    public function viewCart(){
      //  $f=Food::where('CartID',$this->obtainCart())->first();
            $cart=Cart::where('UserID', auth()->user()->id)->where('checkout', 'NO')->get();;
            $food=DB::table('food')->where('CartID',$this->obtainCart()->value('id'))
            ->leftjoin('noodle_types','noodle_types.id','=','food.NoodleTypeID')  
            ->leftjoin('toppings','toppings.id','=','food.ToppingID')
            ->select(
                'food.*','noodle_types.name as Noodle',
                'food.*','toppings.name as ToppingName'
                )
            ->get();
            $this->updatePrice();
           
            return view('viewCart')->with('food',$food)->with('cart',$cart);
      

    }


    //Obtain existing Cart or make new one
    public function obtainCart()
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
    //calculate total price 
    public function calcPrice(){
        return Food::where('CartID',$this->obtainCart()->value('id'))->sum('TotalPrice');
    }


//get total price if cart is opened
    public function updatePrice(){
       $cart = $this->obtainCart();
        $cart->amount=($this->calcPrice());
        $cart->save();

    }
   
//checkout
public function checkOut(){
    //declare current cart
    $cart = $this->obtainCart();

    //


    //change cart status
        $cart->checkout="YES";
        $cart->save();
}



}
