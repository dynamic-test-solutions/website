<?php 
session_start();
if($_SESSION['user_name']=="")
{
header("location:index.php?act=invalid");
}
include_once 'header.php';
error_reporting(0);

$continent_list=getcontinent();

/*if($_GET['act']=='del'){
	if($_GET['category_id']){
		$db=new database;
		$category_id=$_GET['category_id'];
		$conditons=array("category_id=".$category_id);					
		$db->deleteRow('product_categories',$conditons);
		header("location:categories.php");
	}
}*/


		


if($_GET['a']=='d'){
	if($_GET['i']){
		$db=new database;
		$user_id=$_GET['i'];
		$conditons=array("user_id=".$user_id);					
		$db->deleteRow('users',$conditons);
		header("location:viewsettings.php?Action=Deleted");
	}
}

?>
<script src="assets/js/countries.js"></script>
<style>
#submenu_img {
	display:none;
}
</style>
<div class="container-fluid" id="main-container"> <a id="menu-toggler" href="#"> <span></span> </a>
  <div id="sidebar">
    <ul class="nav nav-list">
      <li><a href="#" class="dropdown-toggle"> <i class="icon-picture"></i> <span>Country</span> <b class="arrow icon-angle-down"></b> </a>
        <ul class="submenu">
          <li ><a href="addplace.php"> <i class="icon-picture"></i> <span>Add Countries</span> <b class="arrow icon-angle-down"></b> </a></li>
          <li ><a href="viewplace.php"> <i class="icon-picture"></i> <span>view countries</span> <b class="arrow icon-angle-down"></b> </a></li>
        </ul>
      </li>
      <li><a href="#" class="dropdown-toggle"> <i class="icon-picture"></i> <span>Jobs</span> <b class="arrow icon-angle-down"></b> </a>
        <ul class="submenu">
          <li><a href="viewsubmenu.php"> <i class="icon-picture"></i> <span>View Jobs</span> <b class="arrow icon-angle-down"></b> </a></li>
          <li class="active"><a href="submenu.php"> <i class="icon-picture"></i> <span>Add Jobs</span> <b class="arrow icon-angle-down"></b> </a></li>
        </ul>
      </li>
      <li><a href="#" class="dropdown-toggle"> <i class="icon-picture"></i> <span>Settings</span> <b class="arrow icon-angle-down"></b> </a>
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
        <h1>View Jobs</h1>
      </div>
      <!--/.page-header-->
      <div class="row-fluid">
        <!--PAGE CONTENT BEGINS HERE-->
        
        <?php if($_GET['Action']=="Added") { ?>
        <div class="alert alert-block alert-success">
          <button type="button" class="close" data-dismiss="alert"> <i class="icon-remove"></i> </button>
          <i class="icon-ok green"></i> Record Successfully Added</strong>. </div>
         
        <?php } ?> 
         <?php  if($_GET['Action']=="Deleted") { ?>
        <div class="alert alert-block alert-success">
          <button type="button" class="close" data-dismiss="alert"> <i class="icon-remove"></i> </button>
          <i class="icon-ok green"></i> Record Successfully Deleted</strong>. </div>
         <?php } ?> 
         
         <?php  if($_GET['Action']=="Updated") { ?>
        <div class="alert alert-block alert-success">
          <button type="button" class="close" data-dismiss="alert"> <i class="icon-remove"></i> </button>
          <i class="icon-ok green"></i> Record Successfully Updated</strong>. </div>
         <?php } ?> 
        <div class="row-fluid" id="settings_list">
        
        
        
        
        </div>
        <!--PAGE CONTENT ENDS HERE-->
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
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
			window.jQuery || document.write("<script src='assets/js/jquery-1.9.1.min.js'>"+"<"+"/script>");
		</script>
<script src="assets/js/bootstrap.min.js"></script>
<!--page specific plugin scripts-->
<!--ace scripts-->
<script src="assets/js/ace-elements.min.js"></script>
<script src="assets/js/ace.min.js"></script>

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
<!--inline scripts related to this page-->
<script type="text/javascript">


			$(document).ready(function() {
				
				var category_id =$('#section-about').attr('category_id');
				category_id=category_id?category_id:'';
			    $("#settings_list" ).load( "ajaxsettings.php"); //load initial records
			   
			    //executes code below when user click on pagination links
			    $("#settings_list").on( "click", ".paginations a", function (e){
			        e.preventDefault();
			        $(".loading-div").show(); //show loading element
			        var page = $(this).attr("data-page"); //get page number from link
			       // var category_id =$('#section-about').attr('category_id');
			       // var product_type=$('.grid-cn-2').attr('product_type');

			       // category_id=category_id?category_id:'';
			        
			      //  product_type=product_type?product_type:'';
			        $("#settings_list").load("ajaxsettings.php",{"page":page}, function(){ //get content from PHP page
			            $(".loading-div").hide(); //once done, hide loading element
			        });
			       
			    });
			    
			});
			function myconfirm() {
			   resut= confirm("Are you sure delete job !!! ");
			   if(!resut){
				   return false;
			   }
			}
			</script>
</body></html>