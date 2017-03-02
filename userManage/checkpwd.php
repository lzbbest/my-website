<?php
session_start();

$username=$_SESSION['username'];
$password=$_POST['password'];
$newpwd=$_POST['newpwd'];
$newpwd2=$_POST['newpwd2'];
$TestCode2=$_POST['TestCode2'];

require_once('LinkDB.php');

if($_SESSION['TestCode2']!=strtoupper($TestCode)){//不区分大小写验证
	echo "<script>alert('验证码错误');history.back();</script>";
}else{
if($newpwd==$newpwd2){
	$sql="select * from `user` where 1 and `username`='{$username}' limit 0,30";
	$result = mysql_query($sql) or die("无效的查询：".mysql_error());
	while($tmp=mysql_fetch_object($result))
	{
		if($tmp->password==$password)
		{
			$update = "UPDATE `mydb`.`user` SET `password` = '{$newpwd}' WHERE `user`.`username` = '{$username}';";
			//$update="updata `user` set `password`='{$newpwd}' where `username`='{$username}'";
			$result2=mysql_query($update) or die("更新失败：".mysql_error());
			echo "<script>alert('密码修改成功');</script>";
			header("location:index.php");
		}else{
			echo "<script>alert('密码错误！');history.back();</script>";
		}
	}
	mysql_close($link);
}else{
	echo "<script>alert('新密码错误');history.back();</script>";
}
}
?>