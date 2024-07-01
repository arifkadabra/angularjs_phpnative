<?php
include('init.php');
session_start();
ini_set('max_execution_time', 0);

$username	= strip_tags(addslashes($_POST['username']));
$password	= strip_tags(addslashes($_POST['password']));

$data 		= mysql_fetch_array(mysql_query("SELECT * FROM"));


if (!empty($data)) {

	$_SESSION['is_login'] 		= "true";
	$_SESSION['username'] 		= $data['username'];
	
	header("location:index.php");
} else header("location:login.php");

?>