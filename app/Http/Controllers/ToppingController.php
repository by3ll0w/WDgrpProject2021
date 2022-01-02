<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Topping;

class ToppingController extends Controller
{
    //
    public function add(){
        $r=request();
        $addTopping=Topping::create([
            'name'=>$r->toppingName,
        ]);
        return redirect()->route('viewTopping');
    }

    public function view(){
        $viewTopping=Topping::all();
        return view('showTopping')->with('toppings',$viewTopping);
    }

}
