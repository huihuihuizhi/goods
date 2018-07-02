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
		<h3>浏览商品信息</h3><br>
			<table border="1" width="800">
				<tr>
					<th>商品编号</th>
					<th>商品名称</th>
					<th>商品图片</th>					
					<th>单价</th>					
					<th>库存量</th>
					<th>添加时间</th>					
					<th>操作</th>					
				</tr>
				<?php 
				 //从数据库中读取信息并输出到浏览器中	
				 
				 //1.连接数据库
				 require "/include/conn.php";
				 //2.执行查询
				 $sql="select * from goods";
				 $result=mysql_query($sql);
				 //解析结果集
				 while($row=mysql_fetch_array($result)){
				 	echo "<tr>";
				 		echo "<td>{$row['id']}</td>";
				 		echo "<td>{$row['name']}</td>";
				 		echo "<td><img src='{$row['pic']}' width='70' height='70'></td>";
				 		echo "<td>{$row['price']}</td>";
				 		echo "<td>{$row['total']}</td>";				 		
				 		echo "<td>".@date("Y-m-d H:i:s",$row['addtime'])."</td>";
				 		echo "<td><a href='action.php?action=del&id={$row['id']}&pic={$row['pic']}'>删除</a>
				 			      <a href='update.php?id={$row['id']}'>修改</a>
				 			      <a href='{$row['pic']}'>查看</a>
				 			      <a href='download.php?name={$row['pic']}'>下载</a>
				 			      <a href='addCart.php?id={$row['id']}'>放入购物车</a>
				 			  </td>";
				 		
				 			      
				 			      
				 			
				 	echo "</tr>";
				 }
				?>
		
			</table>
	</body>
	</center>
</html>
