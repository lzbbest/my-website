<?php
session_start();
session_unregister('username');
header("location:index.php");
?>