<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Request;
use View;
use DB;
use Redirect;
use Session;
class newController extends Controller
{
    public function create()
    { 
       $num = DB::table('number')->orderBy('id', 'desc')->pluck('id');




       return View::make('create')
	       ->with(['num'=> $num[0] ]);
    }


    public function input(Request $request)
    {
             
	    $num = DB::table('number')->orderBy('id', 'desc')->pluck('id');

	    $thingnow = Request::input('now');
	    $input =  Request::only('date');	    
	    DB::table('number')->where('id',$num[0])->update(['num'=>"0000".$num[0], 'date'=>$input['date'],  'thingnow'=>$thingnow]);       

	    $input =  Request::only('where');	    
	    DB::table('area')->where('id',$num[0])->update(['hub'=>$input['where']]);
	   
		
	    $money = Request::input('money');
	    $input =  Request::only('whoneed','whoneedphon','area','area2');           
            DB::table('buy')->where('id',$num[0])->update(['bname'=>$input['whoneed'], 'bphon'=>$input['whoneedphon'], 'barea'=>$input['area'], 'barea2'=>$input['area2'], 'moneynow'=>$money]);
           
	    
	    $input =  Request::only('whosent','whosentphon','sentarea','sentarea2');
            DB::table('sent')->where('id',$num[0])->update(['name'=>$input['whosent'],'phon'=>$input['whosentphon'], 'area'=>$input['sentarea'], 'area2'=>$input['sentarea2']]);

           
	   	
	    Session::flash('message', '物流表單新增成功'); 
            DB::table('number')->insert(['num'=>'1']);
            DB::table('area')->insert(['hub'=>'1']);
            DB::table('sent')->insert(['name'=>'1']);
            DB::table('buy')->insert(['bname'=>'1']);
	   	    

	    $num = DB::table('number')->orderBy('id', 'desc')->pluck('id');
	    return View::make('create')
		    ->with(['num'=>$num[0]]);

	    
    }
    


}
