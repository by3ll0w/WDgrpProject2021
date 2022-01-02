<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\NoodleType;

class NoodleTypeController extends Controller
{
    //
    public function add(){
        $r=request();
        $addNoodleType=NoodleType::create([
            'name'=>$r->noodleTypeName,
        ]);
        return redirect()->route('viewNoodleType');
    }

    public function view(){
        $viewNoodleType=NoodleType::all();
        return view('showNoodleType')->with('noodle_types',$viewNoodleType);
    }
}
