<?php
	
	//删除购物车中session的信息
	//1、在要使用session的页面开始出使用session_start();函数启动会话
	session_start();//会话启动，下面可以使用session
	
	//判断是删除一个商品还是清空整个购物车。
	   //因为mycart.php中传过来的是id号，所以如果有id号就是删除一个商品，否则，清空整个购物车
	   if($_GET['id']){
	   	 //从session中删除指定的商品的信息
	   	unset($_SESSION["shoplist"][$_GET['id']]);
	   }else{
	   	
	    //删除购物车中session的信息，一定不要清空session，要清空session里面的信息
	   unset($_SESSION["shoplist"]);
	   }
	
	
	//跳转到浏览购物车界面
	header("location:myCart.php");
	
?>
