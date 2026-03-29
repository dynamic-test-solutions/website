<?php 
session_start();
if($_SESSION['user_name']=="")
{
header("location:index.php?act=invalid");
}
include_once 'header.php';
//include "../common/database.class.php";
//include "../common/functions.php";
error_reporting(0);
/*if($_GET['act']=='del'){
	if($_GET['category_id']){
		$db=new database;
		$category_id=$_GET['category_id'];
		$conditons=array("category_id=".$category_id);					
		$db->deleteRow('product_categories',$conditons);
		header("location:categories.php");
	}
}*/

$db=new database;



if($_GET['act']=="e")
{

if($_POST['Edit']!="")
{
		
	
		 
		   	 
		     unset($_POST[Edit]);
		
			 $table_name="users";
			 
			 $condition=array('user_id='.$_POST['user_id']);
			 $arguments=$_POST;
			// print_r ($product_arguments);
			// print_r ($condition);
			// exit();
			 
			 //$product_id=$_GET['id'];
			 //unset($_GET[id]);
//			 echo '<pre>';
//			 print_r($_POST);
//			 echo $product_id;
//			 echo '</pre>';
//			 print_r($product_arguments); 
//			 print_r( $condition);
//			 exit;
			 $db->update($table_name,$arguments,$condition);
			 
		 
	 
			
			header("location:viewsettings.php?Action=Updated");
		}
		
}
		else{
			$conditons=array('user_id='.$_GET['id']);
			$category=$db->findOne('users',$conditons);
			
			//print_r($category);
}


if($_GET['act']=='del'){
	if($_GET['user_id']){
		$db=new database;
		$user_id=$_GET['user_id'];
		$conditons=array("user_id=".$user_id);					
		$db->deleteRow('users',$conditons);
		header("location:viewsettings.php?Action=Deleted");
	}
}

?>
<style>
#country_flag_image{
display:none;
}
</style>
<div class="container-fluid" id="main-container"> <a id="menu-toggler" href="#"> <span></span> </a>
  <div id="sidebar">
    <ul class="nav nav-list">
      <li><a href="#" class="dropdown-toggle"> <i class="icon-picture"></i> <span>Country</span> <b class="arrow icon-angle-down"></b> </a>
        <ul class="submenu">
          <li class="active"><a href="addplace.php"> <i class="icon-picture"></i> <span>Add Countries</span> <b class="arrow icon-angle-down"></b> </a></li>
          <li ><a href="viewplace.php"> <i class="icon-picture"></i> <span>view countries</span> <b class="arrow icon-angle-down"></b> </a></li>
        </ul>
      </li>
      <li><a href="#" class="dropdown-toggle"> <i class="icon-picture"></i> <span>Jobs</span> <b class="arrow icon-angle-down"></b> </a>
        <ul class="submenu">
          <li><a href="viewsubmenu.php"> <i class="icon-picture"></i> <span>View Jobs</span> <b class="arrow icon-angle-down"></b> </a></li>
          <li><a href="submenu.php"> <i class="icon-picture"></i> <span>Add Jobs</span> <b class="arrow icon-angle-down"></b> </a></li>
        </ul>
      </li>
      <li><a href="#" class="dropdown-toggle"> <i class="icon-picture"></i> <span>Setting</span> <b class="arrow icon-angle-down"></b> </a>
        <ul class="submenu">
          <li><a href="settings.php"> <i class="icon-picture"></i> <span>Add Settings</span> <b class="arrow icon-angle-down"></b> </a></li>
          <li class="active"><a href="viewsettings.php"> <i class="icon-picture"></i> <span>View Settings</span> <b class="arrow icon-angle-down"></b> </a></li>
        </ul>
      </li>
    </ul>
    <!--/.nav-list-->
    <div id="sidebar-collapse"><i class="icon-double-angle-left"></i></div>
  </div>
  <div id="main-content" class="clearfix">
    <div id="page-content" class="clearfix">
      <div class="page-header position-relative">
        <h1>Settings</h1>
      </div>
      <!--/.page-header-->
      <div class="product_type">
        <h4>Add/Edit Settings</h4>
       
        <form class="form-horizontal" id="type_form" name="type_form" method="post" action="?act=e" enctype="multipart/form-data">
        <input type="hidden" name="Edit" value="edit">
        <input type="hidden" name="user_id" value="<?php echo $_GET['id']; ?>">
                   <div class="control-group">
            <label class="control-label" for="form-field-1">User Name</label>
            <div class="controls">
              <input type="text" name="user_name" id="user_name" value="<?php echo $category['user_name']?>">
              
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="form-field-1">Password</label>
            <div class="controls country_flag_image_input">
              <input type="password" name="password" id="password" value="<?php echo $category['password']?>">
            </div>
            
          </div>
         
          <div class="form-actions">
            <button class="btn btn-info" type="submit" id="submit"> <i class="icon-ok bigger-110"></i>Submit </button>
          </div>
        </form>
      </div>
      
      <!--/row-->
    </div>
    <!--/#page-content-->
  </div>
  <!--/#main-content-->
</div>
<!--/.fluid-container#main-container-->
<a href="#" id="btn-scroll-up" class="btn btn-small btn-inverse"> <i class="icon-double-angle-up icon-only bigger-110"></i> </a>
<!--basic scripts-->
<script src="../../../../ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
			window.jQuery || document.write("<script src='assets/js/jquery-1.9.1.min.js'>"+"<"+"/script>");
		</script>
<script src="assets/js/bootstrap.min.js"></script>
<!--page specific plugin scripts-->
<!--ace scripts-->
<script src="assets/js/ace-elements.min.js"></script>
<script src="assets/js/ace.min.js"></script>
<!--inline scripts related to this page-->
<script type="text/javascript">
			$(function() {
				$('#submit').on('click',function(){
					$("#user_name").css( "border", "" );
					$("#password").css( "border", "" );
					var flog=0;
					if($('#user_name').val()==''){
						$("#user_name").css( "border", "1px solid red" );
						flog=1;
					}
					if($('#password').val()==''){
						$("#password").css( "border", "1px solid red" );
						flog=1;
					}
					
					
					
					
					if(flog==1){
						return false;	
					}else{
				
						$('#type_form').submit();
					}
				});
				
				
				function myconfirm() {
			   	resut= confirm("Are you sure delete user !!! ");
				   if(!resut){
					   return false;
				   }
				}
				
					

});			
</script>
<style>
/* Pagination style */
.paginations{margin:0;padding:0;}
.paginations li{
	display: inline;
	padding: 6px 10px 6px 10px;
	border: 1px solid #ddd;
	margin-right: -1px;
	font: 15px/20px Arial, Helvetica, sans-serif;
	background: #FFFFFF;
	box-shadow: inset 1px 1px 5px #F4F4F4;
}
.paginations li a{
    text-decoration:none;
    color: rgb(89, 141, 235);
}
.paginations li.first {
    border-radius: 5px 0px 0px 5px;
}
.paginations li.last {
    border-radius: 0px 5px 5px 0px;
}
.paginations li:hover{
	background: #CFF;
}
.paginations li.active{
	background: #F0F0F0;
	color: #333;
}
</style>
</body><!-- Mirrored from easy-themes.tk/themes/preview/ace/gallery.html by HTTrack Website Copier/3.x [XR&CO'2013], Fri, 05 Jul 2013 12:56:58 GMT -->
</html>