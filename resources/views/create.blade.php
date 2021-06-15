<!DOCTYPE html>
<html>
  <head>
    <title>布丁物流中心</title>
    <link rel="stylesheet" href="/css/app.css">
    <script src="/js/app.js"></script>
  </head>
  <body>
	<div class="row">
	<div class="col-12" style="background-color:black; height:100px; text-align:center; line-height:100px;"><font size="40px" face="DFKai-sb" align="center"><a href="/home" style="color:#FFFF; text-decoration:none;"> 布丁物流中心</a></font></div>
	</div>

	<div style="height:50px"></div>

	<div class="row">
	<div class="col-5 offset-2" style=" border-left-style:inset; height:30px; text-align:left; line-height:30px;"><font color="black" size="4" align="center"> 新增物流單  </font></div>
	</div>
	
	<div style="height:20px"></div>
	
	<div class="row">
	<div class="col-9 offset-2"style="height:160px; border-style:solid;">
	<div style="height:15px"></div>
	{{Form::open(["url"=>"/input","method"=>"post"])}}	
	<div class="row">
	<div class="col">{{Form::label("id","物流單號：")}}0000{{$num}} </div>
	<div class="col">{{Form::label("date","發送日期：")}} {{Form::date("date")}} </div>
        <div class="col">{{Form::label("where","發送倉庫：")}} {{Form::text("where")}} </div>
        <div class="col">貨物裝況：{{Form::select("now", array('出貨' => '出貨', '未出貨' => '未出貨', '代取貨'=>'代取貨'),false)}} </div>
	</div>
	
        <div class="row">
        <div class="col">{{Form::label("whoneed","收件人姓名：")}} {{Form::text("whoneed")}} </div>
        <div class="col">{{Form::label("whoneedphon","收件人電話：")}} {{Form::text("whoneedphon")}} </div>
        <div class="col">{{Form::label("area","收件人地區：")}} {{Form::text("area")}} </div>
	<div class="col">{{Form::label("area2","收件人地址：")}} {{Form::text("area2")}} </div>
        </div>
	
        <div class="row">
        <div class="col">付款狀態：{{Form::label("okmoney","已付款")}} {{Form::radio("money",'已付款',false,array('id'=>'okmoney'))}} {{Form::label("nomoney","未付款")}} {{Form::radio("money",'未付款',false,array('id'=>'nomoney'))}} </div>
        <div class="col">{{Form::label("whosent","寄件人姓名：")}} {{Form::text("whosent")}} </div>
        <div class="col">{{Form::label("whosentphon","寄件人電話：")}} {{Form::text("whosentphon")}} </div>
        <div class="col">{{Form::label("sentarea","寄件人地區：")}} {{Form::text("sentarea")}} </div>
        </div>

        <div class="row">
        <div class="col">{{Form::label("sentarea2","寄件人地址：")}} {{Form::text("sentarea2")}} </div>
        <div class="col-1">{{Form::submit("送出物流單")}}</div>
        </div>


	{{Form::close()}}
	
	<div style="height:20px"></div>	

	@if(Session::has('message'))
	<div class="row">
	<div class="col alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>{{ Session::get('message') }}</strong> </div>
	</div>	
	@endif




	</div>
	</div>


  </body>
</html>
