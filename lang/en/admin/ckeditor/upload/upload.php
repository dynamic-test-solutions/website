<?php


if (file_exists("images/" . $_FILES["upload"]["name"]))
{
 echo $_FILES["upload"]["name"] . " already exists. ";
}
else
{
	$adminfile=explode("/",$_SERVER['REQUEST_URI']);
	$filepath=$_SERVER['SERVER_ROOT']."/".$adminfile[1]."/".$adminfile[2]."/assets/js/ckeditor/images/";
 move_uploaded_file($_FILES["upload"]["tmp_name"],$filepath.$_FILES["upload"]["name"]);
 echo "Stored in: " . $_SERVER['DOCUMENT_ROOT']."/".$adminfile[1]."/".$adminfile[2]."/assets/js/ckeditor/images/" . $_FILES["upload"]["name"];
}
?>