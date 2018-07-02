<?php
	//在要使用session的页面开始出使用session_start();函数启动会话
	session_start();//会话启动，下面可以使用session
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title></title>
	</head>
	<body>		
		<center>	
		<?php 
		 include "/include/include.php";
		 $typelist=array(1=>"数码",2=>"服装",3=>"车");
		?>
		<br><br>
		<h3>添加商品到购物车</h3><br>
			
				<?php 
				 //从数据库中读取要购买的信息并添加到购物车中	
				 
				 //1.连接数据库
				 require "/include/conn.php";
				 //2.执行查询(获取要购买的信息 )
				 $id=$_GET["id"];
				 $sql="select * from goods where id='$id'";
				 $result=mysql_query($sql,$con);
				 //3、判断是否没有找到要购买的信息,若有就读取出购买的信息
				 if(empty($result) || mysql_num_rows($result)==0){
				 	 die("没有找到购买的信息");
				 }else{
				 	$shop= mysql_fetch_array($result);
				 }
				 $shop["num"]=1;//添加一个数量的字段
				 //4、准备放入购物车中(若已经存在的商品实现树龄累加)
				 //var_dump($shop);
				 //$_SESSION['shooplist']=$shop;//只能放一个商品
				 if(isset($_SESSION['shoplist'][$shop['id']])){
				 	//若存在，数量++
				 $_SESSION['shoplist'][$shop['id']]["num"]++;//[]定义成数组，可以放很多商品
				 }else{
				 	//若不存在，作为新购买的商品添加到购物车中
				 	$_SESSION['shoplist'][$shop['id']]=$shop;
				 }
				?>
		
			</table>
	</body>
	</center>
</html>
