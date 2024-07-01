<?php
include('../init.php');
require_once("../json_encode.php");
require_once("../json_decode.php");

if (GetParam("Action","")=="GetData") {
	$rs = FormData();
	echo json_encode($rs);exit;
}

//***************************************************
//*************** ACTION FUNCTION *******************
//***************************************************
function FormData()
{
	$q = "SELECT * FROM";
	$r = GetDataAll($q);
	return $r;
}

//***************************************************
//***************** FUNCTION ************************
//***************************************************
function GetDataAll($sql){
	if($row = mysql_query($sql)){
		while ($r = mysql_fetch_assoc($row)){
			$msg[] = $r;
		}
	}
	return $msg;
}

function GetData($sql,$page,$range){
	$from = 0;
	if($page > 1){
		$from = ($page-1) * $range ;
		//var_dump($from);exit;
	}
	
	if($row1 = mysql_query($sql)){
		while ($r1 = mysql_fetch_assoc($row1)){
			$msg1[] = $r1;
		}
	}
	$cint = count($msg1);
	$cPage = ceil($cint/$range);
	//echo $cint.' - '.$cPage.' - ';exit;
	$sql .=  " limit $from,$range";
	//echo $sql;exit;
	if($row = mysql_query($sql)){
		while ($r = mysql_fetch_assoc($row)){
			$msg[] = $r;
		}
	}
	
	$result[] = Array('data'=>$msg,'count'=>$cint,'countPage'=>$cPage);
	return $result;
}
function Strip($value) {
    if(get_magic_quotes_gpc() == 0)
    return $value;
    else
    return stripslashes($value);
}

function GetParam($parameter_name, $default_value) {
	global $_POST;
	global $_GET;
	$parameter_value = "";
	if(isset($_POST[$parameter_name]))
	$parameter_value = Strip($_POST[$parameter_name]);
	else if(isset($_GET[$parameter_name]))
	$parameter_value = Strip($_GET[$parameter_name]);
	else
	$parameter_value = $default_value;
	return $parameter_value;
}
?>