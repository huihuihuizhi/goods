<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title></title>
	</head>
	<body>		
		<center>		
		<?php 
		 include "/include/include.php";  //导入导航栏
		 $typelist=array(1=>"数码",2=>"服装",3=>"车");
		?>
		<br>
		<h3>发布商品信息</h3><br>
		  <form action="action.php?action=add" method="post" enctype="multipart/form-data">
			<table border="0" width="300" >
				<tr>
					<td align="right" width="50">名称：</td>
					<td><input type="text" name="name"></td>
				</tr>
				<tr>
					<td align="right">类型：</td>
					<td>
						<select name="typeid">
							<?php 
								foreach($typelist as $key=>$val){
								echo "<option value='{$key}'>{$val}</option>";
							} ?>						
					   </select>
					</td>
				</tr>
				<tr>
					<td align="right">单价：</td>
					<td><input type="text" name="price"></td>
				</tr>
				<tr>
					<td align="right">库存：</td>
					<td><input type="text" name="total"></td>
				</tr>
				<tr>
					<td align="right">图片：</td>
					<td><input type="file" name="pic"></td>
				</tr>
				<tr>
					<td align="right" valign="top">描述：</td>
					<td><textarea name="note" rows="10" cols="30"></textarea></td>
				</tr>
				<tr >
					<td colspan="2" align="center">
						<input type="submit" name="submit" value="添加" >&nbsp;&nbsp;
					    <input type="reset" name="reset" value="重置">
					</td>
				</tr>
			</table>
	</body>
	</form>
	</center>
</html>
