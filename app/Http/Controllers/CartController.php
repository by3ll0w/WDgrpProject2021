<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Cart;
use App\Models\Food;
use App\Models\Order;

class CartController extends Controller
{
    //

//test function
    public function getCart()
    {


        $cart = $this->obtainCart();

        return view('testCart');
    }


//function to list items in cart
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
    //get current user ID
    $key = auth()->user()->id;

    //declare current cart
    $cart = $this->obtainCart();
   
    //add new order
    $order=Order::create([
        'UserID'=$key,
        

    ]);


    //change cart status
        $cart->checkout="YES";
        $cart->save();
}



}
