<?php
	
	//修改购物车中的信息
	
	//1、启动会话
	session_start();
    //2、获取要修改的信息
    $id=$_GET['id'];
    $num=$_GET['num'];
    //3、修改商品信息的数量
    $_SESSION["shoplist"][$id]["num"]+=$num;
    //控制商品数量过小
    if($_SESSION["shoplist"][$id]["num"]<1){
    	$_SESSION["shoplist"][$id]["num"]=1;
    }
    //4、跳转到我的购物车页面
    header("location:myCart.php");
    
	
?>
