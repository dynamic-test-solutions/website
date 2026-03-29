<?php
session_start();
include "../common/database.class.php";
//error_reporting(0);
$db=new database;
$tablename="users";

if(isset($_POST))
{
	
	$condition=array("user_name='".$_POST[user_name]."'", "password='".$_POST[password]."'");
	$result=$db->findOne($tablename,$condition);
	
	if(is_array($result))
	{ 
		$_SESSION['user_id']=$result[user_id];
		$_SESSION[user_name]=$result[user_name];
		header("Location:dashboard.php");
	}
	else
	{
	header("Location:index.php?act=n");
	}
}
?>