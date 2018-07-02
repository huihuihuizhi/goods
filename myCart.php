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
		<h3>浏览我的购物车</h3><br>
		<table border="1" width="600">
			<tr>
				<th>商品id号</th>
				<th>商品名称</th>
				<th>商品图片</th>
				<th>单价</th>
				<th>数量</th>
				<th>小计</th>
				<th>操作</th>
			</tr>
				<?php 
				//echo "<pre>";
				//	var_dump($_SESSION);
				//echo "</pre>";
				$sum=0;//定义总金额的变量
				//若不判断会报两个提示
				if(isset($_SESSION["shoplist"]))//Notice: Undefined index: shoplist in D:\phpstudy\WWW\goods\myCart.php on line 32
                                                //Warning: Invalid argument supplied for foreach() in D:\phpstudy\WWW\goods\myCart.php on line 32
				foreach($_SESSION["shoplist"] as $v){
					echo "<tr>";
					echo "<td>{$v['id']}</td>";
					echo "<td>{$v['name']}</td>";
					echo "<td><img src='{$v['pic']}' width='80'></td>";
					echo "<td>{$v['price']}</td>";
					echo @"<td align='center'>
						      <button onclick='window.location=\"updateCart.php?id={$v['id']}&num=-1\"'>-</button>
						      {$v['num']}
						      <button onclick='window.location=\"updateCart.php?id={$v['id']}&num=+1\"'>+</button>
						      
					
					      </td>";
					
					echo "<td>".$v["price"]*$v["num"]."</td>";
					echo "<td><a href='cleanCart.php?id={$v['id']}'>删除</a></td>";
					echo "</tr>";
					$sum+=$v["price"]*$v["num"]; //累计金额
				}
				?>
				<tr>
					<th>总结金额：</th>
					<th colspan="5" align="right"><?php echo $sum; ?></th>
					<td>&nbsp;</td>
				</tr>
		
		</table>		
	</body>
	</center>
</html>
