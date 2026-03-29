<?php include "../common/database.class.php";
include "../common/functions.php";

error_reporting(0);
$db=new database;




//continue only if $_POST is set and it is a Ajax request
if(isset($_POST) && isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
	
	$item_per_page=15;
	//Get page number from Ajax POST
	if(isset($_POST["page"])){
		$page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
		if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
	}else{
		$page_number = 1; //if there's no page number, set it to 1
	}
	//$filtercategory=$_POST['category_id']?"and products.category_id='".$_POST['category_id']."'":'';	
	$query="select * from users";
	$products=$db->find($query);
	
	//get total number of records from database for pagination
	
	$get_total_rows = count($products); //hold total records in variable
	if(!$get_total_rows){
		$set='<div class="grid-cn-2">
              <div cass="emptyproduct"> There is User to display... </div>
              </div>';
		echo $set;exit;
              
	}
	//break records into pages
	$total_pages = ceil($get_total_rows/$item_per_page);
	
	//get starting position to fetch the records
	$page_position = (($page_number-1) * $item_per_page);
	
	
	$query="select * from users order by user_id LIMIT $page_position, $item_per_page";
	$products=$db->find($query);
	$set.='<table align="center" border="1" width="80%">
            <tr>
              	<th>S.No</th><th>User</th><th>Options</th>
			</tr>';
	//Display records fetched from database.
	$i=1;
	foreach ($products as $key => $values){
		
		 				 	
			$set.='<tr>';
			$set.='<td>'.$i.'</td>';
			$set.='<td>'.$values['user_name'].'</td>';
			$set.='<td><a href="editsettings.php?act=Edit&id='.$values['user_id'].'">Edit </a> |  <a href="viewsettings.php?a=d&i='.$values['user_id'].'" onclick="return myconfirm();">Delete</a></td>';
			$set.='</tr>';  
			$i++;              
               }
               $set.="<table>";
    echo $set;
     
  	echo '<br><div align="center">';
	/* We call the pagination function here to generate Pagination link for us. 
	As you can see I have passed several parameters to the function. */
	echo $db->paginate_function($item_per_page, $page_number, $get_total_rows[0], $total_pages);
	echo '</div>';
	
	exit;
}

?>