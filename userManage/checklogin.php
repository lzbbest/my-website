<?php
session_start();
require_once('LinkDB.php');
$username=$_POST['username'];
$password=$_POST['password'];
$TestCode2=$_POST['TestCode2'];

$sql = "SELECT * FROM `user` WHERE 1 AND `username` ='{$username}' LIMIT 0, 30";
$result = mysql_query($sql) or die('��Ч�Ĳ�ѯ��'.mysql_error());
$line = mysql_fetch_object($result);

if($_SESSION['TestCode']!=strtoupper($TestCode2)){//�����ִ�Сд��֤
	echo "<script>alert('��֤�����');history.back();</script>";
}else{
	if($line->password==$password){
	$_SESSION["username"]=$line->username;
	header("location:index.php");
}else{
	echo "<script>alert('�������');	history.back();</script>";
}
}
?>
