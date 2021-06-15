<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="csrf-token" content="{{ csrf_token() }}" />
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
<div class="col-5 offset-2" style=" border-left-style:inset; height:30px; text-align:left; line-height:30px;"><font color="black" size="4" align="center"> 物流單列表  </font></div>
<div class="col-4"  style="height:30px; text-align:right; line-height:30px;"><button type="button" class="btn btn-outline-dark" onclick="javascript:location.href='http://localhost/new'" >新增物流單</button></div>
</div>

<div style="height:20px"></div>
<div class="row">
<div class="col-9 offset-2"style="height:150px; border-style:solid;">
<div style="height:15px"></div>


{{Form::open(["url"=>"/find","method"=>"post"])}}
<div class="row">
<div class="col ">{{Form::label("id","物流單號：")}}{{Form::text("id")}}</div>
<div class="col ">{{Form::label("date","發送日期：")}} {{Form::date("date")}}</div>
<div class="col ">{{Form::label("where","發送倉庫：")}} {{Form::text("where")}} </div>
</div>

<div style="height:5px"></div>
<div class="row">
<div class="col ">付款狀態：{{Form::select("money", array(''=>'','已付款' => '已付款', '未付款' => '未付款'),false)}}</div>
<div class="col ">{{Form::label("whosent","寄件人姓名：")}} {{Form::text("whosent")}} </div>
<div class="col ">{{Form::label("whoneed","收件人姓名：")}} {{Form::text("whoneed")}} </div>
</div>

<div style="height:5px"></div>
<div class="row">
<div class="col ">{{Form::label("whoneedphon","收件人電話：")}} {{Form::text("whoneedphon")}}</div>
<div class="col ">貨物裝況：{{Form::select("now", array(''=>'','出貨' => '出貨', '未出貨' => '未出貨', '代取貨'=>'代取貨'),false)}}</div>
<div class="col" style="text-align:right;">{{Form::submit("搜尋物流單")}}</div>
</div>
{{Form::close()}}




</div>
</div>


<div style="height:15px"></div>



<div class="row">
<table id = "tablenumber"class="table table-hover col-9 offset-2" style="border:0px #cccccc solid;">
    <thead>
      <tr>
        <th>物流單號</th>
        <th>發送倉庫</th>
	<th>發送日期</th>
	<th>寄件人</th>
	<th>收件人</th>
        <th>聯繫方式</th>
      </tr>
    </thead>
    <tbody>


@foreach ($test as $all)
      <tr>
        <td>{{$all->num}}</td>
        <td>{{$all->hub}}</td>
        <td>{{$all->date}}</td>
        <td>{{$all->name}}</td>
        <td>{{$all->bname}}</td>
        <td>{{$all->bphon}}</td>
      </tr>

@endforeach

    </tbody>
</table>
</div>




<div class="row">
<div class="col-9 offset-2" style="text-align:right; border:0px #cccccc solid;">

<ul class="pagination pagination-sm" style="float:right;">
    <li class="page-item disabled"id="previous" onclick="getMessage(this.value)" value='1'><a class="page-link" href="#">Previous</a></li>
    <li class="page-item"onclick="getMessage(this.value)" value="1" ><a class="page-link" href="#">1</a></li>
    <li class="page-item"onclick="getMessage(this.value)" value="4" ><a class="page-link" href="#">2</a></li>
    <li class="page-item"onclick="getMessage(this.value)" value="7"><a class="page-link" href="#">3</a></li>
    <li class="page-item"id="next" onclick="getMessage(this.value)"value='4'><a class="page-link" href="#">Next</a></li>
</ul>

</div>
</div>









<script>
function getMessage(value){
	var now = value;
	var next= now+3;
	var previous =now-3;
	//$("#next").val(next);
        //$("#previous").val(previous);

	if(next > 7){
		$("#next").removeClass('page-item').addClass('page-item disabled');

	}else{
		$("#next").removeClass('disabled');
                $("#next").val(next);
	
	}
	
        if(previous < 1){
                $("#previous").removeClass('page-item').addClass('page-item disabled');
        }else{
		$("#previous").removeClass('disabled')     
		$("#previous").val(previous);
	
        }
        




     //alert(now);
     $.ajax({
	headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        type: "post",
        url: '/page',
	data: {value:value},
	success: function(data) {
		//		alert(data["one"]["num"])

	
	     for(i=1;i<4;i++){
	      	document.getElementById("tablenumber").deleteRow(1);
	     };
		var table=document.getElementById("tablenumber");
	     for(i=1;i<4;i++){
		var num = ""+i;
             	var row=table.insertRow(i);
		var cell1=row.insertCell(0);
		var cell2=row.insertCell(1);
                var cell3=row.insertCell(2);
                var cell4=row.insertCell(3); 
                var cell5=row.insertCell(4);
                var cell6=row.insertCell(5); 
	
                cell1.innerHTML=data[num]["num"];
		cell2.innerHTML=data[num]["hub"];
                cell3.innerHTML=data[num]["date"];
                cell4.innerHTML=data[num]["name"];
                cell5.innerHTML=data[num]["bname"];
                cell6.innerHTML=data[num]["bphon"];
	     };
	
	     

	}
    })
}








</script>






















</body>
</html>
