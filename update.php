<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>修改商品信息</title>
	</head>
	<body>
		<!--
        	修改页面和添加页面相同
        -->
		<center>
		
		<?php 
		 include "/include/include.php";
		 $typelist=array(1=>"数码",2=>"服装",3=>"车");
		 
		 //获取要修改的信息
		        //1.连接数据库
				 require "/include/conn.php";
				 //2.获取要修改的商品信息
				 $id=$_GET["id"];
				 $sql = "select * from goods where id=$id";
				 $result=mysql_query($sql);				 
				 //3.判断是否获取到了要编辑的信息，并解析要修改的信息
				 
				 	$row=mysql_fetch_array($result);
				
		?>
		<br><br>
		<h3>编辑商品信息</h3><br>
			<form action="action.php?action=update" method="post" enctype="multipart/form-data">
			<!--
            	因为获取的编辑的信息中没有编辑id号，所以点击修改的时候，
            	提交到执行页面的时候也不会把id号传过去，所以要加一个隐藏域，获取修改的id号
            -->
			<input type="hidden" name="id" value="<?php echo $row['id']; ?>">	
			<table border="0" >
				<tr>
					<td align="right" width="50">名称：</td>
					<td><input type="text" name="name" value="<?php echo $row['name']; ?>"></td>
				</tr>
				<tr>
					<td align="right">类型：</td>
					<td>
						<select name="typeid">
							<?php foreach($typelist as $key=>$val){
								$sd = ($row['typeid']==$key)?"selected":"";//是否是当前的类型
								echo "<option value='{$key}'{$sd}>{$val}</option>";
							} ?>
						
					</select></td>
				</tr>
				<tr>
					<td align="right">单价：</td>
					<td><input type="text" name="price" value="<?php echo $row['price']; ?>"</td>
				</tr>
				<tr>
					<td align="right">库存：</td>
					<td><input type="text" name="total" value="<?php echo $row['total']; ?>"</td>
				</tr>
				<tr>
					<td align="right">图片：</td>
					<td><input type="file" name="pic" ></td>
				</tr>
				<tr>
					<td align="right" valign="top">描述：</td>
					<td><textarea name="note" rows="10" cols="30"><?php echo $row['note']; ?></textarea></td>
				</tr>
				<tr >
					<td colspan="2" align="center">
						<input type="submit" name="submit" value="修改" >
					    <input type="reset" name="reset" value="重置"></td>
				</tr>
				<tr >
					<td align="right" valign="top">&nbsp;</td>
					<td><img src="<?php echo $row['pic']; ?>" width="100" height="100"></td>
					   
				</tr>
			</table>
	</body>
	</form>
	</center>
</html>
