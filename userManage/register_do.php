<?php
session_start();
$username=$_POST['username'];
$password=$_POST['password'];
$password2=$_POST['password2'];
$TestCode2=$_POST['TestCode2'];

require_once('LinkDB.php');

if($_SESSION['TestCode2']!=strtoupper($TestCode)){//不区分大小写验证
	echo "<script>alert('验证码错误');history.back();</script>";
}else{
if($password==$password2){
	$sql="insert into `user`(`username`,`password`,`userright`) values ('{$username}','{$password}','registered')";
	//$sql = "INSERT INTO `userinfo`.`user` (`username`, `password`, `right`) VALUES (\'$username\', \'$password\', \'\');";
	$result=mysql_query($sql) or die("无效查询：".mysql_error());
	header("location:index.php");
}else{
	echo "<script>alert('密码错误');history.back();</script>";}}
?>