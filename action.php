<?php
//执行商品的增删改的操作
//一、导入配置文件和函数库文件（没写文件上传和缩放的函数）

//二、连接mysql，选择数据库
 include "/include/conn.php";
 
//三、获取action参数的值，并做对应的操作  
    switch($_GET["action"]){
  	case "add": //添加
  	//1、获取添加信息
      extract($_POST);
      $addtime=time();
    //2、验证（省略）
    //3、执行文件（图片）上传
      $uploads_dir='./upload';
	//var_dump($_FILES);
	  $tmp_name=@$_FILES['pic']['tmp_name'];
	  @$filename=date("YmdHis").rand(1,1000).".jpg";
	  move_uploaded_file($tmp_name,"$uploads_dir/$filename");     
    //4、执行图片缩放
    //5、拼装sql语句并执行添加（单价设置的是六位数，保留两位小数，所以，若超过位数，自动转成9999.99）
     $sql="insert into goods(name,typeid, price,pic,total,note,addtime) 
       values('$name', '$typeid', '$price','$uploads_dir/$filename', '$total', '$note','$addtime')";
       mysql_query($sql);
       header("location:index.php");
    //6、判断并输出结果 	   
    if(mysql_insert_id($link)>0){
    	echo "商品发布成功";
    }else{
    	echo "商品发布失败";
    }
  	 break;
  	 
  	 case "del": //删除
  	 //1、获取要删除的id号，并执行删除语句
  	  $sql="delete from goods where id={$_GET['id']}";
  	  mysql_query($sql);
  	  //2、执行图片删除（图片存放目录里的图片被删除）
  	   if(mysql_affected_rows($con)>0){//判断是否有图片，有的话，执行删除
  	   	unlink($_GET['pic']);//图片的路径。
  	   }
  	 //3、跳转页面
  	 header("location:index.php");
  	 break;
  	 
  	 case "update"; //修改
  	 //1、获取要修改的信息
  	 extract($_POST);
  	 $id=$_POST['id'];
  	 //2、数据验证
  	 if(empty($name)){
  	 	die("商品名称必须有值");
  	 }
  	 //3、判断有无图片上传
  	 //4、有图片上传执行缩放
  	 //5、执行修改
  	 $sql="update goods set name='$name',typeid='$typeid',
  	      price='$price',total='$total',note='$note' where id='$id'";
  	      echo $sql;
  	      mysql_query("set names utf8");
  	 mysql_query($sql);
  	 //6、判断是否修改成功
  	 //echo "<a href='index.php'>浏览</a>";
  	 header("location:index.php");
  	 break;
  }
?>