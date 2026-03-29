<?php 

//print_r($_SESSION);exit;
if($_SESSION['user_id']){
header("Location:dashboard.php");
}else{
header("Location:login.php");
}?>