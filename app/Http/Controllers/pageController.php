<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Request;
use DB;

class pageController extends Controller
{
    public function view(Request $request){

       $num = $request::input('value');
       $posts = DB::table('number')
               ->join('area','number.id', '=', 'area.id')
               ->join('sent','number.id', '=', 'sent.id')
               ->join('buy','number.id', '=', 'buy.id')
               ->select('number.id','number.num','area.hub','number.date', 'sent.name', 'buy.bname', 'buy.bphon' )
               ->orderBy('number.id', 'desc')
               ->skip($num)
               ->take(3)
               ->get();



	//return response()->json($posts);
       return  array('1'=>$posts[0],'2'=>$posts[1],'3'=>$posts[2]);

	       

	//echo '<pre>' , var_dump($posts) , '</pre>';
	//echo var_dump(  $posts);
	//var_dump ($posts->name);
      //return response()->json(array('aaa'=>'bbb'));
    }


}
