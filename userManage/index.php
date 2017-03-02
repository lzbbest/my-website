<?php
session_start();
if(!session_is_registered('username') or $_SESSION['username']=='')
{
	$_SESSION['username']="admin";
}
/*echo "欢迎".$_SESSION['username'];
if($_SESSION['username']=='admin')
{echo "("."<a href='register.html' target='_self'>注册</a>"."|"."<a href='login.html' target='_self'>登录</a>)";}
else
{
	echo "<a href='logout.php'>(注销</a>|<a href='ModifyPassword.html'>修改密码</a>)";}*/
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>过程考核5之PHP编程</title>
<style type="text/css">
.all{
	vertical-align:middle;
	text-align:center;
	box-shadow: 5px 5px 5px #CCC;
	-moz-box-shadow: 10px 10px 5px #CCC; /* 老的 Firefox */
	background-color:#CFF;
	margin-left:15%;
	margin-right:15%;
	}
</style>
</head>
<body>
<div class="all">
<div>
  <h1><?php echo "过程考核5".$_SESSION['username'];?></h1>
</div>
<form target="_self">
<?php
if($_SESSION['username']=='admin')
{echo "("."<a href='register.html' target='_self'>注册</a>"."|"."<a href='login.html' target='_self'>登录</a>)";}
else
{
	echo "<a href='logout.php'>(注销</a>|<a href='ModifyPassword.html'>修改密码</a>)";}
?>
</form>
</div>
</body>
</html>