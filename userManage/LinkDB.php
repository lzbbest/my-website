<?php
$link= mysql_connect("localhost","root","123456") or die('�޷��������ݿ�'.mysql_error());
mysql_select_db("mydb") or die ('�޷��������ݿ�MyDB:'.mysql_error());
mysql_query("set names utf8");
?>