<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Request;
use View;
use DB;
class homeController extends Controller
{
    
    public function index()
    {
       $posts = DB::table('number')
	       ->join('area','number.id', '=', 'area.id')
	       ->join('sent','number.id', '=', 'sent.id')
	       ->join('buy','number.id', '=', 'buy.id')
	       ->select('number.num','area.hub','number.date', 'sent.name', 'buy.bname', 'buy.bphon' )
	       ->orderBy('number.num', 'desc')
	       ->skip(1)
	       ->take(3)	 
	       ->get();
	


	    
       return View::make('index')
	       ->with(['test'=>$posts]);
    }
    



    public function select(Request $request){
        $input = Request::all();
   	$posts = DB::table('number')
            ->join('area','number.id', '=', 'area.id')
            ->join('sent','number.id', '=', 'sent.id')
            ->join('buy','number.id', '=', 'buy.id')
	    ->select('number.num','area.hub','number.date', 'sent.name', 'buy.bname', 'buy.bphon', 'buy.moneynow', 'number.thingnow' )
	    ->orderBy('number.num','desc')
	    ->where('number.num', $input["id"])
	    ->orWhere('area.hub', $input["where"])
	    ->orWhere('number.date', $input["date"])
            ->orWhere('sent.name', $input["whosent"])
	    ->orWhere('buy.bname', $input["whoneed"])
            ->orWhere('buy.bphon', $input["whoneedphon"])
	    ->orWhere('number.thingnow', $input["now"])
	    ->orWhere('buy.moneynow', $input["money"])
	    ->offset(1)
	    ->limit(9999)
            ->get();
    //return $posts;
   // return $posts;
       return View::make('index')
               ->with(['test'=>$posts]);
    
    
    
    
    
    
    
    
    }

    
    
}
